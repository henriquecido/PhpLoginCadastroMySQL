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
                    document.getElementById("msg").innerHTML = "Invalid login or password !" ;
                    signOut();
                    onLoad();
                    break;
                case '1':
                    window.location.href = 'php/painelCentral.php';
                    break;
                default:
                    document.getElementById("msg").innerHTML = "There was an error validating your login !" ;
                    signOut();
                    onLoad();
                }
        });
    }else {
        document.getElementById("msg").innerHTML = " User not found !";
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



 
