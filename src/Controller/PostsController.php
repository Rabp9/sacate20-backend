<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Posts Controller
 *
 * @property \App\Model\Table\PostsTable $Posts
 * @method \App\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PostsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index() {
        $posts = $this->Posts->find();

        $this->set(compact('posts'));
        $this->viewBuilder()->setOption('serialize', 'posts');
    }

    /**
     * View method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $post = $this->Posts->get($id);

        $this->set(compact('post'));
        $this->viewBuilder()->setOption('serialize', true);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $this->request->allowMethod('POST');
        $post = $this->Posts->newEntity($this->request->getData());
        $state = $this->Posts->States->get(1);
        $post->state = $state;

        if ($this->Posts->save($post)) {
            $message = 'El post fue registrado correctamente';
        } else {
            $message = 'El post no fue registrado correctamente';
            $errors = $post->getErrors();
        }
        $this->set(compact('post', 'message', 'errors'));
        $this->viewBuilder()->setOption('serialize', true);
    }

    /**
     * Edit method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $this->request->allowMethod('PUT');
        $post = $this->Posts->patchEntity($this->Posts->get($id), $this->request->getData());
        
        if ($this->Posts->save($post)) {
            $message = 'El post fue modificado correctamente';
        } else {
            $message = 'El post no fue modificado correctamente';
            $errors = $post->getErrors();
        }
        $this->set(compact('post', 'message', 'errors'));
        $this->viewBuilder()->setOption('serialize', true);
    }

    /**
     * Enable method
     *
     * @param string|null $id Interseccione id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function enable() {
        $this->request->allowMethod('POST');
        $id = $this->request->getData('id');
        $post = $this->Posts->get($id);
        $state = $this->Posts->States->get(1);
        $post->state = $state;
        
        if ($this->Posts->save($post)) {
            $message = 'El post fue habilitado correctamente';
        } else {
            $message = 'El post no fue habilitado correctamente';
            $errors = $post->getErrors();
        }
        $this->set(compact('post', 'message', 'errors'));
        $this->viewBuilder()->setOption('serialize', true);
    }
    
    /**
     * Disable method
     *
     * @param string|null $id Interseccione id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function disable() {
        $this->request->allowMethod('POST');
        $id = $this->request->getData('id');
        $post = $this->Posts->get($id);
        $state = $this->Posts->States->get(2);
        $post->state = $state;
        
        if ($this->Posts->save($post)) {
            $message = 'El post fue deshabilitado correctamente';
        } else {
            $message = 'El post no fue deshabilitado correctamente';
            $errors = $post->getErrors();
        }
        $this->set(compact('post', 'message', 'errors'));
        $this->viewBuilder()->setOption('serialize', true);
    }
}
