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
    <?php
        session_start();
        global $_SESSION;
        if (!isset($_SESSION['email'])) {
            header('Location: "login.php"');
        }
        $conn = new mysqli("localhost", "root", "mysql", "datausers");
            if($conn->connect_error){
                echo ("Произошла неизвестная ошибка");
        } 
        $id = $_SESSION['email'];
        $sql = "SELECT * FROM users WHERE email='$id'";
        if($result = $conn->query($sql)){
            foreach($result as $row){
                global $userid, $nickname, $adminstatus, $lvladmin, $org, $rang, $discord, $data, $fraction, $lgots, $vk_id, $type;
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
                $type = $row['activated'];
            }
        }
        $mycolor = "SELECT * FROM colorstyle WHERE lvladmin=$lvladmin";
        if($result = $conn->query($mycolor)){
            foreach($result as $row){
                global $shadow, $color;
                foreach($result as $row){
                    $shadow = $row['shadow'];
                    $color = $row['color'];
                    $bgcol = $row['bgcol'];
                }
            }
        }
        $conn->close(); 
    ?>
        <div class="site">
            <div class="menu">
                <div class='logo'><a href="index.php"><img class="img-logo" src="img/logo.png" alt=""></a></div>
                <div class="menu-user">
                    <a class="menu-user" href="#">
                    <?php if($type == 0) {} else {?>
                        <img class="menu-settings" src="img/settings.png" alt="">
                        
                            <span style="color: <?php echo $color?>; text-shadow: <?php echo $shadow ?>">
                                <?php echo $nickname; ?><br>
                            <span style='font-size: 20px; color: <?php echo $color?>; shadow: <?php echo $shadow ?>'>
                                <?php echo $adminstatus; ?><br> 
                            <?php } ?>
                                <?php if ($type == 0) {?><span style="color: red; font-size: 30px; text-shadow: 0px 0px 0px"><center>Не активирован</center></span> <?php } else {?>
                                <?php } ?>
                            
                    </a>
                </div>
                <hr>
                <div class="btns-menu">
                    <button class="btn-menu" id="portfile" onclick="openTab(event, 'profile')"><i class="fa fa-user" aria-hidden="true"></i> <span>Личный кабинет</span></button>
                    <?php if ($type==0) {  ?> <center><span style="color: white; font-size: 15px;">Доступ к остальным функциям будет доступен при активации аккаунта.</span> </center><hr>
                    <?php }  else { ?> 
                        <button class="btn-menu" onclick="openTab(event, 'gosleaders')"><i class="fa fa-user-tie"></i><span>Лидеры гос. структур</span></button>
                        <button class="btn-menu" onclick="openTab(event, 'nelleaders')"><i class="fa fa-user-secret"></i><span>Лидеры нелегальных стркутр</span></button>
                        <button class="btn-menu" onclick="openTab(event, 'deputygos')"><i class="fa fa-users-rectangle"></i><span>Заместители гос. структур</span></button>
                        <button class="btn-menu" onclick="openTab(event, 'deputynel')"><i class="fa fa-users-viewfinder"></i></i><span>Заместители нелегальных стркутр</span></button>
                        <button class="btn-menu" onclick="openTab(event, 'users')"><i class="fa fa-users"></i><span>Пользователи</span></button>
                        <button class="btn-menu" onclick="openTab(event, 'shop')"><i class="fa fa-shopping-cart"></i><span>Магазин</span></button>
                        <button class="btn-menu" onclick="openTab(event, 'history')"><i class="fa fa-user-shield"></i><span>Лог действий</span></button>
                        <button class="btn-menu" onclick="openTab(event, 'cmdlist')"><i class="fa fa-bars"></i><span>Список команд</span></button>
                        <button class="btn-menu" onclick="openTab(event, 'information')"><i class="fa fa-list"></i><span>Общая информация</span></button>
                        <button class="btn-menu" onclick="openTab(event, 'unactive-users'"><i class=""></i></button>
                    <?php } ?>
                    
                    <a href="quit.php"><button class="btn-menu"><span>Выйти из аккаунта</span></button></a>
                </div>
                <hr>
                <?php if ($type == 0) { } else {?>
                <div class="search">
                    <form action="search.php">
                        <a href="search.php">
                            <i class="fa fa-magnifying-glass"></i>
                        </a>
                        <input type="input" placeholder="Поиск" name="search"></input>
                    </form>
                </div>
                <?php } ?>
            </div>
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
                <?php if ($type==0) { } else {?>
                <div class='head-btn'>
                    <div class="profiles-btn">
                        <a href='<?php echo $vk_id ?>'><button class="profile-btn" id="vk-btn"><i class="fa-brands fa-vk"></i> ВКонтакте</button></a>
                        <button class="profile-btn" id="kick"><i class="fa fa-close" aria-hidden="true"></i> Снять</button>
                        <a href="#change-user"><button class="profile-btn" id="change-profile"><i class="fa fa-code" aria-hidden="true"></i> Изменить</button></a>
                        <a href="#activate-user"><button class="profile-btn" id="activate"><i class="fa fa-check" aria-hidden="true"></i> Актвировать аккаунт</button></a>
                    </div>
                </div>
                <?php } ?>
                <div class="profile">
                    <?php if ($type==0) { } else {?>
                    <div class=head>
                        <div class="main-info">
                            <div class="nickname" style="color: <?php echo $color?>; text-shadow: <?php echo $shadow ?>"><center><img class="settings" src="img/settings.png" alt=""></center><?php echo $nickname; ?><hr><div class="user-status" style="background-color: <?php echo $bgcol?>"><?php echo $adminstatus; ?></div></div>
                        </div>
                    </div>
                    <?php } ?>
                    <hr>
                    <div class="info">
                        <div class="user-content">
                            <div class="stats">
                                <div class="user-info">
                                    <?php if ($type == 0) { ?>
                                    <center><span style="color: red; font-size: 25px">Аккаунт не активирован, чтобы активировать, заполните форму ниже</span></center>
                                    <br>
                                    <div style="display:flex; flex-wrap:wrap;">
                                    <form action="sendtoactivate.php">
                                    <table class="form-activation" border="1" style="margin-bottom: 10px; padding: 0; width: 100%" >
                                        <tr><td>Ваш игровой ник-нейм                </td>      <td><input class="form-input" type="input" name="nickname"></input></td> 
                                        <tr><td>Ваша фракция                        </td>      <td><select name="fraction"><option disabled>Выберите фракцию</option><option>Государственная структура</option><option >Улчиные группировки</option><option>Преступные синдикаты</option></select></td>
                                        <tr><td>Ваша организация                    </td>      <td><select name="org"><option disabled>Выберите организацию</option><option >Warlock MC</option><option>Russian Mafa</option><option>Yakuza</option><option>La Cosa Nostra</option>
                                        <tr><td>Ваш ранг                            </td>      <td><select name="rang"><option>Следящий</option><option>Лидер</option><option>Заместитель</option></select>
                                        <tr><td>Дата назначения                     </td>      <td><input class="form-input" type="input" name="data" placeholder="ДД.ММ.ГГ" value="<?php echo date('d.m.20y')?>"></input></td>
                                        <tr><td>Ваш ID Discord (цифровое значение)  </td>      <td><input class="form-input" type="input" name="discord" placeholder="1234567890"></input></td>
                                        <tr><td>Ваш ВКонтакте (идентификатор)       </td>      <td><input class="form-input" type="input" name="vk_id" value="<?php echo $vk_id?>"></input></td>
                                        <tr><td>Ваша почта                          </td>      <td><input class="form-input" type="input" name="email" value="<?php echo $_SESSION['email']?>"></input></td>
                                    </table>
                                    <button type="sumbit" class="activate">Отправить на подтвержение</button>
                                    </form>
                                    </div>
                                    <?php } else {?>
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
                                    <?php } ?>
                                </div>

                            </div>

                        </div>
                        <?php if ($type == 0) { } else {?>
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
                        <?php } ?>
                    </div>
                </div>
                
            </div>
            <?php if ($type == 0) { } else {?>
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
            <?php } ?>
        </div>
        
</body>
</html>