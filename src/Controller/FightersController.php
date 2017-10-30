<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * Fighters Controller
 *
 * @property \App\Model\Table\FightersTable $Fighters
 *
 * @method \App\Model\Entity\Fighter[] paginate($object = null, array $settings = [])
 */
class FightersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Players', 'Guilds']
        ];
        $fighters = $this->Fighters->find('all')
            ->where([
                'Fighters.player_id = ' => $this->Auth->user('id')
            ]);

        $this->set(compact('fighters'));
        $this->set('_serialize', ['fighters']);
    }

    /**
     * View method
     *
     * @param string|null $id Fighter id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fighter = $this->Fighters->get($id, [
            'contain' => ['Players', 'Guilds', 'Messages']
        ]);

        $isMine = $fighter->player_id == $this->Auth->user('id');
        $this->set('isMine', $isMine);
        $this->set('fighter', $fighter);
        $this->set('_serialize', ['fighter']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fighter = $this->Fighters->newEntity();
        if ($this->request->is('post')) {
            $fighter->player_id = $this->Auth->user('id');
            // We initialize our object
            $fighter->beforeInsert();
            $fighter = $this->Fighters->patchEntity($fighter, $this->request->getData());
            if ($this->Fighters->save($fighter)) {
                $this->Flash->success(__('The fighter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fighter could not be saved. Please, try again.'));
        }
        $this->set(compact('fighter'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Fighter id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fighter = $this->Fighters->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put']) && $this->isMine($fighter)) {
            $fighter = $this->Fighters->patchEntity($fighter, $this->request->getData());
            if ($this->Fighters->save($fighter)) {
                $this->Flash->success(__('The fighter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fighter could not be saved. Please, try again.'));
        }
        $players = $this->Fighters->Players->find('list', ['limit' => 200]);
        $guilds = $this->Fighters->Guilds->find('list', ['limit' => 200]);
        $this->set(compact('fighter', 'players', 'guilds'));
        $this->set('_serialize', ['fighter']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Fighter id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fighter = $this->Fighters->get($id);
        if($this->isMine($fighter)) {
            if ($this->Fighters->delete($fighter)) {
                $this->Flash->success(__('The fighter has been deleted.'));
            } else {
                $this->Flash->error(__('The fighter could not be deleted. Please, try again.'));
            }
        }

        return $this->redirect(['action' => 'index']);
    }


    public function changeAvatar()
    {
        $this->request->allowMethod('post');

        $referer = $this->referer();
        $split_url = explode('/', $referer);
        $fighterId = $split_url[sizeof($split_url)-1];

        $fighter = $this->Fighters->get($fighterId);

        $file = $this->request->getData('avatar'); //put the data into a var for easy use

        if (!empty($file['name']) && $this->isMine($fighter)) {

            $extension = pathinfo($file['name'], PATHINFO_EXTENSION);

            $arr_ext = array('jpg', 'jpeg', 'gif', 'png'); //set allowed extensions


            //only process if the extension is valid
            if (in_array($extension, $arr_ext)) {
                //uploading of the file. First arg is the tmp name, second arg is
                //where we are putting it

                $file_exists = glob(WWW_ROOT.'img/avatars/fighter_'.$fighterId.'.*');
                if($file_exists){
                    unlink($file_exists[0]);
                }
                move_uploaded_file($file['tmp_name'],
                    WWW_ROOT . 'img/avatars/fighter_' . $fighterId. '.' . $extension);
                $this->Flash->success(__('Your avatar was just uploaded'));
            } else {
                $this->Flash->error('Please choose an image file, '.$extension.' is not supported');
            }

        } else {
            $this->Flash->error(__('Please select a image file to upload'));
        }
        return $this->redirect(['action' => 'view/'.$fighterId]);
    }


    public function levelUp($id, $skill){

        $fighter = $this->Fighters->get($id);

        if($fighter->hasFullXp() && $this->isMine($fighter)) {
            if($fighter->levelUp($skill)) {
                $this->Fighters->save($fighter);
                $this->Flash->success(__('Level Up ! Your player passed the next level'));
            } else {
                $this->Flash->error(__('Error! You must select a skill to improve'));
            }
        } else {
            $this->Flash->error('You haven\'t enough XP to level up');
        }
        return $this->redirect(['action' => '/']);
    }


    /**
     * Arenas function
     */

    public function move(){
        $this->request->allowMethod('post');
        $eventsTable = $this->loadModel('Events');
        $event = $eventsTable->newEntity();
        if(!empty($this->request->getData()) && !empty($this->request->getData('direction'))){
            $playerId = $this->Auth->user('id');
            $activeFighterId = $this->getSelectedFighterId();

            $direction=$this->request->getData('direction');

            $fighter = $this->Fighters->get($activeFighterId);

            if(!empty($fighter)) {
                if($fighter->move($direction)) {
                    $this->Fighters->save($fighter);
                    $this->Flash->success('Your fighter moved '.$direction);

                    $event['name'].=$fighter->name." moved ".$direction;
                    $event['date']=Time::now();
                    $event['coordinate_x']=$fighter->coordinate_x;
                    $event['coordinate_y']=$fighter->coordinate_y;
                    $this->Events->save($event);

                } else{
                    $this->Flash->error('Impossible to move there');
                }
            } else {
                $this->Flash->error('Error. You didn\'t select the active fighter');
            }
        }
        else{
            $this->Flash->error('Error no direction detected');
        }

        return $this->redirect(['controller' => 'Arena', 'action' => '/']);
    }

    public function select($fighterId) {
        $fighter = $this->Fighters->get($fighterId);
        if($this->isMine($fighter)) {
            $session = $this->request->getSession();
            $session->write($this->Auth->user('id'), $fighterId);
            $this->Flash->success('You just selected '.$fighter->name);
        }
        $this->redirect('/fighters');
    }


    private function isMine($fighter) {
        if($fighter->player_id != $this->Auth->user('id')) {
            $this->Flash->error('Access denied');
            $this->redirect('/fighters');
        }
        return true;
    }


    public function attack($fighter)
    {
        $this->request->allowMethod('post');
        $eventsTable = $this->loadModel('Events');
        $event = $eventsTable->newEntity();
        if (!empty($this->request->getData())) {
            $playerId = $this->Auth->user('id');
            $activeFighterId = $this->getSelectedFighterId();
            $fighter = $this->Fighters->get($activeFighterId);
            $attacked = false;
            //Vérification de la présence d'un Fighter sur la case cible
            $defenser = $this->attack($fighter);// fighter attacked
            // if attacked
            if (is_array($defenser)) {
                $attacked = true;
                //Test attack
                $rand = rand(1, 20);// random value between 1 and 20
                //Conditions of success attack
                if ($rand > (10 + $defenser['Fighter']['level'] - $fighter->level)) {
                    //Decrease the current health of the attacked fighter
                    $defenser['Fighter']['current_health'] -= $fighter->skill_strength;
                    if ($defenser['Fighter']['current_health'] == 0) {
                        $fighter->xp += $defenser['Fighter']['level'];
                    } else {
                        $fighter->xp++;
                    }
                    $this->Fighters->save($fighter);
                    $this->Fighters->save($defenser);
                    $event['name'].=$fighter->name." attacked ".$defenser['Fighter']['name'];
                    $event['date']=Time::now();
                    $event['coordinate_x']=$defenser->coordinate_x;
                    $event['coordinate_y']=$defenser->coordinate_y;
                    $this->Events->save($event);
                    $this->Flash->success('Attack successful');

                }
                else{
                    $this->Flash->error('Attack failed');
                }
            } else {
                $this->Flash->error('Error occured');
            }
            return $this->redirect(['controller' => 'Arena', 'action' => '/']);
        }
    }
}
