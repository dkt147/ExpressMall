<?php

class dbController{
    protected $host = 'localhost';
    protected $user = 'root';
    protected $password = '';
    protected $database = 'ecom';

    // protected $host = 'localhost';
    // protected $user = 'u343233411_expressmall';
    // protected $password = 'expressmallStore2020@';
    // protected $database = 'u343233411_expressmall';

    //connection property
    public $conn = null;

    //call constructor
    public function __construct()
    {
        $this->con = mysqli_connect($this->host,$this->user,$this->password,$this->database);
        if($this->con->connect_error){
            echo "Fail".$this->con->connect_error;
        }
    }

    public function __destruct()
    {
        $this->closeConnection();
    }

    //function for closing conn
    protected function closeConnection(){
        if($this->con != null){
            $this->con->close();
            $this->con = null;
        }
    }
}

?>