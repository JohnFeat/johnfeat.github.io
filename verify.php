<?php
$params = array(
                'client_id'     => '51549870',
                'redirect_uri'  => 'http://localhost/verify',
                'scope'         => 'email',
                'response_type' => 'code',
                'state'         => 'https://example.com/page-1'
                );

                $url = 'https://oauth.vk.com/authorize?' . urldecode(http_build_query($params));
                echo '<a href="' . $url . '">Войти через ВКонтакте</a>';
?>