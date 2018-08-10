<script type="text/javascript" src="/colorbox/jquery.colorbox-min.js"></script>
<link rel="stylesheet" type="text/css" href="/colorbox/colorbox.css" />

<div class="content-center-div">
    
    <div class="search-fields-div-double">
        <?php echo $this->Form->create("Reports", array("method" => "POST", "action" => "/$fromTable/". $this->request->params['action'] ."/cbd") ); ?>
        <div class="search-fields-div-single-label-short">CBD Search :</div>
        <div class="clear"></div>
        <div class="search-fields-div-double-textbox"><?php echo $this->Form->input('cbdsearch', array("label" => false)); ?></div>
        
        <?php echo $this->Form->end() ; ?>
        <div class="clear"></div>
        <div class="bulksearch-link-double"><a href="/reports/<?php echo $fromTable; ?>/<?php echo $this->request->params['action'];?>/bulkcbd" class="bulksearch-link">Bulk CBDs Search</a></div>
    </div>
    
    <div class="search-fields-div-double">
        <?php echo $this->Form->create("Reports", array("method" => "POST", "action" => "/$fromTable/". $this->request->params['action'] ."/sharename") ); ?>
        <div class="search-fields-div-single-label-short">Share Name Search :</div>
        <div class="clear"></div>
        <div class="search-fields-div-double-textbox"><?php echo $this->Form->input('sharenamesearch', array("label" => false)); ?></div>
        
        <?php echo $this->Form->end() ; ?>
        <div class="clear"></div>
        <div class="bulksearch-link-double"><a href="/reports/<?php echo $fromTable; ?>/<?php echo $this->request->params['action'];?>/bulksharename" class="bulksearch-link">Bulk Share Name Search</a></div>
    </div>
    
    <div class="search-fields-div-double">
        <?php echo $this->Form->create("Reports", array("method" => "POST", "action" => "/$fromTable/". $this->request->params['action'] ."/ownername") ); ?>
        <div class="search-fields-div-single-label-short">Owner Name Search :</div>
        <div class="clear"></div>
        <div class="search-fields-div-double-textbox"><?php echo $this->Form->input('ownernamesearch', array("label" => false)); ?></div>
        
        <?php echo $this->Form->end() ; ?>
        <div class="clear"></div>
        <div class="bulksearch-link-double"><a href="/reports/<?php echo $fromTable; ?>/<?php echo $this->request->params['action'];?>/bulkownername" class="bulksearch-link">Bulk Owner Name Search</a></div>
    </div>
    
    <div class="search-fields-div-double">
        <?php echo $this->Form->create("Reports", array("method" => "POST", "action" => "/$fromTable/". $this->request->params['action'] ."/reqid") ); ?>
        <div class="search-fields-div-single-label-short">Request IDs Search :</div>
        <div class="clear"></div>
        <div class="search-fields-div-double-textbox"><?php echo $this->Form->input('reqidsearch', array("label" => false)); ?></div>
        
        <?php echo $this->Form->end() ; ?>
        <div class="clear"></div>
        <div class="bulksearch-link-double"><a href="/reports/<?php echo $fromTable; ?>/<?php echo $this->request->params['action'];?>/bulkreqid" class="bulksearch-link">Bulk Request IDs Search</a></div>
    </div>
    
    <div class="search-fields-div-double">
        <?php echo $this->Form->create("Reports", array("method" => "POST", "action" => "/$fromTable/". $this->request->params['action'] ."/vfiler") ); ?>
        <div class="search-fields-div-single-label-short">Vfiler Search :</div>
        <div class="clear"></div>
        <div class="search-fields-div-double-textbox"><?php echo $this->Form->input('vfilersearch', array("label" => false)); ?></div>
        
        <?php echo $this->Form->end() ; ?>
        <div class="clear"></div>
        <div class="bulksearch-link-double"><a href="/reports/<?php echo $fromTable; ?>/<?php echo $this->request->params['action'];?>/bulkvfiler" class="bulksearch-link">Bulk Vfiler Search</a></div>
    </div>
    
    <?php if(!$fromSearch){?>
        
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
        
        <?php if($reportType == "bulksharename"){
            echo $this->Form->create("Reports", array("method" => "POST", "action" => "/$fromTable/". $this->request->params['action'] ."/bulksharename") ); ?>
            <div style="float:left;">Bulk Share Name Search :</div>
            <?php 
            echo $this->Form->input('bulksharenamesearch', array("label" => false, "type" => "textarea", "rows" => 20, "cols"=>"75")); 
            echo "<br>";
            echo $this->Form->input('button', array('type'=>'image', "src"=>"/images/btn_submit.png", 'label'=> false));
            echo $this->Form->end() ;
            ?>
        <?php } ?>
        
        <?php if($reportType == "bulkownername"){
            echo $this->Form->create("Reports", array("method" => "POST", "action" => "/$fromTable/". $this->request->params['action'] ."/bulkownername") ); ?>
            <div style="float:left;">Bulk Owner Name Search :</div>
            <?php 
            echo $this->Form->input('bulkownernamesearch', array("label" => false, "type" => "textarea", "rows" => 20, "cols"=>"75")); 
            echo "<br>";
            echo $this->Form->input('button', array('type'=>'image', "src"=>"/images/btn_submit.png", 'label'=> false));
            echo $this->Form->end() ;
            ?>
        <?php } ?>
        
        <?php if($reportType == "bulkreqid"){
            echo $this->Form->create("Reports", array("method" => "POST", "action" => "/$fromTable/". $this->request->params['action'] ."/bulkreqid") ); ?>
            <div style="float:left;">Bulk Request IDs Search :</div>
            <?php 
            echo $this->Form->input('bulkreqidsearch', array("label" => false, "type" => "textarea", "rows" => 20, "cols"=>"75")); 
            echo "<br>";
            echo $this->Form->input('button', array('type'=>'image', "src"=>"/images/btn_submit.png", 'label'=> false));
            echo $this->Form->end() ;
            ?>
        <?php } ?>
        
        <?php if($reportType == "bulkvfiler"){
            echo $this->Form->create("Reports", array("method" => "POST", "action" => "/$fromTable/". $this->request->params['action'] ."/bulkvfiler") ); ?>
            <div style="float:left;">Bulk Vfiler Search :</div>
            <?php 
            echo $this->Form->input('bulkvfilersearch', array("label" => false, "type" => "textarea", "rows" => 20, "cols"=>"75")); 
            echo "<br>";
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
                    <?php foreach($results[$tableName][0][$tableName] as $fieldNames => $values){ ?>
                            <?php if(!in_array($fieldNames, array('created', 'modified') )) { ?>
                            <th><?php echo ($fieldNames); ?></th>
                            <?php } ?>
                    <?php } ?>
                </tr>
                </thead>
                <tbody>
                <?php 
                $rowid = 0;
                foreach($results[$tableName] as $result){ 
                    $rowid++; 
                    ?>
                    <tr id="<?php echo "rowid". $rowid?>">
                        <?php foreach($result[$tableName] as $fieldNames => $values){
                            ?> 
                            <?php if(in_array($fieldNames, array('Share_Name') )) { ?>
                                <td><a class="serverdetails iframe" href="/reports/editownerdesc/?vfilername=<?php echo urlencode($result[$tableName]['vFilerName']); ?>&sharename=<?php echo urlencode($result[$tableName]['Share_Name']); ?>&rowidstatus=<?php echo $rowid;?>"><?php echo strtoupper($values); ?></a></td>   
                            <?php } elseif(!in_array($fieldNames, array( 'modified', 'Status') )) { ?>
                                <td><?php echo ($values) ? ($values) : "-N/A-" ; ?></td>   
                            <?php } elseif($fieldNames == 'Status' ) { ?>
                                <td class="statuscol"><?php echo ($values) ? ($values) : "-N/A-" ; ?></td>   
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
        $(".iframe").colorbox({
            iframe:true,
            width:"430px",
            height:"450px",
            
            returnFocus: true,
            onClosed:function(){
               // setTimeout(function(){ top.location.reload(); }, 3000);
               
            }
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
        
       /* $('.serverdetails').click(function(e){
            e.preventDefault();
            var urlVal = $(this).attr('href');
            window.open( urlVal,'',"resizable=yes,status=no,menubar=no,addressbar=no,scrollbars=yes,height=450,width=550,left=300,top=200");
        });*/
        
    });
})( jQuery );;
    
</script>    
<?php } ?>