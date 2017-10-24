<?php
namespace App\Controller;

use Cake\Event\Event;

/**
 * Players Controller
 *
 * @property \App\Model\Table\PlayersTable $Players
 *
 * @method \App\Model\Entity\Player[] paginate($object = null, array $settings = [])
 */
class PlayersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $players = $this->paginate($this->Players);

        $this->set(compact('players'));
        $this->set('_serialize', ['players']);
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['login', 'add']);
    }

    public function login()
    {
        if ($this->request->is('post') && !($this->Auth->isAuthorized())) {
            $player = $this->Auth->identify();
            var_dump($player);
            if ($player) {
                $this->Auth->setUser($player);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
            return $this->redirect($this->Auth->redirectUrl("/login "));
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    /**
     * View method
     *
     * @param string|null $id Player id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $player = $this->Players->get($id, [
            'contain' => ['Fighters']
        ]);

        $this->set('player', $player);
        $this->set('_serialize', ['player']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $player = $this->Players->newEntity();
        if ($this->request->is('post') && !($this->Auth->isAuthorized())) {
            $player = $this->Players->patchEntity($player, $this->request->getData());
            if ($this->Players->save($player)) {
                $this->Flash->success(__('The player has been saved.'));

                return $this->redirect('/login');
            }
            $this->Flash->error(__('The player could not be saved. Please, try again.'));
        }
        $this->set(compact('player'));
        $this->set('_serialize', ['player']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Player id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $player = $this->Players->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $player = $this->Players->patchEntity($player, $this->request->getData());
            if ($this->Players->save($player)) {
                $this->Flash->success(__('The player has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The player could not be saved. Please, try again.'));
        }
        $this->set(compact('player'));
        $this->set('_serialize', ['player']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Player id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $player = $this->Players->get($id);
        if ($this->Players->delete($player)) {
            $this->Flash->success(__('The player has been deleted.'));
        } else {
            $this->Flash->error(__('The player could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
