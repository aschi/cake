<?php
App::uses('AppModel', 'Model');
/**
 * VotesAvailable Model
 *
 * @property User $User
 * @property Voting $Voting
 */
class VotesAvailable extends AppModel {

	public function getVotesAvailable($userid, $votingid){
		$searchConditions = array(
		    'conditions' => array('VotesAvailable.user_id' => $userid, 'VotesAvailable.voting_id' => $votingid) //array of conditions
		);
	
		$va = $this->find('first', $searchConditions);
		
		return $va;
	}
	
	public function areVotesAvailable($userid, $votingid){
		$va = $this->getVotesAvailable($userid, $votingid);
		
		if($va['VotesAvailable']['novotes'] > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function decrementVotesAvailable($id){
		$this->read(null, $id);
		$this->set('novotes', $this->data['VotesAvailable']['novotes']-1);
		$this->save();
	}
	
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'votes_available';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'novotes' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Voting' => array(
			'className' => 'Voting',
			'foreignKey' => 'voting_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
