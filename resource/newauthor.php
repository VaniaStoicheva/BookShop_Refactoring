<?php
session_start();
$title='Нов автор';
include './include/function.php';
 if(isset($_GET['author_id'])){
            $author_id=(int)$_GET['author_id'];
            $_SESSION['author_id']=$author_id;
            header('Location:index.php?page=authorbooks');
            exit;
        }
if($_POST){
     $author_name=trim($_POST['author_name']);
           
     if(mb_strlen($author_name)<3){
             echo '<p>Невалидно име на автора</p>';
        }else
            {
            $author_esc=  mysqli_real_escape_string($link,$author_name);
            if(authorExist($link, $author_esc)){
                echo '<p>Този автор вече съществува в БД.</p>';
            }
            else{
                if(insertAuthor($link, $author_esc)){
                echo '<p>Записа е успешен</p>';
                }
               }
            }
        }
       
$q=  mysqli_query($link,
            'SELECT * FROM authors');
        if(mysqli_errno($link)){
            echo mysqli_error($link);
        }
         $data=array();
        while($row=  mysqli_fetch_assoc($q)){
        $data[$row['author_id']]['author_id']=$row['author_id'];
        $data[$row['author_id']]['author_name']=$row['author_name'];
        }
        render($data,'./view/view_newauthor.php');