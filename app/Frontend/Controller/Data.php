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
        
        $vars['json'] = json_encode($this->model->getStations());
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
        
        $vars['json'] = json_encode($this->model->getStation($id));
        echo $this->view->render('ajax.php', $vars);
    
    }

    /**
     * closestStationAction function.
     * 
     * @access public
     * @param float $lat
     * @param float $lng
     * @return void
     */
    public function closestStationAction($lat, $lng) {
        
        $vars['json'] = json_encode($this->model->getClosestStation($lat, $lng));
        echo $this->view->render('ajax.php', $vars);
    
    }

    /**
     * closestStationByPostcodeAction function.
     * 
     * @access public
     * @param float $lat
     * @param float $lng
     * @return void
     */
    public function closestStationByPostcodeAction($postcode) {
        
        $vars['json'] = json_encode($this->model->getClosestStationByPostcode($postcode));
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
        
        $vars['json'] = json_encode($this->model->getStationData($id, $field));
        echo $this->view->render('ajax.php', $vars);
    
    }

}