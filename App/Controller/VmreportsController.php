<?php
App::uses('AppController', 'Controller');
class VmreportsController extends AppController {
    
    function beforeFilter() {
        parent::beforeFilter();
        Configure::write('debug', 0);
        ini_set('memory_limit', '2048M');
        $this->layout = "vmreport";
        $this->layout = "vmreport";
    }
	
	function index(){
		
	}
    
    function serverinventory($fromTable = "global", $reportType = false ){
        $this->__search($fromTable, $reportType, 'serverinventory');
    }
    
    function extendedview($fromTable = "global", $reportType = false ){
        $this->__search($fromTable, $reportType, 'extendedview');
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
        if($searchName == 'serverinventory'){
            if($fromTable == "global"){
                $searchTablesArray = array("CmdbInventoryData", "RvtoolsVinfoData", "RvtoolsVhostData", "RvtoolsVclusterData", "RvtoolsVcpuData",
                                           "RvtoolsVmemoryData", "RvtoolsVdiskData", "RvtoolsVdatastoreData", "RvtoolsVhbaData",  "RvtoolsVmultipathData", 
                                           "RvtoolsVpartitionData", "RvtoolsVnetworkData", "RvtoolsVnickData", "RvtoolsVswitchData", "RvtoolsVportData", 
                                           "RvtoolsDvswitchData", "RvtoolsDvportData", "RvtoolsVcdData", "RvtoolsVfloppyData", "RvtoolsVhealthData", 
                                           "RvtoolsVrpData", "RvtoolsVscVmkData", "RvtoolsVsnapshotData", "RvtoolsVtoolsData","DatastoreArrayData"); 
            }elseif($fromTable == "Dvport"){
                $searchTablesArray = array("RvtoolsDvportData");
            }elseif($fromTable == "RVTools"){
                $searchTablesArray = array("RvtoolsServerData");
            }elseif($fromTable == "Dvport"){
                    $searchTablesArray = array("RvtoolsDvportData");
            }elseif($fromTable == "Dvswitch"){
                    $searchTablesArray = array("RvtoolsDvswitchData");
            }elseif($fromTable == "Vcd"){
                    $searchTablesArray = array("RvtoolsVcdData");
            }elseif($fromTable == "Vcluster"){
                    $searchTablesArray = array("RvtoolsVclusterData");
            }elseif($fromTable == "Vcpu"){
                    $searchTablesArray = array("RvtoolsVcpuData");
            }elseif($fromTable == "Vdatastore"){
                    $searchTablesArray = array("RvtoolsVdatastoreData");
            }elseif($fromTable == "Vdisk"){
                    $searchTablesArray = array("RvtoolsVdiskData");
            }elseif($fromTable == "Vfloppy"){
                    $searchTablesArray = array("RvtoolsVfloppyData");
            }elseif($fromTable == "Vhba"){
                    $searchTablesArray = array("RvtoolsVhbaData");
            }elseif($fromTable == "Vhealth"){
                    $searchTablesArray = array("RvtoolsVhealthData");
            }elseif($fromTable == "Vhost"){
                    $searchTablesArray = array("RvtoolsVhostData");
            }elseif($fromTable == "Vinfo"){
                    $searchTablesArray = array("RvtoolsVinfoData");
            }elseif($fromTable == "Vmemory"){
                    $searchTablesArray = array("RvtoolsVmemoryData");
            }elseif($fromTable == "Vmultipath"){
                    $searchTablesArray = array("RvtoolsVmultipathData");
            }elseif($fromTable == "Vnetwork"){
                    $searchTablesArray = array("RvtoolsVnetworkData");
            }elseif($fromTable == "Vnick"){
                    $searchTablesArray = array("RvtoolsVnickData");
            }elseif($fromTable == "Vpartition"){
                    $searchTablesArray = array("RvtoolsVpartitionData");
            }elseif($fromTable == "Vport"){
                    $searchTablesArray = array("RvtoolsVportData");
            }elseif($fromTable == "Vrp"){
                    $searchTablesArray = array("RvtoolsVrpData");
            }elseif($fromTable == "Vscvmk"){
                    $searchTablesArray = array("RvtoolsVscVmkData");
            }elseif($fromTable == "Vsnapshot"){
                    $searchTablesArray = array("RvtoolsVsnapshotData");
            }elseif($fromTable == "Vswitch"){
                    $searchTablesArray = array("RvtoolsVswitchData");
            }elseif($fromTable == "Vtools"){
                    $searchTablesArray = array("RvtoolsVtoolsData");
            }elseif($fromTable == "DatastoreArray"){
                    $searchTablesArray = array("DatastoreArrayData");
            }
            $searchTypes = array("CmdbInventoryData" => "cmdb",
                                "RvtoolsDvportData" => "Dvport",
                                "RvtoolsDvswitchData" => "Dvswitch",
                                "RvtoolsVcdData" => "Vcd",
                                "RvtoolsVclusterData" => "Vcluster",
                                "RvtoolsVcpuData" => "Vcpu",
                                "RvtoolsVdatastoreData" => "Vdatastore",
                                "RvtoolsVdiskData" => "Vdisk",
                                "RvtoolsVfloppyData" => "Vfloppy",
                                "RvtoolsVhbaData" => "Vhba",
                                "RvtoolsVhealthData" => "Vhealth",
                                "RvtoolsVhostData" => "Vhost",
                                "RvtoolsVinfoData" => "Vinfo",
                                "RvtoolsVmemoryData" => "Vmemory",
                                "RvtoolsVmultipathData" => "Vmultipath",
                                "RvtoolsVnetworkData" => "Vnetwork",
                                "RvtoolsVnickData" => "Vnick",
                                "RvtoolsVpartitionData" => "Vpartition",
                                "RvtoolsVportData" => "Vport",
                                "RvtoolsVrpData" => "Vrp",
                                "RvtoolsVscVmkData" => "Vscvmk",
                                "RvtoolsVsnapshotData" => "Vsnapshot",
                                "RvtoolsVswitchData" => "Vswitch",
                                "RvtoolsVtoolsData" => "Vtools",
								"DatastoreArrayData" => "DatastoreArray");
        }elseif($searchName == 'serverinventory'){
            if($fromTable == "global"){
                $searchTablesArray = array("CmdbInventoryData", "RvtoolsVinfoData", "RvtoolsVhostData"); 
            }elseif($fromTable == "Dvport"){
                $searchTablesArray = array("RvtoolsDvportData");
            }elseif($fromTable == "RVTools"){
                $searchTablesArray = array("RvtoolsServerData");
            }elseif($fromTable == "Dvport"){
                    $searchTablesArray = array("RvtoolsDvportData");
            }
            $searchTypes = array("RvtoolsDvportData" => "Dvport",
                                "RvtoolsDvswitchData" => "Dvswitch",
                                "RvtoolsVcdData" => "Vcd"
                                );
        }
        

        foreach($searchTablesArray as $key => $tableName) {
            
            if(isset($this->data) && !empty($this->data)){
                $this->loadModel($tableName);
                
                if($reportType == "vcenter"){
                    if((isset($this->data["Vmreports"]["vcentersearch"]) && $this->data["Vmreports"]["vcentersearch"])){
                        $fieldName = "VCENTER_NAME";
                        if($tableName == 'CmdbInventoryData'){
                            $fieldName = "Server_Name";
                        }
                        $searchString = $this->data["Vmreports"]["vcentersearch"];
                        if($this->$tableName->hasField($fieldName)){
                            $options = array("conditions" => array($tableName.".$fieldName like " => "$searchString%"));
                            if(!isset($this->data["Vmreports"]["export"])){
                                $options['limit'] = 100;
                            }
                            $results[$tableName] =  $this->$tableName->find("all", $options);
                        }elseif($fromTable == "global"){
                            unset($searchTablesArray[$key]);
                        }
                    }
                } elseif($reportType == "bulkvcenter"){
                    if((isset($this->data["Vmreports"]["bulkvcentersearch"]) && $this->data["Vmreports"]["bulkvcentersearch"])){
                        $searchArray = array();
                        $searchString = trim($this->data["Vmreports"]["bulkvcentersearch"]);
                        $searchArray = explode("\n", $this->data["Vmreports"]["bulkvcentersearch"]);
                        foreach($searchArray as $key => $value) {
                            $searchArray[$key] = trim($value);
                            if(!$searchArray[$key]){
                                unset($searchArray[$key]);
                            }
                        }
                        $fieldName = "VCENTER_NAME";
                        if($tableName == 'CmdbInventoryData'){
                            $fieldName = "Server_Name";
                        }
                        if($this->$tableName->hasField($fieldName)){
                            $options = array("conditions" => array($tableName.".$fieldName" => $searchArray));
                            if(!isset($this->data["Vmreports"]["export"])){
                                $options['limit'] = 100;
                            }
                            $results[$tableName] =  $this->$tableName->find("all", $options);
                        }elseif($fromTable == "global"){
                            unset($searchTablesArray[$key]);
                        }
                    }
                } elseif($reportType == "vmguest"){
                    if((isset($this->data["Vmreports"]["vmguestsearch"]) && $this->data["Vmreports"]["vmguestsearch"])){
                        $fieldName = "VM";
                        if($tableName == 'CmdbInventoryData'){
                            $fieldName = "Server_Name";
                        }
                        $searchString = $this->data["Vmreports"]["vmguestsearch"];
                        if($this->$tableName->hasField($fieldName)){
                            $options = array("conditions" => array($tableName.".$fieldName like " => "$searchString%"));
                            if(!isset($this->data["Vmreports"]["export"])){
                                $options['limit'] = 100;
                            }
                            $results[$tableName] =  $this->$tableName->find("all", $options);
                        }elseif($fromTable == "global"){
                            unset($searchTablesArray[$key]);
                        }
                    }
                } elseif($reportType == "bulkvmguest"){
                    if((isset($this->data["Vmreports"]["bulkvmguestsearch"]) && $this->data["Vmreports"]["bulkvmguestsearch"])){
                        $searchArray = array();
                        $searchString = trim($this->data["Vmreports"]["bulkvmguestsearch"]);
                        $searchArray = explode("\n", $this->data["Vmreports"]["bulkvmguestsearch"]);
                        foreach($searchArray as $key => $value) {
                            $searchArray[$key] = trim($value);
                            if(!$searchArray[$key]){
                                unset($searchArray[$key]);
                            }
                        }
                        $fieldName = "VM";
                        if($tableName == 'CmdbInventoryData'){
                            $fieldName = "Server_Name";
                        }
                        if($this->$tableName->hasField($fieldName)){
                            $options = array("conditions" => array($tableName.".$fieldName" => $searchArray));
                            if(!isset($this->data["Vmreports"]["export"])){
                                $options['limit'] = 100;
                            }
                            $results[$tableName] =  $this->$tableName->find("all", $options);
                        }elseif($fromTable == "global"){
                            unset($searchTablesArray[$key]);
                        }
                    }
                } elseif($reportType == "host"){
                    if((isset($this->data["Vmreports"]["hostsearch"]) && $this->data["Vmreports"]["hostsearch"])){
                        $fieldName = "HOST";
                        if($tableName == 'CmdbInventoryData'){
                            $fieldName = "Server_Name";
                        }
                        $searchString = $this->data["Vmreports"]["hostsearch"];
                        if($this->$tableName->hasField($fieldName)){
                            $options = array("conditions" => array($tableName.".$fieldName like " => "$searchString%"));
                            if(!isset($this->data["Vmreports"]["export"])){
                                $options['limit'] = 100;
                            }
                            $results[$tableName] =  $this->$tableName->find("all", $options);
                        }elseif($fromTable == "global"){
                            unset($searchTablesArray[$key]);
                        }
                    }
                } elseif($reportType == "bulkhost"){
                    if((isset($this->data["Vmreports"]["bulkhostsearch"]) && $this->data["Vmreports"]["bulkhostsearch"])){
                        $searchArray = array();
                        $searchString = trim($this->data["Vmreports"]["bulkhostsearch"]);
                        $searchArray = explode("\n", $this->data["Vmreports"]["bulkhostsearch"]);
                        foreach($searchArray as $key => $value) {
                            $searchArray[$key] = trim($value);
                            if(!$searchArray[$key]){
                                unset($searchArray[$key]);
                            }
                        }
                        $fieldName = "HOST";
                        if($tableName == 'CmdbInventoryData'){
                            $fieldName = "Server_Name";
                        }
                        if($this->$tableName->hasField($fieldName)){
                            $options = array("conditions" => array($tableName.".$fieldName" => $searchArray));
                            if(!isset($this->data["Vmreports"]["export"])){
                                $options['limit'] = 100;
                            }
                            $results[$tableName] =  $this->$tableName->find("all", $options);
                        }elseif($fromTable == "global"){
                            unset($searchTablesArray[$key]);
                        }
                    }
                } elseif($reportType == "os"){
                    if((isset($this->data["Vmreports"]["ossearch"]) && $this->data["Vmreports"]["ossearch"])){
                        $searchString = $this->data["Vmreports"]["ossearch"];
                        if($this->$tableName->hasField('Operating_System')){
                            $options = array("conditions" => array($tableName.".Operating_System like " => "$searchString%"));
                            if(!isset($this->data["Vmreports"]["export"])){
                                $options['limit'] = 100;
                            }
                            $results[$tableName] =  $this->$tableName->find("all", $options);
                        }elseif($fromTable == "global"){
                            unset($searchTablesArray[$key]);
                        }
                    }
                } elseif($reportType == "bulkos"){
                    if((isset($this->data["Vmreports"]["bulkossearch"]) && $this->data["Vmreports"]["bulkossearch"])){
                        $searchArray = array();
                        $searchString = trim($this->data["Vmreports"]["bulkossearch"]);
                        $searchArray = explode("\n", $this->data["Vmreports"]["bulkossearch"]);
                        foreach($searchArray as $key => $value) {
                            $searchArray[$key] = trim($value);
                            if(!$searchArray[$key]){
                                unset($searchArray[$key]);
                            }
                        }
                        if($this->$tableName->hasField('Operating_System')){
                            $options = array("conditions" => array($tableName.".Operating_System" => $searchArray));
                            if(!isset($this->data["Vmreports"]["export"])){
                                $options['limit'] = 100;
                            }
                            $results[$tableName] =  $this->$tableName->find("all", $options);
                        }elseif($fromTable == "global"){
                            unset($searchTablesArray[$key]);
                        }
                    
                    }
                } elseif($reportType == "app"){
                    if((isset($this->data["Vmreports"]["appsearch"]) && $this->data["Vmreports"]["appsearch"])){
                        $searchString = $this->data["Vmreports"]["appsearch"];
                        if($this->$tableName->hasField('Operating_System')){
                            $options = array("conditions" => array($tableName.".Operating_System like " => "$searchString%"));
                            if(!isset($this->data["Vmreports"]["export"])){
                                $options['limit'] = 100;
                            }
                            $results[$tableName] =  $this->$tableName->find("all", $options);
                        }elseif($fromTable == "global"){
                            unset($searchTablesArray[$key]);
                        }
                    }
                } elseif($reportType == "bulkapp"){
                    if((isset($this->data["Vmreports"]["bulkappsearch"]) && $this->data["Vmreports"]["bulkappsearch"])){
                        $searchArray = array();
                        $searchString = trim($this->data["Vmreports"]["bulkappsearch"]);
                        $searchArray = explode("\n", $this->data["Vmreports"]["bulkappsearch"]);
                        foreach($searchArray as $key => $value) {
                            $searchArray[$key] = trim($value);
                            if(!$searchArray[$key]){
                                unset($searchArray[$key]);
                            }
                        }
                        if($this->$tableName->hasField('Operating_System')){
                            $options = array("conditions" => array($tableName.".Operating_System" => $searchArray));
                            if(!isset($this->data["Vmreports"]["export"])){
                                $options['limit'] = 100;
                            }
                            $results[$tableName] =  $this->$tableName->find("all", $options);
                        }elseif($fromTable == "global"){
                            unset($searchTablesArray[$key]);
                        }
                    
                    }
                } elseif($reportType == "lcs"){
                    if((isset($this->data["Vmreports"]["lcssearch"]) && $this->data["Vmreports"]["lcssearch"])){
                        $searchString = $this->data["Vmreports"]["lcssearch"];
                        if($this->$tableName->hasField('Operating_System')){
                            $options = array("conditions" => array($tableName.".Operating_System like " => "$searchString%"));
                            if(!isset($this->data["Vmreports"]["export"])){
                                $options['limit'] = 100;
                            }
                            $results[$tableName] =  $this->$tableName->find("all", $options);
                        }elseif($fromTable == "global"){
                            unset($searchTablesArray[$key]);
                        }
                    }
                } elseif($reportType == "bulklcs"){
                    if((isset($this->data["Vmreports"]["bulklcssearch"]) && $this->data["Vmreports"]["bulklcssearch"])){
                        $searchArray = array();
                        $searchString = trim($this->data["Vmreports"]["bulklcssearch"]);
                        $searchArray = explode("\n", $this->data["Vmreports"]["bulklcssearch"]);
                        foreach($searchArray as $key => $value) {
                            $searchArray[$key] = trim($value);
                            if(!$searchArray[$key]){
                                unset($searchArray[$key]);
                            }
                        }
                        if($this->$tableName->hasField('Operating_System')){
                            $options = array("conditions" => array($tableName.".Operating_System" => $searchArray));
                            if(!isset($this->data["Vmreports"]["export"])){
                                $options['limit'] = 100;
                            }
                            $results[$tableName] =  $this->$tableName->find("all", $options);
                        }elseif($fromTable == "global"){
                            unset($searchTablesArray[$key]);
                        }
                    
                    }
                }
                $this->set("fromSearch", 1);
            }else{
                $this->set("fromSearch", 0);
            }
            if(isset($this->data["Vmreports"]["export"]) && $this->data["Vmreports"]["export"] == "export" && $searchString != ""){
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

    function comingsoon(){
        // echo "Coming soon";
        $this->set("referer", $_SERVER["HTTP_REFERER"]);     
    }
    
    function exportsheet($tableShortName = false){
        $this->autoRender = FALSE;
        $exportArray = array();
        
        ini_set('max_execution_time', 0);
        if($tableShortName == "Dvport"){
                $tableName = "RvtoolsDvportData";
            }elseif($tableShortName == "RVTools"){
                $tableName = "RvtoolsServerData";
            }elseif($tableShortName == "Dvport"){
                    $tableName = "RvtoolsDvportData";
            }elseif($tableShortName == "Dvswitch"){
                    $tableName = "RvtoolsDvswitchData";
            }elseif($tableShortName == "Vcd"){
                    $tableName = "RvtoolsVcdData";
            }elseif($tableShortName == "Vcluster"){
                    $tableName = "RvtoolsVclusterData";
            }elseif($tableShortName == "Vcpu"){
                    $tableName = "RvtoolsVcpuData";
            }elseif($tableShortName == "Vdatastore"){
                    $tableName = "RvtoolsVdatastoreData";
            }elseif($tableShortName == "Vdisk"){
                    $tableName = "RvtoolsVdiskData";
            }elseif($tableShortName == "Vfloppy"){
                    $tableName = "RvtoolsVfloppyData";
            }elseif($tableShortName == "Vhba"){
                    $tableName = "RvtoolsVhbaData";
            }elseif($tableShortName == "Vhealth"){
                    $tableName = "RvtoolsVhealthData";
            }elseif($tableShortName == "Vhost"){
                    $tableName = "RvtoolsVhostData";
            }elseif($tableShortName == "Vinfo"){
                    $tableName = "RvtoolsVinfoData";
            }elseif($tableShortName == "Vmemory"){
                    $tableName = "RvtoolsVmemoryData";
            }elseif($tableShortName == "Vmultipath"){
                    $tableName = "RvtoolsVmultipathData";
            }elseif($tableShortName == "Vnetwork"){
                    $tableName = "RvtoolsVnetworkData";
            }elseif($tableShortName == "Vnick"){
                    $tableName = "RvtoolsVnickData";
            }elseif($tableShortName == "Vpartition"){
                    $tableName = "RvtoolsVpartitionData";
            }elseif($tableShortName == "Vport"){
                    $tableName = "RvtoolsVportData";
            }elseif($tableShortName == "Vrp"){
                    $tableName = "RvtoolsVrpData";
            }elseif($tableShortName == "Vscvmk"){
                    $tableName = "RvtoolsVscVmkData";
            }elseif($tableShortName == "Vsnapshot"){
                    $tableName = "RvtoolsVsnapshotData";
            }elseif($tableShortName == "Vswitch"){
                    $tableName = "RvtoolsVswitchData";
            }elseif($tableShortName == "Vtools"){
                    $tableName = "RvtoolsVtoolsData";
            }elseif($tableShortName == "DatastoreArray"){
                    $tableName = "DatastoreArrayData";
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
    
}

?>