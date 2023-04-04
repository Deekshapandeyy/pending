<?php
session_start();
?>
<div id="cart">
    <table id="tableCart">
        <thead>
            <tr>
                <th class="tcart">Product Image</th>
                <th class="tcart">Product Name</th>
                <th class="tcart">Product Quantity</th>
                <th class="tcart">Product Price</th>
                <th class="tcart">Remove</th>
            </tr>
        </thead>
        <tbody id="tbodyCart">
            <?php
            
            include_once "displaycart.php";
            
            
            if (isset($_POST['add'])) {
                $val = $_POST['submitvalue'];
                $index = 0;
                $ind = 0;
                $name;
                foreach ($_SESSION['products'] as $key => $value) {
                    if ($ind == $val) {
                        $name = $_SESSION['products'][$key]['name'];
                    }
                    $ind++;
                }	
                $flag=0;
     foreach($_SESSION['cart'] as $key =>$value) 
     {
        if($_SESSION['cart'][$key]['pname']==$name)
        {
            $_SESSION['cart'][$key]['pprice']+=($_SESSION['cart'][$key]['pprice']/$_SESSION['cart'][$key]['pquantity']);
            $_SESSION['cart'][$key]['pquantity'] += 1;
            $flag = 1;

            include_once "displaycart.php";
        }
    }
    if($flag==0)
    {
        foreach ($_SESSION['products'] as $key => $value) {
            if($index==$val)
        {
            array_push(
                $_SESSION['cart'],
                array(
                    'pimg' => $_SESSION['products'][$key]['image'],
                    'pname' => $_SESSION['products'][$key]['name'],
                    'pquantity' => 1,
                    'pprice' => $_SESSION['products'][$key]['price']
                )
                );
                $index++;
            }
            include_once "displaycart.php";
        }
     }      
    }
        
     if(isset($_POST['remove']))
     {
        $val=$_POST['submitvalue'];
        $i=0;
        $name_p;
        foreach($_SESSION['cart']as $key=>$value)
        {
            if($i==$val)
        {
            $name_p=$_SESSION['cart'][$key]['pname'];
        }   
        $i++;
         }
         foreach ($_SESSION['cart'] as $key => $value) {
            if ($_SESSION['cart'][$key]['pname'] == $name_p) {
                unset($_SESSION['cart'][$key]);
            }
        }
        include_once "displaycart.php";
     }
     ?>
         </tbody>
    </table>