<?
if(isset($_POST)){
    if(empty($_POST['email'])){
        echo"<b><center><font size=4 color=red>Введите ваш E-mail!</font></center></b>";
    }
     

     else{
      $email=$_POST['email'];
         
         $resultat=mysql_query("SELECT * FROM users WHERE email='$email'");
        $array=mysql_fetch_array($resultat);
       if(empty($array)){
            exit("<b><center><font size=4 color=red>Такого пользователя<br> не существует</font></center></b>");
        }
        elseif(mysql_num_rows($resultat) >0){
            $chars="qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP";
           $max=10;
            $size=StrLen($chars)-1;
           $password=null;
            while($max--){
                $password.=$chars[rand(0, $size)];
              }
              $newmdPassword=md5($password);
              $title="Востановление пароля пользователю" .$email."для сайта emel84i8.bget.ru";
              $headers="Content-type: text/plain: charset=utf-8\r\n";
              $headers.="Администрация сайта emel84i8.bget.ru";
               $letter="Вы запросили пароль для аккаунта".$email." на сайте emel84i8.bget.ru\r\n ваш новый паролль ".$password;
               if(mail($email, $title, $letter, $header)){
                   mysql_query("UPDATE users SET password='$newmdPassword' WHERE email='$email'");
                    echo"<b><center><font size=4 color=green>Ваш новый пароль<br> отправлен на ваш E-mail</font></center></b>";
                    
               }
        }  
        }   
     }

?>