<?
if(!$_SESSION['email'] AND !$_SESSION['password']){
    
}else{
  $q=mysql_query("SELECT * FROM users WHERE id='{$_SESSION['id']}'");
       $r=mysql_fetch_array($q);
      
}
if(isset($_POST)){
    if(empty($_POST['password'])){
        echo"<center><font size=4 color=red>Введите старый пароль</font></center>";
    }
     elseif(empty($_POST['npassword'])){
        echo"<center><font size=4 color=red>Придумайте новый пароль</font></center>";
    }
     elseif(empty($_POST['opassword'])){
        echo"<center><font size=4 color=red>Повторите новый пароль</font></center>";
    }
    elseif($_POST['npassword']!=$_POST['opassword']){
            echo"<center><font size=4 color=red>Введенные пароли не совпадают</font></center>";   
    }
    else{
             $password=$_POST['password'];
                $password=md5($password);
       $query=mysql_query("SELECT password FROM users WHERE id='{$_SESSION['id']}'");
        $result=mysql_fetch_array($query);
      if($result['password']!=$password){
                  echo"<center><font size=4 color=red>Старый пароль введен не верно! ВЫ можете востановить пароль, если выйти из аккаунта</font></center>";    

        }else{
       $npassword=$_POST['npassword'];
            $opassword=$_POST['opassword'];
                 $password=$_POST['npassword'];
                 $npassword=md5($password);
                 mysql_query("UPDATE users SET password='$npassword' WHERE id='{$_SESSION['id']}'");
                  echo"<center><font size=4 color=green>Пароль успешно изменен</font></center>";   
        }
    }
}
?>