<?php

include 'view/header.php'; 
include 'include/template_function.php';
 
 const resourcePath='resource/';
const viewPath='view/';
    if(isset($_GET['page'])){
        switch ($_GET['page']){
            case 'authorbooks':$page='authorbooks';break;
            case 'book':$page='book';break;
            case 'usercomments':$page='usercomments';break;
            case 'logout':$page='logout';break;
            case 'register':$page='register';break;
            case 'login':$page='login';break;
            case 'search':$page='search';break;
            case 'newauthor':$page='newauthor';break;
            case 'newbook':$page='newbook';break;
            case 'books':$page='books';break;
default :$page='books';
        break;
        }
    }else{
        $page='books';
    }

include './'.resourcePath.'/'.$page.'.php';
exit;
