<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

 //public $components = array('DebugKit.Toolbar');


    function __exportasexcel($filename="extraction.xls") {
        ini_set( 'memory_limit',  '2048M' );
        header('Cache-Control: no-store, no-cache, must-revalidate');     // HTTP/1.1
        header('Cache-Control: pre-check=0, post-check=0, max-age=0');    // HTTP/1.1
        header('Content-Transfer-Encoding: binary');
        header("Content-type: application/x-msexcel");                    // This should work for the rest
        header("Content-type: application/vnd.ms-excel; charset=UTF-8");
        //header("Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet; charset=UTF-8");
        header("Content-Disposition: attachment; filename=".$filename);
        header("Pragma: no-cache");
        header("Expires: 0");
       # echo "\xEF\xBB\xBF";
        $this->layout = 'export';
        $this->set('export', 'true');
    }
    
    function exportresults($exportArray, $filename){
        $target_path = WWW_ROOT."tmp".DS.$filename;
        // var_dump($target_path);
        $fp = fopen($target_path, 'w');
        foreach ($exportArray as $fields) {
          fputcsv($fp, $fields);
        }
        fclose($fp);

        $this->__exportasexcel($filename);
        $handle = fopen($target_path, "rb");
        while(!feof($handle)) {
            $buffer = fread($handle, 2048);
            echo $buffer;
        }
        fclose($handle);

        if(file_exists($target_path)){
          unlink($target_path);
        }
    }

}
