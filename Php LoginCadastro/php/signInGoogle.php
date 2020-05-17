<?php 
    session_start();

    $conexao = mysqli_connect("localhost","root","password","testeusuario") or die("Conexão com o Banco: Falha!<br>" . mysqli_connect_error());

    //recebendo o post feito atraves do Jquery e atribuindo somente o userEmail a var email
    //tambem utilizando filter sanitize email para remover caracteres inválidos
    $email = filter_input(INPUT_POST, 'userEmail', FILTER_SANITIZE_STRING);

    $consulta = mysqli_query($conexao,"SELECT email FROM testeusuario.usuarios WHERE email = '{$email}' LIMIT 1");

    $row = mysqli_num_rows($consulta);

    switch($row){
        case 0:
            echo $row;
            mysqli_close($conexao);
            exit();
            break;
        case 1:
            $_SESSION['usuario'] = filter_input(INPUT_POST, 'userName', FILTER_SANITIZE_STRING);
            echo $row;
            mysqli_close($conexao);
            exit();
            break;
        default:
            echo $row;
            mysqli_close($conexao);
            exit();
    }

?>


