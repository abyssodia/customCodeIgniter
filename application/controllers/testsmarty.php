<?php
class Testsmarty extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->smarty->assign("title","Testing Smarty");
        $this->smarty->assign("description",
            "This is the testing page for integrating Smarty and CodeIgniter.");
        $this->smarty->view('index');
    }
}