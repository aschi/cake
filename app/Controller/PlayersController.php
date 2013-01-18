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
		$player = $this->paginate();
				
		if ($this->request->is('requested')) {
            return $player;
        } else {
           	$this->set('player', $player);
        }
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
			if((!array_key_exists('player_position_id', $this->request->data['Player']) || $this->request->data['Player']['player_position_id'] == '0' || $this->request->data['Player']['player_position_id'] == '')
			 && $this->request->data['Player']['new_player_position'] != ""){
				$this->request->data['Player']['player_position_id'] = $this->PlayerPosition->savePosition($this->request->data['Player']['new_player_position'], $user['id']);
			 }
			
			//player club
			if((!array_key_exists('player_club_id', $this->request->data['Player']) || $this->request->data['Player']['player_club_id'] == '0' || $this->request->data['Player']['player_club_id'] == '')
			&& $this->request->data['Player']['new_player_club'] != ""){
				$this->request->data['Player']['player_club_id'] = $this->PlayerClub->saveClub($this->request->data['Player']['new_player_club'], $user['id']);
			}
			
			
			if ($this->Player->save($this->request->data)) {
				$this->Session->setFlash(__('Das Spielerprofil wurde erfolgreich gespeichert. Club ID: '.$this->PlayerClub->id));
				$this->redirect(array('controller' => 'users', 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('Das Profil konnte nicht gepseichert werden, bitte versuchen Sie es erneut.'));
			}
			
			
		}

		$playerPositions = $this->Player->PlayerPosition->find('list');
		$this->set(compact('playerPositions'));
		
		$playerClubs = $this->Player->PlayerClub->find('list');
		$this->set(compact('playerClubs'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function intern_edit() {
		$this->layout = 'intern'; 
		
		$user = $this -> Session -> read('Auth.User');
		
		$p = $this->Player->find('first', array(
		    'conditions' => array('Player.user_id' => $user['id']), //array of conditions
		));
		
		if(empty($p)){
			$this->redirect(array('intern'=>true,'controller'=>'players', 'action'=>'add'));
		}
		
		$this->Player->id = $p['Player']['id'];
		
		if (!$this->Player->exists()) {
			throw new NotFoundException(__('Invalid player'));
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
			//player position
			if((!array_key_exists('player_position_id', $this->request->data['Player']) || $this->request->data['Player']['player_position_id'] == '0' || $this->request->data['Player']['player_position_id'] == '')
			 && $this->request->data['Player']['new_player_position'] != ""){
				$this->request->data['Player']['player_position_id'] = $this->PlayerPosition->savePosition($this->request->data['Player']['new_player_position'], $user['id']);
			 }
			
			//player club
			if((!array_key_exists('player_club_id', $this->request->data['Player']) || $this->request->data['Player']['player_club_id'] == '0' || $this->request->data['Player']['player_club_id'] == '')
			&& $this->request->data['Player']['new_player_club'] != ""){
				$this->request->data['Player']['player_club_id'] = $this->PlayerClub->saveClub($this->request->data['Player']['new_player_club'], $user['id']);
			}
			
			if ($this->Player->save($this->request->data)) {
				$this->Session->setFlash(__('Das Spielerprofil wurde gespeichert'));
				$this->redirect(array('controller' => 'users', 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('Das Spielerprofil konnte nicht gespeichert werden, bitte versuchen Sie es erneut.'));
			}
		} else {
			$this->request->data = $this->Player->read(null, $p['Player']['id']);
		}
		
		$playerPositions = $this->Player->PlayerPosition->find('list');
		$this->set(compact('playerPositions'));
		
		$playerClubs = $this->Player->PlayerClub->find('list');
		$this->set(compact('playerClubs'));
	}

	/**
 * add method
 *
 * @return void
 */
	public function intern_add() {
		$this->layout = 'intern'; 
		if ($this->request->is('post')) {
			$this->Player->create();

			$this->loadModel('PlayerClub');
			$this->loadModel('PlayerPosition');
			
			$user = $this -> Session -> read('Auth.User');

			//userid
			$this->Player->set('user_id', $user['id']);

			//player position
			if((!array_key_exists('player_position_id', $this->request->data['Player']) || $this->request->data['Player']['player_position_id'] == '0' || $this->request->data['Player']['player_position_id'] == '')
			 && $this->request->data['Player']['new_player_position'] != ""){
				$this->request->data['Player']['player_position_id'] = $this->PlayerPosition->savePosition($this->request->data['Player']['new_player_position'], $user['id']);
			 }
			
			//player club
			if((!array_key_exists('player_club_id', $this->request->data['Player']) || $this->request->data['Player']['player_club_id'] == '0' || $this->request->data['Player']['player_club_id'] == '')
			&& $this->request->data['Player']['new_player_club'] != ""){
				$this->request->data['Player']['player_club_id'] = $this->PlayerClub->saveClub($this->request->data['Player']['new_player_club'], $user['id']);
			}
			
			
			if ($this->Player->save($this->request->data)) {
				$this->Session->setFlash(__('Das Spielerprofil wurde erfolgreich gespeichert. Club ID: '.$this->PlayerClub->id));
				$this->redirect(array('controller' => 'players', 'action' => 'edit'));
			} else {
				$this->Session->setFlash(__('Das Profil konnte nicht gepseichert werden, bitte versuchen Sie es erneut.'));
			}
			
			
		}
		
		$playerPositions = $this->Player->PlayerPosition->find('list');
		$this->set(compact('playerPositions'));
		
		$playerClubs = $this->Player->PlayerClub->find('list');
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
			if((!array_key_exists('player_position_id', $this->request->data['Player']) || $this->request->data['Player']['player_position_id'] == '0' || $this->request->data['Player']['player_position_id'] == '')
			 && $this->request->data['Player']['new_player_position'] != ""){
				$this->request->data['Player']['player_position_id'] = $this->PlayerPosition->savePosition($this->request->data['Player']['new_player_position'], $user['id']);
			 }
			
			//player club
			if((!array_key_exists('player_club_id', $this->request->data['Player']) || $this->request->data['Player']['player_club_id'] == '0' || $this->request->data['Player']['player_club_id'] == '')
			&& $this->request->data['Player']['new_player_club'] != ""){
				$this->request->data['Player']['player_club_id'] = $this->PlayerClub->saveClub($this->request->data['Player']['new_player_club'], $user['id']);
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


	 
}



