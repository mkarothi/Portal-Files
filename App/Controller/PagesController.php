<?php
App::uses('AppController', 'Controller');
class ReportsController extends AppController {
    
    //var $components = array('PhpExcel');
    // var $helpers = array('phpexcel');
    
    function beforeFilter() {
        parent::beforeFilter();
        Configure::write('debug', 2);
        ini_set('memory_limit', '3092M');
        $this->layout = "report";
    }
    
    function capacity($reportName = "SAN"){
        $this->set("reportName",  $reportName);
    }
    
	function tqhealth($fromTable = "pets", $reportType = false){
		$this->__search($fromTable, $reportType, 'tqhealth'); 
		if(isset($this->data["Reports"]["export"]) && $this->data["Reports"]["export"] == "export"){
            $this->autoRender = FALSE;
        }else{
            $this->render("tqhealth");
        }
	}
		
    function sanstorage($fromTable = "global", $reportType = false){
        $this->__search($fromTable, $reportType, 'sanstorage');
        
        $frameNamesArray = array("000195702009" => "000195702009",
                                    "000195702055" => "000195702055",
                                    "000192600683" => "000192600683",
                                    "000192600700" => "000192600700",
                                    "000192605726" => "000192605726",
                                    "000192605664" => "000192605664",
                                    "000192600709" => "000192600709",
                                    "000192600701" => "000192600701");
        $this->set("frameNamesArray", $frameNamesArray);
        if(isset($this->data["Reports"]["export"]) && $this->data["Reports"]["export"] == "export"){
            $this->autoRender = FALSE;
        }
    }
    
    function nassearch($fromTable = "groupshares", $reportType = 'home'){
        $this->__search($fromTable, $reportType, 'nasgroupshares');
        if(isset($this->data["Reports"]["export"]) && $this->data["Reports"]["export"] == "export"){
            $this->autoRender = FALSE;
        }else{
            $this->render("nassearch");
        }
    }
    
    function storagebilling($fromTable = "global", $reportType = false){
        $this->__search($fromTable, $reportType, 'storagebilling');
        if(isset($this->data["Reports"]["export"]) && $this->data["Reports"]["export"] == "export"){
            $this->autoRender = FALSE;
        }else{
            $this->render("serverinventory");
        }
    }
    
    function serverinventory($fromTable = "global", $reportType = false ){
        $this->__search($fromTable, $reportType, 'serverinventory');
    }
    
    function cmdbinventory($fromTable = "global", $reportType = false ){
        $this->__search($fromTable, $reportType, 'cmdbinventory');
        if(isset($this->data["Reports"]["export"]) && $this->data["Reports"]["export"] == "export"){
            $this->autoRender = FALSE;
        }else{
            $this->render("serverinventory");
        }
    }
    
    function drexercise($fromTable = "global", $reportType = false ){
        $this->__search($fromTable, $reportType, 'drexercise');
        if(isset($this->data["Reports"]["export"]) && $this->data["Reports"]["export"] == "export"){
            $this->autoRender = FALSE;
        }else{
            $this->render("serverinventory");
        }
    }
    
