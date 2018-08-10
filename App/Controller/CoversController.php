<?php
App::uses('AppController', 'Controller');
class CoversController extends AppController {
    
    function beforeFilter() {
        parent::beforeFilter();
        Configure::write('debug', 0);
        $this->layout = "covers";
    }
    
    function index(){
        
    }
    
    function comingsoon(){
        $this->set("referer", $_SERVER["HTTP_REFERER"]);  
    }
}
?>