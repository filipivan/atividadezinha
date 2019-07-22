<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Cache\Cache;
use Cake\View\Helper\SessionHelper;

/**
 * Questioncategories Controller
 *
 * @property \App\Model\Table\QuestioncategoriesTable $Questioncategories
 *
 * @method \App\Model\Entity\Questioncategory[] paginate($object = null, array $settings = [])
 */
class QuestioncategoriesController extends AppController
{
    public function isAuthorized($user){
        if (isset($user['role']) and $user['role'] === 'user'){
            if (in_array($this->request->action, ['selectcategories'])){
                return true;
            }
        }
        return parent::isAuthorized($user);
    }

/*
    public function index()
    {
        $questioncategories = $this->paginate($this->Questioncategories);

        $this->set(compact('questioncategories'));
        $this->set('_serialize', ['questioncategories']);
    }


    public function view($id = null)
    {
        $questioncategory = $this->Questioncategories->get($id, [
            'contain' => ['Questions']
        ]);

        $this->set('questioncategory', $questioncategory);
        $this->set('_serialize', ['questioncategory']);
    }

    public function add()
    {
        $questioncategory = $this->Questioncategories->newEntity();
        if ($this->request->is('post')) {
            $questioncategory = $this->Questioncategories->patchEntity($questioncategory, $this->request->getData());
            if ($this->Questioncategories->save($questioncategory)) {
                $this->Flash->success(__('Categoria Cadastrada Com Sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro Ao Cadastrar A Categoria. Por Favor, Tente Novamente...'));
        }
        $this->set(compact('questioncategory'));
        $this->set('_serialize', ['questioncategory']);
    }


    public function edit($id = null)
    {
        $questioncategory = $this->Questioncategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $questioncategory = $this->Questioncategories->patchEntity($questioncategory, $this->request->getData());
            if ($this->Questioncategories->save($questioncategory)) {
                $this->Flash->success(__('Categoria Editada Com Sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro Ao Editar A Categoria. Por Favor, Tente Novamente...'));
        }
        $this->set(compact('questioncategory'));
        $this->set('_serialize', ['questioncategory']);
    }


    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $questioncategory = $this->Questioncategories->get($id);
        if ($this->Questioncategories->delete($questioncategory)) {
            $this->Flash->success(__('Categoria Excluída Com Sucesso!'));
        } else {
            $this->Flash->error(__('Não Foi Possível Excluir o Registro. Tente Novamente...'));
        }

        return $this->redirect(['action' => 'index']);
    }*/


    /**
     * @return \Cake\Http\Response|null
     */
    public function selectcategories(){
        Cache::disable();
        $this->limpaDados();
        $questioncategories = $this->paginate($this->Questioncategories);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $listaCategorias = $this->request->getData();
            if (count($listaCategorias) == 0){
                $this->Flash->error(__('Selecione Pelo Menos Uma Categoria, Por Favor.'));
            }
            else{
                $this->request->session()->write('listaCategorias',$listaCategorias);
                return $this->redirect(['controller' => 'questions', 'action' => 'getQuestionsID']);
            }
        }

        $this->set(compact('questioncategories'));
        $this->set('_serialize', ['questioncategories']);
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
}