    function __search($fromTable = "global", $reportType = false, $searchName = 'serverinventory') {
        $searchString   = "";
        $results        = array();
        $reportTitle    = "Search reports";
        $searchTablesArray = array();
        $searchTypes = array();
        $frameName  =   "";
        $deviceid   =   "";
        $this->set("framename", $frameName);
        $this->set("deviceid", $deviceid);
        // debug($this->data);
		if ($searchName == 'tqhealth'){
			$searchTablesArray = array("TqHealthcheckData"); 
			$searchTypes = array("TqHealthcheckData" => "tqhealth");
		}elseif($searchName == 'serverinventory'){
            if($fromTable == "global"){
                $searchTablesArray = array("CmdbServerData", "RvtoolsServerData", "HmcScansServerData", 'TadamSysidComponentsData');
            }elseif($fromTable == "CMDB"){
                $searchTablesArray = array("CmdbServerData");
            }elseif($fromTable == "tadam"){
                $searchTablesArray = array("TadamSysidComponentsData");
            }elseif($fromTable == "RVTools"){
                $searchTablesArray = array("RvtoolsServerData");
            }elseif($fromTable == "HMCScans"){
                $searchTablesArray = array("HmcScansServerData");
            }
            $searchTypes = array("CmdbServerData" => "CMDB", 
                                 "RvtoolsServerData" => "RVTools", 
                                 "HmcScansServerData" => "HMCScans",
								 "TadamSysidComponentsData" => "tadam");
        }elseif($searchName == 'storagebilling'){
            if($fromTable == "global"){
                $searchTablesArray = array("SanStorageBillingData", "BackupStorageBillingData", "NasusersStorageBillingData", "NasgroupsStorageBillingData");
            }elseif($fromTable == "sanstorage"){
                $searchTablesArray = array("SanStorageBillingData");
            }elseif($fromTable == "backupstorage"){
                $searchTablesArray = array("BackupStorageBillingData");
            }elseif($fromTable == "nasusers"){
                $searchTablesArray = array("NasusersStorageBillingData");
            }elseif($fromTable == "nasgroups"){
                $searchTablesArray = array("NasgroupsStorageBillingData");
            }
            $searchTypes = array("SanStorageBillingData" => "sanstorage", 
                                 "BackupStorageBillingData" => "backupstorage",
                                 "NasusersStorageBillingData" => "nasusers", 
                                 "NasgroupsStorageBillingData" => "nasgroups");
        }elseif($searchName == 'sanstorage'){
            if($fromTable == "global"){
                $searchTablesArray = array("StorageByServerStat", "StorageframeSymdevNaaStat", "StorageframeSymcfgStat", "StorageframeSymrdfStat", "StorageframeSymcloneStat",
                                           "StorageframeSymbcvStat", "StorageframeIntiatorgroupStat");  
                                           //, "StorageframeWwnStat", "StorageframeStoragegroupsStat" , "StorageframeSymloginStat", "StorageframeInitiatorgroupsStat"
                                           //debug($searchTablesArray);
            }elseif($fromTable == "symdevice"){
                $searchTablesArray = array("StorageframeSymdevNaaStat");
            }elseif($fromTable == "symconfig"){
                $searchTablesArray = array("StorageframeSymcfgStat");
            }elseif($fromTable == "symrdf"){
                $searchTablesArray = array("StorageframeSymrdfStat");
            }elseif($fromTable == "symclone"){
                $searchTablesArray = array("StorageframeSymcloneStat");
            }elseif($fromTable == "symbcv"){
                $searchTablesArray = array("StorageframeSymbcvStat");
            }elseif($fromTable == "symlogin"){
                $searchTablesArray = array("StorageframeSymloginStat");
            }elseif($fromTable == "storagehosts") {
                $searchTablesArray = array("StorageByServerStat");
            }elseif($fromTable == "wwninitiator") {
                $searchTablesArray = array("StorageframeIntiatorgroupStat");
            }elseif($fromTable == "storagegroup"){
                $searchTablesArray = array("StorageframeStoragegroupsStat");
            }
            
            $searchTypes = array("StorageframeSymdevNaaStat" => "symdevice", 
                                 "StorageframeSymcfgStat" => "symconfig", 
                                 "StorageframeSymrdfStat" => "symrdf", 
                                 "StorageframeSymcloneStat" => "symclone",
                                 "StorageframeSymbcvStat" => "symbcv", 
                                 "StorageframeSymloginStat" => "symlogin", 
                                 "StorageframeIntiatorgroupStat" => "wwninitiator", 
                                 "StorageframeStoragegroupsStat" => "storagegroup",
                                 "StorageByServerStat" => "storagehosts");
            if(in_array($reportType, array("storagehost", "bulkstoragehost", "bulkwwn", "wwn") )){
                   $searchTablesArray =  array("StorageByServerStat");
            }
        }else if($searchName == 'cmdbinventory'){
            if($fromTable == "global"){
                $searchTablesArray = array("CmdbInventoryData");
            }elseif($fromTable == "CMDB"){
                $searchTablesArray = array("CmdbInventoryData");
            }
            $searchTypes = array("CmdbInventoryData" => "CMDB");
        }else if($searchName == 'drexercise'){
            if($fromTable == "global"){
                $searchTablesArray = array("ServerDrData");
            }elseif($fromTable == "DR"){
                $searchTablesArray = array("ServerDrData");
            }
            $searchTypes = array("ServerDrData" => "DR");
        }else if($searchName == 'nasgroupshares'){
            if($fromTable == "groupshares"){
                $searchTablesArray = array("NasGroupSharesDescData");
            }
            $searchTypes = array("NasGroupSharesDescData" => "groupshares");
        }
        
        foreach($searchTablesArray as $tableName) {
            
            if(isset($this->data) && !empty($this->data)){
                $this->loadModel($tableName);
                if($reportType == 'tqhost'){
					if((isset($this->data["Reports"]["tqhost"]) && $this->data["Reports"]["tqhost"])){
                        $searchString = $this->data["Reports"]["tqhost"];
                        if($this->$tableName->hasField('Server_Name')){
                            $options = array("conditions" => array($tableName.".Server_Name like " => "$searchString%"));
							$options['fields'] = array('System_id', 'Server_Name', "max(epic_time) as 'epic_time'" , "from_unixtime(epic_time) as 'Date'");
                            if(!isset($this->data["Reports"]["export"])){
                                $options['limit'] = 100;
                            }
							$options['group'] = "Server_Name";
                            $results[$tableName] =  $this->$tableName->find("all", $options);
                        }
                    }
				} elseif($reportType == "bulktqhost"){
                    if((isset($this->data["Reports"]["bulktqhostsearch"]) && $this->data["Reports"]["bulktqhostsearch"])){
                        $searchArray = array();
                        $searchString = trim($this->data["Reports"]["bulktqhostsearch"]);
                        $searchArray = explode("\n", $this->data["Reports"]["bulktqhostsearch"]);
                        foreach($searchArray as $key => $value) {
                            $searchArray[$key] = trim($value);
                            if(!$searchArray[$key]){
                                unset($searchArray[$key]);
                            }
                        }
                        if($this->$tableName->hasField('Server_Name')){
                            $options = array("conditions" => array($tableName.".Server_Name" => $searchArray));
                            if(!isset($this->data["Reports"]["export"])){
                                $options['limit'] = 100;
                            }
							$options['fields'] = array('System_id', 'Server_Name', "max(epic_time) as `epic_time`" , "from_unixtime(epic_time) as `Date`");
							$options['group'] = "Server_Name";
                            $results[$tableName] =  $this->$tableName->find("all", $options);
                        }
                    }
                } elseif($reportType == "cbd"){
                    if((isset($this->data["Reports"]["cbdsearch"]) && $this->data["Reports"]["cbdsearch"])){
                        $searchString = $this->data["Reports"]["cbdsearch"];
                        if($this->$tableName->hasField('Billable_CBD')){
                            $options = array("conditions" => array($tableName.".Billable_CBD like " => "$searchString%"));
                            if(!isset($this->data["Reports"]["export"])){
                                $options['limit'] = 100;
                            }
                            $results[$tableName] =  $this->$tableName->find("all", $options);
                        }
                    }
                } elseif($reportType == "bulkcbd"){
                    if((isset($this->data["Reports"]["bulkcbdsearch"]) && $this->data["Reports"]["bulkcbdsearch"])){
                        $searchArray = array();
                        $searchString = trim($this->data["Reports"]["bulkcbdsearch"]);
                        $searchArray = explode("\n", $this->data["Reports"]["bulkcbdsearch"]);
                        foreach($searchArray as $key => $value) {
                            $searchArray[$key] = trim($value);
                            if(!$searchArray[$key]){
                                unset($searchArray[$key]);
                            }
                        }
                        if($this->$tableName->hasField('Billable_CBD')){
                            $options = array("conditions" => array($tableName.".Billable_CBD" => $searchArray));
                            if(!isset($this->data["Reports"]["export"])){
                                $options['limit'] = 100;
                            }
                            $results[$tableName] =  $this->$tableName->find("all", $options);
                        }
                    }
				} elseif($reportType == "ipsearch"){
                    if((isset($this->data["Reports"]["ipsearch"]) && $this->data["Reports"]["ipsearch"])){
                        $searchString = $this->data["Reports"]["ipsearch"];
                        if($this->$tableName->hasField('IPADDRESS')){
                            $options = array("conditions" => array($tableName.".IPADDRESS like " => "$searchString%"));
                            if(!isset($this->data["Reports"]["export"])){
                                $options['limit'] = 100;
                            }
                            $results[$tableName] =  $this->$tableName->find("all", $options);
                        }
                    }
                } elseif($reportType == "bulkipsearch"){
                    if((isset($this->data["Reports"]["bulkipsearch"]) && $this->data["Reports"]["bulkipsearch"])){
                        $searchArray = array();
                        $searchString = trim($this->data["Reports"]["bulkipsearch"]);
                        $searchArray = explode("\n", $this->data["Reports"]["bulkipsearch"]);
                        foreach($searchArray as $key => $value) {
                            $searchArray[$key] = trim($value);
                            if(!$searchArray[$key]){
                                unset($searchArray[$key]);
                            }
                        }
                        if($this->$tableName->hasField('IPADDRESS')){
                            $options = array("conditions" => array($tableName.".IPADDRESS" => $searchArray));
                            if(!isset($this->data["Reports"]["export"])){
                                $options['limit'] = 100;
                            }
                            $results[$tableName] =  $this->$tableName->find("all", $options);
                        }
                    }
                } elseif($reportType == "host"){
                    if(isset($this->data) && !empty($this->data) || $searchString){
                        if((isset($this->data["Reports"]["hostsearch"]) && $this->data["Reports"]["hostsearch"]) || $searchString){
                            $searchString = $this->data["Reports"]["hostsearch"];
                            if($this->$tableName->hasField('Server_Name')){
                                $options = array("conditions" => array($tableName.".Server_Name like " => "%$searchString%"));
                                if(in_array($searchName, array('serverinventory', 'cmdbinventory')) ){
                                    $this->$tableName->bindModel(array('hasOne' => array('CmdbAppData' => array('className' => 'CmdbAppData',
                                                                                          'conditions' => array("CmdbAppData.Server_Name = ".$tableName.".Server_Name"),
                                                                                          'foreignKey' => false))), false);
                                }
                                if(!isset($this->data["Reports"]["export"])){
                                    $options['limit'] = 100;
                                }
                                $results[$tableName] =  $this->$tableName->find("all", $options);
                            }
                        }
                    }
                }elseif($reportType == "bulkhost"){
                    if((isset($this->data["Reports"]["bulkhostsearch"]) && $this->data["Reports"]["bulkhostsearch"])){
                        $searchArray = array();
                        $searchString = trim($this->data["Reports"]["bulkhostsearch"]);
                        $searchArray = explode("\n", $this->data["Reports"]["bulkhostsearch"]);
                        foreach($searchArray as $key => $value) {
                            $searchArray[$key] = trim($value);
                            if(!$searchArray[$key]){
                                unset($searchArray[$key]);
                            }
                        }
                        if($this->$tableName->hasField('Server_Name')){
                            $options = array("conditions" => array($tableName.".Server_Name" => $searchArray));
                            if(in_array($searchName, array('serverinventory', 'cmdbinventory')) ){
                                    $this->$tableName->bindModel(array('hasOne' => array('CmdbAppData' => array('className' => 'CmdbAppData',
                                                                                          'conditions' => array("CmdbAppData.Server_Name = ".$tableName.".Server_Name"),
                                                                                          'foreignKey' => false))), false);
                            }
                            if(!isset($this->data["Reports"]["export"])){
                                $options['limit'] = 100;
                            }
                            $results[$tableName] =  $this->$tableName->find("all", $options);
                        }
                    }
                }elseif($reportType == "app" && in_array($searchName, array('serverinventory', 'cmdbinventory', 'drexercise')) ){
                    if((isset($this->data["Reports"]["appsearch"]) && $this->data["Reports"]["appsearch"])){
                        $searchString = $this->data["Reports"]["appsearch"];
                        if($this->$tableName->hasField('Server_Name')){
                            if($searchName != 'drexercise'){
                                $options = array("conditions" => array("CmdbAppData.Application_Name like " => "%$searchString%"));
                            }
                            if(!isset($this->data["Reports"]["export"])){
                                $options['limit'] = 100;
                            }
                            if($searchName != 'drexercise'){
        							$this->$tableName->bindModel(array('hasOne' => array('CmdbAppData' => array('className' => 'CmdbAppData',
                                                                                                      'conditions' => array("CmdbAppData.Server_Name = ".$tableName.".Server_Name"),
                                                                                                      'foreignKey' => false))), false);
                            }
                            $results[$tableName] =  $this->$tableName->find("all", $options);
                        }
                    }
                }elseif($reportType == "bulkapp" && in_array($searchName, array('serverinventory', 'cmdbinventory', 'drexercise')) ){
                    if((isset($this->data["Reports"]["bulkappsearch"]) && $this->data["Reports"]["bulkappsearch"])){
                        $searchArray = array();
                        $searchString = trim($this->data["Reports"]["bulkappsearch"]);
                        $searchArray = explode("\n", $this->data["Reports"]["bulkappsearch"]);
                        foreach($searchArray as $key => $value) {
                            $searchArray[$key] = trim($value);
                            if(!$searchArray[$key]){
                                unset($searchArray[$key]);
                            }
                        }
                        if($this->$tableName->hasField('Server_Name')){
                            if($searchName != 'drexercise'){
                                $options = array("conditions"  => array("CmdbAppData.Application_Name" => $searchArray));
                            }
                            if(!isset($this->data["Reports"]["export"])){
                                $options['limit'] = 100;
                            }
                            if($searchName != 'drexercise'){
    							$this->$tableName->bindModel(array('hasOne' => array('CmdbAppData' => array('className' => 'CmdbAppData',
    			                                                                                            'conditions' => array("CmdbAppData.Server_Name = ".$tableName.".Server_Name"),
    			                                                                                            'foreignKey' => false))), false);
    							
                            }							
                            $results[$tableName] =  $this->$tableName->find("all", $options);
                        }
                    }
                }elseif($reportType == "bu"){
                    if((isset($this->data["Reports"]["busearch"]) && $this->data["Reports"]["busearch"])){
                        $searchString = $this->data["Reports"]["busearch"];
                        if($this->$tableName->hasField('Business_Unit')){
                            $options = array("conditions" => array($tableName.".Business_Unit like " => "$searchString%"));
                            if(!isset($this->data["Reports"]["export"])){
                                $options['limit'] = 100;
                            }
                            $results[$tableName] =  $this->$tableName->find("all", $options);
                        }
                    }
                }elseif($reportType == "bulkbu"){
                    if((isset($this->data["Reports"]["bulkbusearch"]) && $this->data["Reports"]["bulkbusearch"])){
                        $searchArray = array();
                        $searchString = trim($this->data["Reports"]["bulkbusearch"]);
                        $searchArray = explode("\n", $this->data["Reports"]["bulkbusearch"]);
                        foreach($searchArray as $key => $value) {
                            $searchArray[$key] = trim($value);
                            if(!$searchArray[$key]){
                                unset($searchArray[$key]);
                            }
                        }
                        if($this->$tableName->hasField('Business_Unit')){
                            $options = array("conditions" => array($tableName.".Business_Unit" => $searchArray));
                            if(!isset($this->data["Reports"]["export"])){
                                $options['limit'] = 100;
                            }
                            $results[$tableName] =  $this->$tableName->find("all", $options);
                        }
                    }
                }elseif($reportType == "lc"){
                    if((isset($this->data["Reports"]["lcsearch"]) && $this->data["Reports"]["lcsearch"])){
                        $searchString = $this->data["Reports"]["lcsearch"];
                        if($this->$tableName->hasField('Server_LCS')){
                            $options = array("conditions" => array($tableName.".Server_LCS like " => "$searchString%"));
                            if(!isset($this->data["Reports"]["export"])){
                                $options['limit'] = 100;
                            }
                            $results[$tableName] =  $this->$tableName->find("all", $options);
                        }
                    }
                }elseif($reportType == "bulklc"){
                    if((isset($this->data["Reports"]["bulklcsearch"]) && $this->data["Reports"]["bulklcsearch"])){
                        $searchArray = array();
                        $searchString = trim($this->data["Reports"]["bulklcsearch"]);
                        $searchArray = explode("\n", $this->data["Reports"]["bulklcsearch"]);
                        foreach($searchArray as $key => $value) {
                            $searchArray[$key] = trim($value);
                            if(!$searchArray[$key]){
                                unset($searchArray[$key]);
                            }
                        }
                        if($this->$tableName->hasField('Server_LCS')){
                            $options = array("conditions" => array($tableName.".Server_LCS" => $searchArray));
                            if(!isset($this->data["Reports"]["export"])){
                                $options['limit'] = 100;
                            }
                            $results[$tableName] =  $this->$tableName->find("all", $options);
                        }
                    }
                }elseif($reportType == "lanid"){
                    if((isset($this->data["Reports"]["lanidsearch"]) && $this->data["Reports"]["lanidsearch"])){
                        $searchString = $this->data["Reports"]["lanidsearch"];
                        if($this->$tableName->hasField('LAN_ID')){
                            $options = array("conditions" => array($tableName.".LAN_ID like " => "$searchString%"));
                            if(!isset($this->data["Reports"]["export"])){
                                $options['limit'] = 100;
                            }
                            $results[$tableName] =  $this->$tableName->find("all", $options);
                        }
                    }
                }elseif($reportType == "bulklanid"){
                    if((isset($this->data["Reports"]["bulklanidsearch"]) && $this->data["Reports"]["bulklanidsearch"])){
                        $searchArray = array();
                        $searchString = trim($this->data["Reports"]["bulklanidsearch"]);
                        $searchArray = explode("\n", $this->data["Reports"]["bulklanidsearch"]);
                        foreach($searchArray as $key => $value) {
                            $searchArray[$key] = trim($value);
                            if(!$searchArray[$key]){
                                unset($searchArray[$key]);
                            }
                        }
                        if($this->$tableName->hasField('LAN_ID')){
                            $options = array("conditions" => array($tableName.".LAN_ID" => $searchArray));
                            if(!isset($this->data["Reports"]["export"])){
                                $options['limit'] = 100;
                            }
                            $results[$tableName] =  $this->$tableName->find("all", $options);
                        }
                    }
                }elseif($reportType == "qtree"){
                    if((isset($this->data["Reports"]["qtreesearch"]) && $this->data["Reports"]["qtreesearch"])){
                        $searchString = $this->data["Reports"]["qtreesearch"];
                        if($this->$tableName->hasField('Qtree_Name')){
                            $options = array("conditions" => array($tableName.".Qtree_Name like " => "$searchString%"));
                            if(!isset($this->data["Reports"]["export"])){
                                $options['limit'] = 100;
                            }
                            $results[$tableName] =  $this->$tableName->find("all", $options);
                        }
                    }
                }elseif($reportType == "bulkqtree"){
                    if((isset($this->data["Reports"]["bulkqtreesearch"]) && $this->data["Reports"]["bulkqtreesearch"])){
                        $searchArray = array();
                        $searchString = trim($this->data["Reports"]["bulkqtreesearch"]);
                        $searchArray = explode("\n", $this->data["Reports"]["bulkqtreesearch"]);
                        foreach($searchArray as $key => $value) {
                            $searchArray[$key] = trim($value);
                            if(!$searchArray[$key]){
                                unset($searchArray[$key]);
                            }
                        }
                        if($this->$tableName->hasField('Qtree_Name')){
                            $options = array("conditions" => array($tableName.".Qtree_Name" => $searchArray));
                            if(!isset($this->data["Reports"]["export"])){
                                $options['limit'] = 100;
                            }
                            $results[$tableName] =  $this->$tableName->find("all", $options);
                        }
                    }
                }elseif($reportType =="frame"){
                    if((isset($this->data["Reports"]["framename"]) && $this->data["Reports"]["framename"])){
                        $searchString = $frameName = $this->data["Reports"]["framename"];
                        if($this->$tableName->hasField('Array_Name')){
                            $options["conditions"] = array($tableName.".Array_Name" => $frameName);
                            
                            if((isset($this->data["Reports"]["deviceid"]) && $this->data["Reports"]["deviceid"])){
                                $searchString = trim($this->data["Reports"]["deviceid"]);
                                if($this->$tableName->hasField('Device_ID')){
                                    $options["conditions"][$tableName.".Device_ID like"] = $this->data["Reports"]["deviceid"] . "%";
                                }
                            }
                            
                            if(!isset($this->data["Reports"]["export"])){
                                $options['limit'] = 100;
                            }
                            $results[$tableName] =  $this->$tableName->find("all", $options);
                        }
                    }
                }elseif($reportType =="bulkframe"){
                    if((isset($this->data["Reports"]["framename"]) && $this->data["Reports"]["framename"])){
                        $searchString = $frameName = $this->data["Reports"]["framename"];
                        if($this->$tableName->hasField('Array_Name')){
                            $options["conditions"] = array($tableName.".Array_Name" => $frameName);
                            
                            if((isset($this->data["Reports"]["bulkdeviceid"]) && $this->data["Reports"]["bulkdeviceid"])){
                                $searchArray = array();
                                $searchString = trim($this->data["Reports"]["deviceid"]);
                                $searchArray = explode("\n", $this->data["Reports"]["bulkdeviceid"]);
                                foreach($searchArray as $key => $value) {
                                    $searchArray[$key] = trim($value);
                                    if(!$searchArray[$key]){
                                        unset($searchArray[$key]);
                                    }
                                }
                                if($this->$tableName->hasField('Device_ID')){
                                    $options["conditions"][$tableName.".Device_ID"] = $searchArray;
                                }
                            }
                            
                            if(!isset($this->data["Reports"]["export"])){
                                $options['limit'] = 100;
                            }
							// debug($options);
                            $results[$tableName] =  $this->$tableName->find("all", $options);
							// debug($results);
                        }
                    }
                }elseif($reportType == "storagehost"){
                    if((isset($this->data["Reports"]["storagehost"]) && $this->data["Reports"]["storagehost"])){
                        $searchString = $this->data["Reports"]["storagehost"];
                        if($this->$tableName->hasField('Server_Name')){
                            $options["conditions"] = array($tableName.".Server_Name" => $searchString);
                            
                            if(!isset($this->data["Reports"]["export"])){
                                $options['limit'] = 100;
                            }
                            $results[$tableName] =  $this->$tableName->find("all", $options);
                        }
                    }
                }elseif($reportType =="bulkstoragehost"){
                    if((isset($this->data["Reports"]["storagehost"]) && $this->data["Reports"]["storagehost"])){
                        $searchArray = array();
                        $searchString = trim($this->data["Reports"]["storagehost"]);
                        $searchArray = explode("\n", $this->data["Reports"]["storagehost"]);
                        foreach($searchArray as $key => $value) {
                            $searchArray[$key] = trim($value);
                            if(!$searchArray[$key]){
                                unset($searchArray[$key]);
                            }
                        }
                        if($this->$tableName->hasField('Server_Name')){
                            $options = array("conditions" => array($tableName.".Server_Name" => $searchArray));
                            if(!isset($this->data["Reports"]["export"])){
                                $options['limit'] = 100;
                            }
                            $results[$tableName] =  $this->$tableName->find("all", $options);
                        }
                    }
                }elseif($reportType =="wwn"){
                    if((isset($this->data["Reports"]["wwn"]) && $this->data["Reports"]["wwn"])){
                        $searchString = $this->data["Reports"]["wwn"];
                        if($this->$tableName->hasField('WWN_Name')){
                            $options["conditions"] = array($tableName.".WWN_Name" => $searchString);
                            
                            if(!isset($this->data["Reports"]["export"])){
                                $options['limit'] = 100;
                            }
                            $results[$tableName] =  $this->$tableName->find("all", $options);
                        }
                    }
                }elseif($reportType =="bulkwwn"){
                    if((isset($this->data["Reports"]["wwn"]) && $this->data["Reports"]["wwn"])){
                        $searchArray = array();
                        $searchString = trim($this->data["Reports"]["wwn"]);
                        $searchArray = explode("\n", $this->data["Reports"]["wwn"]);
                        foreach($searchArray as $key => $value) {
                            $searchArray[$key] = trim($value);
                            if(!$searchArray[$key]){
                                unset($searchArray[$key]);
                            }
                        }
                        if($this->$tableName->hasField('WWN_Name')){
                            $options = array("conditions" => array($tableName.".WWN_Name" => $searchArray));
                            if(!isset($this->data["Reports"]["export"])){
                                $options['limit'] = 100;
                            }
                            $results[$tableName] =  $this->$tableName->find("all", $options);
                        }
                    }
                }elseif($reportType == "os"){
                    if((isset($this->data["Reports"]["ossearch"]) && $this->data["Reports"]["ossearch"])){
                        $searchString = $this->data["Reports"]["ossearch"];
                        if($this->$tableName->hasField('Operating_System')){
                            $options = array("conditions" => array($tableName.".Operating_System like " => "$searchString%"));
                            if(!isset($this->data["Reports"]["export"])){
                                $options['limit'] = 100;
                            }
                            $results[$tableName] =  $this->$tableName->find("all", $options);
                        }
                    }
                }elseif($reportType == "bulkos"){
                    if((isset($this->data["Reports"]["bulkossearch"]) && $this->data["Reports"]["bulkossearch"])){
                        $searchArray = array();
                        $searchString = trim($this->data["Reports"]["bulkossearch"]);
                        $searchArray = explode("\n", $this->data["Reports"]["bulkossearch"]);
                        foreach($searchArray as $key => $value) {
                            $searchArray[$key] = trim($value);
                            if(!$searchArray[$key]){
                                unset($searchArray[$key]);
                            }
                        }
                        if($this->$tableName->hasField('Operating_System')){
                            $options = array("conditions" => array($tableName.".Operating_System" => $searchArray));
                            if(!isset($this->data["Reports"]["export"])){
                                $options['limit'] = 100;
                            }
                            $results[$tableName] =  $this->$tableName->find("all", $options);
                        }
                    }
                }  elseif($reportType == "storagearray"){
                    if(isset($this->data) && !empty($this->data) || $searchString){
                        if((isset($this->data["Reports"]["storagearraysearch"]) && $this->data["Reports"]["storagearraysearch"]) || $searchString){
                            $searchString = $this->data["Reports"]["storagearraysearch"];
                            $fieldName = 'vFiler_Name';
                            
                            if($tableName == 'SanStorageBillingData'){
                                $fieldName = 'Storage_Array_Name';
                            }
                            
                            if($tableName =='NasusersStorageBillingData'){
                                continue;
                            }
                            $options = array("conditions" => array($tableName.".$fieldName like " => "%$searchString%"));
                            $serverNames = 1;
                            if(in_array($searchName, array('serverinventory', 'cmdbinventory', 'drexercise'))  ){
                                $fieldName = 'Server_Name';
                                
                                $this->loadModel('SanStorageBillingData');
                                
                                $serverNames = $this->SanStorageBillingData->find("list", array("conditions" => array( "Storage_Array_Name like " => "%$searchString%") ,
                                                                                                "fields" => array($fieldName,'Storage_Array_Name') ) ) ;
                                $options = array("conditions" => array($tableName.".$fieldName" => array_keys($serverNames) ));
                                
                            }
                            if($this->$tableName->hasField($fieldName) && $serverNames){
                                if(!isset($this->data["Reports"]["export"])){
                                    $options['limit'] = 100;
                                }
                                $results[$tableName] =  $this->$tableName->find("all", $options);
                            }
                        }
                    }
                }elseif($reportType == "bulkstoragearray"){
                    if((isset($this->data["Reports"]["bulkstoragearraysearch"]) && $this->data["Reports"]["bulkstoragearraysearch"])){
                        $searchArray = array();
                        $searchString = trim($this->data["Reports"]["bulkstoragearraysearch"]);
                        $searchArray = explode("\n", $this->data["Reports"]["bulkstoragearraysearch"]);
                        foreach($searchArray as $key => $value) {
                            $searchArray[$key] = trim($value);
                            if(!$searchArray[$key]){
                                unset($searchArray[$key]);
                            }
                        }
                        $fieldName = 'vFiler_Name';
                            
                        if($tableName == 'SanStorageBillingData'){
                            $fieldName = 'Storage_Array_Name';
                        }
                        
                        if($tableName =='NasusersStorageBillingData'){
                            continue;
                        }
                        $options = array("conditions" => array($tableName.".$fieldName" => $searchArray));
                        $serverNames = 1;
                        if(in_array($searchName, array('serverinventory', 'cmdbinventory', 'drexercise')) ){
                            $fieldName = 'Server_Name';
                            
                            $this->loadModel('SanStorageBillingData');
                            
                            $serverNames = $this->SanStorageBillingData->find("list", array("conditions" => array( "Storage_Array_Name" => $searchArray) , 
                                                                                                                   "fields" => array($fieldName,'Storage_Array_Name')) ) ;
                            $options = array("conditions" => array($tableName.".$fieldName" => array_keys($serverNames) ));
                            
                        }
                        
                        if($this->$tableName->hasField($fieldName) && $serverNames){
                            if(!isset($this->data["Reports"]["export"])){
                                $options['limit'] = 100;
                            }
                            $results[$tableName] =  $this->$tableName->find("all", $options);
                        }
                    }
                }elseif($reportType == "sharename"){
                    if((isset($this->data["Reports"]["sharenamesearch"]) && $this->data["Reports"]["sharenamesearch"])){
                        $searchString = $this->data["Reports"]["sharenamesearch"];
                        if($this->$tableName->hasField('Share_Name')){
                            $options = array("conditions" => array($tableName.".Share_Name like " => "$searchString%"));
                            if(!isset($this->data["Reports"]["export"])){
                                $options['limit'] = 100;
                            }
                            $results[$tableName] =  $this->$tableName->find("all", $options);
                        }
                    }
                }elseif($reportType == "bulksharename"){
                    if((isset($this->data["Reports"]["bulksharenamesearch"]) && $this->data["Reports"]["bulksharenamesearch"])){
                        $searchArray = array();
                        $searchString = trim($this->data["Reports"]["bulksharenamesearch"]);
                        $searchArray = explode("\n", $this->data["Reports"]["bulksharenamesearch"]);
                        foreach($searchArray as $key => $value) {
                            $searchArray[$key] = trim($value);
                            if(!$searchArray[$key]){
                                unset($searchArray[$key]);
                            }
                        }
                        if($this->$tableName->hasField('Share_Name')){
                            $options = array("conditions" => array($tableName.".Share_Name" => $searchArray));
                            if(!isset($this->data["Reports"]["export"])){
                                $options['limit'] = 100;
                            }
                            $results[$tableName] =  $this->$tableName->find("all", $options);
                        }
                    }
                }elseif($reportType == "ownername"){
                    if((isset($this->data["Reports"]["ownernamesearch"]) && $this->data["Reports"]["ownernamesearch"])){
                        $searchString = $this->data["Reports"]["ownernamesearch"];
                        if($this->$tableName->hasField('Owner_Desc')){
                            $options = array("conditions" => array($tableName.".Owner_Desc like " => "$searchString%"));
                            if(!isset($this->data["Reports"]["export"])){
                                $options['limit'] = 100;
                            }
                            $results[$tableName] =  $this->$tableName->find("all", $options);
                        }
                    }
                }elseif($reportType == "bulkownername"){
                    if((isset($this->data["Reports"]["bulkownernamesearch"]) && $this->data["Reports"]["bulkownernamesearch"])){
                        $searchArray = array();
                        $searchString = trim($this->data["Reports"]["bulkownernamesearch"]);
                        $searchArray = explode("\n", $this->data["Reports"]["bulkownernamesearch"]);
                        foreach($searchArray as $key => $value) {
                            $searchArray[$key] = trim($value);
                            if(!$searchArray[$key]){
                                unset($searchArray[$key]);
                            }
                        }
                        if($this->$tableName->hasField('Owner_Desc')){
                            $options = array("conditions" => array($tableName.".Owner_Desc" => $searchArray));
                            if(!isset($this->data["Reports"]["export"])){
                                $options['limit'] = 100;
                            }
                            $results[$tableName] =  $this->$tableName->find("all", $options);
                        }
                    }
                }elseif($reportType == "reqid"){
                    if((isset($this->data["Reports"]["reqidsearch"]) && $this->data["Reports"]["reqidsearch"])){
                        $searchString = $this->data["Reports"]["reqidsearch"];
                        if($this->$tableName->hasField('REQ_ID')){
                            $options = array("conditions" => array($tableName.".REQ_ID like " => "$searchString%"));
                            if(!isset($this->data["Reports"]["export"])){
                                $options['limit'] = 100;
                            }
                            $results[$tableName] =  $this->$tableName->find("all", $options);
                        }
                    }
                }elseif($reportType == "bulkreqid"){
                    if((isset($this->data["Reports"]["bulkreqidsearch"]) && $this->data["Reports"]["bulkreqidsearch"])){
                        $searchArray = array();
                        $searchString = trim($this->data["Reports"]["bulkreqidsearch"]);
                        $searchArray = explode("\n", $this->data["Reports"]["bulkreqidsearch"]);
                        foreach($searchArray as $key => $value) {
                            $searchArray[$key] = trim($value);
                            if(!$searchArray[$key]){
                                unset($searchArray[$key]);
                            }
                        }
                        if($this->$tableName->hasField('REQ_ID')){
                            $options = array("conditions" => array($tableName.".REQ_ID" => $searchArray));
                            if(!isset($this->data["Reports"]["export"])){
                                $options['limit'] = 100;
                            }
                            $results[$tableName] =  $this->$tableName->find("all", $options);
                        }
                    }
                }elseif($reportType == "vfiler"){
                    if((isset($this->data["Reports"]["vfilersearch"]) && $this->data["Reports"]["vfilersearch"])){
                        $searchString = $this->data["Reports"]["vfilersearch"];
                        if($this->$tableName->hasField('vFilerName')){
                            $options = array("conditions" => array($tableName.".vFilerName like " => "$searchString%"));
                            if(!isset($this->data["Reports"]["export"])){
                                $options['limit'] = 100;
                            }
                            $results[$tableName] =  $this->$tableName->find("all", $options);
                        }
                    }
                }elseif($reportType == "bulkvfiler"){
                    if((isset($this->data["Reports"]["bulkvfilersearch"]) && $this->data["Reports"]["bulkvfilersearch"])){
                        $searchArray = array();
                        $searchString = trim($this->data["Reports"]["bulkvfilersearch"]);
                        $searchArray = explode("\n", $this->data["Reports"]["bulkvfilersearch"]);
                        foreach($searchArray as $key => $value) {
                            $searchArray[$key] = trim($value);
                            if(!$searchArray[$key]){
                                unset($searchArray[$key]);
                            }
                        }
                        if($this->$tableName->hasField('vFilerName')){
                            $options = array("conditions" => array($tableName.".vFilerName" => $searchArray));
                            if(!isset($this->data["Reports"]["export"])){
                                $options['limit'] = 100;
                            }
                            $results[$tableName] =  $this->$tableName->find("all", $options);
                        }
                    }
                }
                
                $this->set("fromSearch", 1);
            }elseif($searchName == 'nasgroupshares' && $reportType == "home"){
                $this->loadModel("$tableName");
                $options['limit'] = 100;
                $results[$tableName] =  $this->$tableName->find("all", $options);
                $this->set("fromSearch", 1);
            }elseif($searchName == 'smarts'){
                $this->loadModel("$tableName");
                $options['limit'] = 100;
                $results[$tableName] =  $this->$tableName->find("all", $options);
                $this->set("fromSearch", 1);                
            }else{
                $this->set("fromSearch", 0);
            }
            if(isset($this->data["Reports"]["export"]) && $this->data["Reports"]["export"] == "export" && $searchString != ""){
                $this->autoRender = FALSE;
                $rows= array();
                
                // $this->createsheet($results, $tableName);
                
                if(isset($results[$tableName][0]['CmdbAppData'])){
                    foreach($results[$tableName][0]['CmdbAppData'] as $fieldNames => $values){
                        if($fieldNames != 'Server_Name') {
                            $header[] = $fieldNames ;
                        }
                    }
                }
                foreach($results[$tableName][0][$tableName] as $fieldNames => $values){ 
                    $header[] = $fieldNames ;
                }
                $rows[] = $header;
                foreach($results[$tableName] as $result) {
                    $rowValues = array();
                    if(isset($results[$tableName][0]['CmdbAppData'])){
                        foreach($result['CmdbAppData'] as $fieldNames => $values){ 
                            if($fieldNames != 'Server_Name') {
                                $rowValues[] = $values; 
                            }  
                        }
                    }
                    foreach($result[$tableName] as $values) { 
                        $rowValues[] = $values;
                    }
                    $rows[] = $rowValues;
                }
                $exportArray = $rows;
                $filename = $tableName."_" .$reportType."_".date("Y-m-d-H-i-s") .".xls";
                $this->exportresults($exportArray, $filename);
            }
        }
        // debug($results);
        // $this->createsheet($results);

        $this->set("searchTablesArray",  $searchTablesArray);
        $this->set("fromTable",  $fromTable);
        $this->set("reportType",  $reportType);
        $this->set("results", $results);
        $this->set("searchTypes", $searchTypes);
        $this->set("searchString", $searchString);
        $this->set("searchName", $searchName);
        $this->set("framename", $frameName);
        $this->set("deviceid", $deviceid);
    }
    

