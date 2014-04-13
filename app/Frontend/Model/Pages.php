<?php

namespace Frontend\Model;

use Blueprint\Model\Model;

/**
 * Index class.
 * 
 * @extends Model
 */
class Pages extends Model {

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
        $this->request = $this->container->get('request');
        $this->session = $this->container->get('session');

        $this->data_model = new Data();
        $this->data_model->setContainer($this->container);

        if ($this->request->post('postcode'))
            $this->page->station = $this->data_model->getPostcodeStation($this->request->post('postcode'));
        elseif ($this->session->exists('closest_station'))
            $this->page->station = $this->data_model->getStation($this->session->get('closest_station'));

    }

}