<?php

namespace Frontend\Model;

use Blueprint\Model\Model;

/**
 * Data class.
 * 
 * @extends Model
 */
class Data extends Model {

    /**
     * setContainer function.
     * 
     * @access public
     * @param mixed $container
     * @return void
     */
    public function setContainer($container) {
    
        parent::setContainer($container);
        
        $this->cfg = $this->container->get('config');
        $this->request = $this->container->get('request');
        $this->database = $this->container->get('database');
    
    }
    
    /**
     * getRow function.
     * 
     * @access public
     * @param mixed $id
     * @param array $opts (default: array())
     * @return array
     */
    public function getRow($opts=array()) {
    
        $options = array(            
            'select' => array('*')
        );
        
        $options = array_merge($options, $opts);
        $row = $this->database->fetchRow($options);
        
        return $row;
    
    }
    
    /**
     * getRows function.
     * 
     * @access public
     * @param array $opts (default: array())
     * @return array
     */
    public function getRows($opts=array()) {
        
        $options = array(
            'select' => array('*')
        );
        
        $options = array_merge($options, $opts);
        $rows = $this->database->fetchRows($options);
            
        return $rows;
    
    }

    /**
     * countRows function.
     * 
     * @access public
     * @param array $opts (default: array())
     * @return integer
     */
    public function countRows($opts=array()) {
        
        $options = array(
            'select' => array($this->primary_key)                
        );
        
        $options = array_merge($options, $opts);
        $num_rows = $this->database->countRows($options);
            
        return $num_rows;
    
    }

    /**
     * getStations function.
     * 
     * @access public
     * @return array
     */
    public function getStations() {
        
        $options = array(
            'table' => 'stations'
        );
        
        $rows = $this->getRows($options);
            
        return json_encode($rows);
    
    }

    /**
     * getStations function.
     * 
     * @access public
     * @param integer $id
     * @return array
     */
    public function getStation($id) {
        
        $options = array(
            'table' => 'stations',
            'where' => array(
                array(
                    'station_id',
                    '=',
                    $id
                )
            )
        );
        
        $rows = $this->getRows($options);
            
        return json_encode($rows);
    
    }

    /**
     * getStations function.
     * 
     * @access public
     * @param integer $id
     * @param string $field
     * @return array
     */
    public function getStationData($id, $field=false) {
        
        $options = array(
            'table' => 'station_data',
            'where' => array(
                array(
                    'station_data_station_id',
                    '=',
                    $id
                )
            )
        );

        if ($field) {
            
            if (!in_array($field, array('max_temp', 'min_temp', 'air_frost_days', 'rain', 'sun_hours')))
                return '';

            $options['select'] = array(
                'station_data_id',
                'station_data_station_id',
                'station_data_year',
                'station_data_month',
                'station_data_' . $field
            );

        }
        
        $rows = $this->getRows($options);
            
        return json_encode($rows);
    
    }

}