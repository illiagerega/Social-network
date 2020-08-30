<?


if(isset($_POST)){
    if(empty($_POST['input'])){

    }else{
        $input=htmlspecialchars($_POST['input']);

 $data=date("d-m-Y в H:i");


    $q="INSERT INTO `novogo` (`id_user`, `poluchatel`, `text`, `data`) VALUES ('{$_SESSION['id']}', '{$_SESSION['id']}', '$input', '$data')";
                  $result=mysql_query($q)or die (mysql_error());

    echo $q;


    }
}
//exit();

if(isset($_POST)){
    if(empty($_POST['input_2'])){

    }else{
         $input_2=htmlspecialchars($_POST['input_2']);

 $data=date("d-m-Y в H:i");
 $id_user_2=$_POST['id_user_2'];
  $poluchatel=$_POST['poluchatel'];
  $q="INSERT INTO `novogo` (`id_user`, `poluchatel`, `text`, `data`, `status`) VALUES ('{$_SESSION['id']}', '{$_POST['poluchatel']}', '$input_2', '$data', '1')";
                  $result=mysql_query($q)or die (mysql_error());
                  echo $r['id'];
    }
}

?>