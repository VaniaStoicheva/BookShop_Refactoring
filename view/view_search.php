<div><a href="index.php?page=books">Списък книги </a>
    <a href="index.php?page=newauthor">Нов автор </a>
    <a href="index.php?page=newbook">Нова книга </a>
</div>
        <br/>
<div>
    <form method="get">
    <label>Търсене на книга по име:</label>
    <input type="text" name="book_name"/>
    <input type="submit" value="Търсене"/>
    </form>
</div>
<br/>

<?php_
foreach ($data as $row){
            echo '<p>'.$row['book_name'].'=> с автори :';
            $datas=array();
        foreach ($row['authors'] as $key=>$book){
            $datas[]=$book;
        }
        echo implode(' ,', $datas);
        }
        echo '</td></tr></table></div>';