    function exportsheet($tableShortName = false){
        $this->autoRender = FALSE;
        $exportArray = array();
        
        ini_set('max_execution_time', 0);
        if($tableShortName == "cmdb"){
            $tableName = "CmdbServerData";
        }elseif($tableShortName == "rvtools"){
            $tableName = "RvtoolsServerData";
        }elseif($tableShortName == "hmcscans"){
            $tableName = "HmcScansServerData";
        }elseif($tableShortName == "sanstorage"){
            $tableName = "SanStorageBillingData";
        }elseif($tableShortName == "backupstorage"){
            $tableName = "BackupStorageBillingData";
        }elseif($tableShortName == "nasusers"){
            $tableName = "NasusersStorageBillingData";
        }elseif($tableShortName == "nasgroups"){
            $tableName = "NasgroupsStorageBillingData";
        }elseif($tableShortName == "symdevice"){
            $tableName = "StorageframeSymdevStat";
        }elseif($tableShortName == "symconfig"){
            $tableName = "StorageframeSymcfgStat";
        }elseif($tableShortName == "symrdf"){
            $tableName = "StorageframeSymrdfStat";
        }elseif($tableShortName == "symclone"){
            $tableName = "StorageframeSymcloneStat";
        }elseif($tableShortName == "symbcv"){
            $tableName = "StorageframeSymbcvStat";
        }elseif($tableShortName == "symlogin") {
            $tableName = "StorageframeSymloginStat";
        }elseif($tableShortName == "wwninitiator") {
            $tableName = "StorageByServerStat";
        }elseif($tableShortName == "storagegroup") {
            $tableName = "StorageframeStoragegroupsStat";
        }elseif($tableShortName == "storagehosts") {
            $tableName = "StorageByServerStat";
        }elseif($tableShortName == "nasgroupshare"){
            $tableName = "NasGroupSharesDescData";
        }
        
        $this->loadModel($tableName);
        $results =  $this->$tableName->find("all");
        if($results){
            $rows= array();
            foreach($results[0][$tableName] as $fieldNames => $values){ 
                $header[] = $fieldNames ;
            }
            $rows[] = $header;
            foreach($results as $result){
                $rowValues = array();
                foreach($result[$tableName] as $values){ 
                    $rowValues[] = $values;
                }
                $rows[] = $rowValues;
            }
            $exportArray = $rows;
        }
        if($exportArray){
            $filename = $tableShortName."_".date("Y-m-d-H-i-s") .".xls";
            $this->exportresults($exportArray, $filename);
        }
    }

