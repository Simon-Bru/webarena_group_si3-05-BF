<?php
namespace App\Controller;
use Cake\Event\Event;

/**
 * Personal Controller
 * User personal interface
 *
 */
class ArenasController  extends AppController
{
    public function index()
    {
        $fighterTable = $this->loadModel('Fighters');
        $fighterId = $this->Auth->user('id');

        $query = $fighterTable->find('all')->where([
            'fighters.player_id = ' => $fighterId
        ]);

    }

    private function getActiveFighter(){
        $playerId = $this->Auth->user('id');
        $query = $this->Fighters->find('all')->where([
            'fighters.player_id = ' => $playerId
        ]);
        if(!empty($query->toArray())) {
            $fighter = $query->toArray()[0];
        }else {
            $this->Flash->error('Error');
        }
    }
}
