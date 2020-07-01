<?php 
   session_start();

   //Removendo qualquer valor dentro da session acess token, a cada nova request 
  unset($_SESSION['facebook_access_token']);

    $conexao = mysqli_connect("localhost","root","password","testeusuario") or die("Conexão com o Banco: Falha!<br>" . mysqli_connect_error());

   //incluir apenas uma vez, once que faz essa verificação
   require_once 'C:\Users\User\Desktop\Projeto\LogCad PHP e MySQL\composer\vendor\autoload.php';
   

   //Instanciando minha biblioteca Facebook
   $fb = new \Facebook\Facebook([
        'app_id' => '262559341613541',
        'app_secret' => '2f4a92abb6e548d2c332bb5cf889d556',
        'default_graph_version' => 'v2.10' 
    ]);
   
   //**A maioria das solicitações feitas à API do Graph exige um token de acesso. 

   //Utilizamos esse metodo getRedirect para gerar um URL de login 
   $helper = $fb -> getRedirectLoginHelper();
   $permissions = ['email'];

   //Criando meu token de acesso
   try {
        //Validando se meu token já foi criado, através da minha sessão se estiver vazia 
        if(isset($_SESSION['facebook_access_token'])){
            $accessToken = $_SESSION['facebook_access_token'];
        }else{
            $accessToken = $helper->getAccessToken();
        }
  } catch(Facebook\Exception\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
  } catch(Facebook\Exception\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
  }

  //Verificando se meu token de acesso foi realmente criado
  if(isset($accessToken)){
    //Verificando se minha session já possui meu token de acesso, com a session criada que vou conseguir acessar o painel central 
    if(isset($_SESSION['facebook_access_token'])){

        //Com meu token de acesso obtido, eu defino ele como padrão para que nao tenha que transmitir a cada solicitação de alguma informação do usuário. 
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    }else{
        $_SESSION['facebook_access_token'] = (string) $accessToken;

        //Meu usuário fazendo login eu consigo um token de acesso e suas informações.
        //No qual em 2h se torne expirado, com o oAuth2Client conseguimos aumentar o prazo para 60 dias o meu token de acesso
        $oAuth2Client = $fb->getOAuth2Client();
        $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
        $_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
    
        //Com meu token de acesso obtido, eu defino ele como padrão para que nao tenha que transmitir a cada solicitação de alguma informação do usuário. 
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    }

    //fazendo request para o Graph e validar as informações obtidas
    try {
        
        //com o get conseguido definir qual campo que quero validar do usuário
        $response = $fb->get('/me?fields=email');
        $user = $response->getGraphUser();
        
        $resultado = mysqli_query($conexao,"SELECT login,email FROM testeusuario.usuarios WHERE email = '".$user['email']."'");

        $row = mysqli_num_rows($resultado);

        switch($row){
            case 0:
                //Login Invalido!
                //sessao nao autorizado recebe true, onde ao voltar para a index.php vai ser validada por um if
                //se ela voltar como true, vai exibir uma div com aviso para o usuario
                $_SESSION['nao_autorizado'] = true;
                header('Location: http://localhost/index.php');
                mysqli_close($conexao);
                exit();
                break;
            case 1:
                //Login Sucesso!
                //fetch_assoc retorna uma matriz associativa que corresponde a linha obtida
                $row_result = mysqli_fetch_assoc($resultado);
                $_SESSION['usuario'] = $row_result['login'];
                header('Location: http://localhost/php/painelCentral.php');
                mysqli_close($conexao);
                exit();
                break;
            default:
                //Login Erro!
                $_SESSION['nao_autorizado'] = false;
                header('Location: http://localhost/index.php');
                mysqli_close($conexao);
                exit();
        }
        
    } catch(Facebook\Exception\FacebookResponseException $e) {
        // When Graph returns an error
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
    } catch(Facebook\Exception\FacebookSDKException $e) {
        // When validation fails or other local issues
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }
    
  }else{

      //Utilizamos o getLoginUrl para especificar o direcionamento após a aprovação do login no facebook, e definindo o campo que quero ter informação da conta do usuário, na variavel $permission 
      $loginUrl = $helper->getLoginUrl('http://localhost/php/signInFacebook.php', $permissions);

  }


?>
