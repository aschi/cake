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
		$this->layout = 'intern'; 
		
		$votings = $this->Voting->find('all', array(
			'conditions' => array('DATE(Voting.voting_start) <=' => date('Y-m-d'), 'DATE(Voting.voting_end) >=' => date('Y-m-d')), //array of conditions
		));
		
		if(count($votings) == 1){
			$this->redirect(array('intern'=>true,'action'=>'view', $votings['0']['Voting']['id']));
		}
		
		$this->Voting->recursive = 0;
		
		$this->paginate = array(
		    'conditions' => array('DATE(Voting.voting_start) <=' => date('Y-m-d'), 'DATE(Voting.voting_end) >=' => date('Y-m-d')), //array of conditions
		);	
		
		
		$this->set('votings', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function intern_view($id = null) {
		$this->layout = 'intern'; 
		
		
		$this->Voting->recursive = 1;
		
		$this->Voting->id = $id;
		if (!$this->Voting->exists()) {
			throw new NotFoundException(__('Invalid voting'));
		}
		
		$user = $this -> Session -> read('Auth.User');
		$va = $this->Voting->VotesAvailable->getVotesAvailable($user['id'], $id);
						
		$this->set('voting', $this->Voting->read(null, $id));
		$this->set('votesavailable', $va['VotesAvailable']['novotes'] > 0 ? true : false);
	}


	public function intern_vote($id, $issueid){
		$this->layout = 'intern'; 
		
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


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->layout = 'administration'; 
		
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
		$this->layout = 'administration'; 
		
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
		$this->layout = 'administration'; 
		
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
		$this->layout = 'administration'; 
		
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
		$this->layout = 'administration'; 
		
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
}
