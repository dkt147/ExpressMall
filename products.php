<?php
                   include 'db.php';      
                                  $query = "SELECT * FROM `store`";
                                  $res = mysqli_query($con, $query);
                                  if (mysqli_num_rows($res) > 0) {
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        $id = $row['id'];
                                  ?>

<section id="product1" class="section-p1">
        <h2><?php echo $row['name'];?></h2>
        <div class="pro-container" >
        <?php
                                  $query1 = "SELECT * FROM `product_category` where store_id = '$id'";
                                  $res1 = mysqli_query($con, $query1);
                                  if (mysqli_num_rows($res1) > 0) {
                                    while ($item = mysqli_fetch_assoc($res1)) {
                                  ?>
            <div class="pro" style="height:260px" onclick="location.href = 'shop.php?category=<?php echo $item['id']?>'">
                <img src="<?php echo "Panel/Admin/uploads/".$item['image'] ?? "img/products/f1.jpg"; ?>" alt="" height="200px">
                <div class="des" style="text-align: center">
                    <h4 style="height:50px;"><?php echo $item['name'] ?? "No Title"; ?></h4>
                    
                </div>
               
                </div>
                
            <?php
                    }
                }
            ?>

        </div>
    </section>

    <?php 
    
                                    }
                                }
    ?>