<?php
include '../class/Member.php';
include '../class/MemberManager.php';

session_start();

$name = $_POST['name'];
$_SESSION['name'] = $name;
$email = $_POST['email'];
$_SESSION['email'] = $email;
$userName = $_POST['userName'];
$_SESSION['userName'] = $userName;
$passWord = $_POST['passWord'];
$_SESSION['passWord'] = $passWord;
$confirmPassWord = $_POST['confirmPassWord'];
$_SESSION['confirmPassWord'] = $confirmPassWord;
$birthDay = $_POST['birthDay'];
$_SESSION['birthDay'] = $birthDay;
$phone = $_POST['phone'];
$_SESSION['phone'] = $phone;
$gender = $_POST['gender'];
$_SESSION['gender'] = $gender;
$_SESSION['checkExistedEmail'] = false;

$memberManager = new MemberManager();
$dataArray = $memberManager->getDataJsonMember('../data/data.json');
$checkInfo = 0 ;
foreach ($dataArray as $item){
    if($item->userName == $userName){
        $_SESSION['userName'] = '';
        $_SESSION['checkExistedEmail'] = true;
        $checkInfo++;
    }
}
if (!$memberManager->checkName($name)){
    $_SESSION['name'] = '';
    $checkInfo++;
}
if (!$memberManager->checkEmail($email)){
    $_SESSION['email'] = '';
    $checkInfo++;
}
if (!$memberManager->checkUserName($userName)){
    $_SESSION['userName'] = '';
    $checkInfo++;
}
if (!$memberManager->checkPassWord($passWord)){
    $_SESSION['passWord'] = '';
    $checkInfo++;
}
if (!$memberManager->checkPhone($phone)){
    $_SESSION['phone'] = '';
    $checkInfo++;
}
if (!$memberManager->checkBirthDay($birthDay)){
    $_SESSION['birthDay'] = '';
    $checkInfo++;
}
if ($_SESSION[$passWord] != $_SESSION['confirmPassWord']){
    $_SESSION['confirmPassWord'] = '';
    $checkInfo++;
}
if ($checkInfo != 0){
    header('Location: ../view/registration.php');
}else{
    $_SESSION['login'] = true;
    $member = new Member();
    $member->getName();
    $member->getEmail();
    $member->getBirthDay();
    $member->getGender();
    $member->getPhone();
    $member->getUserName();
    $member->getPassWord();

    $memberManager->saveDataJson($member,'../data/data.json');
    header('Location: ../view/home.php');
}