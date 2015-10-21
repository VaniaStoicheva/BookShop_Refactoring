<?php
session_start();
$title='Списък';
include './include/function.php';


if(isset($_SESSION['username'])){
    echo '<p>Здравей '.$_SESSION['username'].'</p>';
}
if(isset($_GET['order'])){
    $order=($_GET['order']=='asc')?'asc':'desc';
}

if(isset($_GET['author_id'])){
    $author_id=(int)$_GET['author_id'];
    $author_id=  mysqli_real_escape_string($author_id);
    $_SESSION['author_id']=$author_id;
    header('Location:index.php?page=authorbooks');
    exit;
}
if(!isset($_GET['order'])){
    $order='';
}

$q=  mysqli_query($link,'SELECT * FROM authors 
         JOIN books_authors as ba ON authors.author_id=ba.author_id 
         JOIN books ON books.book_id=ba.book_id 
         JOIN comments AS c ON books.book_id = c.book_id
         ORDER BY books.book_name '.$order.'');
      if(mysqli_error($link)){
          echo mysqli_error($link);
       }
      $neworder=($order=='asc')?'desc':'asc';
      
$data=array();
while($row= mysqli_fetch_assoc($q)){
 $data[$row['book_id']]['book_name']=$row['book_name'];
 $data[$row['book_id']]['authors'][$row['author_id']]=$row['author_name'];
$data[$row['book_id']]['counter'][$row['counter']]=$row['counter'];
}

 
render($data, './view/view_books.php');
                                                                                                                                                                   
   

