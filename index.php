<?
session_start();
header('Content-Type: text/html; charset= utf-8');
include("bd.php");

if ($_SERVER['REQUEST_URI'] == '/') {
$Page = 'index';
$Module = 'index';
} else {
$URL_Path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$URL_Parts = explode('/', trim($URL_Path, ' /'));
$Page = array_shift($URL_Parts);
$Module = array_shift($URL_Parts);


if (!empty($Module)) {
$Param = array();
for ($i = 0; $i < count($URL_Parts); $i++) {
$Param[$URL_Parts[$i]] = $URL_Parts[++$i];
}
}
}


if($Page=='index')include('page/index.php');
elseif($Page=='novosti')include('page/novosti.php');
elseif($Page=='exit')include('page/exit.php');
elseif($Page=='password')include('page/password.php');
elseif($Page=='profile')include('page/profile.php');
elseif($Page=='lyoudi')include('page/lyoudi.php');
elseif($Page=='mail')include('page/mail.php');
elseif($Page=='friends')include('page/friends.php');

elseif($Page=='action_register')include('setting/action_register.php');
elseif($Page=='action_login')include('setting/action_login.php');
elseif($Page=='action_inform')include('setting/action_inform.php');
elseif($Page=='action_photo')include('setting/action_photo.php');
elseif($Page=='action_password')include('setting/action_password.php');
elseif($Page=='action_newpassword')include('setting/action_newpassword.php');
elseif($Page=='action_edit')include('setting/action_edit.php');
elseif($Page=='action_message')include('setting/action_message.php');
elseif($Page=='action_friends')include('setting/action_friends.php');
elseif($Page=='action_messages_2')include('setting/action_messages_2.php');
elseif($Page=='del_message')include('setting/del/del_message.php');
elseif($Page=='del_friends')include('setting/del/del_friends.php');
elseif($Page=='action_novogo')include('setting/action_novogo.php');
elseif($Page=='del_novogo')include('setting/del/del_novogo.php');

$q=mysql_query("SELECT id, country FROM users WHERE id='{$_SESSION['id']}'");
$p=mysql_fetch_array($q);
 function UserCountry($p1){
if($p1==1)return"Россия";
elseif($p1==2)  return"Сша";
elseif($p1==3)  return"Китай";
elseif($p1==4)  return"Украина";

}








function top($title){
   include("html/top.php");
}
function bottom(){
  include("html/bottom.php");
}


?>