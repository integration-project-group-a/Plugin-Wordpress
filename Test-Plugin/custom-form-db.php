<?php
/**
 * Plugin Name:       Form Insert DB
 * Description:       Just Insert Data into Custom Form
 * Version:           1.0
 * Author:            EHB
 */

/**if($_POST['first_name'] && $_POST['last_name'] &&  $_POST['email'] && $_POST['password'] && $_POST['birth_day'] && $_POST['phonenumber'])**/
   function insert() {
	   insert_customdb($_POST['first_name'], $_POST['last_name'],  $_POST['email'],$_POST['password'],$_POST['birth_day'],$_POST['phonenumber'] );
   }

/**if(isset($_POST['submit']))
{
	insert_customdb($_POST['first_name'], $_POST['last_name'],  $_POST['email'],$_POST['password'],$_POST['birth_day'],$_POST['phonenumber'] );
}**/

include_once 'first_function.php';
function custom_form() {
    ?>
    <form action ="custom-form-db.php" method ="post">
        <label for name=""> First Name:</label><br>
        <input type = "text" name = "first_name" id = "first_name" placeholder = "Enter Name" value="<?php $_POST['first_name'] ?>">
        <label for name=""> Last Name:</label><br>
        <input type = "text" name = "last_name" id = "last_name" placeholder = "Enter Name" value="<?php $_POST['last_name'] ?>">
        <label for name=""> Password:</label><br>
        <input type = "password" name = "password" id = "password" placeholder = "Enter Password" value="<?php $_POST['password'] ?>">
        <label > Email:</label><br>
        <input type = "email" name = "email" id = "email"  placeholder = "Enter Email" value="<?php $_POST['email'] ?>">
        <label > phonenumber:</label><br>
        <input type = "text" name = "phonenumber" id = "phonenumber"  placeholder = "Enter phonenumber" value="<?php $_POST['phonenumber'] ?>">
        <label> Birthday</label><br>
        <input type = "date" name = "birth_day" id = "birth_day"  placeholder = "Enter Age" value="<?php $_POST['birth_day'] ?>">
        <input type = "submit" name = "submit" value = "submit">
    </form
    <?php
           if($_SERVER['REQUEST_METHOD']=='POST')
           {
               insert();
           }
}
add_shortcode('display', 'custom_form');
?>