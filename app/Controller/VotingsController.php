<?php
App::uses('AppController', 'Controller');
/**
 * Votings Controller
 *
 * @property Voting $Voting
 */
class VotingsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function intern_index() {
		$this->Voting->recursive = 0;
		$this->set('votings', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->loadModel('VotesAvailable');
				
		$this->Voting->id = $id;
		if (!$this->Voting->exists()) {
			throw new NotFoundException(__('Invalid voting'));
		}
		
		$user = $this -> Session -> read('Auth.User');
		$this->set('voting', $this->Voting->read(null, $id));
		$this->set('votesavailable', $this->VotesAvailable->areVotesAvailable($user['id'], $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Voting->create();
			if ($this->Voting->save($this->request->data)) {
				$this->Session->setFlash(__('The voting has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The voting could not be saved. Please, try again.'));
			}
		}
		$users = $this->Voting->User->find('list');
		$issues = $this->Voting->Issue->find('list');
		$this->set(compact('users', 'issues'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Voting->id = $id;
		if (!$this->Voting->exists()) {
			throw new NotFoundException(__('Invalid voting'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Voting->save($this->request->data)) {
				$this->Session->setFlash(__('The voting has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The voting could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Voting->read(null, $id);
		}
		$users = $this->Voting->User->find('list');
		$issues = $this->Voting->Issue->find('list');
		$this->set(compact('users', 'issues'));
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Voting->id = $id;
		if (!$this->Voting->exists()) {
			throw new NotFoundException(__('Invalid voting'));
		}
		if ($this->Voting->delete()) {
			$this->Session->setFlash(__('Voting deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Voting was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Voting->recursive = 0;
		$this->set('votings', $this->paginate());
		
		
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Voting->id = $id;
		if (!$this->Voting->exists()) {
			throw new NotFoundException(__('Invalid voting'));
		}
		$this->set('voting', $this->Voting->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Voting->create();
			
			$user = $this -> Session -> read('Auth.User');
			$this->Voting->set('user_id', $user['id']);
			
			if ($this->Voting->save($this->request->data)) {
				$this->Voting->initializeVoting();
				
				$this->Session->setFlash(__('The voting has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The voting could not be saved. Please, try again.'));
			}
		}
		$users = $this->Voting->User->find('list');
		$issues = $this->Voting->Issue->find('list');
		$this->set(compact('users', 'issues'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Voting->id = $id;
		if (!$this->Voting->exists()) {
			throw new NotFoundException(__('Invalid voting'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Voting->save($this->request->data)) {
				$this->Session->setFlash(__('The voting has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The voting could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Voting->read(null, $id);
		}
		$users = $this->Voting->User->find('list');
		$issues = $this->Voting->Issue->find('list');
		$this->set(compact('users', 'issues'));
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
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Voting->id = $id;
		if (!$this->Voting->exists()) {
			throw new NotFoundException(__('Invalid voting'));
		}
		if ($this->Voting->delete()) {
			$this->Session->setFlash(__('Voting deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Voting was not deleted'));
		$this->redirect(array('action' => 'index'));
	}


	public function vote($id, $issueid){
		debug($id);
		debug($issueid);
		
		$user = $this -> Session -> read('Auth.User');
		//$user['id']
		
		if($this->Voting->vote($user['id'], $id, $issueid)){
			$this->Session->setFlash(__('Stimme erfolgreich erfasst.'));
		}else{
			$this->Session->setFlash(__('Stimme konnte nicht erfasst werden.'));
		}
		
		$this->autoRender = false;
		$this->redirect(array('action' => 'index'));
	}
}
