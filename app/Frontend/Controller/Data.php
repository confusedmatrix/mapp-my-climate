<?php

namespace Frontend\Controller;

use Blueprint\Controller\Controller;
use Frontend\Model;
use Frontend\View;

/**
 * Data class.
 * 
 * @extends Controller
 */
class Data extends Controller {

    /**
     * __construct function.
     * 
     * @access public
     * @return void
     */
    public function __construct() {
        
        $this->model = new Model\Data();
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
        
        $this->model->setContainer($this->container);
        $this->view->setContainer($this->container);
    
    }

    /**
     * stationsAction function.
     * 
     * @access public
     * @return void
     */
    public function stationsAction() {
        
        header('Content-type: application/json');
        $vars['json'] = $this->model->getStations();
        echo $this->view->render('ajax.php', $vars);
    
    }

    /**
     * stationAction function.
     * 
     * @access public
     * @param integer $id
     * @return void
     */
    public function stationAction($id) {
        
        header('Content-type: application/json');
        $vars['json'] = $this->model->getStation($id);
        echo $this->view->render('ajax.php', $vars);
    
    }

    /**
     * stationDataAction function.
     * 
     * @access public
     * @param integer $id
     * @param string $field
     * @return void
     */
    public function stationDataAction($id, $field=false) {
        
        header('Content-type: application/json');
        $vars['json'] = $this->model->getStationData($id, $field);
        echo $this->view->render('ajax.php', $vars);
    
    }

}