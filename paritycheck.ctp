<!DOCTYPE html>
<html lang="en">
<head>
  <title>Parity Check</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<div class="container">
	<div class="search-fields-div-single col-md-3">
	    <?php echo $this->Form->create("Reports", array("method" => "POST", "action" => "/paritycheck/") ); ?>
	    <div class="search-fields-div-single-label-short">Server Name:</div>
	    <div class="form-group"><?php echo $this->Form->input('Server_Name', array("label" => false, "div" => false, "class" => "form-control")); ?></div>
	    
	    <?php if(isset($targetServers) && $targetServers ){ 
	    		foreach ($targetServers as $key => $value) { ?>
		    	<div class="checkbox">
				  <label><input type="checkbox" name="data[Reports][target_server][]" value="<?php echo $key ?>"><?php echo $key. " - " . $value;?> </label>
				</div>
			<?php } ?>
	    	
	    	<button type="submit" class="btn btn-default">Compare</button>
	    <?php }else{ ?>
		    <button type="submit" class="btn btn-default">Get Target Servers</button>
	    <?php } ?>
	    <?php echo $this->Form->end() ;?>
	</div>
<div class="clear"></div>

<?php if(isset($mappingServers) && $mappingServers){ ?>
<div class="table-responsive">
  <table class="table table-striped table-bordered">
	<thead class="thead-light">
		<th scope="col">Fields</th>	
		<th scope="col"><?php echo $sourceServerName ;?></th>	
	<?php 
		foreach($selectedServers as $targetServer){ 
		
			if($targetServer != $sourceServerName){ ?>
			<th scope="col"><?php echo $targetServer ;?></th>	
	<?php 	}
		} ?>
	</thead>
	<?php 
	if(isset($mappingServers[$sourceServerName]) && $mappingServers[$sourceServerName]){
		foreach($mappingServers[$sourceServerName] as $fieldName => $fieldValue){
	?>
	<tr>
		<td scope="row"><?php echo $fieldName ;?></td>
		<td><?php echo $fieldValue ;?></td>
		<?php foreach($selectedServers as $targetServer){ 
				if($targetServer != $sourceServerName){ ?>
					<td <?php if($fieldValue == $mappingServers[$targetServer][$fieldName]){ ?>class="bg-success"  <?php }else{  ?>class="bg-danger" <?php } ?> ><?php echo $mappingServers[$targetServer][$fieldName] ;?></td>
		<?php 	} 
			}?>
	</tr>
	<?php 
		}
	}  ?>
  </table>
</div> 
<?php } ?>
</div>
