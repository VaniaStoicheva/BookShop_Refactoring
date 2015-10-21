

<div><a href="index.php?page=books">Списък книги </a>
    <a href="index.php?page=newauthor">Нов автор </a>
</div>
        <br/>
        
<form method="post">
    <div><input type='text' name='book_name'/></div>
    <div><select name='authors[]' multiple style="width:200">
        <?php
        foreach ($data as $author){
        echo '<option value="'.$author['author_id'].'">'.$author['author_name'].'</option>';
        }
        ?>
        </select></div>
    <div> <input type='submit' value='Въведи новата книга'/></div>
</form>
