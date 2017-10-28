<?php
namespace App\Controller;

use App\Controller\AppController;

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
        if ($this->request->is(['patch', 'post', 'put'])) {
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
        if ($this->Fighters->delete($fighter)) {
            $this->Flash->success(__('The fighter has been deleted.'));
        } else {
            $this->Flash->error(__('The fighter could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function changeAvatar()
    {
        $this->request->allowMethod('post');

        $referer = $this->referer();
        $split_url = explode('/', $referer);
        $fighterId = $split_url[sizeof($split_url)-1];

        $file = $this->request->getData('avatar'); //put the data into a var for easy use

        if (!empty($file['name'])) {

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

        $hasFullXp = $this->Fighters->hasFullXp($id);

        if($hasFullXp) {
            if($this->Fighters->levelUp($id, $skill)) {
                $this->Flash->success(__('Level Up ! Your player passed the next level'));
            } else {
                $this->Flash->error(__('Error! You must select a skill to improve'));
            }
        }

        $instance = $this->Fighters->get($id);
        $this->set('fighter',$instance);
        $this->set('show', $hasFullXp);
        return $this->redirect(['action' => '/']);
    }


    /**
     * Arenas function
     */


    public function move(){
        $this->request->allowMethod('post');
        if(!empty($this->request->getData()) && !empty($this->request->getData('direction'))){
            $playerId = $this->Auth->user('id');
            $direction=$this->request->getData('direction');

            $query = $this->Fighters->find('all')->where([
                'player_id = ' => $playerId
            ]);
            if(!empty($query->toArray())) {
                $fighter = $query->toArray()[0];
                if($fighter->move($direction)) {
                    $this->Fighters->save($fighter);
                    $this->Flash->success('Your fighter moved');
                } else{
                    $this->Flash->error('Impossible to move there');
                }
            } else {
                $this->Flash->error('Error');
            }
        }
        else{
            $this->Flash->error('Error no direction detected');
        }

        return $this->redirect(['action' => '/']);
    }

}
