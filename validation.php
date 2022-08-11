<?php
    class Validation
    {
        var $message;
        
        
        function Name($val)
        {
            if(preg_match('%^[A-Z a-z0-9 -]{4,20}$%',stripslashes(trim($val))))
                return true;
            else
                $this->message="Please write a valid username";
        }
        function HospitalName($val)
        {
            if(preg_match('%^[A-Z a-z0-9 -.]{5,200}$%',stripslashes(trim($val))))
                return true;
            else
                $this->message="Please write a valid Hospital Name";
        }
        function departmentName($val)
        {
            if(preg_match('%^[A-Z a-z0-9 -.]{3,200}$%',stripslashes(trim($val))))
                return true;
            else
                $this->message="Please write a valid Hospital Name";
        }
         function email($val)
         {
           	if(filter_var($val, FILTER_VALIDATE_EMAIL) == true){
                        return $val;
               }else{
                   $this->message = "Please write a valid Email address";
               }	                
           }
        function Isfloat($val)
        { 
                if(filter_var($val, FILTER_VALIDATE_FLOAT)==true)
                {
                    return $val;
                }
                else
                {
                    $this->message = "Please write a valid number like 0.0,1.1,1.2";
                }
        }
        function IsNumaric($val)
        {
                if(preg_match('%^[0-9.]{10,14}$%', stripslashes(trim($val))))
                {
                    return $val;
                }
                else
                {
                    $this->message = "Please write a valid phone number";
                }
        }
         function IsNumber($val)
        {
                if(preg_match('%^[0-9.]{1,10}$%', stripslashes(trim($val))))
                {
                    return $val;
                }
                else
                {
                    $this->message = "Please write a valid phone number";
                }
        }
        function threshold($val)
        {
                if(preg_match('%^[0-9.]{1,14}$%', stripslashes(trim($val))))
                {
                    return $val;
                }
                else
                {
                    $this->message = "Please write a valid phone number";
                }
        }
      
      
        function passWord($val)
        {
            if(preg_match('%^[A-Z a-z0-9 @/$/\/_)?(]{6,20}$%', stripslashes(trim($val))))
            {
                return true;
            }	
            else
            {
                $this->message = "Please write a valid Password";
            }
        }
        function validatepdf($pdf_filetype,$size)
        {
            $maxSize=40*1024*1024; //4 mb
            $filemsg=
            '';
            if ($pdf_filetype != "application/pdf")
            {
                return  false;
            } 
            else if ($size > $maxSize) {
                 return false;
            } 
            else { return true; }
        }
        function uploadepdf($file,$id,$qId)
        {
            $menuName = "file_".$id.'_'.$qId.".pdf";
             $pdfPath = "uploads/";
             $result = move_uploaded_file($file, $pdfPath . $menuName);
              if ($result == 1) 
                return $pdfPath.$menuName;
             else 
               return false;
        }
        function validateImage($ImageName)
        {
            $allowedExts = array("jpg", "jpeg", "png","PNG","JPG","JPEG");
            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt = str_replace('.','',$ImageExt);
            if(!in_array($ImageExt, $allowedExts))
            {
                return false;
            }
          
            else
            {
                return true;
            }
        }
        function uploadeImage($imgtmp,$sourcepath,$targetDIR,$id,$qId)
        {
            
            $menuName = "file_".$id.'_'.$qId.".jpeg";
                if(move_uploaded_file($sourcepath,$targetDIR .$menuName))
                  return true;
                    return false;   
        }

        function validatePPT($pptname)
        {
            $allowedExts = array("pptx", "pptm","ppt");
            $ImageExt = substr($pptname, strrpos($pptname, '.'));
            $ImageExt = str_replace('.','',$ImageExt);
            if(!in_array($ImageExt, $allowedExts))
            {
                return false;
            }
          
            else
            {
                return true;
            }
        }


        function uploadeppt($file,$id,$qId)
        {
            $menuName = "ppt_".$id.'_'.$qId.'.pptx';
             $pdfPath = "uploads/";
             $result = move_uploaded_file($file, $pdfPath . $menuName);
              if ($result == 1) 
                return true;
             else 
               return false;
        }
    }
    
 ?>