<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
session_start();
?>

<?php if (isset($_SESSION['checkExistedEmail'])): ?>
    User Name : <?php echo $_SESSION['userName']?>
    Forgot your password?'
    <a href="forgot-passWord.php">Yes</a>
    <a href="../index.php">No</a>
<?php endif; ?>
<?php if (!isset($_SESSION['checkExistedEmail'])): ?>
    User Name is empty!
    Are you sign up?
    <?php session_destroy() ?>
    <a href="registration.php">Yes</a>
    <a href="../index.php">No</a>
<?php endif; ?>
</body>
</html>