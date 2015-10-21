<?php

function render($data,$path){
 if(file_exists($path)){
    include $path;
}else{
    echo '<p>Некоректен път до файла</p>';
}
}
