<?php

class Cart{
    public $db = null;

    public function __construct(dbController $db){
        if(!isset($db->con)) return null;
        $this->db = $db;
    }

    //insert into cart function
    public function InsertIntoCart($params = null, $table = "cart"){;
        if($this->db->con != null){
            if($params != null){
                //insert into cart(user_id) values(0)
                //get table columns
                $columns = implode(',',array_keys($params));
                $values = implode(',', array_values($params));

                //create sql query
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);

                //execute query
                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }

    //to get item_id and user_id and insert into cart
    public function addToCart($userid, $itemid){
        if(isset($userid) && isset($itemid)){
            $params = array(
                "u_Id" => $userid,
                "p_Id" => $itemid
            );

            //insert query
            $result = $this->InsertIntoCart($params);
            if($result){
                //reload page
                header("Location: ".$_SERVER['PHP_SELF']); 
            }              
        }
    }

    //delete item from cart
    //delete item from cart
    public function deleteCart($item_id = null, $table = 'cart'){
        if($item_id != null){
            $result = $this->db->con->query("DELETE FROM {$table} WHERE p_Id = {$item_id}");
            if($result){
                header("Location:".$_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

    public function getSum($arr){
        if(isset($arr)){
            $sum = 0;
            foreach($arr as $item){
                $sum += floatval($item[0]);
            }
            return sprintf('%.2f', $sum);
        }
    }

    //get card-id 
    public function getCartId($cartArray = null, $key = 'p_Id'){
        if($cartArray != null){
            $cart_id = array_map(function ($values) use($key){
                return $values[$key];
            }, $cartArray);
            return $cart_id;
        }
    }


    //save for later
    /*public function saveForLater($item_id = null, $saveTable = "wishlist", $fromTable = "cart"){
        if ($item_id != null){
            $query = "INSERT INTO {$saveTable} SELECT * FROM {$fromTable} WHERE item_id = {$item_id};";
            $query .= "DELETE FROM {$fromTable} WHERE item_id = {$item_id};";

            //execute multi query
            $result = $this->db->con->multi_query($query);
            if($result){
                header("LOCATION: " .$_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }*/


    //delete item from wishlist
    /*public function deleteWishlistItem($item_id = null, $table = 'wishlist'){
        if($item_id != null){
            $result = $this->db->con->query("DELETE FROM {$table} WHERE item_id = {$item_id}");
            if($result){
                header("Location:".$_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }*/
}

?>