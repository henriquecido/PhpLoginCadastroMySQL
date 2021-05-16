<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name = "google-signin-client_id" content = "228478372406-cge18vj7raupt189388p136c23afhvrp.apps.googleusercontent.com">
    <link href="../style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
    <script src="../javas.js"></script>
    <title>Cadastro</title>
</head>
<body>
<script>
</script>
    <?php  include 'validaLogado.php'; ?>
    <header class="header">
        <div class="div_logo">L O G O</div>
        <div class="div_lang_singout">
            <div class="div_signout">
                <a href="signOut.php" onclick="signOut();">Sign out</a>
            </div>
            <div class="div_lang">
                <img src="../images/brazil.PNG" onclick="">
                <img src="../images/usa.PNG" onclick="">
            </div>
        </div>
    </header>
    <main class="principal">
        <div class="div_form">  
            <h4>welcome</h4>
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