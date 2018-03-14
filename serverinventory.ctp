<?php

// Also used for the action storagebilling

?>

<div class="content-center-div">

<?php if(0){ ?>    
<div class="search-fields-div-double">
        <?php echo $this->Form->create("Reports", array("method" => "POST", "action" => "/$fromTable/". $this->request->params['action'] ."/cbd") ); ?>
        <div class="search-fields-div-single-label-short">Asset Search :</div>
        <div class="clear"></div>
        <div class="search-fields-div-double-textbox"><?php echo $this->Form->input('cbdsearch', array("label" => false)); ?></div>
        
        <?php echo $this->Form->end() ; ?>
        <div class="clear"></div>
        <div class="bulksearch-link-double"><a href="/reports/<?php echo $fromTable; ?>/<?php echo $this->request->params['action'];?>/bulkcbd" class="bulksearch-link">Bulk Assets Search</a></div>
</div>
<?php } ?>     
      
   
<div class="search-fields-div-double">
        <?php echo $this->Form->create("Reports", array("method" => "POST", "action" => "/$fromTable/". $this->request->params['action'] ."/ipsearch") ); ?>
        <div class="search-fields-div-single-label-short">IP Address Search :</div>
        <div class="clear"></div>
        <div class="search-fields-div-double-textbox"><?php echo $this->Form->input('ipsearch', array("label" => false)); ?></div>
        
        <?php echo $this->Form->end() ; ?>
        <div class="clear"></div>
        <div class="bulksearch-link-double"><a href="/reports/<?php echo $fromTable; ?>/<?php echo $this->request->params['action'];?>/bulkipsearch" class="bulksearch-link">Bulk IP Address Search</a></div>
