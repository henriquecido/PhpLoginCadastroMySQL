<?php session_start();?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <script src="java.js"></script>
    <title>Cadastro</title>
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
                <h2>Create Account</h2>
            </div>
            <form class="form" action="../php/cadastrar.php" method="POST">
                <div class="form_input">
                    <label for="nome"><img src="../images/nome.PNG" alt="imagem_user"></label>
                    <input type="text" name="Nnome" id="nome" placeholder="Full Name" maxlength="35" autocomplete="off"><br><br>
                </div>
                <div class="form_input">
                    <label for="email"><img src="../images/email.PNG" alt="imagem_user"></label>
                    <input type="email" name="Nemail" id="email" placeholder="E-mail" maxlength="30" autocomplete="off"><br><br>
                </div>
                <div class="form_input">
                    <label for="login"><img src="../images/user.png" alt="imagem_user"></label>
                    <input type="text" name="Nlogin" id="login" placeholder="Username" maxlength="15" autocomplete="off"><br><br>
                </div>
                <div class="form_input">
                    <label for="senha"><img src="../images/senha.png" alt="imagem_senha"></label>
                    <input type="password" name="Nsenha" id="senha" placeholder="Password" maxlength="15" autocomplete="off"><br><br>
                </div>
                    <?php
                        //isset valida se () é null, se não for ele retorna true, exibindo a div abaixo
                        //somente será validado esse ifelse se tambem estiver atribuido um valor na minha sessão existe_conta
                        if ($_SESSION['existe_conta'] && isset($_SESSION['existe_conta'])) {
                    ?>
                            <div class="div_logCad_invalido"> Username já existe, tente outro! </div>
                    <?php
                            unset($_SESSION['existe_conta']);
                        }elseif(!$_SESSION['existe_conta'] && isset($_SESSION['existe_conta'])){
                    ?>
                            <div class="div_cadastro_conta"> Cadastro realizado com Sucesso! </div>
                    <?php
                            unset($_SESSION['existe_conta']);
                        }
                    ?>
                <div class="botao_input">
                    <input type="submit" value="Create" >
                </div>
            </form>
        </div>
            <div class="div_cadastrar">
                <h5>Already have an account ? </h5>
                <a id="Acad" href="index.php">Sign in</a>
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