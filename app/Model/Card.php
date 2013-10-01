<?php
class Card extends AppModel {
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
	* @since:			10/01/2013
	* @last modified: 	10/01/2013
	* @called by:		
	*/
	public function getCard($id) {
		$card = null;
		return $card;
	}


	/**
	* @function name:	public function add()
	* @description:		This function renders homepage.
	* @related issues:	QH-1
	* @param:			string $rid
	* @param:			string $locale
	* @return:			array $offers
	* @author:			Don Hsieh
	* @since:			10/01/2013
	* @last modified: 	10/01/2013
	* @called by:		front end
	*/
	public function creatCard($card) {
		$this->create();
		$this->save($card);
		return $this->id;
	}
}
?>