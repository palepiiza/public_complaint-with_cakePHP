<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Petugas Controller
 *
 * @property \App\Model\Table\PetugasTable $Petugas
 * @method \App\Model\Entity\Petuga[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PetugasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $level = $this->Authentication->getIdentity()->get('level');
        $id= $this->Authentication->getIdentity()->get('id_petugas');
        if($level=='admin'){
            $petugas = $this->paginate($this->Petugas);
        }else if($level=='petugas'){
            $petugas = $this->paginate($this->Petugas->find('all', ['conditions' => ['level !=' => 'admin']]));
        }else{
            $petugas = $this->Petugas->find('all', ['conditions' => ['id_petugas =' => $id]]);
            $petugas = $this->paginate($petugas);
        }


        $this->set(compact('petugas'));
    }

    /**
     * View method
     *
     * @param string|null $id Petuga id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $petuga = $this->Petugas->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('petuga'));
    }

    public function register()
    {
        $petuga = $this->Petugas->newEmptyEntity();
        if ($this->request->is('post')) {
            $petuga = $this->Petugas->patchEntity($petuga, $this->request->getData());
            if ($this->Petugas->save($petuga)) {
                $this->Flash->success(__('Pendaftaran Pengguna Berhasil'));


                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('Pendaftaran pengguna gagal, silahkan ulangi lagi proses pendaftaran'));
        }
        $this->set(compact('petuga'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $petuga = $this->Petugas->newEmptyEntity();
        if ($this->request->is('post')) {
            $petuga = $this->Petugas->patchEntity($petuga, $this->request->getData());
            if ($this->Petugas->save($petuga)) {
                $this->Flash->success(__('The petuga has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The petuga could not be saved. Please, try again.'));
        }
        $this->set(compact('petuga'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Petuga id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $petuga = $this->Petugas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $petuga = $this->Petugas->patchEntity($petuga, $this->request->getData());
            if ($this->Petugas->save($petuga)) {
                $this->Flash->success(__('The petuga has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The petuga could not be saved. Please, try again.'));
        }
        $this->set(compact('petuga'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Petuga id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $petuga = $this->Petugas->get($id);
        $id_petugas = $this->Authentication->getIdentity()->get('id_petugas');
        if($id!=$id_petugas){
            if ($this->Petugas->delete($petuga)) {
                $this->Flash->success(__('The petuga has been deleted.'));
            } else {
                $this->Flash->error(__('The petuga could not be deleted. Please, try again.'));
            }
        } else {
            $this->Flash->error(__('Mohon maaf anda tidak bisa menghapus akun anda sendiri, silahkan menghubungi admin untuk konfirmasi hapus data pengguna'));
        }


        return $this->redirect(['action' => 'index']);
    }
    public function login()
{
    $result = $this->Authentication->getResult();
    // If the user is logged in send them away.
    if ($result->isValid()) {
        $target = $this->Authentication->getLoginRedirect() ?? '/petugas';
        return $this->redirect($target);
    }
    if ($this->request->is('post')) {
        $this->Flash->error('Invalid username or password');
    }
}
public function beforeFilter(\Cake\Event\EventInterface $event)
{
    parent::beforeFilter($event);

    $this->Authentication->allowUnauthenticated(['login','register']);
}
public function logout()
{
    $this->Authentication->logout();
    return $this->redirect(['controller' => 'petugas', 'action' => 'login']);
}
}
