<?php
session_start();
$title='Книга';

include './include/function.php';

if(isset($_SESSION['isLoged'])){
   if(isset($_SESSION['username'])){
    echo '<p>Здравей '.$_SESSION['username'].'</p>';
        }

 if(isset($_POST['comment'])){
    $user_id=$_SESSION['user_id'];
    $book_id=(int)$_GET['book_id'];
    $book_id=  mysqli_real_escape_string($link,$book_id);
    $comment=$_POST['comment'];
    $comment=  mysqli_real_escape_string($link,$comment);
    $user_id=$_SESSION['user_id'];
    $today=  date("d.m.y H:i:s");
    $count=1;
    $q=  mysqli_query($link,
            'INSERT INTO `comments`(`user_id`, `book_id`,`date_time`, `comment`,`counter`) 
        VALUES ("'.$user_id.'","'.$book_id.'","'.$today.'","'.$comment.'",'.$count.')');
    $comments_id=  mysqli_insert_id($link);
    if(mysqli_error($link)){
        echo mysqli_error($link);
    }
   if(mysqli_affected_rows($link)){
        echo '<p>Коментара е въведен успешно</p>';
      }
}
}
 else{
    echo '<p>Само регистрирани потребители могат да пишат коментари</p>';
}
if(isset($_GET['user_id'])){
    $user_id=(int)$_GET['user_id'];
    $user_id=  mysqli_real_escape_string($link,$user_id);
    $_SESSION['user_id']=$user_id;
    header("Location:index.php?page=usercomments");
    exit;
}
 if(isset($_GET['book_id'])){
    $book_id=(int)$_GET['book_id'];
    $book_id=  mysqli_real_escape_string($link,$book_id);
 
    $q=  mysqli_query($link,
    'SELECT *FROM `comments` as c
        join users  on c.user_id=users.user_id
        join books as b on c.book_id=b.book_id
        where c.book_id="'.$book_id.'" ORDER BY date_time desc ');
    if(mysqli_error($link)){
        echo mysqli_error($link);
    }
    if(mysqli_affected_rows($link)==0){
        echo '<p>Няма коментари за тази книга</p>';
    }else{
    $data=  array();
    $data=  mysqli_fetch_assoc($q);

  
 
  render($data,'./view/view_book.php'); 
 }
 }