<?php echo $this->Html->script('/js/jquery/jquery-ui-timepicker-addon.js'); ?>
<div class="content-center-div">
    <div class="search-fields-div-single">
        <?php echo $this->Form->create("Reports", array("method" => "POST", "action" => "/pingnslookup/") ); ?>
            <div class="search-fields-div-single-label-short">Single Host/IP :</div>
            <div class="clear"></div>
            <div class="search-fields-div-double-textbox"><?php echo $this->Form->input('ping', array("label" => false)); ?></div>
        <?php echo $this->Form->end() ; ?>
        <div class="clear"></div>
        <div class="bulksearch-link-double"><a href="/reports/bulkping/pingnslookup/" class="bulksearch-link"> Bulk Hosts/IP NSLookup & Ping Check</a></div>
    </div>
    <div class="search-fields-div-single">
        <?php echo $this->Form->create("Reports", array("method" => "POST", "action" => "/referenceidcheck/pingnslookup/") ); ?>
            <div class="search-fields-div-single-label-short">Has a Request Id ?</div>
            <div class="clear"></div>
            <div class="search-fields-div-double-textbox"><?php echo $this->Form->input('reference_id', array("type"=>"text", "label" => false)); ?></div>
        <?php echo $this->Form->end() ; ?>
        <div class="clear"></div>
        <div class="bulksearch-link-double"><a href="/reports/latestrequests/pingnslookup/" class="bulksearch-link">Get Recent Requests</a></div>
    </div>
    <div class="search-fields-div-single">
        <?php echo $this->Form->create("Reports", array("method" => "POST", "action" => "/daterangerequests/pingnslookup/") ); ?>
            <div class="search-fields-div-single-label-short">Requested On:</div>
            <div class="clear"></div>
            <div class="search-fields-div-double-textbox"><?php echo $this->Form->input('start_date', array("type"=>"text", "label" => false)); ?></div>
            <div class="clear"></div>
            <div style="float:right;">(Ex: YYYY-MM-DD)</div>
        <?php echo $this->Form->end() ; ?>
    </div>
    <div class="clear"></div>
    
    <?php if($message){ ?>
        <div class="ping-response-text"> <?php echo $message;?> </div>
    <?php }//else { echo "tets";}?>
<?php if(!$fromSearch){ //debug($reportType);?>    
    <div class="bulk-results">
    <?php if($pingType == "bulkping"){
        echo $this->Form->create("Reports", array("method" => "POST", "action" => "/bulkping/pingnslookup") ); ?>
        <div style="float:left;">Bulk Hosts/IP DNS Lookup & Ping Check:</div>
        <?php
        echo $this->Form->input('bulkping', array("label" => false, "type" => "textarea", "rows" => 20, "cols"=>"75")); 
        echo "<br/>";
        echo $this->Form->input('button', array('type'=>'image', "src"=>"/images/btn_submit.png", 'label'=> false));
        echo $this->Form->end() ;
        ?>
    <?php } ?>
    </div>
<?php } ?>

<div class="main">
<?php $iterator = 1;?>   
    <?php if(isset($results) && $results){ ?> 
        <?php $hasResults = true;?>
        <div class="results results-<?php echo $iterator; ?>">
        <div> 
            <table >
                <tr>
                    <td><?php 
                echo $this->Form->create("Reports", array("method" => "POST", "action" => "/referenceidcheck/pingnslookup", "class" => "reports-form-tag") ); 
                echo $this->Form->hidden('reference_id', array("value" => $searchString)); 
                echo $this->Form->hidden('export', array("value" => "export")); 
                echo $this->Form->input('button', array('type'=>'image', "src"=>"/images/Export_Button.png", 'label'=> false));
                echo $this->Form->end() ;
            ?></td>
                <td style="text-align: center;"><h2>Search results:</h2></td>
                </tr>
            </table>
            
        </div>
        <table class="tbl_border_gry" border="0" width="100%" cellpadding="1" cellspacing="0" align="left" style="border-collapse: collapse;">
            <tr>
                <?php foreach($results[0]["DnslookupPingStat"] as $fieldNames => $values){ ?> 
                    <?php if($fieldNames == "Location"){ ?>
                        <th style="width:100px;"><?php echo ($fieldNames); ?></th>
                    <?php }else{ ?>
                        <th><?php echo ($fieldNames); ?></th>   
                    <?php } ?>
                <?php } ?>
            </tr>
            <?php foreach($results as $result){ ?>
                <tr>
                    <?php foreach($result["DnslookupPingStat"] as $values){ ?> 
                    <td><?php echo ($values); ?></td>   
                    <?php } ?>
                </tr>
            <?php } ?>
        </table>
        </div>
    <?php }elseif($fromSearch){ ?>
        <div style="clear:both;"></div>
    <?php echo "<div>No results found from DnslookupPingStat</div>";
    } ?>
    </div>
    <div>
       <?php if(isset($recentRequests) && $recentRequests){ ?>
           <table class="tbl_border_gry" border="0" width="140px" cellpadding="1" cellspacing="0" align="left" style="border-collapse: collapse;">
            <tr>
                <?php foreach($recentRequests[0]["DnslookupPingStat"] as $fieldNames => $values){ ?> 
                    <?php if($fieldNames == "Location"){ ?>
                        <th style="width:100px;"><?php echo ($fieldNames); ?></th>
                    <?php }else{ ?>
                        <th><?php echo ($fieldNames); ?></th>   
                    <?php } ?>
                <?php } ?>
            </tr>
            <?php foreach($recentRequests as $result){ ?>
                <tr>
                    <?php foreach($result["DnslookupPingStat"] as $values){ ?> 
                    <td><a href="/reports/referenceidcheck/pingnslookup/<?php echo ($values); ?>"><?php echo ($values); ?></a></td>   
                    <?php } ?>
                </tr>
            <?php } ?>
        </table>
       <?php } ?>
        
    </div>
    
    
</div>



<script>
//We don't want to pre-populate end date in the edit flow. Bug:6498
$('#ReportsStartDate').datetimepicker({
    ampm: true,
    showMinute: false,
    showSecond: false,
    maxDate : new_contest_end_date
});
</script>