</div>
<?php if(isset($this->request->params['pass'][0]) && !in_array($this->request->params['pass'][0], array("nasusers", "nasgroups") )) { ?> 
<div class="search-fields-div-double">
        <?php echo $this->Form->create("Reports", array("method" => "POST", "action" => "/$fromTable/". $this->request->params['action'] ."/host") ); ?> 
        <div class="search-fields-div-single-label-short">Server Search :</div>
        <div class="clear"></div>
        <div class="search-fields-div-double-textbox"><?php echo $this->Form->input('hostsearch', array("label" => false)); ?></div>
        <?php echo $this->Form->end() ; ?>
        <div class="clear"></div>
        <div class="bulksearch-link-double"><a href="/reports/<?php echo $fromTable; ?>/<?php echo $this->request->params['action'];?>/bulkhost" class="bulksearch-link">Bulk Servers Search</a></div>
</div>
<?php } ?>
        
        <?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "nasusers") { ?> 
<div class="search-fields-div-double">
        <?php echo $this->Form->create("Reports", array("method" => "POST", "action" => "/$fromTable/". $this->request->params['action'] ."/lanid") ); ?> 
        <div class="search-fields-div-single-label-short">LAN-ID Search :</div>
        <div class="clear"></div>
        <div class="search-fields-div-double-textbox"><?php echo $this->Form->input('lanidsearch', array("label" => false)); ?></div>
        <?php echo $this->Form->end() ;
        ?>
        <div class="clear"></div>
        <div class="bulksearch-link-double"><a href="/reports/<?php echo $fromTable; ?>/<?php echo $this->request->params['action'];?>/bulklanid" class="bulksearch-link">Bulk LAN-IDs Search</a></div>
</div>
        <?php } ?>
        
    <?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "nasgroups") { ?> 
        <div class="search-fields-div-double">
                <?php echo $this->Form->create("Reports", array("method" => "POST", "action" => "/$fromTable/". $this->request->params['action'] ."/qtree") ); ?> 
                <div class="search-fields-div-single-label-short">Qtree Search :</div>
                <div class="clear"></div>
                <div class="search-fields-div-double-textbox"><?php echo $this->Form->input('qtreesearch', array("label" => false)); 
                echo $this->Form->end() ;
                ?></div>
                <div class="clear"></div>
                <div class="bulksearch-link-double"><a href="/reports/<?php echo $fromTable; ?>/<?php echo $this->request->params['action'];?>/bulkqtree" class="bulksearch-link">Bulk Qtrees Search</a></div>
        </div>
    <?php } ?>
        
	<?php 	
	if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] != "nasusers" && $this->request->params['action'] == 'serverinventory') { ?>
        <div class="search-fields-div-double">
        <?php 
        echo $this->Form->create("Reports", array("method" => "POST", "action" => "/$fromTable/". $this->request->params['action'] ."/app") ); ?>
        <div class="search-fields-div-single-label-short <?php if($this->request->params['action'] != 'serverinventory') {?>red-text<?php } ?>">SYS-ID / App Search :</div>
        <div class="clear"></div> 
        <div class="search-fields-div-double-textbox">
        <?php 
            $options = array("label" => false) ;
            if($this->request->params['action'] != 'serverinventory') {
                $options['value'] = "Coming Soon..";
                $options['disabled'] = true;
            }
            echo $this->Form->input('appsearch', $options); 
            echo $this->Form->end() ;
        ?></div>
        <div class="clear"></div><!-- /reports/<?php echo $fromTable; ?>/<?php echo $this->request->params['action'];?>/bulkapp -->
        <div class="bulksearch-link-double"><a href="#" class="bulksearch-link <?php if($this->request->params['action'] != 'serverinventory') {?> red-text<?php } ?>">Bulk SYS-ID / Apps Search</a></div>
        </div>
    <?php } ?> 
    <?php if(0){ // Hiding the Business Unit search?>
        <div class="search-fields-div-double">
        <?php
        echo $this->Form->create("Reports", array("method" => "POST", "action" => "/$fromTable/". $this->request->params['action'] ."/bu") ); ?>
        <div class="search-fields-div-single-label-short red-text">Business Unit Search :</div>
        <div class="clear"></div>
        <div class="search-fields-div-double-textbox"><?php echo $this->Form->input('busearch', array("label" => false, "disabled" => true, "value" => "Coming Soon..")); 
        echo $this->Form->end() ;
        ?></div>
        <div class="clear"></div>
        <div class="bulksearch-link-double"><a href="/reports/<?php echo $fromTable; ?>/<?php echo $this->request->params['action'];?>/bulkbu" class="bulksearch-link red-text">Bulk Business Units Search</a></div>
        </div>
    <?php } ?>
    	<div class="search-fields-div-double">
        <?php
        echo $this->Form->create("Reports", array("method" => "POST", "action" => "/$fromTable/". $this->request->params['action'] ."/os") ); ?>
        <div class="search-fields-div-single-label-long">Operating System Search :</div>
        <div class="clear"></div>
        <div class="search-fields-div-double-textbox"><?php 
        echo $this->Form->input('ossearch', array("label" => false)); 
        echo $this->Form->end() ;
        ?></div>
        <div class="clear"></div>
        <div class="bulksearch-link-double"><a href="/reports/<?php echo $fromTable; ?>/<?php echo $this->request->params['action'];?>/bulkos" class="bulksearch-link">Bulk Operating System Search</a></div>
        </div>    

		<!-- ## comment started, 02-12-2018-->
		<!--    

   <?php if(isset($this->request->params['pass'][0]) && !in_array($this->request->params['pass'][0], array("nasusers", "nasgroups") ) ) { ?>
        <div class="search-fields-div-double">
        <?php
        echo $this->Form->create("Reports", array("method" => "POST", "action" => "/$fromTable/". $this->request->params['action'] ."/lc") ); ?>
        <div class="search-fields-div-single-label-long">Server Life Cycle Status Search :</div>
        <div class="clear"></div>
        <div class="search-fields-div-double-textbox"><?php 
        echo $this->Form->input('lcsearch', array("label" => false)); 
        echo $this->Form->end() ;
        ?></div>
        <div class="clear"></div>
        <div class="bulksearch-link-double"><a href="/reports/<?php echo $fromTable; ?>/<?php echo $this->request->params['action'];?>/bulklc" class="bulksearch-link">Bulk Servers LCS Search</a></div>
        </div>
    <?php } ?>
    
    <?php if(isset($this->request->params['action']) && !in_array($this->request->params['action'], array("drexercise") ) ) { ?>
    <div class="search-fields-div-double">
        <?php
        echo $this->Form->create("Reports", array("method" => "POST", "action" => "/$fromTable/". $this->request->params['action'] ."/storagearray ") ); ?>
        <div class="search-fields-div-single-label-long">Storage Array Search:</div>
        <div class="clear"></div>
        <div class="search-fields-div-double-textbox"><?php 
        echo $this->Form->input('storagearraysearch', array("label" => false)); 
        echo $this->Form->end() ;
        ?></div>
        <div class="clear"></div>
        <div class="bulksearch-link-double"><a href="/reports/<?php echo $fromTable; ?>/<?php echo $this->request->params['action'];?>/bulkstoragearray" class="bulksearch-link">Bulk Storage Array Search</a></div>
    </div>
    <?php } ?>
	

