<?php 
    session_start();
    
    //Se nao existir nenhum usuario na minha sessão, ele volta para minha index
    if(!$_SESSION['usuario']){
        header('Location: ../index.php');
        exit();
    }
?>