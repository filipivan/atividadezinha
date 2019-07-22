<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Cache\Cache;
use Cake\Routing\Router;
use Cake\Mailer\Email;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController{

    public function isAuthorized($user){
        if (isset($user['role']) and $user['role'] === 'user'){
            if (in_array($this->request->action, ['home', 'logout', 'editforuser'])){
                return true;
            }
        }
        return parent::isAuthorized($user);
    }

    public function home(){
        $this->limpaDados();
        Cache::enable();
        // Inicia Paginação
        $users = $this->paginate($this->Users->find()->order(['points' => 'DESC']));
        // Passa Lista de Usuarios
        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
        // Renderiza Home
        $this->render();
    }

    public function login(){
        $this->limpaDados();
        if($this->request->is('post')){
            $user = $this->Auth->identify();
            if ($user){
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            else{
                $this->Flash->error("Dados Inválidos! Por favor, tente novamente...", ['key' => 'auth']);
            }
        }
        if ($this->Auth->user()){
            return $this->redirect(['controller' => 'Users', 'action' => 'home']);
        }
    }

    public function logout(){
        return $this->redirect($this->Auth->logout());
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index(){

        $this->limpaDados();

        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Games']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add(){
        $this->limpaDados();
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Usuário Cadastrado Com Sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro Ao Cadastrar O Usuário. Por Favor, Tente Novamente...'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null){
        $this->limpaDados();
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Usuário Editado Com Sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro Ao Editar O Usuário. Por Favor, Tente Novamente...'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('Usuário Excluído Com Sucesso!'));
        } else {
            $this->Flash->error(__('Não Foi Possível Excluir o Registro, Tente Novamente...'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function register(){
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->points =0;
            $user->role = 'user';
            $user->active = 1;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Registro Realizado Com Sucesso!'));

                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('Erro Ao Realizar Registro Usuário.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function editforuser($id = null){
        $this->limpaDados();
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Usuário Editado Com Sucesso'));

                return $this->redirect(['action' => 'home']);
            }
            $this->Flash->error(__('Edição Não Realizada, Tente Novamente...'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function atualizaPontuacao($pontos, $situacao){
        $user = $this->Users->get($this->Auth->user('id'), [
            'contain' => []
        ]);
        $user->points = $user->points + $pontos;
        if ($this->Users->save($user)) {
            // Deletar dados
            $this->request->session()->delete('listaCategorias');
            $this->request->session()->delete('pontos');
            $this->request->session()->delete('posicao');
            $this->request->session()->delete('idPerguntas');
            switch ($situacao){
                case "errou":
                    $this->Flash->error(__('Você Errou :( | Sua Pontuação Atual é '.$user->points));
                    return $this->redirect(['controller' => 'users', 'action' => 'home']);
                    break;
                case "finalizou":
                    $this->Flash->success(__('Fim de Jogo Parábens | Sua Pontuação Atual é '.$user->points));
                    return $this->redirect(['controller' => 'users', 'action' => 'home']);
                    break;
                case "parou":
                    $this->Flash->success(__('Fim de Jogo | Sua Pontuação Atual é '.$user->points));
                    return $this->redirect(['controller' => 'users', 'action' => 'home']);
                    break;
            }
        }
    }

    public function limpaDados(){
        // Limpa dados da partida
        if ($this->request->session()->read('pontos') !== null){
            $this->request->session()->delete('listaCategorias');
            $this->request->session()->delete('pontos');
            $this->request->session()->delete('posicao');
            $this->request->session()->delete('idPerguntas');
        }
    }

    /*
    public function password(){
        if ($this->request->is('post')) {
            $query = $this->Users->findByEmail($this->request->data['email']);
            $user = $query->first();
            if (is_null($user)) {
                $this->Flash->error('Email Não Cadastrado, Por Favor, Tente Novamente...');
            } else {
                $passkey = uniqid();
                $url = Router::Url(['controller' => 'users', 'action' => 'reset'], true) . '/' . $passkey;
                if ($this->Users->updateAll(['password' => $passkey], ['id' => $user->id])){
                    $this->sendResetEmail($url, $user);
                    $this->redirect(['action' => 'login']);
                } else {
                    $this->Flash->error('Error saving reset passkey/timeout');
                }
            }
        }
    }

    private function sendResetEmail($url, $user) {
        $email = new Email();
        $email->template('reset');
        $email->emailFormat('both');
        $email->from('filipivansuita@gmail.com');
        $email->to($user->email, $user->first_name.' '.$user->last_name);
        $email->subject('Atividadezinha - Email de Recuperação');
        $email->viewVars(['url' => $url, 'username' => $user->username]);
        if ($email->send()) {
            $this->Flash->success(__('Um link de recuperação foi enviado para o seu email.'));
        } else {
            $this->Flash->error(__('Erro Ao Enviar Email: ') . $email->smtpError);
        }
    }

    public function reset($passkey = null) {
        if ($passkey) {
            $query = $this->Users->find('all', ['conditions' => ['password' => $passkey]]);
            $user = $query->first();
            if ($user) {
                if (!empty($this->request->data)) {
                    // Clear passkey and timeout
                    $this->request->data['password'] = null;
                    $user = $this->Users->patchEntity($user, $this->request->data);
                    if ($this->Users->save($user)) {
                        $this->Flash->set(__('Your password has been updated.'));
                        return $this->redirect(array('action' => 'login'));
                    } else {
                        $this->Flash->error(__('The password could not be updated. Please, try again.'));
                    }
                }
            } else {
                $this->Flash->error('Invalid or expired passkey. Please check your email or try again');
                $this->redirect(['action' => 'password']);
            }
            unset($user->password);
            $this->set(compact('user'));
        } else {
            $this->redirect('/');
        }
    }
*/

}
