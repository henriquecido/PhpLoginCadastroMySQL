<?php
    //iniciando a sessão para saber quem esta nela 
    session_start();
    
    //destruir todas as sessões 
    session_destroy();

    //Poderia usar : unset($_SESSION['NOME DA SESSÃO'])
    //mas tenho somente uma, não havendo o porque de utiliza-la
    header('Location: ../index.php');
    mysqli_close($conexao);
    exit();
?>