<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>  
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        VIEWS
    </title>
    <?php
    echo $this->Html->meta('icon');
    echo $this->Html->css('portal_style');
    echo $this->Html->css('body_style');
    echo $this->Html->css('report_style');
    // echo $this->Html->css('search_style');
    echo $this->Html->script('jquery/jquery-latest.min.js');
    echo $this->Html->script('jquery/right-menu.js');
    ?>
</head>

<body> 
    
<div id="page_wrapper">
    
    <?php echo $this->element('Vmreports/header'); ?>
    
    <?php echo $this->Session->flash(); ?>

    <!--start body-->
    <?php echo $this->element('Vmreports/leftsidebar'); ?>
    <?php echo $this->fetch('content'); ?>
    <?php echo $this->element('Vmreports/rightsidebar'); ?>
    <!--end body-->
    <?php //debug($this->request->params['action']); ?>
    <?php // if(!in_array($this->request->params['action'], array("storagebilling", "sanstorage") ) ){ ?>
        <?php echo $this->element('Vmreports/footer'); ?>
    <?php // } ?>
</div>


<?php //include("body.php"); ?>

<?php //include("popular.php"); ?>

<?php echo $this->element('sql_dump'); ?>
</body>
</html>