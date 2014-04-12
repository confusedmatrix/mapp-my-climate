<?php

namespace Frontend\Controller;

use Blueprint\Controller\Controller;
use Frontend\Model;
use Frontend\View;

/**
 * Pages class.
 * 
 * @extends Controller
 */
class Pages extends Controller {

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
     * weatherDataAction function.
     * 
     * @access public
     * @return void
     */
    public function weatherDataAction() {
        
        $vars['content'] = 'Weather data';
        echo $this->view->render("page.php", $vars);
    
    }

    /**
     * climateChangeAction function.
     * 
     * @access public
     * @return void
     */
    public function climateChangeAction() {
        
        $vars['content'] = 'Climate change';
        echo $this->view->render("page.php", $vars);
    
    }

    /**
     * climateEventsAction function.
     * 
     * @access public
     * @return void
     */
    public function climateEventsAction() {
        
        $vars['content'] = 'Climate events';
        echo $this->view->render("page.php", $vars);
    
    }

    /**
     * aboutAction function.
     * 
     * @access public
     * @return void
     */
    public function aboutAction() {
        
        $vars['content'] = 'About Mapp My Climate';
        echo $this->view->render("about.php", $vars);
    
    }

}