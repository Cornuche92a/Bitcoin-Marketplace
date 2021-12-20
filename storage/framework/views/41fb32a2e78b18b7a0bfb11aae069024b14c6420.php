
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/Login-Form-Clean.css">
    <!--###<link rel="stylesheet" href="../css/styles.css"> --->
</head>

<body style="background-color: rgb(21 32 43);">
<section class="login-clean" style="color: rgb(21,32,43);border-top-left-radius: 5px;border-top-right-radius: 5px;border-bottom-right-radius: 5px;border-bottom-left-radius: 5px;background: rgb(21,32,43);">
    <form method="post" style="background: rgb(21,32,52);border-top-left-radius: -97px;"><img src="./img/the-removebg-preview.png" style="width: 270px;height: 129.788px;">
        <h2 class="visually-hidden">Register Form</h2>
        <div class="illustration"></div>
        <div class="mb-3"><input class="form-control" type="text" name="user" placeholder="Username" style="background: rgb(21,32,52);text-align: center;filter: saturate(100%);border-bottom-color: rgb(223,231,241);color: rgb(80, 94, 108);"></div>
        <div class="mb-3"><input class="form-control" type="password" name="password" placeholder="Password" style="text-align: center;background: rgb(21,32,52);"></div>
        <div class="mb-3"><input class="form-control" type="password" name="password_confirm" placeholder="Password confirm" style="text-align: center;background: rgb(21,32,52);"></div>
        <select name="passrecovery" id="pet-select">
            <option value="passphrase">Secret passphrase</option>
            <option value="email">E-mail</option>
            <option value="pin">4 Digits pin</option>
        </select>
        <br>
        --CAPTCHA--
        <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit" style="background: rgb(21,32,70);">Register</button></div><a class="forgot" href="/" style="font-size: 13px;">Log In</a>
    </form>
</section>
<footer></footer>
<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
<?php /**PATH C:\laragon\www\project\resources\views/Register.blade.php ENDPATH**/ ?>