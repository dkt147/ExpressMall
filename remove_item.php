<?php
          session_start();
          $id = $_GET['id'];

          if($id == 0){
            if(count($_SESSION["cart"]) == 1){
                unset($_SESSION["cart"]); 
            }else{
                unset($_SESSION["cart"][$id]);
            }
          }else{
            unset($_SESSION["cart"][$id]);
          }


          echo "<script>window.location.href='cart.php'</script>";
?>