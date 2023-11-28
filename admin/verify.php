<?php
    require("../php/db/connect.php");
    function getPassword($password){
        $driver = new Driver("monorail.proxy.rlwy.net:57822/railway", "railway", "root", "3de5e6b6b2Cc5bfCbHgF-2DG354A4GBa");
        $hash = sha1($password);
        $con = $driver->connect();
        $verify = false;
        if ($con){
            $sql = "SELECT * FROM user";
            $query = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($query)){
            $pass_db = $row["password"];
            if ($pass_db == $hash){
                $verify = true;
            }
        }
        }
        $con->close();
        return $verify;
    }
    function getCredetials(){
        $user = $_POST["user"];
        $pass = $_POST["pass"];
        $hash_user = md5($user);
        $hash_pass = sha1($pass);
        $driver = new Driver("localhost:3306", "kuudere", "root", "kuudereplay");
        $con = $driver->connect();
        $verify = false;
        echo "$hash_pass";
        if ($con){
            $sql = "SELECT * FROM user";
            $query = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($query)){
                $user_db = $row["user"];
                $pass_db = $row["password"];
                if ($user_db == $hash_user && $pass_db == $hash_pass){
                    $verify = true;
                    break;
                }
            }
        $con->close();
        return $verify;
        }
    }   
    
    
    if (!getCredetials()){
        echo "Inválido";
        header("Location:login.html?error=1");
        exit;
    } else {
        echo "Válido";
        header("Location:index.html");
        exit;
    }
?>