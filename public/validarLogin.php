<?php

session_start();

$connect = mysql_connect("localhost","root",PASSWORD("monografia"),"ipm_ale");

if(isset($_POST["user"]) && isset($_POST["password"])){
    $user = mysqli_real_escape_string($connect, $_POST["user"]);    
    $password = mysqli_real_escape_string($connect, $_POST["password"]);
    
    $sql = "SELECT Username FROM Usuario WHERE Username='$user' && Password=PASSWORD('$password')";
    $result = mysqli_query($connect, $sql);
    $num_row = mysqli_num_rows($result);
    if($num_row=="1"){
        $data = mysqli_fetch_array($result);
        $_SESSION["user"] = $data["user"];
        echo "1";
    }else{
        echo "error";        
    }
}else{
    echo "error";
}

?>
