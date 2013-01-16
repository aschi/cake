<?php
App::uses('AppModel', 'Model');
/**
 * PlayerClub Model
 *
 * @property User $User
 * @property Player $Player
 */
class PlayerClub extends AppModel {

	 public function saveClub($club, $userid){
		$this->create();
					
		$playerClubData = array(
			    'PlayerClub' => array(
		        'user_id' => $userid,
		        'clubname' => $club
		  )
		);
					
		$this->save($playerClubData);
		
		return $this->id;
	 }


/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'clubname';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'clubname' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
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
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Player' => array(
			'className' => 'Player',
			'foreignKey' => 'player_club_id',
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
