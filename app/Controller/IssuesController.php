<?php
App::uses('AppController', 'Controller');
/**
 * Issues Controller
 *
 * @property Issue $Issue
 */
class IssuesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function intern_index() {
		$this->layout = 'intern'; 
		$this->Issue->recursive = 0;
		$this->set('issues', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function intern_view($id = null) {
		$this->layout = 'intern'; 
		$this->Issue->id = $id;
		if (!$this->Issue->exists()) {
			throw new NotFoundException(__('Invalid issue'));
		}
		$this->set('issue', $this->Issue->read(null, $id));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->layout = 'administration'; 
		$this->Issue->recursive = 0;
		$this->set('issues', $this->paginate());
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
		$this->Issue->id = $id;
		if (!$this->Issue->exists()) {
			throw new NotFoundException(__('Invalid issue'));
		}
		$this->set('issue', $this->Issue->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->layout = 'administration'; 
		if ($this->request->is('post')) {
			$this->Issue->create();
			
			$user = $this -> Session -> read('Auth.User');
			$this->Issue->set('user_id', $user['id']);
			
			if ($this->Issue->save($this->request->data)) {
				$this->Session->setFlash(__('The issue has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The issue could not be saved. Please, try again.'));
			}
		}
		$users = $this->Issue->User->find('list');
		$votings = $this->Issue->Voting->find('list');
		$this->set(compact('users', 'votings'));
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
		$this->Issue->id = $id;
		if (!$this->Issue->exists()) {
			throw new NotFoundException(__('Invalid issue'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			$user = $this -> Session -> read('Auth.User');
			$this->Issue->set('user_id', $user['id']);
			
			if ($this->Issue->save($this->request->data)) {
				$this->Session->setFlash(__('The issue has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The issue could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Issue->read(null, $id);
		}
		$users = $this->Issue->User->find('list');
		$votings = $this->Issue->Voting->find('list');
		$this->set(compact('users', 'votings'));
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
		$this->Issue->id = $id;
		if (!$this->Issue->exists()) {
			throw new NotFoundException(__('Invalid issue'));
		}
		if ($this->Issue->delete()) {
			$this->Session->setFlash(__('Issue deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Issue was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
