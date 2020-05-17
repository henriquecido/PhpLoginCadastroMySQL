<?php
 session_start();
 include_once 'php/signInFacebook.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name = "google-signin-client_id" content = "228478372406-cge18vj7raupt189388p136c23afhvrp.apps.googleusercontent.com">
    <link href="style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
    <script src="javas.js"></script>
    <title>Login</title>
</head>
<body>
    <header class="header">
        <div class="div_logo">L O G O</div>
        <div class="div_lang">
            <img src="../images/brazil.PNG" onclick="">
            <img src="../images/usa.PNG" onclick="">
        </div>
    </header>
    <main class="principal">
        <div class="div_form">
            <div class="form_titulo">
                <h2>Login</h2>
            </div>
            <form class="form" action="../php/login.php" method="POST">
                <div class="form_input">
                    <label for="login"><img src="../images/user.png" alt="imagem_user"></label>
                    <input type="text" name="Nlogin" id="login" placeholder="  Username" autocomplete="off"><br><br>
                </div>
                <div class="form_input">
                    <label for="senha"><img src="../images/senha.png" alt="imagem_senha"></label>
                    <input type="password" name="Nsenha" id="senha" placeholder="  Password" autocomplete="off"><br><br>
                </div>
                    <?php
                        //isset valida se () é null, se não for ele retorna true, exibindo a div abaixo
                        if(isset($_SESSION['nao_autorizado']) && $_SESSION['nao_autorizado']){
                    ?>
                            <div class="div_logCad_invalido" > Login ou senha invalido ! </div>
                    <?php
                            //unset elemina qualquer valor que esteja atribuido na função/variavel dentro de ()
                            //fazendo com que na proxima tentativa de login, ela faça novamente a analise
                            unset($_SESSION['nao_autorizado']);
                        }elseif(isset($_SESSION['nao_autorizado']) && !$_SESSION['nao_autorizado']){ 
                    ?>
                            <div class="div_logCad_invalido" > Ocorreu um erro na validação do seu login ! </div>
                    <?php
                            unset($_SESSION['nao_autorizado']);
                        }
                    ?>
                    <div class="div_logCad_invalido" id="msg"></div>
                <div class="botao_input">
                    <input type="submit" value="Sign in">
                </div>
            </form>
            <div class="div_esqueceu">
                <a href="#">Forgot password ?</a>
            </div>
            <div class="div_entrar">
                <p>Enter as</p>
                <div class="div_entrar_link">
                    <div id="my-signin2" class="g-signin2" data-onsuccess="onSignIn" data-ux_mode="redirect"></div> 
                    <a href="<?php echo $loginUrl;?>" id="Aface" >
                        <img src="../images/facebook.PNG" alt="Imagem_facebook_icon">
                        <strong id="face">Login</strong>
                    </a>
                    </div>
                </div>
                <div class="div_resposta_google" id="msg"></div>
            </div>
        </div>
        <div class="div_cadastrar">
            <h5 >Don't have an account ? </h5>
            <a id="Acad" href="cadastro.php">Create Account</a>
        </div>
    </main>
    <footer class="rodape">
        <div class="div_rodape_contato">
            <strong id="header_contato">Contact us</strong>
            <strong id="num_contato">
                (27) 9 1234-5678
            </strong>
        </div>
        <div class="div_rodape_copy">
            &#169; Copyright
        </div>
        <div class="div_rodape_social">
            <strong id="header_social">Community</strong>
            <a href="#">
                <img src="../images/face.PNG">
            </a>
            <a href="#">
                <img src="../images/twi.PNG">
            </a>
        </div>
    </footer>
</body>
</html>