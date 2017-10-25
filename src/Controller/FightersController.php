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
        $players = $this->Fighters->Players->find('list', ['limit' => 200]);
        $guilds = $this->Fighters->Guilds->find('list', ['limit' => 200]);
        $this->set(compact('fighter', 'players', 'guilds'));
        $this->set('_serialize', ['fighter']);
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
        $this->loadModel('Fighters');
        $myid = $this->Fighters->find('all')
            ->where([
                'Fighters.player_id = ' => $this->Auth->user('id')
            ]);
        //var_dump($myid);
        $this->set('record', 'uploadAvatar'); //Setting View Variable

        if ($this->request->is('post')) {
            if (!empty($this->request->data['upload']['name'])) {

                $file = $this->request->data['upload']; //put the data into a var for easy use
                $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                $arr_ext = array('jpg', 'jpeg', 'gif', 'png'); //set allowed extensions


                //only process if the extension is valid
                if (in_array($ext, $arr_ext)) {
                    //uploading of the file. First arg is the tmp name, second arg is
                    //where we are putting it

                    move_uploaded_file($file['tmp_name'], WWW_ROOT . '/img' . $myid. '.' . $ext);
                    var_dump($file);
                    $this->Flash->success(__('Success'));
                }

            }
            $this->Flash->error(__('Nop'));


        }
        //return $this->redirect(['action' => 'view/1']);
    }


    public function levelUp($id,$skill){
        $this->loadModel('Fighters');

        if($skill==1 && $this->Fighters->shows($id)){
            $this->Fighters->moreSight($id);
            $this->Flash->success(__('Success you gain a level'));
        }
        if($skill==2 && $this->Fighters->shows($id)){
            $this->Flash->success(__('Success You gain a level'));
            $this->Fighters->moreStrength($id);
        }

        if($skill==3 && $this->Fighters->shows($id)){
            $this->Fighters->moreHealth($id);
            $this->Flash->success(__('Success you gain a level'));
        }

        $instance=$this->Fighters->get($id);
        $this->set('fighter',$instance);
        $this->set('show',$this->Fighters->shows($id));
        return $this->redirect(['action' => '/']);

    }



}
