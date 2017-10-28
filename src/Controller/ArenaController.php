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
        $selectedFighterId = $this->getSelectedFighter();
        if($selectedFighterId) {
            $fighterTable = $this->loadModel('Fighters');
            $this->set('activeFighter', $fighterTable->get($selectedFighterId));
        }
        else {
            $this->Flash->error('Please select a fighter to enter the arena');
            $this->redirect('/fighters');
        }
    }
}