    function storageframes(){
    }
    
    function pingnslookup($pingType = "", $requestId = ""){
        $message = "";
        $results = false;
        $showResults    = false;
        $searchString   = "";
        $this->loadModel("DnslookupPingStat");
        if(isset($this->data) && !empty($this->data) || $requestId){
            if(isset($this->data["Reports"]["ping"]) && $this->data["Reports"]["ping"]){
                $pingText   = str_replace(" ", "", strip_tags($this->data["Reports"]["ping"]));
                
                $requestId  = "WR".date("Ymdhis");
                $this->DnslookupPingStat->create();
                $this->DnslookupPingStat->REQ_ID = $requestId;
                $this->DnslookupPingStat->Entered_Host = $pingText;
                
                $this->DnslookupPingStat->save($this);
                
                $message = exec(DNS_LOOKUP_PING_CHECK_FILE . " $requestId $pingText") ;
                
                $showResults = true;
            }elseif(isset($this->data["Reports"]["bulkping"]) && $this->data["Reports"]["bulkping"]){
                $pingText = str_replace(" ", "", strip_tags($this->data["Reports"]["bulkping"]));
                $pingText = trim($pingText);
                $pingArray = explode("\n", $pingText);
                
                $requestId = "WR".date("Ymdhis");
                
                foreach($pingArray as $key => $value) {
                    $pingArray[$key] = trim($value);
                    $pingArray[$key] = str_replace(" ", "", strip_tags($pingArray[$key]));
                    $pingArray[$key] = str_replace('\r', "", strip_tags($pingArray[$key]));
                    if(!$pingArray[$key]){
                        unset($pingArray[$key]);
                    } else {
                        $this->DnslookupPingStat->create();
                        $this->DnslookupPingStat->REQ_ID = $requestId;
                        $this->DnslookupPingStat->Entered_Host = $pingArray[$key];
                        $this->DnslookupPingStat->save($this);
                    }
                }
                $pingText = implode(" ", $pingArray);
                
                if(count($pingArray) <= 5){
                    $message = exec(DNS_LOOKUP_PING_CHECK_FILE . " $requestId $pingText") ;
                    $showResults = true;
                }else{
                    $showResults = false;
                    $message = "Your Request ID : $requestId <br> Remember your Request ID, Come back and check response for your request in few Minutes";
                }
            }
            
            if(($pingType == "referenceidcheck" && isset($this->data["Reports"]["reference_id"]) && $this->data["Reports"]["reference_id"]) || $showResults || $requestId){
                    
                if(!$showResults && isset($this->data["Reports"]["reference_id"])){
                    $requestId = $this->data["Reports"]["reference_id"] ;
                }
                $searchString = $requestId;
                $this->loadModel("DnslookupPingStat");
                if($this->DnslookupPingStat->hasField('REQ_ID')){
                    $options = array("conditions" => array("REQ_ID" => $requestId));
                    $results =  $this->DnslookupPingStat->find("all", $options);
                }
                // debug($results);
                if(!$results) {
                    $message = "Entered request Id is Invalid or the request is not completed.";
                }
            }
            $this->set("fromSearch", 1);
        } else {
            $this->set("fromSearch", 0);
        }
        
        if($pingType == "latestrequests"){
            $recentRequests = $this->DnslookupPingStat->find("all", array("limit" => 10, "order" => "created DESC", "fields" => "DISTINCT (REQ_ID)"));
            // debug($recentRequests);
            $this->set("recentRequests", $recentRequests);
        }
        
        if($pingType == "daterangerequests"){
            
            if(isset($this->data["Reports"]["start_date"]) && !empty($this->data["Reports"]["start_date"])){
                $start_date = $this->data["Reports"]["start_date"]; 
            }else{
                $start_date = date("Y-m-d");
            }
            
            $conditions = array("created Like '".$start_date ."%'");
            $recentRequests = $this->DnslookupPingStat->find("all", array("limit" => 10, "order" => "created DESC", "fields" => "DISTINCT (REQ_ID)", "conditions" => $conditions));
            // debug($recentRequests);
            $this->set("recentRequests", $recentRequests);
        }
        if(isset($this->data["Reports"]["export"]) && $this->data["Reports"]["export"] == "export" && $searchString != ""){
                $this->autoRender = FALSE;
                $rows= array();
                foreach($results[0]["DnslookupPingStat"] as $fieldNames => $values){ 
                    $header[] = $fieldNames ;
                }
                $rows[] = $header;
                foreach($results as $result){
                    $rowValues = array();
                    foreach($result["DnslookupPingStat"] as $values){ 
                        $rowValues[] = $values;
                    }
                    $rows[] = $rowValues;
                }
                $exportArray = $rows;
                $filename = "DnslookupPingStat_".date("Y-m-d-H-i-s") .".xls";
                $this->exportresults($exportArray, $filename);
        }
        
        $this->set("results", $results);
        $this->set("message", $message);
        $this->set("pingType", $pingType);   
        $this->set("searchString", $searchString);
    }


