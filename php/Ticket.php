<?php
 class Ticket{
    public $fullname;
    public $email;
    public $hAddress;
    public $pName;
    public $wNumber;
    public $message;
    public $pcategory;
    public $fcategory;

    function __construct($fullname,$email,$hAddress,$pName,
                        $wNumber,$message,$pcategory,$fcategory)
                        {
                            $this->fullname=$fullname;
                            $this->email=$email;
                            $this->hAddress=$hAddress;
                            $this->pName=$pName;
                            $this->wNumber=$wNumber;
                            $this->message=$message;
                            $this->pcategory=$pcategory;
                            $this->fcategory=$fcategory;
                        }
                       
                       function getFullname(){return $this->fullname;}
                       function getEmail(){return $this->email;}
                    
                       function setFullname($name)
                       {$this->fullname=$name;}
    



   function logValues(){
        echo 'Teljes név:'.$this->fullname.' Email cím: '.$this->email.' STB';
    }

}

?>