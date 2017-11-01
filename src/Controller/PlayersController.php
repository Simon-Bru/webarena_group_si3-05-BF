<?php
namespace App\Controller;

use Cake\Event\Event;
use Cake\Mailer\MailerAwareTrait;

/**
 * Players Controller
 *
 * @property \App\Model\Table\PlayersTable $Players
 *
 * @method \App\Model\Entity\Player[] paginate($object = null, array $settings = [])
 */
class PlayersController extends AppController
{

    use MailerAwareTrait;

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

    /**
     * Allowed routes for non logged users
     * @param Event $event
     * @return \Cake\Http\Response|null
     */
    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['login', 'add', 'forgottenPwd']);
        return parent::beforeFilter($event);
    }

    public function login()
    {
        $player = $this->Players->newEntity();
        $this->set(compact("player"));
        $this->set('_serialize', ['player']);
        if(empty($this->Auth->user('id'))) {
            if ($this->request->is('post')) {
                $player = $this->Auth->identify();

                if ($player) {
                    $this->Auth->setUser($player);
                    return $this->redirect($this->Auth->redirectUrl());
                }
                $this->Flash->error(__('Invalid username or password, try again'));
                $this->set(compact('player'));
                return $this->redirect($this->Auth->redirectUrl("/Players/login"));
            }
        }
        else {
            $this->Flash->error('You are already logged in');
            $this->redirect('/fighters');
        }

    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    /**
     *
     * Route to reset password
     *
     * */
    public function forgottenPwd() {
        $this->request->allowMethod('post');

        /** If variable email is present in the request */
        if(!empty($this->request->getData('email'))) {
            $email = $this->request->getData('email');
            $pwd = $this->Players->resetPassword($email);

            /** If player exists, display success message, or display error message */
            if(!empty($pwd)) {
                $this->getMailer('Players')->send('resetPassword', [$email, $pwd]);
                $this->Flash->success('We just sent you your new password by mail !');
            } else {
                $this->Flash->error('Sorry, we don\'t have any user matching mail address...'.
                                            ' Please try again');
            }
            /** Redirect to login */
            $this->redirect(['action' => 'login']);
        }
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

        if(empty($this->Auth->user('id'))) {
            if ($this->request->is('post') && !($this->Auth->isAuthorized())) {
                $player = $this->Players->patchEntity($player, $this->request->getData());
                if ($this->Players->save($player)) {
                    $this->Flash->success(__('The player has been saved.'));

                    return $this->redirect(['action' => 'login']);
                }
                $this->Flash->error(__('The player could not be saved. Please, try again.'));
            }
        } else {
            $this->Flash->error('You are already logged in');
            $this->redirect('/fighters');
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
