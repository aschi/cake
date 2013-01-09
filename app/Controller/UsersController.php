<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {
	/**
	 * index method
	 *
	 * @return void
	 */
	public function admin_index() {
		$this->layout = 'administration'; 
		$this -> User -> recursive = 1;
		$this -> set('users', $this -> paginate());
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
		$this -> User -> id = $id;
		if (!$this -> User -> exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this -> set('user', $this -> User -> read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function admin_add() {
		$this->layout = 'administration'; 
		if ($this -> request -> is('post')) {
			$this -> User -> create();
			if ($this -> User -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The user has been saved'));
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$groups = $this -> User -> Group -> find('list');
		$this -> set(compact('groups'));
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
		$this -> User -> id = $id;
		if (!$this -> User -> exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> User -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The user has been saved'));
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$this -> request -> data = $this -> User -> read(null, $id);
		}
		$groups = $this -> User -> Group -> find('list');
		$this -> set(compact('groups'));
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
		if (!$this -> request -> is('post')) {
			throw new MethodNotAllowedException();
		}
		$this -> User -> id = $id;
		if (!$this -> User -> exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this -> User -> delete()) {
			$this -> Session -> setFlash(__('User deleted'));
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('User was not deleted'));
		$this -> redirect(array('action' => 'index'));
	}

	public function login() {
		if ($this -> Session -> read('Auth.User')) {
			$this -> Session -> setFlash('You are logged in!');
			$this -> redirect('news/index', null, false);
		} else {
			if ($this -> request -> is('post')) {
				if ($this -> Auth -> login()) {
					$this -> redirect($this -> Auth -> redirect());
				} else {
					$this -> Session -> setFlash('Your username or password was incorrect.');
				}
			}
		}
	}
	


	public function logout() {
		$this -> Session -> setFlash('Bis bald');
		$this -> redirect($this -> Auth -> logout());
	}
	
	public function admin_logout() {
		$this -> Session -> setFlash('Bis bald');
		$this -> redirect($this -> Auth -> logout());
	}

	public function initDB() {
		$group = $this -> User -> Group;
		//Allow admins to everything
		$group -> id = 1;
		$this -> Acl -> allow($group, 'controllers');

		echo "all done";
		exit ;
	}

}
