<?php
session_start();
?>
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
<form action="../action/getAccount.php" method="post">
    User Name :
    <input type="text" name="userName" value="<?php echo $_SESSION['userName'];?>">
    <?php
    if ($_SESSION['userName'] == ''){
        echo 'Email is Empty';
    }
    ?>
    Phone Number :
    <input type="number" name="phone">
    <?php
    if (isset($_SESSION['phone'])){
        echo 'Fail!';
    }
    ?>
    <br>
    <button type="submit">OK</button>
</form>
</body>
</html>
