<?php 


// methods 

// basic

function info(){

    echo("welcome to codes with pankaj");


}

// calling function

info();
info();

// function with arg....
function result($price,$gst){

    $gst_amount = ($price*$gst)/100;
    $final_price = $gst_amount+$price;

    echo("<h1> GST :".$gst."</h1>");
    echo("<h1> Price : ".$price."</h1>");
    echo("<h1> GST Amount ".$gst_amount."</h1>");
    echo("<h1> Final Price : ".$final_price."</h1>");

}


result(1200,18);


# return type 

function tax(){
    return 1200;
}



// return type with arg...

function bill($price,$gst){

    $gst_amount = ($price*$gst)/100;
    $final_price = $gst_amount+$price;

    return $final_price;

}


?>


<h1>

    <?php echo("Tax : ".tax()); ?>
</h1>

<h1>

    <?php echo("MRP : ".bill(4500,9)); ?>
</h1>