    function comingsoon(){
        // echo "Coming soon";
        $this->set("referer", $_SERVER["HTTP_REFERER"]);     
    }
	
	function getserverdetails($serverNames){
        
		$this->layout = null;
		$this->loadModel("CmdbAppData");
		$usageResults = array();
		$results = $this->CmdbAppData->find("first", array("conditions" => array("Server_Name" => trim($serverName)) ) );
            
        $this->loadModel("SanStorageBillingData");
        
        $usageResults = $this->SanStorageBillingData->find("all", array("conditions" => array("Server_Name" => trim($serverName)), 
                                                                        "fields"     => array("Storage_Array_Name", "SUM(Allocated_GB) as Allocated_GB",
                                                                                              "SUM(Used_GB) as Used_GB"),
                                                                        "group"      => "Storage_Array_Name"
                                                         ) );
    		//debug($usageResults);
		$this->set("serverdetails", $results);
        $this->set("serverName", $serverName);
        $this->set("serverusagedetails", $usageResults);	
        	
	}

    function editownerdesc(){
        $vfilername = $_REQUEST['vfilername'];
        $sharename = $_REQUEST['sharename'];
        $rowidstatus = $_REQUEST['rowidstatus'];
        $this->layout = null;
        $this->loadModel("NasGroupSharesDescData");
        $usageResults = array();
        $updated = false;
        $nasResults = $this->NasGroupSharesDescData->find("first", array("conditions" => array("vFilerName" => trim($vfilername), "Share_Name" => $sharename ), 
                                                                       // "fields"     => array("vFilerName", "Share_Name", "MountPoint", "Billable_CBD", "REQ_ID", "Owner_Desc", "Email", "Comments", "Status")
                                                         ) );
                                                         
        if($nasResults && isset($this->data) && !empty($this->data)){
            // debug($this->data);
            $updateConditions = array('Share_Name' => $this->data['NasGroupSharesDescData']['Share_Name'], 'vFilerName' => $this->data['NasGroupSharesDescData']['vFilerName']) ;
            $this->NasGroupSharesDescData->vFilerName = $this->data['NasGroupSharesDescData']['vFilerName'];
            $this->NasGroupSharesDescData->Share_Name = $this->data['NasGroupSharesDescData']['Share_Name'];
            $updateFields = array("email" => "'" .$this->data['NasGroupSharesDescData']['Email'] . "'", 
                                  'Owner_Desc' => "'". $this->data['NasGroupSharesDescData']['Owner_Desc']. "'",
                                  "Status" => "'pending'", 
                                  "Comments" => "'" . $this->data['NasGroupSharesDescData']['Comments'] ."'",
                                  "REQ_ID" => "'" . $this->data['NasGroupSharesDescData']['REQ_ID'] ."'",
                                  "Billable_CBD" => "'" . $this->data['NasGroupSharesDescData']['Billable_CBD'] ."'");
            
            if($this->NasGroupSharesDescData->updateAll($updateFields, $updateConditions)){
                $updated = true;
            }
        }elseif($nasResults){
            $this->data = $nasResults;
        }
        // debug($this->data);
        $this->set("updated", $updated); 
        $this->set("rowidstatus", $rowidstatus);                                               
        $this->set("nasResults", $nasResults);
        //var_dump($_REQUEST);
    }
    
