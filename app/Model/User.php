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