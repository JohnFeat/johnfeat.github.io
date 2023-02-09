<!DOCTYPE html>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Arizona Tucson Universal</title>
  <link rel="stylesheet" href="css/styles.css">
 </head>
 <body>
  <div class = "header">Arizona Tucson Universal</div>
  <form action="auth.php">
  <div class="container">
    <div class = "title-form"><p>Регистрация</p></div>
    <div class = "main-form">
        <label for="email"><b>Почта</b></label>
        <input type="text" placeholder="Введите почту" name="email" required>

        <label for="psw"><b>Введите пароль</b></label>
        <input type="password" placeholder="Пароль" name="psw" required>

        <label for="psw-repeat"><b>Повторите пароль</b></label>
        <input type="password" placeholder="Повторите пароль" name="psw-repeat" required>
    </div>
    <hr>
    <button type="submit" class="registerbtn">Регистрация</button>
    <p>Уже имеете аккаунт? <a href="index.php">Войти</a>.</p>
  </div>
  <?php
    if ($_COOKIE['user'] == 'true'):
    header(" Location: /index.php");
    else:
  ?>
    <button class='registerbtn' href="index.php">Личный кабинет</button>
  <?php endif; ?>
  
    
  
</form>
 </body>
</html>