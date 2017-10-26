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
}
