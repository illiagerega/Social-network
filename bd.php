<?
session_start();



$MYSQL_HOST = 'localhost';
$MYSQL_USER = 'root';
$MYSQL_PASSWORD = 'root';
$MYSQL_BASENAME = 'wobbly.in';








$mysql_connectooooor = mysqli_connect($MYSQL_HOST, $MYSQL_USER, $MYSQL_PASSWORD, $MYSQL_BASENAME);


if (!$mysql_connectooooor) {
echo 'Настройте соединение с БД!!!';
exit;

}


function setmysqllogg($err) {
$a = '';
if (file_exists($file)) {
}

$b = '============'.date("Y-m-d H:i:s").'==============='."\r\n";
$b .= $err;
$b .= "\r\n\r\n";
$b .= $a;

file_put_contents($file,$b);
}
}


function mysql_query($sql) {
$res = mysqli_query($mysql_connectooooor, $sql);
//setmysqllogg(mysql_error());
return $res;
}

function mysql_fetch_array($query) {
//setmysqllogg(mysql_error());
return $res;
}

function mysql_num_rows($query) {
//setmysqllogg(mysql_error());
return $res;
}

function mysql_error() {
}

function mysql_insert_id() {
$res = mysqli_insert_id($mysql_connectooooor);
//setmysqllogg(mysql_error());
return $res;
}


function mysql_real_escape_string($str) {
return mysqli_real_escape_string($mysql_connectooooor,$str);
}



?>