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
            $activeFighter = $fighterTable->get($selectedFighterId);
            $fighters = $fighterTable->find("all")
                ->where(["id != " => $activeFighter->id ])
                ->orderAsc('coordinate_y')
                ->orderAsc('coordinate_x');

            $this->set('activeFighter', $activeFighter);
            $this->set('fighters', $fighters->toArray());
        }
        else {
            $this->Flash->error('Please select a fighter to enter the arena');
            $this->redirect('/fighters');
        }
    }
}
