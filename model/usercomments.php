<?php
session_start();
$title='Потребител';

include './include/function.php';
if($_GET['user_id']){
   $user_id=$_GET['user_id'];
 
   $user=  getUsernameById($link, $user_id);
    echo '<pre>Вие четете коментарите на :'.$user['username'].'</pre>';
    
    $q=  mysqli_query($link,
            'SELECT * FROM `comments` as c
    join users  on c.user_id=users.user_id
    join books as b on c.book_id=b.book_id
    where c.user_id='.$user_id);
    if(mysqli_error($link)){
        echo mysqli_error($link);
    }
    if(mysqli_affected_rows($link)==0){
        echo '<p>Няма коментари за тази книга</p>';
    }
    else{
    $data=  array();
    while ($row=  mysqli_fetch_assoc($q)){
    $data[$row['book_id']]['book_id']=$row['book_id'];
    $data[$row['book_id']]['book_name']=$row['book_name'];
    $data[$row['book_id']]['comments'][$row['date_time']]=$row['date_time'];
    $data[$row['book_id']]['comments'][$row['comments_id']]=$row['comment'];
    }
   
    render($data,'./view/view_usercomments.php');
}
}

