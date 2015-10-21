<?php
include 'include/function.php';

        if($_POST ){
            $book_name=trim($_POST['book_name']);
            if(!isset($_POST['authors'])){
                $_POST['authors']='';
            }
            $authors=$_POST['authors'];
            $error=array();
            if(mb_strlen($book_name)<3){
                $error[]= '<p>Името е прекалено късо!</p>';
            }
            if(!is_array($authors) || count($authors)===0){
                $error[]='<p>Невалидни автори<p>';
            }
            
            if(!idAuthorExist($link, $authors)){
                    $error[]='<p>Невалиден автор</p>';
                }
            
            if(count($error)>0){
                foreach ($error as $er){
                    echo '<p>'.$er.'</p>';
                }
            }
            else{
                $book_name=  mysqli_real_escape_string($link,$book_name);
                mysqli_query($link,
                        'INSERT INTO books (book_name) VALUE ("'.$book_name.'")');
                if(mysqli_error($link)){
                    echo mysqli_error($link);
                }
                $id=  mysqli_insert_id($link);
                foreach ($authors as $author_id){
                mysqli_query($link,
                        'INSERT INTO books_authors (book_id,author_id) VALUE ('.$id.','.$author_id.')');
                if(mysqli_error($link)){
                    echo 'error';
                }
            }
            echo '<p>Книгата е добавена</p>';
        }
        }
        //$data=array();
$authors=  getAllAuthors($link);
        if($authors===false){
            echo 'грешка';
        }
        $title='Нова Книга';
        $data=$authors;
        render($data,'./view/view_newbook.php');


