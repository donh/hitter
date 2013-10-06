<?php
App::uses('AppController', 'Controller');

/**
 * Static content controller
 * Override this controller by placing a copy in controllers directory of an application
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class ContentFlowController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Card', 'User');


	/**
	* @function name:	public function add()
	* @description:		This function renders homepage.
	* @related issues:	QH-007
	* @param:			string $rid
	* @param:			string $locale
	* @return:			array $offers
	* @author:			Don Hsieh
	* @since:			10/06/2013
	* @last modified: 	10/06/2013
	* @called by:		front end
	*/
	public function index() {
	}
}
