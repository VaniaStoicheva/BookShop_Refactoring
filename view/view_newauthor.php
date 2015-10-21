
<div><a href="books.php">Списък книги </a>
    <a href="newauthor.php">Нов автор </a>
    <a href="newbook.php">Нова книга </a>
</div>
        <br/>
  <div><form method='post' action="">
            Автор: <input type="text" name="author_name"/>
            <input type="submit" value="Въведи"/>
        </form>
  </div>
 <table border=1>
            <tr><th>Автори</th></tr>
            <?php
            
                foreach ($data as $key=>$value){
               echo '<tr><td><a href="index.php?page=authorbooks"?author_id='.$key.'">'.$value['author_name'].'</a></td></tr>';
                    }
                    
                ?>
        </table>

