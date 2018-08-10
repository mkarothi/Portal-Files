<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php echo $this->Html->charset(); ?>
<title>COVERS</title>
<!--[if IE 6]><link rel="stylesheet" href="css/covers/ie6.css" type="text/css" media="all" /><![endif]-->
<?php
    echo $this->Html->meta('icon');
    echo $this->Html->css('covers/style');
    echo $this->Html->script('jquery/jquery-1.3.2.min.js');
    echo $this->Html->script('jquery/jquery-fns.js');
?>
</head>
<body>
<!-- Shell -->
<div class="shell">
  <!-- Box -->
  <div class="box">
    <div class="top">&nbsp;</div>
    <div class="cnt">
      
      <?php echo $this->element('Covers/header'); ?>
      
      
      <?php echo $this->element('Covers/navigation'); ?>
      
      <?php echo $this->fetch('content'); ?>
      
    </div>
    <div class="bottom">&nbsp;</div>
  </div>
  <!-- END Box -->
  <?php echo $this->element('Covers/footer'); ?>
</div>
<!-- END Shell -->

</html>
