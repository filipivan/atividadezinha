<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Questions Controller
 *
 * @property \App\Model\Table\QuestionsTable $Questions
 *
 * @method \App\Model\Entity\Question[] paginate($object = null, array $settings = [])
 */
class QuestionsController extends AppController
{
    public function isAuthorized($user){
        if (isset($user['role']) and $user['role'] === 'user'){
            if (in_array($this->request->action, ['getQuestionsID', 'getQuestion'])){
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
    public function index(){
        $this->limpaDados();
        $this->paginate = [
            'contain' => ['Questioncategories']
        ];
        $questions = $this->paginate($this->Questions);

        $this->set(compact('questions'));
        $this->set('_serialize', ['questions']);
    }

    /**
     * View method
     *
     * @param string|null $id Question id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $question = $this->Questions->get($id, [
            'contain' => ['Questioncategories']
        ]);

        $this->set('question', $question);
        $this->set('_serialize', ['question']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add(){
        $this->limpaDados();
        $question = $this->Questions->newEntity();

        if ($this->request->is('post')) {
            $question = $this->Questions->patchEntity($question, $this->request->getData());
            // Verifica Se A resposta correta corresponde a alguma questão
            if ($question->correct == $question->alternative01 ||
                $question->correct == $question->alternative02 ||
                $question->correct == $question->alternative03 ||
                $question->correct == $question->alternative04){
                // Verifica se não tem alternativa iguais
                if ($question->alternative01 != $question->alternative02 &&
                    $question->alternative01 != $question->alternative03 &&
                    $question->alternative01 != $question->alternative04 &&
                    $question->alternative02 != $question->alternative03 &&
                    $question->alternative02 != $question->alternative04 &&
                    $question->alternative03 != $question->alternative04){
                    // SALVA
                    if ($this->Questions->save($question)) {
                        $this->Flash->success(__('Questão Cadastrada Com Sucesso!'));
                        $this->redirect(['action' => 'index']);
                    }
                    $this->Flash->error(__('Erro Ao Cadastrar A Questão. Por Favor, Tente Novamente...'));
                }
                else{
                    $this->Flash->error(__('As Alternativas Devem Sem Diferente'));
                }
            }
            else{
                $this->Flash->error(__('A Resposta Correta Deve Ser Igual A Pelo Menos uma Alternativa'));
            }
        }

        $questioncategories = $this->Questions->Questioncategories->find('list', ['limit' => 200]);
        $this->set(compact('question', 'questioncategories'));
        $this->set('_serialize', ['question']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Question id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null){
        $this->limpaDados();
        $question = $this->Questions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $question = $this->Questions->patchEntity($question, $this->request->getData());
            if ($this->Questions->save($question)) {
                $this->Flash->success(__('Questão Editada Com Sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro Ao Editar A Questão. Por Favor, Tente Novamente...'));
        }
        $questioncategories = $this->Questions->Questioncategories->find('list', ['limit' => 200]);
        $this->set(compact('question', 'questioncategories'));
        $this->set('_serialize', ['question']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Question id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $question = $this->Questions->get($id);
        if ($this->Questions->delete($question)) {
            $this->Flash->success(__('Questão Excluída Com Sucesso!'));
        } else {
            $this->Flash->error(__('Não Foi Possível Excluir o Registro. Tente Novamente...'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function getQuestionsID(){
        $listaCategorias = $this->request->session()->read('listaCategorias');

        $idPerguntas = [];

        foreach ($listaCategorias as $categoria){
            $query = $this->Questions->find('list', [
                'fields' => 'id'
            ])
                ->where(['Questions.questioncategory_id' => $categoria]);
            $data = $query->toArray();
            $idPerguntas = array_merge($idPerguntas, $data);
        }

        shuffle($idPerguntas);

        // Salvando Variaveis de sessão
        $this->request->session()->write('pontos', 0);
        $this->request->session()->write('posicao', 0);
        $this->request->session()->write('idPerguntas',$idPerguntas);

        // Mandando Para a action game
        return $this->redirect(['controller' => 'games', 'action' => 'game']);
    }

    public function getQuestion($id){
        $question = $this->Questions->get($id, [
            'contain' => []
        ]);
        return $question;
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
