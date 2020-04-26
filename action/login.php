<?php
include '../class/MemberManager.php';

$memberManager = new MemberManager();
session_start();
$userName = $_POST['userName'];
$_SESSION['userName'] = $userName;
$passWord = $_POST['passWord'];

$dataArray = $memberManager->getDataJsonMember('../data/data.json');

foreach ($dataArray as $item ){
    if ($item->userName == $userName && $item->passWord = $passWord){
        $_SESSION['login'] = true;
        $_SESSION['name'] = $item->name;
        header('Location: ../view/home.php');
    }else{
        if ($item->userName == $userName){
            $_SESSION['checkExistedEmail'] = true;
        }
        header('Location: ../view/unsuccessful-login.php');
    }
}