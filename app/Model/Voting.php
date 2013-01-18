<?php
App::uses('AppModel', 'Model');
/**
 * Voting Model
 *
 * @property User $User
 * @property Case $Case
 * @property Vote $Vote
 * @property VotesAvailable $VotesAvailable
 */
class Voting extends AppModel {
	
	public function initializeVoting(){
		App::import('Model', 'User');
		App::import('Model', 'VotesAvailable');
       	$user = new User();
       	$userList = $user->find('all');
		
		$votesAvailable = new VotesAvailable();
		
		
		foreach($userList as $usr){
			$votesAvailable->addVotesAvailable($usr['User']['id'], $this->id, 3);
		}
	}
	
	public function vote($userid, $votingid, $issueid){
		App::import('Model', 'Vote');
		App::import('Model', 'VotesAvailable');
		
		$vote = new Vote();
		$votesAvailable = new VotesAvailable();
		
		
		if($votesAvailable->areVotesAvailable($userid, $votingid)){
			$vote->create();
			
			$vData = array(
			    'Vote' => array(
		        'user_id' => $userid,
		        'voting_id' => $votingid,
		        'issue_id' => $issueid
		      	)
			);
			
			if($vote->save($vData)){
				$va = $votesAvailable->getVotesAvailable($userid, $votingid);
				$votesAvailable->decrementVotesAvailable($va['VotesAvailable']['id']);
			}else{
				return false;
			}
		}else{
			return false;
		}
		
		return true;
	}

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'voting_start' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'voting_end' => array(
			'date' => array(
				'rule' => array('date'),
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
		)
	);


/**
 * hasAndBelongsToMany associations
 * 
 * @var array
 */
 	public $hasAndBelongsToMany = array(
 		'Issue' => array(
			'className' => 'Issue',
			'foreignKey' => 'voting_id',
			'conditions' => '',
			'joinTable' => 'issues_votings',
			'associationForeignKey' => 'issue_id',
			'fields' => '',
			'order' => 'Issue.title'
		)
	);
 
/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Vote' => array(
			'className' => 'Vote',
			'foreignKey' => 'voting_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'VotesAvailable' => array(
			'className' => 'VotesAvailable',
			'foreignKey' => 'voting_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
