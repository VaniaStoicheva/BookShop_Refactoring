<div><a href="index.php?logout">Изход</a></div>
<div><a href="index.php?page=books">Списък книги</a></div>
<?php
foreach ($data as $row){
        echo '<p><a href="books.php?book_id='.$row['book_id'].'">'.$row['book_name'].'</a></p>';
   
        foreach ($row['comments'] as $rows){
            echo '<textarea rows="2" cols="100">'.$rows.'</textarea>';  
        }
    }