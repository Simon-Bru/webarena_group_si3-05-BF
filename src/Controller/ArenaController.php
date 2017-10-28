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
        $fighterId = $this->Auth->user('id');
        $session = $this->request->getSession();
        if($session->read($fighterId)) {
            $fighterTable = $this->loadModel('Fighters');

        }
        else {
            $this->Flash->error('Please select a fighter to enter the arena');
            $this->redirect('/fighters');
        }
    }
}
