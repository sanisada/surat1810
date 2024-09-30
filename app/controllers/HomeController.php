<?php 

/**
 * Home Page Controller
 * @category  Controller
 */
class HomeController extends SecureController{
	/**
     * Index Action
     * @return View
     */
	function index(){
		$page_title = $this->view->page_title = "Home";
		$this->render_view("home/index.php" , null , "main_layout.php");

	}
}
