<style>
    .rTable {       display: block;     width: 100%; } 
    .rTableHeading, .rTableBody, .rTableFoot, .rTableRow{    clear: both; } 
    .rTableHead, .rTableFoot {    background-color: #DDD;     font-weight: bold;}
    .rTableHead { border: 1px solid #999999;      float: left;    height: 30px;       overflow: hidden; padding: 3px 1.8%; width: 10%; } 
    .rTableCell { border: 1px solid #999999;      float: left;    height: 22px;       overflow: hidden; padding: 3px 1.8%; width: 10%; }
    .rTable:after {visibility: hidden;     display: block;     font-size: 0;       content: " ";       clear: both;    height: 0; }
    .rTableFooter {       display: block;     width: 100%; }
    .rTableFooter:after {visibility: hidden;     display: block;     font-size: 0;       content: " ";       clear: both;    height: 0; }
    .rTableMiddle {       display: block;     width: 100%; }
    .rTableMiddle:after {visibility: hidden;     display: block;     font-size: 0;       content: " ";       clear: both;    height: 0; }
    .firstCol {width:18%;}
    .secondCol {width:9%;}
    .thirdCol {width:8%;}
    .fourthCol {width:9%;}
    .fifthCol {width:10%;}
    .sixthCol {width:9%;}
</style>

<?php 
$storageserviceAry = array( array( "name" => "--Select Storage--", "price_per_gb" => "0", "copies_maintained" => "0"),
                            array( "name" => "User Shares Storage (By Default Replicated)", "price_per_gb" => "0.50", "copies_maintained" => "2"),
                            array( "name" => "Group Shares Storage (By Default Replicated)", "price_per_gb" => "0.50", "copies_maintained" => "2"),
                            array( "name" => "Replicated Transactional - Tier 1", "price_per_gb" => "1.09", "copies_maintained" => "2.5"),
                            array( "name" => "Replicated Transactional - Tier 2", "price_per_gb" => "0.58", "copies_maintained" => "2.5"),
                            array( "name" => "Non-Replicated Transactional - Tier 1", "price_per_gb" => "0.89", "copies_maintained" => "1"),
                            array( "name" => "Non-Replicated Transactional - Tier 2", "price_per_gb" => "0.44", "copies_maintained" => "1"),
                            array( "name" => "Non-Replicated Non-Transactional - Tier 3", "price_per_gb" => "0.22", "copies_maintained" => "1"),
                            array( "name" => "Open Systems Backup", "price_per_gb" => "0.41", "copies_maintained" => "1") );
// debug($storageserviceAry);

$optionsTxt = '<select name="storageService" class="storageService" style="width:100%;">';
foreach($storageserviceAry as $key => $chargesDetails){
    $optionsTxt .= '<option value="'.$key.'">'.$chargesDetails["name"].'</option>';
}
$optionsTxt .= '</select>'; 
?>


<div class="content-center-div" style="text-align: center; float: center;">
    
    <div class="rTable"> 
        <div class="rTableRow"> 
            <div class="rTableHead firstCol"><strong>Storage Service</strong></div> 
            <div class="rTableHead secondCol"><span style="font-weight: bold;">Rate per GB($)</span></div>
            <div class="rTableHead thirdCol"><span style="font-weight: bold;">Total GB Requesting </span></div>
            <div class="rTableHead fourthCol"><span style="font-weight: bold;">No. Of Copies</span></div>
            <div class="rTableHead fifthCol"><span style="font-weight: bold;  word-wrap: break-word;">No. Of Shares/Servers you requesting</span></div>
            <div class="rTableHead sixthCol"><span style="font-weight: bold;">Total Cost</span></div> 
        </div> 
        <div class="rTableRow"> 
            <div class="rTableCell firstCol"><?php echo $optionsTxt;?></div>
            <div class="rTableCell ratePerGB secondCol">0</div>
            <div class="rTableCell thirdCol"><input type"text" name="totalGB" class="totalGB" value="0" style="width:81px;"></div>
            <div class="rTableCell copiesCount fourthCol">0</div>
            <div class="rTableCell fifthCol"><input type"text" name="serversCount" class="serversCount" value="0" style="width:81px;"></div>
            <div class="rTableCell sixthCol subTotalCount">0</div> 
        </div>

    </div>
    <div class="rTableMiddle"> 
        <div class="rTableRow"> 
            <div class="rTableCell firstCol">
                  <input type="button" value="Add" class="plusbtn" />
            </div>
        </div> 
    </div>
    <div class="rTableFooter"> 
        <div class="rTableRow"> 
            <div class="rTableHead firstCol"><strong>Total Monthly Billing Cost</strong></div> 
            <div class="rTableHead secondCol"></div>
            <div class="rTableHead thirdCol"></div>
            <div class="rTableHead fourthCol"></div>
            <div class="rTableHead fifthCol"><span style="font-weight: bold;">Total Cost</span></div>
            <div class="rTableHead grandTotal sixthCol"></div> 
        </div>
    </div>

</div>
        

        <!-- http://jsfiddle.net/uiupdates/k166m6m6/ -->
    <script >
    var appendText = '<div class="rTableRow"><div class="rTableCell firstCol"><?php echo $optionsTxt;?></div><div class="rTableCell ratePerGB secondCol">0</div><div class="rTableCell thirdCol"><input style="width:81px;" type"text" name="totalGB" class="totalGB" value="0"></div><div class="rTableCell copiesCount fourthCol">0</div><div class="rTableCell fifthCol"><input style="width:81px;" type"text" value="0" name="serversCount" class="serversCount"></div><div class="rTableCell subTotalCount sixthCol">0</div></div>' ;
    var priceAry = new Array();
    var copiesAry = new Array();
    <?php 
        foreach($storageserviceAry as $key => $chargesDetails){ ?>
            priceAry[<?php echo $key; ?>] = '<?php echo $chargesDetails['price_per_gb'];?>';
            copiesAry[<?php echo $key; ?>] =  '<?php echo $chargesDetails['copies_maintained']; ?>';      
    <?php  }
    ?>
    
    $(document).ready(function(){
         $('.plusbtn').click(function() {
             if($(".storageService").length < 8) {
                $(".rTable").append(appendText);
             }else{
                 alert("You have reached max rows.");
             }
        });
        $('.minusbtn').click(function() {
            if($(".test tr").length != 2)
                {
                    $(".test tr:last-child").remove();
                } 
           else
                {
                    alert("You cannot delete first row");
                }
        });
        var subTotal = 0 ;
        var totalSum = 0;
        var selectedService = 0;
        $(document).on("change","div .storageService", function(){
            //alert($(this).parent().parent().html());
            $(this).parent().parent().find(".ratePerGB").text(priceAry[$(this).val()] );
            $(this).parent().parent().find(".copiesCount").text(copiesAry[$(this).val()] );
            subTotal = parseFloat(priceAry[$(this).val()]) * parseFloat(copiesAry[$(this).val()]) *  parseFloat($(this).parent().parent().find(".totalGB").val()) * parseFloat($(this).parent().parent().find(".serversCount").val());
            $(this).parent().parent().find(".subTotalCount").text(subTotal);
            totalSum = 0;
            $('.subTotalCount').each(function(){
                totalSum += parseFloat($(this).text());
            })
            $(".grandTotal").text(totalSum);
        });
        
        /*$(document).on("change","div .storageService", function(){
            //alert($(this).parent().parent().html());
            $(this).parent().parent().find(".ratePerGB").text(priceAry[$(this).val()] );
            $(this).parent().parent().find(".copiesCount").text(copiesAry[$(this).val()] );
        });*/
        $(document).on("keyup","div .totalGB", function(){
            selectedService = $(this).parent().parent().find(".storageService").val() ;
            subTotal = parseFloat(priceAry[selectedService]) * parseFloat(copiesAry[selectedService]) *  parseFloat($(this).parent().parent().find(".totalGB").val()) * parseFloat($(this).parent().parent().find(".serversCount").val());
            $(this).parent().parent().find(".subTotalCount").text(subTotal);
            totalSum = 0;
            $('.subTotalCount').each(function(){
                totalSum += parseFloat($(this).text());
            })
            $(".grandTotal").text(totalSum);
        });
        $(document).on("keyup","div .serversCount", function(){
            selectedService = $(this).parent().parent().find(".storageService").val() ;
            subTotal = parseFloat(priceAry[selectedService]) * parseFloat(copiesAry[selectedService]) *  parseFloat($(this).parent().parent().find(".totalGB").val()) * parseFloat($(this).parent().parent().find(".serversCount").val());
            $(this).parent().parent().find(".subTotalCount").text(subTotal);
            totalSum = 0;
            $('.subTotalCount').each(function(){
                totalSum += parseFloat($(this).text());
            })
            $(".grandTotal").text(totalSum);
        });
        
        /* $('.plusbtn').click(function() {
            $(".rTable .rTableRow:last").clone().insertAfter('.rTable .rTableRow:last');
        });*/
   }); // Document Ready End
    </script>