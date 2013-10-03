<?php
class User extends AppModel {
	public $name = 'User';
	public $primaryKey = 'id';
	public $displayField = 'name';


	/**
	* @function name:	public function getUser($id)
	* @description:		This function returns data of a user.
	* @related issues:	QH-1
	* @param:			string $id
	* @return:			array $user
	* @author:			Don Hsieh
	* @since:			10/03/2013
	* @last modified: 	10/03/2013
	* @called by:		
	*/
	public function getCardsByUsername($username) {
		debug($username);
		$user = $this->findByUsername($username);
		debug($user);
		$strCardIds = $user->field('cards');
		debug($strCardIds);
		$cardIds = explode(',', $strCardIds);
		debug($cardIds);
		$objCard = ClassRegistry::init('Card');


		$cards = array();
		foreach ($cardIds as $key => $cardId) {
			$card = $objCard->getCard($cardId);
			debug($card);
			$cards[] = $card;
		}
		debug($cards);
		return $cards;
	}


	/**
	* @function name:	public function getUser($id)
	* @description:		This function returns data of a user.
	* @related issues:	QH-1
	* @param:			string $id
	* @return:			array $user
	* @author:			Don Hsieh
	* @since:			09/28/2013
	* @last modified: 	09/28/2013
	* @called by:		
	*/
	public function getUser($id) {
		$user = null
		return $user;
	}
}
?>