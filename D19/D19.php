<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if ($_POST['code'] === $_SESSION['code']){
        $message = "<p style='font-size: 48px;font-weight: bold;color: #008800'>成功</p>";
    }else{
        $message = "<p style='font-size: 48px;font-weight: bold;color: #880000'>失敗</p>";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form method="post">
    <?php echo $message ?? '' ?>
    <img src="">
    <input type="text" name="code">
    <button type="submit">送出</button>
</form>
<script>
    document.querySelector('img').src = 'D19-captcha.php';
</script>
</body>
</html>