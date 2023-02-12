<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Arizona Tucson Universal</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/php.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/event.js"></script>
    <script src="js/database.js"></script>
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-175660820-1"></script>
    <script src="https://kit.fontawesome.com/60018e6b49.js" crossorigin="anonymous"></script>
    <script>
        function showUser(str) {
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            }
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else { // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            }
            xmlhttp.open("GET", "getuser.php?q=" + str, true);
            xmlhttp.send();
        }
    </script>
</head>
<body>
    <p>q</p>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    
    
    <div class="main">

        <div class="site">
            <div class="menu">
                <div class='logo'><a href="index.php"><img class="img-logo" src="img/logo.png" alt=""></a></div>
                <div class="menu-user">
                    <a class="menu-user" href="#">
                        <img class="menu-settings" src="img/settings.png" alt="">
                        <?php
        session_start();
        if(!isset($_SESSION["nickname"])){
            header("location:login.php"); 
        }
        $conn = new mysqli("localhost", "root", "mysql", "datausers");
            if($conn->connect_error){
                echo ("Произошла неизвестная ошибка");
        } 
        $id = $_SESSION['nickname'];
        $sql = "SELECT * FROM users WHERE nickname='$id'";
        if($result = $conn->query($sql)){
            foreach($result as $row){
                global $userid, $nickname, $adminstatus, $lvladmin, $org, $rang, $discord, $data, $fraction, $lgots, $vk_id;
                $userid = $row["id"];
                $nickname = $row["nickname"];
                $adminstatus = $row["adminstatus"];
                $lvladmin = $row['lvladmin'];
                $org = $row['org'];
                $rang = $row['rang'];
                $discord = $row['discord'];
                $data = $row['data'];
                $fraction = $row['fraction'];
                $lgots = $row['lgots'];
                $vk_id = $row['vk_id'];
            }
        }
    
        $conn->close(); 
    ?>
                        <span><?php
                                echo $_SESSION['nickname']; 
                              ?><br><span style='font-size: 20px'><?php echo $adminstatus; ?></span></span>
                    </a>
                </div>
                <hr>
                
                <div class="btns-menu">
                    <button class="btn-menu" id="portfile" onclick="openTab(event, 'profile')"><i class="fa fa-user" aria-hidden="true"></i> <span>Личный кабинет</span></button>
                    <button class="btn-menu" onclick="openTab(event, 'gosleaders')"><i class="fa fa-user-tie"></i><span>Лидеры гос. структур</span></button>
                    <button class="btn-menu" onclick="openTab(event, 'nelleaders')"><i class="fa fa-user-secret"></i><span>Лидеры нелегальных стркутр</span></button>
                    <button class="btn-menu" onclick="openTab(event, 'deputygos')"><i class="fa fa-users-rectangle"></i><span>Заместители гос. структур</span></button>
                    <button class="btn-menu" onclick="openTab(event, 'deputynel')"><i class="fa fa-users-viewfinder"></i></i><span>Заместители нелегальных стркутр</span></button>
                    <button class="btn-menu" onclick="openTab(event, 'users')"><i class="fa fa-users"></i><span>Пользователи</span></button>
                    <button class="btn-menu" onclick="openTab(event, 'shop')"><i class="fa fa-shopping-cart"></i><span>Магазин</span></button>
                    <button class="btn-menu" onclick="openTab(event, 'history')"><i class="fa fa-user-shield"></i><span>Лог действий</span></button>
                    <button class="btn-menu" onclick="openTab(event, 'cmdlist')"><i class="fa fa-bars"></i><span>Список команд</span></button>
                    <button class="btn-menu" onclick="openTab(event, 'information')"><i class="fa fa-list"></i><span>Общая информация</span></button>
                </div>
                <hr>
                </a>
                <div class="search">
                <form action="search.php">
                    <a href="search.php">
                        <i class="fa fa-magnifying-glass"></i>
                    </a>
                    <input type="input" placeholder="Поиск" name="search"></input>
                </form>
                </div>
            </div>
            <a href="index.php">
            <div class="tab-content" id="gosleaders">
                <div class="head-line">Лидеры государственных структур</div>
                <div class="container">
                    <div class="leader-list">
                    <table border="0" style="margin: 0; padding: 10px; width: 100%" >
                    <th id="caption-table"><span>Список лидеров государественных структур</span></th>
                    </table>
                    <table border="1" style="margin: 0; padding: 10px; width: 100%" >
                    
                        <tr><th>Организация</th>     <th>Ник-нейм</th>             <th>Дата назначения</th>     <th>До срока</th>    <th>На посту</th>               <th>Предупреждения</th>             <th>Выговоры</th>               <th>Баллы</th>
                        <tr><td>Warlock MC</td>      <td>Leonid_Romanov</td>       <td>12.12.2012</td>          <td>0 дней</td>     <td>2174 дней</td>              <td>0/3</td>                        <td>0/3</td>                    <td>1900</td>                        
                        <tr><td>Warlock MC</td>      <td>Leonid_Romanov</td>       <td>12.12.2012</td>          <td>0 дней</td>     <td>2174 дней</td>              <td>0/3</td>                        <td>0/3</td>                    <td>1900</td>   
                        <tr><td>Warlock MC</td>      <td>Leonid_Romanov</td>       <td>12.12.2012</td>          <td>0 дней</td>     <td>2174 дней</td>              <td>0/3</td>                        <td>0/3</td>                    <td>1900</td>   
                        <tr><td>Warlock MC</td>      <td>Leonid_Romanov</td>       <td>12.12.2012</td>          <td>0 дней</td>     <td>2174 дней</td>              <td>0/3</td>                        <td>0/3</td>                    <td>1900</td>   
                        <tr><td>Warlock MC</td>      <td>Leonid_Romanov</td>       <td>12.12.2012</td>          <td>0 дней</td>     <td>2174 дней</td>              <td>0/3</td>                        <td>0/3</td>                    <td>1900</td>   
                        <tr><td>Warlock MC</td>      <td>Leonid_Romanov</td>       <td>12.12.2012</td>          <td>0 дней</td>     <td>2174 дней</td>              <td>0/3</td>                        <td>0/3</td>                    <td>1900</td>   
                        <tr><td>Warlock MC</td>      <td>Leonid_Romanov</td>       <td>12.12.2012</td>          <td>0 дней</td>     <td>2174 дней</td>              <td>0/3</td>                        <td>0/3</td>                    <td>1900</td>   
                        <tr><td>Warlock MC</td>      <td>Leonid_Romanov</td>       <td>12.12.2012</td>          <td>0 дней</td>     <td>2174 дней</td>              <td>0/3</td>                        <td>0/3</td>                    <td>1900</td>   
                        <tr><td>Warlock MC</td>      <td>Leonid_Romanov</td>       <td>12.12.2012</td>          <td>0 дней</td>     <td>2174 дней</td>              <td>0/3</td>                        <td>0/3</td>                    <td>1900</td>                       
                    </table>
                    </div>
                </div>
            </div>
            <div class="tab-content" id="nelleaders">
                <div class="head-line">Лидеры нелегальных стркутр</div>
                <div class="container">
                    <div class="leader-list">
                    <table border="0" style="margin: 0; padding: 10px; width: 100%" >
                    <th id="caption-table"><span>Список лидеров нелегальных структур</span></th>
                    </table>
                    <table border="1" style="margin: 0; padding: 10px; width: 100%" >
                    
                        <tr><th>Организация</th>     <th>Ник-нейм</th>             <th>Дата назначения</th>     <th>До срока</th>    <th>На посту</th>           <th>Предупреждения</th>         <th>Выговоры</th>           <th>Льготы</th>
                        <tr><td>Warlock MC</td>      <td>Leonid_Romanov</td>       <td>12.12.2012</td>          <td>0 дней</td>     <td>2174 дней</td>          <td>0/3</td>                    <td>0/5</td>                <td>1900</td>                        
                        <tr><td>Warlock MC</td>      <td>Leonid_Romanov</td>       <td>12.12.2012</td>          <td>0 дней</td>     <td>2174 дней</td>          <td>0/3</td>                    <td>0/5</td>                <td>1900</td>   
                        <tr><td>Warlock MC</td>      <td>Leonid_Romanov</td>       <td>12.12.2012</td>          <td>0 дней</td>     <td>2174 дней</td>          <td>0/3</td>                    <td>0/5</td>                <td>1900</td>   
                        <tr><td>Warlock MC</td>      <td>Leonid_Romanov</td>       <td>12.12.2012</td>          <td>0 дней</td>     <td>2174 дней</td>          <td>0/3</td>                    <td>0/5</td>                <td>1900</td>   
                        <tr><td>Warlock MC</td>      <td>Leonid_Romanov</td>       <td>12.12.2012</td>          <td>0 дней</td>     <td>2174 дней</td>          <td>0/3</td>                    <td>0/5</td>                <td>1900</td>   
                        <tr><td>Warlock MC</td>      <td>Leonid_Romanov</td>       <td>12.12.2012</td>          <td>0 дней</td>     <td>2174 дней</td>          <td>0/3</td>                    <td>0/5</td>                <td>1900</td>   
                        <tr><td>Warlock MC</td>      <td>Leonid_Romanov</td>       <td>12.12.2012</td>          <td>0 дней</td>     <td>2174 дней</td>          <td>0/3</td>                    <td>0/5</td>                <td>1900</td>   
                        <tr><td>Warlock MC</td>      <td>Leonid_Romanov</td>       <td>12.12.2012</td>          <td>0 дней</td>     <td>2174 дней</td>          <td>0/3</td>                    <td>0/5</td>                <td>1900</td>   
                        <tr><td>Warlock MC</td>      <td>Leonid_Romanov</td>       <td>12.12.2012</td>          <td>0 дней</td>     <td>2174 дней</td>          <td>0/3</td>                    <td>0/5</td>                <td>1900</td>                       
                    </table>
                    </div>
                </div>
            </div>
            <div class="tab-content" id="deputygos">
                <div class="head-line">Заместители государственных структур</div>
            </div>
            <div class="tab-content" id="deputynel">
                <div class="head-line">Заместители нелегальных стркутр</div>
            </div>
            <div class="tab-content" id="users">
                <div class="head-line">Пользователи</div>
                <div class="container">
                    <div class="leader-list">
                    <th id="caption-table"><span>Список пользователей сайта Arizona Tucson Universal</span></th>
                    </table>
                    <table border="1" style="margin: 0; padding: 10px; width: 100%" >
                    
                        <tr><th>Ник-нейм</th>             <th>Стаутс</th>
                        <?php 
                            $conn = new mysqli("localhost", "root", "mysql", "datausers");
                            if($conn->connect_error){
                                    echo ("Произошла неизвестная ошибка");
                            } 
                            $sql = "SELECT * FROM users WHERE nickname='$id'";
                            if($result = $conn->query($sql)){
                                foreach($result as $row){
                                
                        ?><tr><td> <?php echo $row['nickname'] ?> </td> <td><?php echo $row['adminstatus'] ?>            
                        <?php        }
                            }

                        ?>                                                  
                    </table>
                    </div>
                </div>
            </div>
            <div class="tab-content" id="shop">
                <div class="head-line">Магазин</div>
            </div>
            <div id="profile" class="tab-content">
                <div class="head-line"><p>Личный кабинет</p></div>
                <hr>
                <div class='head-btn'>
                    <div class="profiles-btn">
                        <a href='<?php echo $vk_id ?>'><button class="profile-btn" id="vk-btn"><i class="fa-brands fa-vk"></i> ВКонтакте</button></a>
                        <button class="profile-btn" id="kick"><i class="fa fa-close" aria-hidden="true"></i> Снять</button>
                        <a href="#change-user"><button class="profile-btn" id="change-profile"><i class="fa fa-code" aria-hidden="true"></i> Изменить</button></a>
                        <a href="#activate-user"><button class="profile-btn" id="activate"><i class="fa fa-check" aria-hidden="true"></i> Актвировать аккаунт</button></a>
                    </div>
                </div>
                <div class="profile">
                    
                    <div class=head>
                        <div class="main-info">
                            <div class="nickname"><center><img class="settings" src="img/settings.png" alt=""></center><?php echo $nickname; ?><hr><div class="user-status"><?php echo $adminstatus; ?></div></div>
                        </div>
                    </div>

                    <hr>
                    <div class="info">
                        <div class="user-content">
                            <div class="stats">
                                <div class="user-info">
                                
                                    <span>Информация об аккаунте <?php echo $nickname; ?></span>
                                    <hr>
                                    <span>Ник-нейм: <?php echo $nickname; ?></span>
                                    <span>Фракция: <?php echo $fraction; ?></span>
                                    <span>Организация: <?php echo $org; ?></span>
                                    <span>Ранг: <?php echo $rang; ?></span>
                                    <span>ВКонтакте: <?php echo $vk_id; ?></span>
                                    <span>Discord: <?php echo $discord; ?></span>
                                    <span>Дата назначения: <?php echo $data; ?></span>
                                    <span>Льготы: <?php echo $lgots ?></span>
                                    <span>Уровень доступа: <?php echo $lvladmin ?></span>
                                    <span>Статус: <?php echo $adminstatus ?></span>

                                </div>

                            </div>

                        </div>
                        <div class="loginfo">

                            <button class="btn-collapse" data-toggle="collapse" data-target="#logs" aria-expanded="false" aria-controls="logs">Логи</button>
                            <div class="collapse" id="logs">
                                <span>2023-12-12 22:03:24 Leonid_Romanov установил Leonid_Romanov уровень доступа: 10</span>
                                <span>2023-12-12 22:03:24 Leonid_Romanov установил Leonid_Romanov уровень доступа: 10</span>
                                <span>2023-12-12 22:03:24 Leonid_Romanov установил Leonid_Romanov уровень доступа: 10</span>
                                <span>2023-12-12 22:03:24 Leonid_Romanov установил Leonid_Romanov уровень доступа: 10</span>
                                <span>2023-12-12 22:03:24 Leonid_Romanov установил Leonid_Romanov уровень доступа: 10</span>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div id="change-user">
                <div class="change-menu">
                    <span>Изменение аккаунта: Leonid_Romanov</span>
                    <form action="savechanges.php">
                        <input name="nickname" type="input" placeholder="Ник-нейм" required value="<?php echo $nickname ?>"></input>
                        <input name="fraction" type="input" placeholder="Фракция" required value="<?php echo $fraction ?>"></input>
                        <input name="org" type="input" placeholder="Организация" required value="<?php echo $org ?>"></input>
                        <input name="rang" type="input" placeholder="Ранг" required value="<?php echo $rang ?>"></input>
                        <input name="discord" type="input" placeholder="Discord" required value="<?php echo $discord ?>"></input>
                        <input name="data" type="input" placeholder="Дата назначенеия" required value="<?php echo $data ?>"></input>
                        <input name="lgots" type="input" placeholder="Льготы" required value="<?php echo $lgots ?>"></input>
                        <input name="userstatus" type="input" placeholder="Статус" required value="<?php echo $adminstatus ?>"></input>
                        <input name="vk_id" type="input" placeholder="Статус" required value="<?php echo $vk_id ?>"></input>
                        <hr>
                        <div id="buttons">
                        
                        <a href="savechanges.php"><button id="close-page"><i class = "fa fa-pencil"></i> Сохранить</button></a>
                    </form>
                    
                    </div>
                    <a href="#"><button id="close-page"><i class = "fa fa-close"></i> Закрыть</button></a>
                </div>

            </div>
            <div id="activate-user">
                <div id="activate-menu">
                    <span>Активация аккаунта</span>
                    <form action="activation.php">
                        <input name="nickname"      type="input" placeholder="Ник-нейм"                 required>
                        <input name="fraction"      type="input" placeholder="Фракция"                  required>
                        <input name="org"           type="input" placeholder="Организация"              required>
                        <input name="rang"          type="input" placeholder="Ранг"                     required>
                        <input name="discord"       type="input" placeholder="Discord"                  required>
                        <input name="data"          type="input" placeholder="Дата назначенеия"         required>
                        <input name="userstatus"    type="input" placeholder="Статус"                   required>
                        <input name="vk_id"         type="input" placeholder="ВКонтакте"                required>
                        <hr>
                        <div id="buttons">
                        <a href="activation.php"><button id="close-page"><i class = "fa fa-pencil"></i> Сохранить</button></a>
                        </div>
                    </form>
                    <a href="#"><button id="close-page"><i class = "fa fa-close"></i> Закрыть</button></a>
                </div>
            </div>
           
        </div>
        
</body>
</html>