    function createsheet($results){
        
        // create new empty worksheet and set default font
        App::import ( 'Vendor', 'phpexcel' );
        //require_once APP_DIR . '/vendors/PHPExcel.php';
        if (!class_exists('PHPExcel')) {
            echo 'Vendor class PHPExcel not found!';
            exit;
        }
        
        // Create new PHPExcel object
        $objPHPExcel = new PHPExcel();
        
        // Set document properties
        
        $excelColumns = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","AA","AB","AC","AD","AE","AF","AG","AH","AI","AJ","AK","AL","AM","AN","AO","AP","AQ","AR","AS","AT","AU","AV","AW","AX","AY","AZ");
                
        
        $objPHPExcel->getProperties()->setCreator("Murthy Karothi")
                             ->setLastModifiedBy("Murthy Karothi")
                             ->setTitle("Office 2007 XLSX Test Document")
                             ->setSubject("Office 2007 XLSX Test Document")
                             ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
                             ->setKeywords("office 2007 openxml php")
                             ->setCategory("Test result file");
                             
        $sheetNumber = 0;
        $row = 1;
        // echo "<pre>";
        
        $objPHPExcel->getActiveSheet();
        foreach($results as $tableName => $resultAry) {
            // $objPHPExcel->addSheet($objWorkSheet);
            // echo "$sheetNumber" ."<br>";
            //if($sheetNumber != 0)
            $objPHPExcel->createSheet($sheetNumber);
            $objPHPExcel->getActiveSheet()->setTitle(''.$tableName);
            foreach($resultAry as $result){
                $col = 0;
                foreach($result[$tableName] as $key => $value) {
                    $objPHPExcel->setActiveSheetIndex($sheetNumber)->setCellValue($excelColumns[$col] . $row  , $key);
               //     echo $excelColumns[$col] . $row   . " - ". $value . "<br />" ;
                    $col++;
                }
                BREAK;
            }
            //debug($tableName);
            $sheetNumber++;
        }
        $row = 2;
        $sheetNumber = 0;
        foreach($results as $tableName => $resultAry) {
            foreach($resultAry as $result){
                $col = 0;
                foreach($result[$tableName] as $key => $value) {
                    $objPHPExcel->setActiveSheetIndex($sheetNumber)->setCellValue($excelColumns[$col] . $row  , $value);
                    // echo $excelColumns[$col] . $row   . " - ". $value . "<br />" ;
                    $col++;
                }
                $row ++; 
            }
            $sheetNumber++;
        }
        
        // foreach($results as $tableName => $result) {
                // foreach($result as $tableName => $values) {
                    // // // $objPHPExcel->setActiveSheetIndex($sheetNumber)->setCellValue($excelColumns[$col] . $row  , $values);
                    // echo $excelColumns[$col] . $row   . " - ". $values . "<br />" ;
    // //                 
                    // $col++;
                // }
    //             
                // $sheetNumber++;
                // $row++;
            // }
    
    
    
    
    // Add some data
    // $objPHPExcel->setActiveSheetIndex(0)
                // ->setCellValue('A1', 'Hello')
                // ->setCellValue('B2', 'world!')
                // ->setCellValue('C1', 'Hello')
                // ->setCellValue('D2', 'world!');
    // 
    // // Miscellaneous glyphs, UTF-8
    // $objPHPExcel->setActiveSheetIndex(0)
                // ->setCellValue('A4', 'Miscellaneous glyphs')
                // ->setCellValue('A5', 'éàèùâêîôûëïüÿäöüç');
    // 
    // // Rename worksheet
    // $objPHPExcel->getActiveSheet()->setTitle('Simple');
    // 
    
    // Set active sheet index to the first sheet, so Excel opens this as the first sheet
    $objPHPExcel->setActiveSheetIndex(0);
    
    
    // Redirect output to a client’s web browser (Excel2007)
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="01simple.xlsx"');
    header('Cache-Control: max-age=0');
    // If you're serving to IE 9, then the following may be needed
    header('Cache-Control: max-age=1');
    
    // If you're serving to IE over SSL, then the following may be needed
    header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
    header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
    header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
    header ('Pragma: public'); // HTTP/1.0
    
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');
    exit;       
            
    }
    
