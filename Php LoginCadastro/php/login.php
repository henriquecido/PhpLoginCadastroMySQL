<?php
    session_start();
    $conexao = mysqli_connect("localhost","user","password","testeusuario") or die("conexão : Falha!<br>" . mysqli_connect_error());

    //validar se oque as variaveis que vou receber pelo POST, se estiver vazia(empty) ele volta para o index.html
    if(empty($_POST[Nlogin]) || empty($_POST[Nsenha])){
        header('Location: ../index.php');
        mysqli_close($conexao);
        exit();
    }

    //A função abaixo analisa se as minhas variaveis que vou receber por POST, não possui nenhum comando válido de SQL
    $usuario = mysqli_real_escape_string($conexao,$_POST['Nlogin']);
    $senha = mysqli_real_escape_string($conexao,$_POST['Nsenha']);

    $query = mysqli_query($conexao,"SELECT login,senha FROM testeusuario.usuarios WHERE login = '{$usuario}' AND senha = md5('{$senha}') ") or die("Erro: <br>" . mysqli_error($conexao));

    $row = mysqli_num_rows($query);
    
    switch($row){
        case 0:
            //Login Invalido!
            //sessao nao autorizado recebe true, onde ao voltar para a index.php vai ser validada por um if
            //se ela voltar como true, vai exibir uma div com aviso para o usuario
            $_SESSION['nao_autorizado'] = true;
            header('Location: ../index.php');
            mysqli_close($conexao);
            exit();
            break;    
        case 1:
            //Login Sucesso!
            $_SESSION['usuario'] = $usuario;
            header('Location: painelCentral.php');
            mysqli_close($conexao);
            exit();
            break;
        default:
            //Login Erro!
            $_SESSION['nao_autorizado'] = false;
            header('Location: ../index.php');
            mysqli_close($conexao);
            exit();
    }
?>