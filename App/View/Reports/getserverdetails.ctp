<html xmlns="http://www.w3.org/1999/xhtml" >
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="/css/report_style.css" />
    </head>
    <body>
    <style>
    body, html { 
      height: 100%; 
      width:100%;
    }
    
    body { 
      display: table; 
    }
    table { 
      display: table-cell;
      vertical-align: middle;
      height: 80%;
      width: 100%;
    }
    </style>
    <table border="1" cellpadding="2" cellspacing="0" align = "center" style="border-collapse: collapse;" valign="middle">
        <?php if(isset($serverdetails['CmdbAppData'])){ ?>
    	<?php foreach($serverdetails['CmdbAppData'] as $columnName => $value){?>
    		<tr><td><?php echo $columnName;?></td>
    		    <td><?php echo strtoupper($value);?></td></tr>
    	<?php } ?>
    	<?php } else{ ?>
    	    <tr><td>Serve_Name</td>
                <td><?php echo $serverName; ?></td></tr>
                <tr><td>Application_Name</td>
                <td>N/A</td></tr>
                <tr><td>Environment</td>
                <td>N/A</td></tr>
                <tr><td>Application_Tier</td>
                <td>N/A</td></tr>
    	    <!--<tr><td colspan="2">No details available.</td></tr>-->
    	<?php } ?>
    	<?php if(isset($_REQUEST["server_lcs"]) && $_REQUEST["server_lcs"]){?>
    	    <tr><td>Life Cycle Status</td>
                <td><?php echo $_REQUEST["server_lcs"];?></td></tr>
    	<?php } ?>
    	<?php if(isset($_REQUEST["os"]) && $_REQUEST["os"]){?>
            <tr><td>Operating_System</td>
                <td><?php echo $_REQUEST["os"];?></td></tr>
        <?php } ?>
        <?php foreach($serverusagedetails as $serverusagedetail){?>
                <tr><td>Storage_Array_Name</td>
                    <td><?php echo $serverusagedetail['SanStorageBillingData']['Storage_Array_Name'];?></td></tr>
                <tr><td>Allocated GB</td>
                    <td><?php echo $serverusagedetail[0]['Allocated_GB'];?></td></tr>
                <tr><td>Used GB</td>
                    <td><?php echo $serverusagedetail[0]['Used_GB'];?></td></tr>
        <?php } ?>
    </table>
    </body>
</html>
