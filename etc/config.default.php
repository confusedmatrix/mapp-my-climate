<?php

$config = array(

    'base'     => '/',
    'baseurl'  => 'http://www.example.com/',
    'database' => array(
        'host' => 'localhost',
        'name' => 'test',
        'user' => 'root',
        'pass' => ''
    )

);

$config['defaults'] = array(

    'session' => array(
        'expiry'         => 86400,
        'probability'    => 1,
        'divisor'        => 100
    ),
        
    'caching' => array(
        'status' => false,
        'expiry' => 604800
    ),
    
    'page_caching' => array(
        'status' => false,
        'expiry' => 604800
    ),
    
    'fragment_caching' => array(
        'status' => false,
        'expiry' => 604800
    ),
    
    'page' => array(
        'title'               => 'Mapp My Climate',
        'meta-description'    => 'A mobile-friendly web app that displays local UK climate data from 37 long-running weather stations.',
        'h1'                  => 'Mapp My Climate',
        'css'                 => array(
            'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/base/jquery-ui.css',
        ),
        'js'                  => array(
            'https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js',
            'https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js',
        )
    )
    
);

/* 
    Return the $config becuase this file will be loaded as an array
    and used in the config class
*/
return $config;