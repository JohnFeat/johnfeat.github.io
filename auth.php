<?php
	setcookie('user', 'true', time() + 3600, '/'); // ДОМЕН , ''
	header('Location: /index.php')
?>