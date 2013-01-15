<?php
App::uses('AppController', 'Controller', 'PlayerClub', 'PlayerPosition');
/**
 * Player Controller
 *
 * @property Player $Player
 */
class PlayersController extends AppController {
	public function beforeFilter(){
		$this->Auth->allow('index', 'view');
	}
	


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->layout = 'administration'; 
		$this->Player->recursive = 0;
		$this->set('player', $this->paginate());
	}


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Player->recursive = 0;
		$this->set('player', $this->paginate());
	}
	
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->layout = 'administration'; 
		$this->Player->id = $id;
		if (!$this->Player->exists()) {
			throw new NotFoundException(__('Invalid player'));
		}
		$this->set('player', $this->Player->read(null, $id));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout = 'administration'; 
		$this->Player->id = $id;
		if (!$this->Player->exists()) {
			throw new NotFoundException(__('Invalid player'));
		}
		$this->set('player', $this->Player->read(null, $id));
	}
	
/**
 * add method
 *
 * @return void
 */
	public function admin_add($user_id) {
		$this->layout = 'administration'; 
		if ($this->request->is('post')) {
			$this->Player->create();

			$this->loadModel('PlayerClub');
			$this->loadModel('PlayerPosition');
			
			$user = $this -> Session -> read('Auth.User');

			//userid
			$this->Player->set('user_id', $user_id);

			//player position
			if((!array_key_exists('player_position_id', $this->request->data['Player']) || $this->request->data['Player']['player_position_id'] == '0	')
			 && $this->request->data['Player']['new_player_position'] != ""){
				$this->request->data['Player']['player_position_id'] = savePosition($this->request->data['Player']['new_player_position'], $user['id']);
			}
			
			//player club
			if((!array_key_exists('player_club_id', $this->request->data['Player']) || $this->request->data['Player']['player_club_id'] == '0')
			&& $this->request->data['Player']['new_player_club'] != ""){
				$this->request->data['Player']['player_club_id'] = saveClub($this->request->data['Player']['new_player_club'], $user['id']);
			}
			
			
			if ($this->Player->save($this->request->data)) {
				$this->Session->setFlash(__('Das Spielerprofil wurde erfolgreich gespeichert. Club ID: '.$this->PlayerClub->id));
				$this->redirect(array('controller' => 'users', 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('Das Profil konnte nicht gepseichert werden, bitte versuchen Sie es erneut.'));
			}
			
			
		}

		$empty = array('');
		$playerPositions = $this->Player->PlayerPosition->find('list');
		array_splice($playerPositions, 0, 0, $empty );
		$this->set(compact('playerPositions'));
		
		$playerClubs = $this->Player->PlayerClub->find('list');
		array_splice($playerClubs, 0, 0, $empty );
		$this->set(compact('playerClubs'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->layout = 'administration'; 
		$this->Player->id = $id;
		$user = $this -> Session -> read('Auth.User');
		
		if (!$this->Player->exists()) {
			throw new NotFoundException(__('Invalid player'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			
			
			//player position
			if((!array_key_exists('player_position_id', $this->request->data['Player']) || $this->request->data['Player']['player_position_id'] == '')
			 && $this->request->data['Player']['new_player_position'] != ""){
				$this->request->data['Player']['player_position_id'] = savePosition($this->request->data['Player']['new_player_position'], $user['id']);
			}
			
			//player club
			if((!array_key_exists('player_club_id', $this->request->data['Player']) || $this->request->data['Player']['player_club_id'] == '')
			&& $this->request->data['Player']['new_player_club'] != ""){
				$this->request->data['Player']['player_club_id'] = saveClub($this->request->data['Player']['new_player_club'], $user['id']);
			}
			
			
			
			if ($this->Player->save($this->request->data)) {
				$this->Session->setFlash(__('Das Spielerprofil wurde gespeichert'));
				$this->redirect(array('controller' => 'users', 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('Das Spielerprofil konnte nicht gespeichert werden, bitte versuchen Sie es erneut.'));
			}
		} else {
			$this->request->data = $this->Player->read(null, $id);
		}
		
		$playerPositions = $this->Player->PlayerPosition->find('list');
		$this->set(compact('playerPositions'));
		
		$playerClubs = $this->Player->PlayerClub->find('list');
		$this->set(compact('playerClubs'));
	}

/**
 * delete method
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
		$this->Player->id = $id;
		if (!$this->Player->exists()) {
			throw new NotFoundException(__('Invalid player'));
		}
		if ($this->Player->delete()) {
			$this->Session->setFlash(__('Player deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Player was not deleted'));
		$this->redirect(array('action' => 'index'));
	}


/**
 * save method (private)
 */
	 private function savePosition($position, $userid){
	 	$this->loadModel('PlayerPosition');
		
		$this->PlayerPosition->create();
			
		$playerPositionData = array(
					    'PlayerPosition' => array(
					        'user_id' => $user['id'],
					        'position' => $this->request->data['Player']['new_player_position']
		    			)
		);
				
		$this->PlayerPosition->save($playerPositionData);
		return $this->PlayerPosition->id;
	 }
	 
	 private function saveClub($club, $userid){
	 	$this->loadModel('PlayerClub');
		
		$this->PlayerClub->create();
			
		$playerClubData = array(
			    'PlayerClub' => array(
		        'user_id' => $user['id'],
		        'clubname' => $this->request->data['Player']['new_player_club']
		  )
		);
					
		$this->PlayerClub->save($playerClubData);
		
		return $this->PlayerClub->id;
	 }
}



