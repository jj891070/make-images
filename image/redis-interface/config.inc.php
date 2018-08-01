<?php
//Copy this file to config.inc.php and make changes to that file to customize your configuration.
$ENV = getenv('JAY_REDIS_HOSTS') ?? '127.0.0.1';
$redis = explode(",", $ENV);
$config=[];
foreach($redis as $key => $value){
    $config['servers'][] = [
        'name'   => $value, // Optional name.
        'host'   => $value,
        'port'   => 6379,
        'filter' => '*',
        'scheme' => 'tcp', // Optional. Connection scheme. 'tcp' - for TCP connection, 'unix' - for connection by unix domain socket
        'path'   => '', // Optional. Path to unix domain socket. Uses only if 'scheme' => 'unix'. Example: '/var/run/redis/redis.sock'
        // Optional Redis authentication.
        //'auth' => 'redispasswordhere' // Warning: The password is sent in plain-text to the Redis server.
        'databases' => 1

      ];
};


$config['seperator']=':';

// Uncomment to show less information and make phpRedisAdmin fire less commands to the Redis server. Recommended for a really busy Redis server.
//$config['faster'] = true;


// Uncomment to enable HTTP authentication
/*$config['login']=[
            // Username => Password
            // Multiple combinations can be used
            'admin' => array(
                'password' => 'adminpassword',
            ),
            'guest' => array(
                'password' => '',
                'servers'  => array(1) // Optional list of servers this user can access.
            )
        
        ];*/
        
// Use HTML form/cookie-based auth instead of HTTP Basic/Digest auth
$config['cookie_auth'] = false;

/*$config['serialization'] = [
        'foo*' => array( // Match like KEYS
        // Function called when saving to redis.
        'save' => function($data) { return json_encode(json_decode($data)); },
        // Function called when loading from redis.
        'load' => function($data) { return json_encode(json_decode($data), JSON_PRETTY_PRINT); },
        ),
    ];*/

// You can ignore settings below this point.
$config['maxkeylen'] = 100;
$config['count_elements_page'] = 100;

// Use the old KEYS command instead of SCAN to fetch all keys.
$config['keys'] = false;

// How many entries to fetch using each SCAN command.
$config['scansize'] = 1000;




 