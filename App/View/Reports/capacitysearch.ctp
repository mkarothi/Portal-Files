<script type="text/javascript">
    
    function triggerAjax(selectedStrings, nextSelectBox){
        $.ajax( {
            url : "/reports/"+nextSelectBox+"/ajaxcapacitysearch/",
            type: 'POST',
            data: selectedStrings,
            success : function(response){
                $("#Reports"+nextSelectBox).parent().html(response);
            },
            error : function() {
                console.log('oops something bad happened and ajax call to our servers failed!');
            }
        });
    }   
    $( document ).ready(function() { 
        var selectedStrings = {};
        <?php foreach($searchBoxes as $searchfield){ ?>
        $(document).on("change", "#Reports<?php echo ucfirst($searchfield);?>", function(e){
            selectedStrings['data[Reports][<?php echo $searchfield;?>]'] = [];
            $( "#Reports<?php echo ucfirst($searchfield);?> option:selected" ).each(function() {
                if($( this ).val() != ""){
                  selectedStrings['data[Reports][<?php echo $searchfield;?>]'].push($( this ).val());
                }
            });
        }).trigger( "change" );
        <?php } ?>
        
        <?php for($i=0; $i < 3; $i++){ ?>
        $(document).on("mouseleave", "#Reports<?php echo ucfirst($searchBoxes[$i]);?>", function(e){
            // console.log(selectedStrings['data[Reports][<?php echo $searchBoxes[$i];?>]'].length);
            // if(selectedStrings['data[Reports][<?php echo $searchBoxes[$i];?>]'].length !== 0 ){
                triggerAjax(selectedStrings, "<?php echo ucfirst($searchBoxes[$i+1]);?>");
            // }
        });
        <?php } ?>
    });
    
</script>

<?php 
$hasResults = false;
if(isset($results['StorageCapacityData']) && $results['StorageCapacityData']){ 
    $hasResults = true;
} 
?>

<div class="content-center-div" style="text-align: center; float: center;">
<?php if(!$hasResults){ ?> 
    <?php echo $this->Form->create("Reports", array("method" => "POST", "action" => "/$searchStartFrom/". $this->request->params['action'] ."/1") ); ?>
    <?php foreach($searchTypes as $key => $searchResult) { ?> 
        <div class="search-fields-div-multiple-<?php echo $key;?>">
            <div class="search-fields-div-multiple-label-result"><?php echo $searchFieldNames[$key];?>:</div>
            <div class="clear"></div>
            <div class="search-fields-div-capacity-select"><?php echo $this->Form->select($key, $results["$searchResult"], array("label" => false, "div" => false, 'multiple' => true, "empty" => "--Select--", "size" => 6) ); ?></div>
       </div>
   <?php } ?>
   <div class="search-fields-submit-button">
    <?php 
    echo $this->Form->input('button', array('type'=>'image', "src"=>"/images/submit-button.png", 'label'=> false, "width" => "81px"));
    echo $this->Form->end() ;?>
    </div>
<?php } ?>

<?php if(isset($results['StorageCapacityData']) && $results['StorageCapacityData']){ ?> 
    <?php $hasResults = true;?>
    <div class="results-capacity">
        
    <table >
        <tr>
            <td><?php 
        echo $this->Form->create("Reports", array("method" => "POST", "action" => "/$searchStartFrom/". $this->request->params['action'] ."/1", "class" => "reports-form-tag") );
        foreach($searchTypes as $key => $searchResult) { ?> 
        <?php echo $this->Form->hidden($key, $results["$searchResult"], array("label" => false, "div" => false, 'multiple' => true, "empty" => "--Select--") ); ?>
   <?php } 
        echo $this->Form->hidden('export', array("value" => "export")); 
        echo $this->Form->input('button', array('type'=>'image', "src"=>"/images/Export_Button.png", 'label'=> false));
        echo $this->Form->end() ;
    ?></td>
        <td style="text-align: center;"><h2>Storage Capacity search results:</h2></td>
        </tr>
    </table>
        
    <table class="tbl_border_gry" border="0" width="100%" cellpadding="1" cellspacing="0" align="left">
        <tr>
            <?php foreach($results['StorageCapacityData'][0]['StorageCapacityData'] as $fieldNames => $values){ ?> 
                <?php if($fieldNames == "Location"){ ?>
                    <th style="width:100px;"><?php echo ($fieldNames); ?></th>
                <?php }else{ ?>
                    <th><?php echo ($fieldNames); ?></th>   
                <?php } ?>
            <?php } ?>
        </tr>
        <?php foreach($results['StorageCapacityData'] as $result){ ?>
            <tr>
                <?php foreach($result['StorageCapacityData'] as $values){ ?> 
                <td><?php echo ($values); ?></td>   
                <?php } ?>
            </tr>
        <?php } ?>
    </table>
    </div>
<?php } ?>
</div>