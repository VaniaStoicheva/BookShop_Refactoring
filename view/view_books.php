
<div><a href="index.php?page=newbook">Нова книга</a></div>
<div><a href="index.php?page=newauthor">Нов автор</a></div>
<div><a href="index.php?page=search">Търсене на книга по име</a></div>
<br/>
<table border="1">
    <tr><th><a href="index.php?order=<?php echo $neworder;?>">Книга</a></th>
        <th><a href="index.php?order=<?php echo $neworder;?>">Автори</a></th>
        <th>Коментари</th></tr>
       <?php 
        foreach ($data as $book_id=>$row){
     echo '<tr><td><a href="index.php?page=book"?book_id='.$book_id.'">'.$row['book_name'].'</a></td>'
          . '<td>';
     $datas=array();
          foreach ($row['authors'] as $author_id=>$value){
              $datas[]='<a href="index.php?page=authorbooks"?author_id='.$author_id.'">'.$value.'</a>';
          }
          echo implode(', ', $datas);
          echo '</td>';
          $count=1;
          foreach ($row['counter'] as $counter){
             $count+=$counter;
          }
          echo '<td>'.$count.'</td></tr>';
}
?>
 </table><br/>
<div><a href="index.php?page=login">Вход</a></div>
<div><a href="index.php?page=register">Регистрация</a></div>
<div><a href="index.php?page=logout">Изход</a></div>
