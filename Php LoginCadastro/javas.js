function onSignIn(googleUser) {

    var profile = googleUser.getBasicProfile();
    var userID = profile.getId(); 
    var userName = profile.getName();
    var userImage = profile.getImageUrl();
    var userEmail =  profile.getEmail();
    var userToken = googleUser.getAuthResponse().id_token; 

    if(userEmail != ""){
        var dados = {
            userID: userID,
            userName: userName,
            userImage: userImage,
            userEmail: userEmail
        }
        $.post('php/signInGoogle.php',dados,function(resposta){
           switch(resposta){
                case '0':
                    document.getElementById("msg").innerHTML = "Login ou senha invalido !" ;
                    signOut();
                    onLoad();
                    break;
                case '1':
                    window.location.href = 'php/painelCentral.php';
                    break;
                default:
                    document.getElementById("msg").innerHTML = "Ocorreu um erro na validação do seu login !" ;
                    signOut();
                    onLoad();
                }
        });
    }else {
        document.getElementById("msg").innerHTML = " Usuário não encontrado !";
    }
}
function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      auth2.disconnect();
    });
  }
function onLoad() {
    gapi.load('auth2', function() {
      gapi.auth2.init();
    });
}



 
