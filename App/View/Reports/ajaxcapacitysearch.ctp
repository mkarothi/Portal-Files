<select name="data[Reports][<?php echo $resultFor; ?>]" multiple="multiple" id="Reports<?php echo ucfirst($resultFor); ?>" size = "6">
<option value="">--Select--</option>
<?php foreach($results["$searchResult"] as $key => $value){ ?> 
<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
<?php } ?>
</select>