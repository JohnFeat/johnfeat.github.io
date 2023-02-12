<!DOCTYPE html>
  <html lang="en">
  <head>
  <meta charset="utf-8">
  <title>Arizona Tucson Universal</title>
  <link href="css/style.css" media="screen" rel="stylesheet">
  <link href= 'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
</head> 
<body>
  <?php 
    session_start();
    if(isset($_SESSION["email"])){
      header("location:index.php"); } else { session_destroy(); }
  ?>
  <div class="container mlogin">
    <div id="login">
      <h1>Вход</h1>
      <form action="checklogin.php">
      <p><label for="user_login">Имя попльзователя<br>
      <input class="input" id="username" name="nickname"size="20" type="text" value=""></label></p>
      <p><label for="user_pass">Пароль<br>
      <input class="input" id="password" name="password"size="20" type="password" value=""></label></p> 
      <?php
	      $client_id = 51549870; // ID приложения
	      $client_secret = 'qcK56lNwVz0SknH6VPey'; // Защищённый ключ
	      $redirect_uri = 'http://localhost/login.php'; // Адрес сайта
	      $url = 'http://oauth.vk.com/authorize'; // Ссылка для авторизации на стороне ВК

        $params = [ 
          'client_id' => $client_id, 
          'redirect_uri'  => $redirect_uri, 
          'response_type' => 'code', 
          'scope' => 'email',
        ]; // Массив данных, который нужно передать для ВК содержит ИД приложения код, ссылку для редиректа и запрос code для дальнейшей авторизации токеном
	      echo $link = '<p><a href="' . $url . '?' . urldecode(http_build_query($params)) . '">Аутентификация через ВКонтакте</a></p>';
        if (isset($_GET['code'])) {
          $result = true;
          $params = [
              'scope' => 'email',
              'client_id' => $client_id,
              'client_secret' => $client_secret,
              'code' => $_GET['code'],
              'redirect_uri' => $redirect_uri,
              
          ];
      
          $token = json_decode(file_get_contents('https://oauth.vk.com/access_token' . '?' . urldecode(http_build_query($params))), true);
          echo '<pre>';
          print_r($token);
          echo '</pre>';

          if (isset($token['access_token'])) {
              $params = [
                  'uids' => $token['user_id'],
                  'fields' => 'uid,first_name,last_name,screen_name,sex,bdate,photo_big',
                  'access_token' => $token['access_token'],
                  'v' => '5.131'];
                  
      
              $userInfo = json_decode(file_get_contents('https://api.vk.com/method/users.get' . '?' . urldecode(http_build_query($params))), true);
              if (isset($userInfo['response'][0]['id'])) {
                  $userInfo = $userInfo['response'][0];
                  $result = true;
              }
          }
      
          if ($result) {
              
              $conn = new mysqli("localhost", "root", "mysql", "datausers");  
              $sql1 = "SELECT * FROM users";
              $maxid = "SELECT MAX(id) FROM users"; 
              if($result = $conn->query($maxid)) {
                foreach($result as $row){
                  global $id;
                  $id = $row['MAX(id)'] + 1;
                  echo $id;
                }
              };
              
              if($result = $conn->query($sql1)){
                  foreach($result as $row){
                      $nnickname = $row['nickname'];
                      $npassword = $row['password'];
                  }
              }
              echo 2;
              $today = date("20y-m-d");
              $user_id = $token["user_id"];
              $checksql = "SELECT * FROM users WHERE vk_id='$user_id'";
              if($result = $conn->query($checksql)) { 
                foreach($result as $row){
                  $checking = $row['vk_id'];
                }
              }
              echo 3;
              if (isset($checking)) {
                session_start();
                global $_SESSION;
                $_SESSION['email']=$token['email'];
                $conn->close();
                header('Location: index.php');
              } else {
              $password = $token['access_token'];
              $email = $token['email'];
              echo $id, $email, $password, $today, $user_id; 
              
              $sql = "INSERT INTO users 
              ( id,   email,    password, adminstatus, lvladmin, nickname, data,     discord, activated, lgots, fraction, org,    rang, vk_id) VALUE 
              ($id, '$email', '$password', 'none',   '0',        'none', '$today', 'none',       '0',    '0',    'none', 'none',       '0', '$user_id')";
              if($conn->query($sql)){ 
                  session_start();
                  global $_SESSION;
                  $_SESSION['email']=$token['email'];
                  echo ("Регистрация прошла успешно");
                  
                  $conn->close(); 
                  header('Location: index.php');
                  
              } else { 
              echo "Ошибка" . $conn->error; } 
          }}
          $params = [
            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'code' => $_GET['code'],
            'redirect_uri' => $redirect_uri,
            'scope' => 'email'
        ];
      }
      ?>
      	<p class="submit"><input class="button" name="login"type= "submit" value="Log In"></p>
      	<p class="regtext">Еще не зарегистрированы?<a href= "reg.php">Регистрация</a>!</p>
      </form>
    </div>
  </div>
</body>
</html>