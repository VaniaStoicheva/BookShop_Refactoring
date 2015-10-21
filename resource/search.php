<?php
$title='Търсене';

include './include/function.php';

    if(isset($_GET['book_name'])){
    $book_name=trim($_GET['book_name']);
    $book_name=  mysqli_real_escape_string($link,$book_name);
    $q=mysqli_query($link,
            'SELECT * FROM `books` as b '
            . 'JOIN books_authors as ba ON b.book_id=ba.book_id '
            . 'JOIN authors as a ON a.author_id=ba.author_id '
            . 'WHERE book_name="'.$book_name.'"');
    if(mysqli_error($link)){
        echo 'грешка'.mysqli_error($link);
    }
    if(mysqli_affected_rows($link)){
        echo '<p>Търсената книга е открита</p>';
        $data=array();
        while($row=  mysqli_fetch_assoc($q)){
         $data[$row['book_id']]['book_name']=$row['book_name'];
         $data[$row['book_id']]['authors'][$row['author_id']]=$row['author_name'];
            }
          render($data,'./view/view_search.php'); 
          
    }

    else{
        echo '<p>Няма такава книга</p>';
    }
}