--> 
<!-- ## comment ended, 02-12-2018-->


<?php if(!$fromSearch){?>
    <?php if($searchName == "cmdbinventory"){ ?> 
        <div class="clear"></div>
        <div class="search-note-text">
            Note: This search will give you exact records(possible multiple entries) from CMDB Inventory database.
        </div>
    <?php } ?>
<br />
<br />
<div class="bulk-results">
<?php if($reportType == "bulkcbd"){
        echo $this->Form->create("Reports", array("method" => "POST", "action" => "/$fromTable/". $this->request->params['action'] ."/bulkcbd") ); ?>
        <div style="float:left;">Bulk CBDs Search :</div>
        <?php 
        echo $this->Form->input('bulkcbdsearch', array("label" => false, "type" => "textarea", "rows" => 20, "cols"=>"75")); 
        echo "<br>";
        echo $this->Form->input('button', array('type'=>'image', "src"=>"/images/btn_submit.png", 'label'=> false));
        echo $this->Form->end() ;
        ?>
<?php } ?>
<?php if($reportType == "ipsearch"){
        echo $this->Form->create("Reports", array("method" => "POST", "action" => "/$fromTable/". $this->request->params['action'] ."/ipsearch") ); ?>
        <div style="float:left;">IP Address Search :</div>
        <?php 
        echo $this->Form->input('ipsearchsearch', array("label" => false, "type" => "textarea", "rows" => 20, "cols"=>"75")); 
        echo "<br>";
        echo $this->Form->input('button', array('type'=>'image', "src"=>"/images/btn_submit.png", 'label'=> false));
        echo $this->Form->end() ;
        ?>
<?php } ?>
<?php if($reportType == "bulkhost"){
        echo $this->Form->create("Reports", array("method" => "POST", "action" => "/$fromTable/". $this->request->params['action'] ."/bulkhost") ); ?>
        <div style="float:left;">Bulk Servers Search :</div>
        <?php
        echo $this->Form->input('bulkhostsearch', array("label" => false, "type" => "textarea", "rows" => 20, "cols"=>"75")); 
        echo "<br/>";
        echo $this->Form->input('button', array('type'=>'image', "src"=>"/images/btn_submit.png", 'label'=> false));
        echo $this->Form->end() ;
        ?>
<?php } ?>
<?php if($reportType == "bulkapp"){
        echo $this->Form->create("Reports", array("method" => "POST", "action" => "/$fromTable/". $this->request->params['action'] ."/bulkapp") ); ?>
        <div style="float:left;">Bulk SYS-ID / Apps Search :</div>
        <?php
        echo $this->Form->input('bulkappsearch', array("label" => false, "type" => "textarea", "rows" => 20, "cols"=>"75")); 
        echo "<br/>";
        echo $this->Form->input('button', array('type'=>'image', "src"=>"/images/btn_submit.png", 'label'=> false));
        echo $this->Form->end() ;
        ?>
<?php } ?>
<?php if($reportType == "bulkbu"){
        echo $this->Form->create("Reports", array("method" => "POST", "action" => "/$fromTable/". $this->request->params['action'] ."/bulkbu") ); ?>
        <div style="float:left;">Bulk Business Units Search :</div>
        <?php
        echo $this->Form->input('bulkbusearch', array("label" => false, "type" => "textarea", "rows" => 20, "cols"=>"75")); 
        echo "<br/>";
        echo $this->Form->input('button', array('type'=>'image', "src"=>"/images/btn_submit.png", 'label'=> false));
        echo $this->Form->end() ;
        ?>
<?php } ?>
<?php if($reportType == "bulklc"){
        echo $this->Form->create("Reports", array("method" => "POST", "action" => "/$fromTable/". $this->request->params['action'] ."/bulklc") ); ?>
        <div style="float:left;">Bulk Servers LCS Search :</div>
        <?php
        echo $this->Form->input('bulklcsearch', array("label" => false, "type" => "textarea", "rows" => 20, "cols"=>"75")); 
        echo "<br/>";
        echo $this->Form->input('button', array('type'=>'image', "src"=>"/images/btn_submit.png", 'label'=> false));
        echo $this->Form->end() ;
        ?>
<?php } ?>
<?php if($reportType == "bulklanid"){
        echo $this->Form->create("Reports", array("method" => "POST", "action" => "/$fromTable/". $this->request->params['action'] ."/bulklanid") ); ?>
        <div style="float:left;">Bulk LAN-IDs Search :</div>
        <?php
        echo $this->Form->input('bulklanidsearch', array("label" => false, "type" => "textarea", "rows" => 20, "cols"=>"75")); 
        echo "<br/>";
        echo $this->Form->input('button', array('type'=>'image', "src"=>"/images/btn_submit.png", 'label'=> false));
        echo $this->Form->end() ;
        ?>
<?php } ?>
<?php if($reportType == "bulkqtree"){
        echo $this->Form->create("Reports", array("method" => "POST", "action" => "/$fromTable/". $this->request->params['action'] ."/bulkqtree") ); ?>
        <div style="float:left;">Bulk Qtrees Search :</div>
        <?php
        echo $this->Form->input('bulkqtreesearch', array("label" => false, "type" => "textarea", "rows" => 20, "cols"=>"75")); 
        echo "<br/>";
        echo $this->Form->input('button', array('type'=>'image', "src"=>"/images/btn_submit.png", 'label'=> false));
        echo $this->Form->end() ;
        ?>
<?php } ?>
<?php if($reportType == "bulkos"){
        echo $this->Form->create("Reports", array("method" => "POST", "action" => "/$fromTable/". $this->request->params['action'] ."/bulkos") ); ?>
        <div style="float:left;">Bulk Operating System Search :</div>
        <?php
        echo $this->Form->input('bulkossearch', array("label" => false, "type" => "textarea", "rows" => 20, "cols"=>"75")); 
        echo "<br/>";
        echo $this->Form->input('button', array('type'=>'image', "src"=>"/images/btn_submit.png", 'label'=> false));
        echo $this->Form->end() ;
        ?>
<?php } ?>
<?php if($reportType == "bulkstoragearray"){
        echo $this->Form->create("Reports", array("method" => "POST", "action" => "/$fromTable/". $this->request->params['action'] ."/bulkstoragearray") ); ?>
        <div style="float:left;">Bulk Storage Array Search :</div>
        <?php
        echo $this->Form->input('bulkstoragearraysearch', array("label" => false, "type" => "textarea", "rows" => 20, "cols"=>"75")); 
        echo "<br/>";
        echo $this->Form->input('button', array('type'=>'image', "src"=>"/images/btn_submit.png", 'label'=> false));
        echo $this->Form->end() ;
        ?>
<?php } ?>
</div>
<?php } ?>

