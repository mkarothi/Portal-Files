<?php
App::uses('AppController', 'Controller');
class SmartsController extends AppController {
    
    //var $components = array('PhpExcel');
    // var $helpers = array('phpexcel');
    
    function beforeFilter() {
        parent::beforeFilter();
        $this->layout = "smarts";
    }
    
    function general($fromTable = "appowners", $reportType = "serverslist"){
        $this->layout = "smarts";
        $this->__search($fromTable, $reportType, 'smarts');
    }
    
    function migrationstatus($fromTable = "global", $reportType = false){
        $this->layout = "smarts";
        $this->__search($fromTable, $reportType, 'smarts');
    }
    
    function migrationreports($fromTable = "global", $reportType = false){
        $this->layout = "smarts";
        $this->__search($fromTable, $reportType, 'smarts');
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
        if($searchName == 'smarts'){
            $searchTablesArray = array("ServerAppOwnerData");
            $searchTypes = array("ServerAppOwnerData" => "appowners");
        }
        
        foreach($searchTablesArray as $tableName) {
            
            if(isset($this->data) && !empty($this->data)){
                $this->loadModel($tableName);
                if($reportType == "serverslist"){
                    //debug($this->data);
                    if((isset($this->data["Smarts"]["serverslist"]) && $this->data["Smarts"]["serverslist"])){
                        $searchArray = array();
                        $searchString = trim($this->data["Smarts"]["serverslist"]);
                        $searchArray = explode("\n", $this->data["Smarts"]["serverslist"]);
                        foreach($searchArray as $key => $value) {
                            $searchArray[$key] = trim($value);
                            if(!$searchArray[$key]){
                                unset($searchArray[$key]);
                            }
                        }
                        if($this->$tableName->hasField('Server')){
                            
                           $options['joins'] = array(
                                        array('table' => 'san_storage_billing_datas',
                                            'alias' => 'SanStorageBillingData',
                                            'type' => 'LEFT',
                                            'conditions' => array(
                                                'SanStorageBillingData.Server_Name = '.$tableName.'.Server'
                                            )
                                        ), array('table' => 'cmdb_server_datas',
                                            'alias' => 'CmdbServerData',
                                            'type' => 'LEFT',
                                            'conditions' => array(
                                                'CmdbServerData.Server_Name = '.$tableName.'.Server'
                                            )
                                        )
                                    );
                            $options["conditions"] = array($tableName.".Server" => $searchArray);
                            $options['fields'] = array('CmdbServerData.Server_Name', 'CmdbServerData.Server_LCS', 'CmdbServerData.Operating_System', 'CmdbServerData.GIU_Designation',
                                                       'SanStorageBillingData.Storage_Array_Name', 'SanStorageBillingData.Subscription_Company_Name', 'SanStorageBillingData.Arrya_Born_Date', 'SanStorageBillingData.Array_Life_Span', 'SanStorageBillingData.Data_Center',
                                                        $tableName . ".*");
                            if(!isset($this->data["Smarts"]["export"])){
                                $options['limit'] = 100;
                            }
                            $results[$tableName] =  $this->$tableName->find("all", $options);
                        }
                    }
                }
                
                $this->set("fromSearch", 1);
            }else{
                $this->set("fromSearch", 0);
            }
            
            $exportFlag = false;
            if(isset($this->data["Smarts"]["export"]) && $this->data["Smarts"]["export"] == "export") {
                $exportFlag = true;
            }
            
            if($exportFlag && $searchString != ""){
                $this->autoRender = FALSE;
                $rows= array();
                
                foreach($results[$tableName][0]['CmdbServerData'] as $fieldNames => $values){
                    $header[] = $fieldNames ;
                } 
                foreach($results[$tableName][0]['SanStorageBillingData'] as $fieldNames => $values){
                    $header[] = $fieldNames ;
                }
                foreach($results[$tableName][0][$tableName] as $fieldNames => $values){ 
                    $header[] = $fieldNames ;
                }
                
                $rows[] = $header;
                
                foreach($results[$tableName] as $result) {
                    $rowValues = array();
                    foreach($result['CmdbServerData'] as $fieldNames => $values){ 
                            $rowValues[] = $values; 
                    }
                    foreach($result['SanStorageBillingData'] as $values) { 
                            $rowValues[] = $values;   
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

    function migraterequest(){
        
        $this->layout = null;
        $usageResults = array();
        $saveSuccess = false;
        if(!empty($this->data)){
            $migrationId = $this->generateUniqueMigrationId();
            $this->loadModel("MigrationPlanData");
            $this->MigrationPlanData->id = null;
            $this->MigrationPlanData->id = $migrationId;
            //$this->MigrationPlanData->serverslist = $_REQUEST['serverslist'];
            //$this->MigrationPlanData->email_id = $_REQUEST['emails'];
            if($this->MigrationPlanData->save($this->data["Smarts"])){
                
                $saveSuccess = $migrationId;
            }
        }
        $this->set("saveSuccess", $saveSuccess);
        $this->set("serverslist", $_REQUEST['serverslist']);
        $this->set("emails", $_REQUEST['emails']);
    }
    
    function generateUniqueMigrationId(){
        $uniqueString = "MIG" . str_replace("/", "", trim($this->data["Smarts"]['start_date'])) . str_replace("/", "", trim($this->data["Smarts"]['end_date'])) . rand();   
    
        $this->loadModel('MigrationPlanData');
        
        $hasCreated = $this->MigrationPlanData->find('first', array("conditions" => array("migration_id" => $uniqueString) ) );
        
        if($hasCreated){
            $uniqueString = "MIG" . str_replace("/", "", trim($this->data["Smarts"]['start_date'])) . str_replace("/", "", trim($this->data["Smarts"]['end_date'])) . rand();
        }
        
        return $uniqueString;
    }

    function exportsheet($tableShortName = false){
        $this->autoRender = FALSE;
        $exportArray = array();
        
        ini_set('max_execution_time', 0);
        if($tableShortName == "appowner"){
            $tableName = "ServerAppOwnerData";
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