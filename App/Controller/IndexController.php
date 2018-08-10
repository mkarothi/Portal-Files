<?php
App::uses('AppController', 'Controller');
class IndexController extends AppController {
    
    function beforeFilter() {
        parent::beforeFilter();
        $this->layout = "default";
    }

    function home(){
        
    }
    
    function comingsoon(){
        // echo "Coming soon";
        $this->set("referer", $_SERVER["HTTP_REFERER"]);     
    }
    
    function contactus(){

        $emailSuccess = false;
        $emailSuccessMessage = "";
        if(isset($this->data) && !empty($this->data)){
            $username = $this->data['name'];
            $email = $this->data['email'];
            $phone = $this->data['phone'];
            $websiteURL = $this->data['websiteURL'];
            $message = $this->data['message'];
    
            $final_message = "Mr./Mrs.  $username (Phone Number : $phone) has an inquiry about portal for the page : $websiteURL \n \n $message \n"; 
            $to= 'SKarothi@dtcc.com';
            $subject = 'Portal Inquirty';
            $headers =  'CC: ' . $email . "\r\n";
                    'Reply-To: SKarothi@dtcc.com'. "\r\n"; 
                    'Mime-Version: 1.0' . "\r\n";
                    'Content-type: text/hotml; charset=iso-8859-1' . "\r\n";
                    'X-Mailer: PHP/' . phpversion();
            if(mail($to, $subject, $final_message, $headers)){
                $emailSuccessMessage = "Email Message sent successfully !";
            } else {
                $emailSuccess = false;
                $emailSuccessMessage = "Email Message sent Failed!. Please try again.";
            }
            $this->data = array();
        }

        $this->set("emailSuccessMessage", $emailSuccessMessage);

    }

    function survey(){
        
        $emailSuccess = false;
        
        $emailSuccessMessage = "";
        
        if(isset($this->data) && !empty($this->data)){
            $this->log("Survey submissions:");
            $this->log($this->data);
            
            $this->loadModel("SurveyData");
            
            $this->SurveyData->id = Null;
            if($this->SurveyData->save($this->data)){
                $emailSuccessMessage = "Details saved successfully.";
            }else{
                $emailSuccessMessage = "Details not saved. Something wrong";
            }          
            /* $username = $this->data['name'];
            $email = $this->data['email'];
            $phone = $this->data['phone'];
            $websiteURL = $this->data['websiteURL'];
            $message = $this->data['message'];
    
            $final_message = "Mr./Mrs.  $username (Phone Number : $phone) has an inquiry about portal for the page : $websiteURL \n \n $message \n"; 
            $to= 'SKarothi@dtcc.com';
            $subject = 'Portal Inquirty';
            $headers =  'CC: ' . $email . "\r\n";
                    'Reply-To: SKarothi@dtcc.com'. "\r\n"; 
                    'Mime-Version: 1.0' . "\r\n";
                    'Content-type: text/hotml; charset=iso-8859-1' . "\r\n";
                    'X-Mailer: PHP/' . phpversion();
            // if(mail($to, $subject, $final_message, $headers)){
                // $emailSuccessMessage = "Email Message sent successfully !";
            // } else {
               //  $emailSuccess = false;
               // $emailSuccessMessage = "Email Message sent Failed!. Please try again.";
            // }*/
            $this->data = array();
        }

        $this->set("emailSuccessMessage", $emailSuccessMessage);
        

    }
}