$(document).ready(function(){//qty up and down
    let $qty_up = $("#qty #qty-up");
    let $qty_down = $("#qty #qty-down");
    //let $deal_price = $("#deal-price");
    //let $input = $(".qty .qty_input");
    
    //click on qty-up btn
    $qty_up.click(function(e){
    
        /*let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);  
        let $price = $(`.product_price[data-id='${$(this).data("id")}']`);
    
        //to increase amount when user click on the up-btn( to increase product quantity ) --USING AJAX CALL
        $.ajax({url: "Template/ajax.php", type : 'post', data : { itemid : $(this).data("id")}, success: function(result){
            let obj = JSON.parse(result);
            let item_price = obj[0]['p_Price']; */
    
            if($input.val() >= 1 && $input.val() <= 9){
                $input.val(function(i, oldval){
                    return ++oldval;
                });
    
                // increase price of the product
                $price.text(parseInt(p_Price * $input.val()).toFixed(2));
    
                //set subtotal section
                let subtotal = parseInt($deal_price.text()) + parseInt(p_Price);
                $deal_price.text(subtotal.toFixed(2));
            }
        /*}}); //closing ajax request*/
    });
    
    
    //click on qty-down btn
    $qty_down.click(function(e){
        let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
        let $price = $(`.product_price[data-id='${$(this).data("id")}']`);
    
        //to increase amount when user click on the up-btn( to increase product quantity ) --USING AJAX CALL
        $.ajax({url: "Template/ajax.php", type : 'post', data : { itemid : $(this).data("id")}, success: function(result){
            let obj = JSON.parse(result);
            let item_price = obj[0]['item_price'];
    
            if($input.val() > 1 && $input.val() <= 10){
                $input.val(function(i,oldval){
                    return --oldval;
                });
    
                // increase price of the product
                $price.text(parseInt(item_price * $input.val()).toFixed(2));
    
                //set subtotal section
                let subtotal = parseInt($deal_price.text()) - parseInt(item_price);
                $deal_price.text(subtotal.toFixed(2));
            }
        }}); //closing ajax request
    });
    
    });