    function capacitysearch($searchStartFrom = "dc", $finalSearch = false){
        $this->loadModel("StorageCapacityData");
        
        $searchFieldNames = array("dc" =>"Data Centers", "vendor" => "Vendors", "bu" => "Business Units", "model" => "Models");
        $searchBoxes = array("model", "dc", "vendor", "bu");
        $searchTypes = array("dc" =>"dataCenters", "vendor" => "vendors", "bu" => "businessUnits", "model" => "models");
        $results["dataCenters"] = $results["vendors"] = $results["businessUnits"] = $results["models"] = array();
        $this->log('$this->data');
        $this->log($this->data);
            
        if($searchStartFrom == "dc"){
            $searchTypes = array("dc" =>"dataCenters", "vendor" => "vendors", "bu" => "businessUnits", "model" => "models");
            $searchBoxes = array("dc", "vendor", "bu", "model");
            $results["dataCenters"] = $this->StorageCapacityData->find("list", array("fields" =>array("Data_Center", "Data_Center"), "group" => "Data_Center") );
        }
        if($searchStartFrom == "vendor"){
            $searchTypes = array("vendor" => "vendors", "bu" => "businessUnits", "model" => "models", "dc" =>"dataCenters");
            $searchBoxes = array("vendor", "bu", "model", "dc");
            $results["vendors"] = $this->StorageCapacityData->find("list", array("fields" =>array("Vendor", "Vendor"), "group" => "Vendor") );
        }
        if($searchStartFrom == "bu"){
            $searchTypes = array( "bu" => "businessUnits", "model" => "models", "dc" =>"dataCenters", "vendor" => "vendors");
            $searchBoxes = array("bu", "model", "dc", "vendor");
            $results["businessUnits"]  = $this->StorageCapacityData->find("list", array("fields" =>array("Business_Unit", "Business_Unit"), "group" => "Business_Unit") );
        }
        if($searchStartFrom == "model"){
            $searchTypes = array( "model" => "models", "dc" =>"dataCenters", "vendor" => "vendors", "bu" => "businessUnits");
            $searchBoxes = array("model", "dc", "vendor", "bu");
            $results["models"] = $this->StorageCapacityData->find("list", array("fields" =>array("Model", "Model"), "group" => "Model") );
        }
        if($finalSearch){
            $conditions = array();
        
            if(isset($this->data["Reports"]["dc"]) && $this->data["Reports"]["dc"]){
                $conditions["Data_Center"] = $this->data["Reports"]["dc"];    
            }
            
            if(isset($this->data["Reports"]["vendor"]) && $this->data["Reports"]["vendor"]){
                $conditions["Vendor" ] = $this->data["Reports"]["vendor"];    
            }
            
            if(isset($this->data["Reports"]["bu"]) && $this->data["Reports"]["bu"]){
                $conditions["Business_Unit"] = $this->data["Reports"]["bu"];    
            }
            
            if(isset($this->data["Reports"]["model"]) && $this->data["Reports"]["model"]){
                $conditions["Model"] = $this->data["Reports"]["model"];    
            } 
            $this->log($conditions);
            $results['StorageCapacityData'] = $this->StorageCapacityData->find("all", array("conditions" => $conditions) );  
            $this->log($results['StorageCapacityData']);
            if(isset($this->data["Reports"]["export"]) && $this->data["Reports"]["export"] == "export"){
                $this->autoRender = FALSE;
                $rows= array();
                
                foreach($results['StorageCapacityData'][0]['StorageCapacityData'] as $fieldNames => $values){ 
                    $header[] = $fieldNames ;
                }
                $rows[] = $header;
                foreach($results['StorageCapacityData'] as $result) {
                    $rowValues = array();
                    foreach($result['StorageCapacityData'] as $values) { 
                        $rowValues[] = $values;
                    }
                    $rows[] = $rowValues;
                }
                $exportArray = $rows;
                $filename = 'StorageCapacityData'."_" .date("Y-m-d-H-i-s") .".xls";
                $this->exportresults($exportArray, $filename);
            }
             
        }
        
        $this->set("searchFieldNames", $searchFieldNames);
        $this->set("searchStartFrom", $searchStartFrom);
        $this->set("searchBoxes", $searchBoxes);
        $this->set("searchTypes", $searchTypes);
        $this->set("results", $results);
    }
    
