<?php

namespace Frontend\View;

use Blueprint\View\PageView;

/**
 * Index class.
 * 
 * @extends PageView
 */
class Index extends PageView {

	/**
     * render function.
     *
     * Adds nav to render vars
     * 
     * @access public
     * @param mixed $template
     * @param boolean $vars
     * @return void
     */
    public function render($template, $vars=false) {

        $vars['closest_station'] = $this->pageInfo('station', false);
        
        return parent::render($template, $vars);
    
    }

}