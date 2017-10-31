<?php
namespace App\Controller;
use Cake\Event\Event;

/**
 * Personal Controller
 * User personal interface
 *
 */
class ArenaController  extends AppController
{
    public function index()
    {
        $selectedFighterId = $this->getSelectedFighterId();
        if($selectedFighterId) {
            $fighterTable = $this->loadModel('Fighters');
            $toolsTable = $this->loadModel('Tools');

            $activeFighter = $fighterTable->get($selectedFighterId);
            $fighters = $fighterTable->find("all")
                ->where(["id != " => $activeFighter->id ])
                ->orderAsc('coordinate_y')
                ->orderAsc('coordinate_x');

            $tools = $toolsTable->find('all')
                ->where(['fighter_id IS NULL'])
                ->orderAsc('coordinate_y')
                ->orderAsc('coordinate_x');

            $this->set('activeFighter', $activeFighter);
            $this->set('fighters', $fighters->toArray());
            $this->set('tools', $tools->toArray());
        }
        else {
            $this->Flash->error('Please select a fighter to enter the arena');
            $this->redirect('/fighters');
        }
    }

    // works
    public function addTools(){
        $this->request->allowMethod('post');
        $toolsTable = $this->loadModel('Tools');
        $availableTools = $toolsTable->find('all')->where(['fighter_id IS NULL']);

//        GENERATE TOOLS ONLY IF THERE ARE LESS THAN 3 ON THE MAP
        if(sizeof($availableTools) > 3) {
            $this->Flash->error('There are too many tools on the map');
        }
        else {
            for($i=0; $i < NUMBER_OF_TOOLS; $i++){
                $tools = $toolsTable->newEntity();
                // We initialize our object
                $tools->initialize();
                $this->Tools->save($tools);
            }
            $this->Flash->success('Enjoy the tools :)');
        }

        return $this->redirect(['action' => '/']);

    }

    // TO test when we can click on the tool in the arena
    public function checkTool(){
        $toolsTable=$this->loadModel('Tools');
        $fightersTable=$this->loadModel('Fighters');
        $activeFighterId = $fightersTable->getSelectedFighterId();
        $fighter = $fightersTable->get($activeFighterId);
        $toolId=$this->getSelectedToolId();
        $tool=$toolsTable->get($toolId);
        $type=$this->type;
        switch($type){
            case "Sword":
                $fighter->skill_strength+=$tool->bonus;
                break;
            case "Shield":
                $fighter->skill_health+=$tool->bonus;
                break;
            case "Axe":
                $fighter->skill_health+=$tool->bonus;
                break;
            case "Helmet":
                $fighter->skill_health+=$tool->bonus;
                break;
            case "Armor":
                $fighter->skill_heath+=$tool->bonus;
                break;
            case "Gloves":
                $fighter->skill_sight+=$tool->bonus;
                break;
            case "Boots":
                $fighter->skill_strength+=$tool->bonus;
                break;
        }
    }
    //To test
    public function equipTool(){
        $this->request->allowMethod('post');
        $toolsTable=$this->loadModel('Tools');
        $fightersTable=$this->loadModel('Fighters');
        $activeFighterId = $fightersTable->getSelectedFighterId();
        $fighter = $fightersTable->get($activeFighterId);
        $toolId=$this->getSelectedToolId();
        $tool=$toolsTable->get($toolId);
        $this->checkTool();
        $tool->fighter_id=$fighter->id;
        $this->Fighters->save($fighter);
        $this->Tools->save($tool);

    }
}