<?php if($fromSearch){ ?>
<div class="nav">
    <ul id="menu">
        <?php $iterator = 1;?>
        <?php foreach($searchTablesArray as $tableName) { ?>
            <li <?php if($iterator == "1"){ echo "class='selected'";} ?>><a id="link-<?php echo $iterator;  ?>" href="#"><?php echo $tableName ?></a></li>
            <?php $iterator++;?>
        <?php } ?>
     </ul>
</div>
<?php } ?>

<div class="main">
<?php $iterator = 1;?>
<?php $hasResults = false;?>
<?php foreach($searchTablesArray as $tableName) { ?>
   
    <?php if(isset($results[$tableName]) && $results[$tableName]){ ?> 
        <?php $hasResults = true;?>
        <div class="results results-<?php echo $iterator; ?>" > 
        <div> 
            <table >
                <tr>
                    <td><?php 
                            echo $this->Form->create("Reports", array("method" => "POST", "action" => "/". $searchTypes[$tableName]. "/". $this->request->params['action'] ."/$reportType", "class" => "reports-form-tag") ); 
                            echo $this->Form->hidden($reportType.'search', array("value" => $searchString)); 
                            echo $this->Form->hidden('export', array("value" => "export")); 
                            echo $this->Form->input('button', array('type'=>'image', "src"=>"/images/Export_Button.png", 'label'=> false));
                            echo $this->Form->end() ;
                        ?>
                    </td>
                <td style="text-align: center;"><h2><?php echo $tableName ?> search results:</h2></td>
                </tr>
            </table>
            
        </div>
        <table class="tbl_border_gry" border="0" width="100%" cellpadding="1" cellspacing="0" align="left" style="border-collapse: collapse;">
            <thead>
            <tr>
            	<?php if(isset($results[$tableName][0]['CmdbAppData'])){ ?>
		            <?php foreach($results[$tableName][0]['CmdbAppData'] as $fieldNames => $values){ ?>
		            	<?php if($fieldNames != 'Server_Name') { ?> 
	                        <th style="background-color: #959595;"><?php echo ($fieldNames); ?></th>
	                    <?php } ?>   
	                <?php } ?>
            	<?php } ?>
                <?php foreach($results[$tableName][0][$tableName] as $fieldNames => $values){ ?> 
                    <?php if($fieldNames == "Location"){ ?>
                        <th style="width:100px;"><?php echo ($fieldNames); ?></th>
                    <?php }else{ ?>
                        <th><?php echo ($fieldNames); ?></th>   
                    <?php } ?>
                <?php } ?>
            </tr>
            </thead>
            <tbody>
            <?php foreach($results[$tableName] as $result){ ?>
                <tr>
                    <?php if(isset($results[$tableName][0]['CmdbAppData'])){ ?>
                    	<?php foreach($result['CmdbAppData'] as $fieldNames => $values){ ?> 
                    		<?php if($fieldNames != 'Server_Name') { ?>
                    		<td><?php echo ($values) ? ($values) : "-N/A-" ; ?></td> 
                    		<?php } ?>  
	                    <?php } ?>
                    <?php } //debug($result);?>
                    <?php foreach($result[$tableName] as $fieldNames => $values){ ?> 
                    	<?php if($fieldNames == 'Server_Name') { ?> 
                    	       <?php $urlString = ""; 
                    	       if(isset($result[$tableName]["Server_LCS"])){
                    	           $urlString = "?server_lcs=" . $result[$tableName]["Server_LCS"];
                    	       }
                               if(isset($result[$tableName]["Operating_System"])){
                                   if($urlString == ""){
                                       $urlString = "?os=".$result[$tableName]["Operating_System"];
                                   }else{
                                       $urlString = $urlString . "&os=".$result[$tableName]["Operating_System"];
                                   }
                               }
                               
                               ?>
                    		<td><?php if(0 && isset($this->request->params['action']) && !in_array($this->request->params['action'], array("drexercise") ) ) { ?>
                    		    <a class="serverdetails" href="/reports/<?php echo ($values); ?>/getserverdetails/<?php echo $urlString ;?>"><?php echo strtoupper($values); ?></a>
                    		    <?php } else {?>
                    		        <?php echo strtoupper($values); ?>
                    		    <?php } ?>
                    		    </td>   
                    	<?php } else { ?> 
                    		<td><?php echo ($values) ? ($values) : "-N/A-" ; ?></td>   
                    	<?php } ?>
                    <?php } ?>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        </div>
    <?php }elseif($fromSearch){ ?>
        <?php echo "<div class='results results-".$iterator."'>No results found from " . $tableName . "</div>";
    } ?>
<?php 
    $iterator++;
} 
?>
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
        checkElement.slideUp('fast');
        
        $('.serverdetails').click(function(e){
            e.preventDefault();
            var urlVal = $(this).attr('href');
            window.open( urlVal,'',"resizable=yes,status=no,menubar=no,addressbar=no,scrollbars=yes,height=300,width=350,left=300,top=200");
        });
        
    });
})( jQuery );;
    
</script>    
<?php } ?>

