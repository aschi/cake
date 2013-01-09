<?php
App::uses('AppController', 'Controller');
/**
 * Bookings Controller
 *
 * @property Booking $Booking
 */
class BookingsController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Booking->recursive = 0;
		$this->set('bookings', $this->paginate());
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Booking->recursive = 0;
		$this->set('bookings', $this->Booking->find('all', array('order' => array('Booking.transactiondate'))));
		$this->set('total', $this->Booking->find('all', array('fields' => array('sum(Booking.value) AS total'))));
	}

/**
 * total method
 * @return void
 */
	public function total(){
		$total = $this->Booking->find('all', array('fields' => array('sum(Booking.value) AS total')));
		$this->set('total', $total);
	}
 
 
/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Booking->id = $id;
		if (!$this->Booking->exists()) {
			throw new NotFoundException(__('Invalid Booking'));
		}
		$this->set('booking', $this->Booking->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {

			$this->Booking->create();
			
			$user = $this -> Session -> read('Auth.User');
			$this->Booking->set('user_id', $user['id']);
			if ($this->Booking->save($this->request->data)) {
				$this->Session->setFlash(__('The Booking has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Booking could not be saved. Please, try again.'));
			}
		}
		$users = $this->Booking->User->find('list');
		$this->set(compact('users'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Booking->id = $id;
		if (!$this->Booking->exists()) {
			throw new NotFoundException(__('Invalid Booking'));
		}
		
		$user = $this -> Session -> read('Auth.User');
		$this->Booking->set('user_id', $user['id']);

		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Booking->save($this->request->data)) {
				$this->Session->setFlash(__('The Booking has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Booking could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Booking->read(null, $id);
		}
		$users = $this->Booking->User->find('list');
		$this->set(compact('users'));
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
		$this->Booking->id = $id;
		if (!$this->Booking->exists()) {
			throw new NotFoundException(__('Invalid Booking'));
		}
		if ($this->Booking->delete()) {
			$this->Session->setFlash(__('Booking deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Booking was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
