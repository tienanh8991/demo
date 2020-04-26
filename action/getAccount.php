<?php
include '../class/MemberManager.php';
session_start();
$phone = $_POST['phone'];
$userName = $_POST['userName'];
$_SESSION['userName'] = '';
$memberManager = new MemberManager();
$_SESSION['dataArray'] = $memberManager->getDataJsonMember('..data/data.json');
foreach ($_SESSION['dataArray'] as $item){
    if ($item->phone == $phone && $item->userName == $userName){
        header('Location: ../view/new-passWord.php');
        break;
    }else{
        if ($item->userName == $userName){
            $_SESSION['userName'] = $userName;
            $_SESSION['phone'] = false;
        }
        header('Location: ../view/forgot-passWord');
    }
}