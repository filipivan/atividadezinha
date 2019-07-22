<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Controller\QuestionsController;
use Cake\Cache\Cache;
use Cake\Controller\Controller;

/**
 * Games Controller
 *
 * @property \App\Model\Table\GamesTable $Games
 *
 * @method \App\Model\Entity\Game[] paginate($object = null, array $settings = [])
 */
class GamesController extends AppController
{

    public function isAuthorized($user){
        if (isset($user['role']) and $user['role'] === 'user'){
            if (in_array($this->request->action, ['game', 'verificaresposta', 'parar'])){
                return true;
            }
        }
        return parent::isAuthorized($user);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
   /* public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $games = $this->paginate($this->Games);

        $this->set(compact('games'));
        $this->set('_serialize', ['games']);
    }*/

    /**
     * View method
     *
     * @param string|null $id Game id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    /*public function view($id = null)
    {
        $game = $this->Games->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('game', $game);
        $this->set('_serialize', ['game']);
    }*/

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    /*public function add()
    {
        $game = $this->Games->newEntity();
        if ($this->request->is('post')) {
            $game = $this->Games->patchEntity($game, $this->request->getData());
            if ($this->Games->save($game)) {
                $this->Flash->success(__('The game has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The game could not be saved. Please, try again.'));
        }
        $users = $this->Games->Users->find('list', ['limit' => 200]);
        $this->set(compact('game', 'users'));
        $this->set('_serialize', ['game']);
    }*/

    /**
     * Edit method
     *
     * @param string|null $id Game id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    /*public function edit($id = null)
    {
        $game = $this->Games->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $game = $this->Games->patchEntity($game, $this->request->getData());
            if ($this->Games->save($game)) {
                $this->Flash->success(__('The game has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The game could not be saved. Please, try again.'));
        }
        $users = $this->Games->Users->find('list', ['limit' => 200]);
        $this->set(compact('game', 'users'));
        $this->set('_serialize', ['game']);
    }*/

    /**
     * Delete method
     *
     * @param string|null $id Game id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    /*public function delete($id = null){
        $this->request->allowMethod(['post', 'delete']);
        $game = $this->Games->get($id);
        if ($this->Games->delete($game)) {
            $this->Flash->success(__('The game has been deleted.'));
        } else {
            $this->Flash->error(__('The game could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }*/



    public function game(){
        $idPerguntas = $this->request->session()->read('idPerguntas');
        $posicao = $this->request->session()->read('posicao');

        if ($posicao === null){
            return $this->redirect(['controller' => 'users', 'action' => 'home']);
        }

        if (count($idPerguntas) <= $posicao && $posicao != null){
            $pontos = $this->request->session()->read('pontos');
            $users = new UsersController();
            return $users->atualizaPontuacao($pontos+500, "finalizou");
        }

        $questions = new QuestionsController();
        $question = $questions->getQuestion($idPerguntas[$posicao]);
        $this->set(compact('question'));
        $this->set('_serialize', ['question']);
    }

    public function verificaresposta($questionID, $choice){
        $questions = new QuestionsController();
        $question = $questions->getQuestion($questionID);

        if ($question->correct === $choice){
            $pontosAtuais = $this->request->session()->read('pontos');
            $posicaoAtual = $this->request->session()->read('posicao');

            $pontos = 10;
            if ($posicaoAtual > 10){
                $pontos = 50;
            }
            else if ($posicaoAtual > 20){
                $pontos = 100;
            }

            $this->request->session()->write('pontos', $pontosAtuais + $pontos);
            $this->request->session()->write('posicao', $posicaoAtual + 1);
            $this->Flash->success(__('Certa Resposta'));

            return $this->redirect(['action' => 'game']);
        }
        else{
            $pontos = $this->request->session()->read('pontos');
            $pontos = $pontos / 2;
            $users = new UsersController();
            return $users->atualizaPontuacao($pontos, "errou");
        }
    }

    public function parar(){
        $pontosAtuais = $this->request->session()->read('pontos');
        $pontos = (int)($pontosAtuais * 0.75);

        $users = new UsersController();
        return $users->atualizaPontuacao($pontos, "parou");
    }
}
