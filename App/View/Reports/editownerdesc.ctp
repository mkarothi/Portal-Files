<html xmlns="http://www.w3.org/1999/xhtml" >
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="/css/report_style.css" />
    </head>
    <body>
    <?php 
    echo $this->Html->script('jquery/jquery-latest.min.js'); 
    echo $this->Html->script('jquery/plugins/jquery.validate.js'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#editOwnerDesc").validate({
                rules : {
                    "data[NasGroupSharesDescData][Owner_Desc]" : {
                        required : true
                    },
                    "data[NasGroupSharesDescData][Billable_CBD]" : {
                        required : true
                    },
                    "data[NasGroupSharesDescData][Email]" : {
                        required : true,
                        email: true
                    }
                }
            });
        });
    </script>    
        
    <?php if($updated){ ?>
    
    <script type="text/javascript" src="/colorbox/jquery.colorbox-min.js"></script>
    <link rel="stylesheet" type="text/css" href="/colorbox/colorbox.css" />
    <script type="text/javascript">
    var updatedcolumn = '';
    <?php foreach($this->data['NasGroupSharesDescData'] as $fieldNames => $values){
        ?> 
        <?php if(in_array($fieldNames, array('Share_Name') )) { ?>
            updatedcolumn += '<td><?php echo strtoupper($values); ?></td>';   
        <?php } elseif(!in_array($fieldNames, array( 'modified', 'Status') )) { ?>
            updatedcolumn += '<td><?php echo ($values) ? ($values) : "-N/A-" ; ?></td>';
        <?php } elseif($fieldNames == 'Status' ) { ?>
            updatedcolumn += '<td class="statuscol"><?php echo ($values) ? ($values) : "-N/A-" ; ?></td>';   
        <?php } ?>
    <?php } ?>
    $( document ).ready(function() {
        function updatestatusrow(){
              window.parent.document.getElementById("rowid<?php echo $rowidstatus;?>").innerHTML = updatedcolumn;
              window.parent.document.getElementById("cboxClose").click();
            //window.parent.$("#rowid<?php //echo $rowidstatus;?> td.statuscol").html();
        }
        setTimeout(function(){ updatestatusrow(); }, 3000);
        
    });
    </script> 
    <?php } ?>
        <?php if($updated){ ?>
            <table <?php if(!$updated){ ?>border="1" <?php }?> cellpadding="2" cellspacing="0" align = "center" style="border-collapse: collapse;" valign="middle" width="100%">
            <tr><td align="center" width="100%"><font style="color:red;">Record Updated Sucessfully !</font></td></tr>
            </table>
        <?php }elseif(isset($nasResults['NasGroupSharesDescData'])){ ?>
            <?php echo $this->Form->create("Reports", array("id" => "editOwnerDesc", "method" => "POST", "action" => "/editownerdesc/?sharename=". urlencode($nasResults['NasGroupSharesDescData']['Share_Name']) ."&vfilername=". urlencode($nasResults['NasGroupSharesDescData']['vFilerName'] ). "&rowidstatus=$rowidstatus" ) ); ?>
            <table <?php if(!$updated){ ?>border="1" <?php }?> cellpadding="2" cellspacing="0" align = "center" style="border-collapse: collapse;" valign="middle" width="100%">
            <?php 
                echo $this->Form->hidden('NasGroupSharesDescData.vFilerName', array("value" => $nasResults['NasGroupSharesDescData']['vFilerName']));
                echo $this->Form->hidden('NasGroupSharesDescData.Share_Name', array("value" => $nasResults['NasGroupSharesDescData']['Share_Name']));
                echo $this->Form->hidden('NasGroupSharesDescData.MountPoint', array("value" => $nasResults['NasGroupSharesDescData']['MountPoint']));
            ?>
            <?php foreach($nasResults['NasGroupSharesDescData'] as $columnName => $value){?>
                <tr>
                    <?php if(!in_array($columnName, array('Status', 'modified'))) { ?>
                        <?php if($columnName == "Owner_Desc"){ ?>
                            <td>Owner Name</td>
                        <?php } else { ?>
                            <td><?php echo $columnName; ?></td>
                        <?php } ?>
                    <?php } ?>
                    <?php if($columnName == "Owner_Desc"){ ?>
                        <td><?php echo $this->Form->input("NasGroupSharesDescData.Owner_Desc", array("label" => false, "minlength" => 4, "maxlength" =>"100", "size"=> "38", "div" =>false, "value" => $nasResults['NasGroupSharesDescData']['Owner_Desc'])); ?> </td>
                    <?php }elseif($columnName == "Billable_CBD"){ ?>
                        <td><?php echo $this->Form->input("NasGroupSharesDescData.Billable_CBD", array("label" => false, "minlength" => 4, "size"=> "38", "maxlength" =>"100", "div" =>false, "value" => $nasResults['NasGroupSharesDescData']['Billable_CBD'])); ?> </td>
                    <?php }elseif($columnName == "REQ_ID"){ ?>
                        <td><?php echo $this->Form->input("NasGroupSharesDescData.REQ_ID", array("label" => false, "size"=> "38", "maxlength" =>"100", "div" =>false, "value" => $nasResults['NasGroupSharesDescData']['REQ_ID'])); ?> </td>
                    <?php }elseif($columnName == "Email"){ ?>
                        <td><?php echo $this->Form->input("NasGroupSharesDescData.Email", array("type" => "email","size"=> "38", "label" => false, "maxlength" =>"100", "div" =>false, "value" => $nasResults['NasGroupSharesDescData']['Email'])); ?> </td>
                    <?php }elseif($columnName == "Comments"){ ?>
                        <td><?php echo $this->Form->input("NasGroupSharesDescData.Comments", array("label" => false, "maxlength" =>"1000", "div" =>false, "value" => $nasResults['NasGroupSharesDescData']['Comments'])); ?> </td>
                    <?php }elseif(in_array($columnName, array('Status'))){ ?>
                        <?php echo $this->Form->hidden('NasGroupSharesDescData.Status', array("value" => 'pending')); ?>
                    <?php }elseif(in_array($columnName, array( 'modified'))){ ?>
                        <?php //  echo $this->Form->hidden('NasGroupSharesDescData.Status', array("value" => $nasResults['NasGroupSharesDescData']['Status'])); ?>
                    <?php }else{ ?>
                        <td><?php echo strtoupper($value);?></td>
                    <?php } ?>
                </tr>
            <?php } ?>
            <tr><td colspan="2" align="center">
            <?php echo $this->Form->submit('Update', array("src"=>"/images/btn_submit.png", 'label'=> false)); ?></td></tr>
            
            </table>
            <?php echo $this->Form->end();?>
        <?php } ?>
    </body>
</html>
