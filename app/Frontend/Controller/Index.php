<?php

namespace Frontend\Controller;

use Blueprint\Controller\Controller;
use Frontend\Model;
use Frontend\View;

/**
 * Index class.
 * 
 * @extends Controller
 */
class Index extends Controller {

    /**
     * __construct function.
     * 
     * @access public
     * @return void
     */
    public function __construct() {
        
        $this->model = new Model\Pages();
        $this->view = new View\Index();
        
    }
    
    /**
     * setContainer function.
     * 
     * @access public
     * @param mixed $container
     * @return void
     */
    public function setContainer($container) {
    
        parent::setContainer($container);
        
        $this->page = $this->container->get('page');
        
        $this->model->setContainer($this->container);
        $this->view->setContainer($this->container);
    
    }

    /**
     * indexAction function.
     * 
     * @access public
     * @return void
     */
    public function indexAction() {
        
        $vars['content'] = 'Home page';
        echo $this->view->render("index.php", $vars);
    
    }

}