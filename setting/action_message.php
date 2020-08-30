<?
if(!$_SESSION['email'] AND !$_SESSION['password']){
    
}else{
    $q=mysql_query("SELECT * FROM users WHERE id='{$_SESSION['id']}'");
    $r=mysql_fetch_array($q);
}

if(isset($_POST)){
    if(empty($_POST['mess'])){
        
    }else{
        $author=$_POST['author'];
          $poluchatel=$_POST['poluchatel'];
            $mess=$_POST['mess'];
            $data=date("d-m-y В H:i");
            $author=mysql_real_escape_string($author);
             $poluchatel=mysql_real_escape_string($poluchatel);
                  $mess=mysql_real_escape_string($mess);
                   $mess=htmlspecialchars($mess);
                     $query_2="INSERT INTO dialog(author, poluchatel, mess, data)VALUES('{$_SESSION['id']}', '$poluchatel', '$mess', '$data')";
                   $result_2=mysql_query($query_2) or die (mysql_error());
                    $q_2=mysql_query("SELECT * FROM message WHERE author='{$_SESSION['id']}' AND poluchatel='$poluchatel'");
    $r_2=mysql_fetch_array($q_2);
    if($r_2['id']==''){
                   $query="INSERT INTO message(author, poluchatel, mess, data, ready)VALUES('{$_SESSION['id']}', '$poluchatel', '$mess', '$data', '0')";
                   $result=mysql_query($query) or die (mysql_error());
    }else{
        mysql_query("UPDATE message SET mess='$mess', ready='0', data='$data' WHERE poluchatel='$poluchatel'");
    }
                   echo"<center><font color=green size=4>Сообщение успешно отправленно</font></center>";
                   echo"<meta http-equiv='refresh' content='1; url=/index?id=".$poluchatel."'>";
    }
   
    
}
?>