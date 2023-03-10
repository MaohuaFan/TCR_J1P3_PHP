<?php

function getBrowserName($user_agent) {
    $browser_patterns = array(
        'Firefox' => '/Firefox\/([0-9\.]+)/',
        'Chrome' => '/Chrome\/([0-9\.]+)/',
        'Safari' => '/Safari\/([0-9\.]+)/',
        'Edge' => '/Edge\/([0-9\.]+)/',
        'IE' => '/MSIE\s([0-9\.]+);/',
        'Opera' => '/Opera\/([0-9\.]+)/',
        'Netscape' => '/Netscape\/([0-9\.]+)/'
    );
    foreach ($browser_patterns as $name => $pattern) {
        if (preg_match($pattern, $user_agent, $matches)) {
            return $name;
        }
    }
    return 'Onbekend';
}

function getOperatingSystem($user_agent) {
    $os_patterns = array(
        'Windows 10' => '/Windows NT 10\.0/',
        'Windows 8.1' => '/Windows NT 6\.3/',
        'Windows 8' => '/Windows NT 6\.2/',
        'Windows 7' => '/Windows NT 6\.1/',
        'Windows Vista' => '/Windows NT 6\.0/',
        'Windows XP' => '/Windows NT 5\.1/',
        'macOS' => '/Macintosh/',
        'Linux' => '/Linux/',
        'iOS' => '/iPhone|iPad|iPod/',
        'Android' => '/Android/'
    );
    foreach ($os_patterns as $name => $pattern) {
        if (preg_match($pattern, $user_agent)) {
            return $name;
        }
    }
    return 'Onbekend';
}

$user_agent = $_SERVER['HTTP_USER_AGENT'];
$browser = getBrowserName($user_agent);
$os = getOperatingSystem($user_agent);

echo "Browser: $browser <br>";
echo "Besturingssysteem: $os<br>";
echo "<br>";

?>