    function ajaxcapacitysearch($searchStartFrom = "dc"){
        $this->layout = "";
        $this->loadModel("StorageCapacityData");
        $searchStartFrom = strtolower($searchStartFrom);
        $searchFieldNames = array("dc" =>"Data Centers", "vendor" => "Vendors", "bu" => "Business Units", "model" => "Models");
        
        $results = array();
        
        $conditions = array();
        
        if(isset($this->data["Reports"]["dc"]) && $this->data["Reports"]["dc"][0]){
            $conditions["Data_Center"] = $this->data["Reports"]["dc"];    
        }
        
        if(isset($this->data["Reports"]["vendor"]) && $this->data["Reports"]["vendor"][0]){
            $conditions["Vendor" ] = $this->data["Reports"]["vendor"];    
        }
        
        if(isset($this->data["Reports"]["bu"]) && $this->data["Reports"]["bu"][0]){
            $conditions["Business_Unit"] = $this->data["Reports"]["bu"];    
        }
        
        if(isset($this->data["Reports"]["model"]) && $this->data["Reports"]["model"][0]){
            $conditions["Model"] = $this->data["Reports"]["model"];    
        }
        
        $this->log($conditions);
        if($searchStartFrom == "dc"){
            $resultFor = "dc";
            $searchResult = "dataCenters";
            $results["dataCenters"] = $this->StorageCapacityData->find("list", array("conditions" => $conditions, "fields" =>array("Data_Center", "Data_Center"), "group" => "Data_Center") );
        }
        if($searchStartFrom == "vendor"){
            $searchResult = "vendors";
            $results["vendors"] = $this->StorageCapacityData->find("list", array("conditions" => $conditions, "fields" =>array("Vendor", "Vendor"), "group" => "Vendor") );
            $resultFor = "vendor";
        }
        if($searchStartFrom == "bu"){
            $searchResult = "businessUnits";
            $results["businessUnits"]  = $this->StorageCapacityData->find("list", array("conditions" => $conditions, "fields" =>array("Business_Unit", "Business_Unit"), "group" => "Business_Unit") );
            $resultFor = "bu";
        }
        if($searchStartFrom == "model"){
            $resultFor = "model";
            $searchResult = "models";
            $results["models"] = $this->StorageCapacityData->find("list", array("conditions" => $conditions, "fields" =>array("Model", "Model"), "group" => "Model") );
        }
        $this->set("resultFor", $resultFor);
        $this->set("searchStartFrom", $searchStartFrom);
        $this->set("searchResult", $searchResult);
        $this->set("results", $results);
    }

    function storagecalculator($calculate = ""){
        
    }
}
?>

