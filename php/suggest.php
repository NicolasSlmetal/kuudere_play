<?php
    $name = $_POST["name"];
    $email = $_POST["email"];
    $suggest = $_POST["suggest"];
    if ($name == "" || $email == "" || $suggest == "") {
        header("Location:../about.html?error=1");
        exit;
    }
    $message = "Nome: $name\nEmail:$email\nSugestão:$suggest";
    mail("limabritopro@gmail.com", "Sugestão", $message);
    //header("Location: thanks.html");
?>