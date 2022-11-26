<?php

//use to fetch product data
class Product{
    public $db = null;

    public function __construct(dbController $db){
        if(!isset($db->con)) return null;
        $this->db = $db;
    }

    //fetch product data from getData Method
    public function getData($table = 'products'){
        
        $result = $this->db->con->query( "SELECT * FROM {$table}");

        $resultArray = array();

        //fetch product data one by one
        while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    public function getCart(){
        
        $result = $this->db->con->query( "SELECT * FROM cart where is_confirm = 0");

        $resultArray = array();

        //fetch product data one by one
        while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }

        return $resultArray;
    }


    //fetch product data of first 7 rows from getFeaturedProduct Method
    public function getFeaturedProduct($item_id){
        $table = 'products';
        if(isset($item_id)){
            $result = $this->db->con->query("SELECT * FROM {$table} ORDER BY p_Id = {$item_id} LIMIT 5");

            $resultArray = array();

            //fetch products one by one
            while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }

            return $resultArray;
        }
    }

    //get newArrivals by date
    public function getNewArrivals($item_id){
        $table = 'products';
        if(isset($item_id)){
            $result = $this->db->con->query("SELECT * FROM {$table} WHERE p_RegisteredOn > NOW()- INTERVAL 5 day");

            $resultArray = array();

            //fetch products one by one
            while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }

            return $resultArray;
        }
    }

    //get product by id
    public function getProduct($item_id){
        $table = 'products';
        if(isset($item_id)){
            $result = $this->db->con->query("SELECT * FROM {$table} WHERE p_Id = {$item_id}");

            $resultArray = array();

            //fetch products one by one
            while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }

            return $resultArray;
        }
    }

}
