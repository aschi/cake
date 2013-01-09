<?php
App::uses('AppController', 'Controller');
/**
 * Stories Controller
 *
 * @property Story $Story
 */
class StoriesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Story->recursive = 0;
		$this->set('stories', $this->paginate());
	}
	
/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Story->id = $id;
		if (!$this->Story->exists()) {
			throw new NotFoundException(__('Invalid story'));
		}
		$this->set('story', $this->Story->read(null, $id));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->layout = 'administration'; 
		$this->Story->recursive = 0;
		$this->set('stories', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->layout = 'administration'; 
		$this->Story->id = $id;
		if (!$this->Story->exists()) {
			throw new NotFoundException(__('Invalid story'));
		}
		$this->set('story', $this->Story->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->layout = 'administration'; 
		if ($this->request->is('post')) {
			$this->Story->create();
			$user = $this -> Session -> read('Auth.User');
			$this->Story->set('user_id', $user['id']);
			if ($this->Story->save($this->request->data)) {
				$this->Session->setFlash(__('Die Geschichte wurde gespeichert.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Die Geschichte konnte nicht gespeichert werden. Bitte versuchen Sie es erneut.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->layout = 'administration'; 
		$this->Story->id = $id;
		$user = $this -> Session -> read('Auth.User');
		$this->Story->set('user_id', $user['id']);
		if (!$this->Story->exists()) {
			throw new NotFoundException(__('Invalid story'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Story->save($this->request->data)) {
				$this->Session->setFlash(__('Die Geschichte wurde gespeichert.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Die Geschichte konnte nicht gespeichert werden. Bitte versuchen Sie es erneut.'));
			}
		} else {
			$this->request->data = $this->Story->read(null, $id);
		}
	}

/**
 * admin_delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->layout = 'administration'; 
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Story->id = $id;
		if (!$this->Story->exists()) {
			throw new NotFoundException(__('Invalid story'));
		}
		if ($this->Story->delete()) {
			$this->Session->setFlash(__('Story deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Story was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
