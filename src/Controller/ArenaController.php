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

        if($this->loadModel('Tools')->generateTools()) {
            $this->Flash->success('Enjoy the tools :)');
        }
        else {
            $this->Flash->error('There are too many tools on the map');
        }

        return $this->redirect(['action' => '/']);

    }

    public function pickTool($toolId){
        $toolsTable = $this->loadModel('Tools');
        $fightersTable = $this->loadModel('Fighters');

        $activeFighterId = $this->getSelectedFighterId();
        $fighter = $fightersTable->get($activeFighterId);
        $tool=$toolsTable->get($toolId);

        if(!empty($tool) && $fighter->isInContact($tool)) {
            $fighter->pick($tool);
            $fightersTable->save($fighter);
            $toolsTable->save($tool);
            $this->Flash->success($fighter->name.' picked a new '.$tool->type.' with a +'.$tool->bonus.' bonus in '.TOOLS_TABLE[$tool->type]['bonus']);
        }
        else {
            $this->Flash->error("You can't pick a tool which is not next to you!");
        }

        return $this->redirect(['action' => '/']);
    }
}
