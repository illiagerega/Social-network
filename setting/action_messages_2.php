<?
if(!$_SESSION['email'] AND !$_SESSION['password']){

}else{
    $q=mysql_query("SELECT * FROM users WHERE id='{$_SESSION['id']}'");
    $r=mysql_fetch_array($q);
}
if(isset($_POST)){
    if(empty($_POST['textarea'])){

    }else{
        $author=$_POST['author'];
          $poluchatel=$_POST['poluchatel'];
            $textarea=$_POST['textarea'];
            $data=date("d-m-y В H:i");
            $author=mysql_real_escape_string($author);
             $poluchatel=mysql_real_escape_string($poluchatel);
                  $textarea=mysql_real_escape_string($textarea);
                   $textarea=htmlspecialchars($textarea);
                    $mess=$_POST['textarea'];
                    $t=mysql_query("SELECT * FROM message WHERE author='{$_SESSION['id']}'");
                    $w=mysql_fetch_array($t);
                    if($w['id']==""){
                     $query_3="INSERT INTO message(author, poluchatel, mess, data, ready)VALUES('{$_SESSION['id']}', '$poluchatel', '$mess', '$data', '0')";
                   $result_3=mysql_query($query_3) or die (mysql_error());
                    }else{
                    mysql_query("UPDATE message SET mess='$mess', data='$data', ready='0' WHERE author='{$_SESSION['id']}'");
                    }
                     $query_2="INSERT INTO dialog(author, poluchatel, mess, data)VALUES('{$_SESSION['id']}', '$poluchatel', '$mess', '$data')";
                   $result_2=mysql_query($query_2) or die (mysql_error());
                      echo"<meta http-equiv='refresh' content='0; url=/mail?act=inbox&id=".$poluchatel."'>";

    }
}
?>