<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * Events Controller
 *
 * @property \App\Model\Table\EventsTable $Events
 *
 * @method \App\Model\Entity\Event[] paginate($object = null, array $settings = [])
 */
class EventsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $events = $this->paginate($this->Events);

        $this->set(compact('events'));
        $this->set('_serialize', ['events']);
    }

    /**
     * View method
     *
     * @param string|null $id Event id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $event = $this->Events->get($id, [
            'contain' => []
        ]);

        $this->set('event', $event);
        $this->set('_serialize', ['event']);
    }

    public function scream(){
        $event = $this->Events->newEntity();
        $fighterTable=$this->loadModel('Fighters');
        if ($this->request->is('post')) {
            $event->player_id = $this->Auth->user('id');
            $screamData = $this->request->getData();
            $screamData['date'] = Time::now();

            //récupére l'id du figher sélectionné
            $id=$this->getSelectedFighterId();
            $fighter=$fighterTable->get($id);
            $screamData['coordinate_x'] = $fighter->coordinate_x;
            $screamData['coordinate_y']=$fighter->coordinate_y;

            $event = $this->Events->patchEntity($event, $screamData);
            if ($this->Events->save($event)) {
                $this->Flash->success(__('The Message has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Scream not saved. Please, try again.'));
        }
        $this->set(compact('event'));
        return $this->redirect(['action' => '/']);

    }

}
