<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Guilds Controller
 *
 * @property \App\Model\Table\GuildsTable $Guilds
 *
 * @method \App\Model\Entity\Guild[] paginate($object = null, array $settings = [])
 */
class GuildsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $guilds = $this->paginate($this->Guilds->find('all', [
            'contain' => ['Fighters']
        ]));

        $this->set(compact('guilds'));
        $this->set('_serialize', ['guilds']);
    }


    /**
     * Allowed route to non logged users
     * @param Event $event
     * @return \Cake\Http\Response|null
     */
    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['index', 'view']);
        return parent::beforeFilter($event);
    }

    /**
     * View method
     *
     * @param string|null $id Guild id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $guild = $this->Guilds->get($id, [
            'contain' => ['Fighters']
        ]);

        $this->set('guild', $guild);
        $this->set('_serialize', ['guild']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $guild = $this->Guilds->newEntity();
        if ($this->request->is('post')) {
            $guild = $this->Guilds->patchEntity($guild, $this->request->getData());
            if ($this->Guilds->save($guild)) {
                $this->Flash->success(__('The guild has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The guild could not be saved. Please, try again.'));
        }
        $this->set(compact('guild'));
        $this->set('_serialize', ['guild']);
    }
}
