<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * Messages Controller
 *
 * @property \App\Model\Table\MessagesTable $Messages
 *
 * @method \App\Model\Entity\Message[] paginate($object = null, array $settings = [])
 */
class MessagesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $messages = $this->Messages->find('all', [
            'contain' => 'Fighters'
        ]);

        $this->set(compact('messages'));
        $this->set('_serialize', ['messages']);
    }

    /**
     * View method
     *
     * @param string|null $id Message id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $message = $this->Messages->get($id, [
            'contain' => ['Fighters']
        ]);

        $this->set('message', $message);
        $this->set('_serialize', ['message']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
//
        $fightersTable = $this->loadModel('Fighters');
        $query = $fightersTable
            ->find()
            ->select(['id', 'name']);

        $fighters = array_map(function ($fighters) {
            return [
                'value' => $fighters['id'],
                'text' => $fighters['name']

            ];
        }, $query->toArray() );

        $fighters_from_query = $fightersTable
            ->find()
            ->select(['id','name'])
            ->where(['player_id' => $this->Auth->user('id')]);

        $fighters_from = array_map(function ($fighters) {
            return [
                'value' => $fighters['id'],
                'text' => $fighters['name']

            ];
        }, $fighters_from_query->toArray());



        $message = $this->Messages->newEntity();

        if ($this->request->is('post')) {

            $time = Time::now();

            $message->date = $time;


            if (!empty($fighters_from_query)) {
                //var_dump($fighterexist);
                $message = $this->Messages->patchEntity($message, $this->request->getData());
                if ($this->Messages->save($message)) {
                    $this->Flash->success(__('The message has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The message could not be saved. Please, try again.'));

            }

            else {
                $this->Flash->error(__('Please create a fighter'));
                return $this->redirect(['controller' => 'Fighters', 'action' => 'add']);
            }



        }

        $this->set(compact('message', 'fighters'));
        $this->set(compact('message', 'fighters_from'));



    }

    /**
     * Delete method
     *
     * @param string|null $id Message id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $message = $this->Messages->get($id);
        if ($this->Messages->delete($message)) {
            $this->Flash->success(__('The message has been deleted.'));
        } else {
            $this->Flash->error(__('The message could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}