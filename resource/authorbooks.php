<?php
session_start();
$title='Книги от автор';

include './include/function.php';

if(isset($_GET['author_id'])){
    $author_id=(int)$_GET['author_id'];
        if(!idAuthorExist($link, $author_id)){
         $q=  mysqli_query($link, 
           'SELECT * FROM `books_authors` as ba '
                . 'INNER JOIN books as b ON ba.book_id=b.book_id '
                . 'INNER JOIN books_authors as bba ON bba.book_id=ba.book_id '
                . 'INNER JOIN authors as a ON bba.author_id=a.author_id  where ba.author_id='.$author_id);
            if(mysqli_error($link)){
                echo 'Невалидно име на автор!';
            echo mysqli_error($link);
        }
       
        $data=array();
        while($row=  mysqli_fetch_assoc($q)){
         $data[$row['book_id']]['book_name']=$row['book_name'];
         $data[$row['book_id']]['authors'][$row['author_id']]=$row['author_name'];
            }
            render($data, './view/view_authorbooks.php');
       }
    else{
            echo '<p>Невалиден автор</p>';
      }
}else{
    header('Location:index.php?page=books');
    exit;
}
?>