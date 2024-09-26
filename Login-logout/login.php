<?php 
        session_start();

        $name = $_POST['email'];
        $password = $_POST['password'];

        $u_name = "admin@p4n.in";
        $u_pwd = "admin";

        $_SESSION["name_session"] = $name;
        $_SESSION["password_session"] = $password;


        if($name == $u_name && $password ==$u_pwd){

            header("Location: Home.php");
            

        }else{
            
            header("Location: error.php");



        }



                        



?>