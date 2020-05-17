<?php
    session_start();
    $conexao = mysqli_connect("localhost","user","password","testeusuario") or die("conexão : Falha!<br>" . mysqli_connect_error());

    //validar se oque as variaveis que vou receber pelo POST, se estiver vazia(empty) ele volta para o index.php
    if(empty($_POST[Nnome]) || empty($_POST[Nemail]) || empty($_POST[Nlogin]) || empty($_POST[Nsenha])){
        header('Location: ../cadastro.php');
        mysqli_close($conexao);
        exit();
    }

    //A função abaixo analisa se as minhas variaveis que vou receber por POST, não possui nenhum comando válido de SQL
    //trim tira os espaço do começo e fim da minha string, o md5 encriptografa a senha
    $nome = mysqli_real_escape_string($conexao,trim($_POST['Nnome']));
    $email = mysqli_real_escape_string($conexao,trim($_POST['Nemail']));
    $login = mysqli_real_escape_string($conexao,trim($_POST['Nlogin']));
    $senha = mysqli_real_escape_string($conexao,trim(md5($_POST['Nsenha'])));

    //verificar se a conta já existe 
    $consulta = mysqli_query($conexao,"SELECT login FROM testeusuario.usuarios WHERE login = '{$login}' LIMIT 1") or die(msqli_error($conexao));

    $row = mysqli_num_rows($consulta);

    switch($row){
        case 0:
            //se for 0, não existe login já criado no banco, assim sendo criado o novo usuario
            $_SESSION['existe_conta']=false;
            mysqli_query($conexao,"INSERT INTO testeusuarios.usuarios (nome,email,login,senha,data) VALUES ('{$nome}','{$email}','{$login}','{$senha}',NOW())") or die("Erro: <br>" . mysqli_error($conexao));
            header('Location: ../cadastro.php');
            mysqli_close($conexao);
            exit();
            break;
        case 1:
            //se for 1, existe usuario criado no banco, nao sendo criado o novo usuario
            $_SESSION['existe_conta']=true;
            header('Location: ../cadastro.php');
            mysqli_close($conexao);
            exit();
            break;
    }
   
    
?>
     



 

