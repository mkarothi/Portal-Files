<div class="content-center-div">
<!-- --  Array name and DevID - Respective tables except view Storage_By_Server_Stats -->


<?php if($fromSearch){ ?>
<div class="nav">
    <ul id="menu">
        <?php $iterator = 1;?>
        <?php foreach($searchTablesArray as $tableName) { ?>
            <li <?php if($iterator == "1"){ echo "class='selected'";} ?>><a id="link-<?php echo $iterator;  ?>" href="#"><?php echo str_replace("Stat", "", str_replace("Storage", "", $tableName))?></a></li>
            <?php $iterator++;?>
        <?php } ?>
     </ul>
</div>
<?php } ?>

<div class="main">
<?php $iterator = 1;?>
<?php $hasResults = false;?>
<?php 
foreach($searchTablesArray as $tableName) { ?>
   
    <?php if(isset($results[$tableName]) && $results[$tableName]){ ?> 
        <?php $hasResults = true;?>
        <div class="results results-<?php echo $iterator; ?>">
            
        <table >
            <tr>
                <td><?php 
            echo $this->Form->create("Reports", array("method" => "POST", "action" => "/". $searchTypes[$tableName]. "/". $this->request->params['action'] ."/$reportType", "class" => "reports-form-tag") );
            if(in_array($reportType, array("bulkframe"))){
                echo $this->Form->hidden('framename', array("value" => $framename));
                echo $this->Form->hidden('bulkdeviceid', array("value" => $searchString)); 
            }elseif(in_array($reportType, array("frame"))){
                echo $this->Form->hidden('framename', array("value" => $framename));
                echo $this->Form->hidden('deviceid', array("value" => $searchString)); 
            }elseif(in_array($reportType, array("bulktqhost", "tqhost"))){
                echo $this->Form->hidden('tqhost', array("value" => $searchString));
            }elseif(in_array($reportType, array("bulkwwn", "wwn"))){
                echo $this->Form->hidden('wwn', array("value" => $searchString));
            }
            echo $this->Form->hidden('export', array("value" => "export")); 
            echo $this->Form->input('button', array('type'=>'image', "src"=>"/images/Export_Button.png", 'label'=> false));
            echo $this->Form->end() ;
        ?></td>
            <td style="text-align: center;"><h2><?php echo strtoupper($tableName) ?> search results:</h2></td>
            </tr>
        </table>
            
        <table class="tbl_border_gry" border="0" width="100%" cellpadding="1" cellspacing="0" align="left">
            <tr>
                <?php foreach($results[$tableName][0][$tableName] as $fieldNames => $values){ ?> 
                    <?php if($fieldNames == "Location"){ ?>
                        <th style="width:100px;"><?php echo ($fieldNames); ?></th>
                    <?php }elseif(isset($fieldNames[0]) && is_array($fieldNames[0])){ ?>
   							<?php foreach($fieldNames[0] as $innerFieldNames => $innerFieldvalues){  ?>       
	                    	<th><?php echo ($innerFieldNames); ?> </th>
	                    	<?php } ?>
                    <?php }else{ ?>
                        <th><?php echo ($fieldNames); ?></th>   
                    <?php } ?>
                <?php } ?>
                <?php foreach($results[$tableName][0][0] as $fieldNames => $values){ ?> 
				<?php if($fieldNames == "Location"){ ?>
						<th style="width:100px;"><?php echo ($fieldNames); ?> </th>
						<?php }else{ ?>
								<th><?php echo ($fieldNames); ?></th>   
						<?php } ?>
				<?php } ?>
            </tr>
            <?php foreach($results[$tableName] as $result){ ?>
                <tr>
                    <?php foreach($result[$tableName] as $values){ ?>
	                    	<td><?php echo ($values); ?></td>
                    <?php } ?>
                    <?php foreach($result[0] as $values){ ?>
	                    	<td><?php echo ($values); ?></td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </table>
        </div>
    <?php }elseif($fromSearch){ ?>
    <?php echo "<div class='results results-".$iterator."'>No results found from " . $tableName . "</div>";
    } ?>
<?php 
$iterator++;
} ?>
  </div>
</div>
<script>
    $( document ).ready(function() { 
        $('#menu a').click(function(e){
            e.preventDefault();
            $('#menu a').parent().removeClass("selected")
            $(this).parent().addClass("selected")
            var i = $(this).attr("id").split("-")[1];
            $(".results").hide();
            $(".results-"+i).show();
        });
    });
</script> 

<?php if($hasResults){ ?>
<script>
( function( $ ) {
    $( document ).ready(function() { 
        $("#cssmenu > ul > li > a").closest('li').removeClass('active');   
        var checkElement = $("#cssmenu > ul > li > a").next();
        $(this).closest('li').removeClass('active');
        checkElement.slideUp('normal');
    });
})( jQuery );;
    
</script>    
    
<?php } ?>
</div>