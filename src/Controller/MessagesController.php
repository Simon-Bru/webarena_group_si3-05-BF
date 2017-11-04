<?php
namespace App\Controller;

use Cake\I18n\Time;
use Cake\Utility\Hash;

/**
 * Messages Controller
 *
 * @property \App\Model\Table\MessagesTable $Messages
 *
 * @method \App\Model\Entity\Message[] paginate($object = null, array $settings = [])
 */
class MessagesController extends AppController
{

    public function initialize()
    {
        $this->loadComponent('RequestHandler');
        parent::initialize();
    }

    public function index() {
        $this->redirect(['action' => 'view', $this->getSelectedFighterId()]);
    }

    /**
     * View method
     *
     * @return \Cake\Http\Response|void
     */
    public function view($id = NULL)
    {
        $fightersTable = $this->loadModel('Fighters');

        if(empty($id)) {
            $id = $this->getSelectedFighterId();
        } else {
            if($fightersTable->get($id)->player_id != $this->Auth->user('id')) {
                $this->Flash->error('You can\'t see another player\'s fighter messages');
                $this->redirect(['action' => 'messages']);
            }
        }

        $fightersQuery = $fightersTable->find()
            ->select(['id', 'name'])
            ->where(['player_id' => $this->Auth->user('id')]);

        $myfighters = array_map(function($fighter) use ($id) {
            return [
                'value' => $fighter->id,
                'text' => $fighter->name,
                'selected' => $fighter->id == $id
            ];
        }, $fightersQuery->toArray());

        $recipients = $fightersTable->getConversations($id);
        usort($recipients, function($a, $b) {
            return sizeof($a->messages_sent)+sizeof($a->messages_received)
                < sizeof($b->messages_sent)+sizeof($b->messages_received);
        });

        $this->set(compact('id'));
        $this->set(compact("myfighters"));
        $this->set(compact('recipients'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->request->allowMethod('post');
        $fightersTable = $this->loadModel('Fighters');

        $message = $this->Messages->newEntity();

        $time = Time::now();

        $message->date = $time;

        $fighter_from = $fightersTable->get($this->request->getData('fighter_id_from'));
        $fighter_to = $fightersTable->get($this->request->getData('fighter_id'));

        if (!empty($fighter_from) && !empty($fighter_to) && $fighter_from->player_id == $this->Auth->user('id')) {

            $message = $this->Messages->patchEntity($message, $this->request->getData());
            if ($this->Messages->save($message)) {
                $this->Flash->success(__('The message has been saved.'));
            } else {
                $this->Flash->error(__('The message could not be saved. Please, try again.'));
            }
        }
        else {
            $this->Flash->error(__('Please create a fighter'));
            return $this->redirect(['controller' => 'Fighters', 'action' => 'add']);
        }
        return $this->redirect(['action' => 'index']);
    }
}
