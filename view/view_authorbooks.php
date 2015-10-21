 <div>
     <table border="1">
         <tr><th>Книга</th><th>Автори</th></tr>
         <?php
          foreach ($data as $book_id=>$row){
            echo '<tr><td><a href="book.php?book_id='.$book_id.'">'.$row['book_name'].'</a></td><td>';
            $datas=array();
        foreach ($row['authors'] as $key=>$rows){
            $datas[]='<a href="author_books.php?author_id='.$key.'">'.$rows.'</a>';
        }
        echo implode(' ,', $datas);
        }
        echo '</td></tr>';
        ?>
       </table>
 </div>
    

<div><a href="index.php?page=books">Списък книги</a></div>
<div><a href="index.php?page=newauthor">Нов автор</a>
    <a href="index.php?page=newbook">Нова книга</a></div>

