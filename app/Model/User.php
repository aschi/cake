<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Group $Group
 */
class User extends AppModel {
	public $actsAs = array('Acl' => array('type' => 'requester'));

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'username';

	public function parentNode() {
		if (!$this -> id && empty($this -> data)) {
			return null;
		}
		if (isset($this -> data['User']['group_id'])) {
			$groupId = $this -> data['User']['group_id'];
		} else {
			$groupId = $this -> field('group_id');
		}
		if (!$groupId) {
			return null;
		} else {
			return array('Group' => array('id' => $groupId));
		}
	}

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array('username' => array('notempty' => array('rule' => array('notempty'),
	//'message' => 'Your custom message here',
	//'allowEmpty' => false,
	//'required' => false,
	//'last' => false, // Stop validation after this rule
	//'on' => 'create', // Limit validation to 'create' or 'update' operations
	), ), 'password' => array('notempty' => array('rule' => array('notempty'),
	//'message' => 'Your custom message here',
	//'allowEmpty' => false,
	//'required' => false,
	//'last' => false, // Stop validation after this rule
	//'on' => 'create', // Limit validation to 'create' or 'update' operations
	), ), 'group_id' => array('numeric' => array('rule' => array('numeric'),
	//'message' => 'Your custom message here',
	//'allowEmpty' => false,
	//'required' => false,
	//'last' => false, // Stop validation after this rule
	//'on' => 'create', // Limit validation to 'create' or 'update' operations
	), ), );

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	public function beforeSave($options = array()) {
		$this -> data['User']['password'] = AuthComponent::password($this -> data['User']['password']);
		return true;
	}
	
	public function bindNode($user) {
    	return array('model' => 'Group', 'foreign_key' => $user['User']['group_id']);
	}
	

	/**
	 * belongsTo associations
	 *
	 * @var array
	 */
	public $belongsTo = array('Group');
	
	public $hasOne = array('Player');
}
