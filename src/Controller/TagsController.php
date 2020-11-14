<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Tags Controller
 *
 * @property \App\Model\Table\TagsTable $Tags
 * @method \App\Model\Entity\Tag[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TagsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index() {
        $tags = $this->Tags->find();

        $this->set(compact('tags'));
        $this->viewBuilder()->setOption('serialize', true);
    }

    /**
     * View method
     *
     * @param string|null $id Tag id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $tag = $this->Tags->get($id);

        $this->set(compact('tag'));
        $this->viewBuilder()->setOption('serialize', true);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $this->request->allowMethod('POST');
        $tag = $this->Tags->newEntity($this->request->getData());
        $state = $this->Tags->States->get(1);
        $tag->state = $state;

        if ($this->Tags->save($tag)) {
            $message = 'El tag fue registrado correctamente';
        } else {
            $message = 'El tag no fue registrado correctamente';
            $errors = $tag->getErrors();
        }
        $this->set(compact('tag', 'message', 'errors'));
        $this->viewBuilder()->setOption('serialize', true);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tag id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $this->request->allowMethod('PUT');
        $tag = $this->Tags->patchEntity($this->Tags->get($id), $this->request->getData());
        
        if ($this->Tags->save($tag)) {
            $message = 'El tag fue modificado correctamente';
        } else {
            $message = 'El tag no fue modificado correctamente';
            $errors = $tag->getErrors();
        }
        $this->set(compact('tag', 'message', 'errors'));
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
        $tag = $this->Tags->get($id);
        $state = $this->Tags->States->get(1);
        $tag->state = $state;
        
        if ($this->Tags->save($tag)) {
            $message = 'El tag fue habilitado correctamente';
        } else {
            $message = 'El tag no fue habilitado correctamente';
            $errors = $tag->getErrors();
        }
        $this->set(compact('tag', 'message', 'errors'));
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
        $tag = $this->Tags->get($id);
        $state = $this->Tags->States->get(2);
        $tag->state = $state;
        
        if ($this->Tags->save($tag)) {
            $message = 'El tag fue deshabilitado correctamente';
        } else {
            $message = 'El tag no fue deshabilitado correctamente';
            $errors = $tag->getErrors();
        }
        $this->set(compact('tag', 'message', 'errors'));
        $this->viewBuilder()->setOption('serialize', true);
    }
}
