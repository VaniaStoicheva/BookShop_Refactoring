
<?php
echo '<p>'.$data['book_name'].',<a href="usercomments.php?user_id='.$data['user_id'].'">'
        .$data['username'].'</a>;'.$data['date_time'].'</p>'
        . '<textarea rows="2" cols="100">'.$data['comment'].'</textarea>';    
  ?>

<div><a href="index.php?page=logout">Изход</a></div>
<div><a href="index.php?page=login">Вход</a></div>
<div><a href="index.php?page=register">Регистрация</a></div>
<div><a href="index.php?page=books">Списък книги</a></div>

<form method="post" name='comment'>
    <label>Коментар:</label>
    <div><textarea cols="50" rows="4" name='comment'/></textarea></div>
    <input type='submit' value='Въведи коментар'/>
</form>
<br/>
