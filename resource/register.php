 <?php
 session_start();
$title='Регистрация';

include './include/function.php';
require './include/password.php';
if(isset($_POST)&& isset($_POST['username']) && isset($_POST['pass'])){

    $username=trim($_POST['username']);
    $pass=trim($_POST['pass']);
    $error=array();
    if(mb_strlen($username)<3){
        $error[]='<p>Името е прекалено късо</p>';
    }
    if(mb_strlen($pass)<3){
        $error[]='<p>Паролата е прекалено къса</p>';
    }
    if(count($error)>0){
        foreach ($error as $er){
            echo $er;
        }
    }
    else{
        $username=  mysqli_real_escape_string($link,$username);
        if(isUserExist($link, $username)){
            echo '<p>Има потребител с това име въведете друго име!</p>';
        }else{
        $pass=mysqli_real_escape_string($link,$pass);
        $hash_pass=  password_hash($pass,PASSWORD_BCRYPT);
        
        $q=  mysqli_query($link,
                'INSERT INTO users (username,pass) VALUE ("'.$username.'","'.$hash_pass.'")');
        if(mysqli_error($link)){
            echo mysqli_error($link);
        }
        $data=array();
        if(mysqli_affected_rows($link)){
            echo '<p>Регистрацията е успешна</p>';
        }
        }
        
    }
   
}
include './view/view_register.php';
