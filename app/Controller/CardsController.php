<?php
App::uses('AppController', 'Controller');

/**
 * Static content controller
 * Override this controller by placing a copy in controllers directory of an application
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class CardsController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Card');


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
	public function add() {
		//debug($this->request->data);//exit;
		$card = $this->request->data;
		//debug($card);//exit;
		if (is_array($card) && count($card)) {
			$id = $this->Card->creatCard($card);
			//debug($id);
			$this->redirect('/cards/show/'.$id);
			//$this->show($id);
		}
		
		//$this->set(compact('page', 'subpage', 'title_for_layout'));
		/*
		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
		*/
	}



	/**
	* @function name:	public function show()
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
	public function show($id) {
		$card = $this->Card->getCard($id);
		//debug($card);//exit;
		$this->set('card', $card);
	}



/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}
}
