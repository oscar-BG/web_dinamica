var config={
    apiKey: "AIzaSyD3YWrEPx_axuulMxk0j071FyTow1-pXsw",
    authDomain: "login-921f2.firebaseapp.com",
    projectId: "login-921f2",
    storageBucket: "login-921f2.appspot.com",
    messagingSenderId: "550974378168",
    appId: "1:550974378168:web:46fe9806e8119c977c644d",
    measurementId: "G-HECLVGCXR0"
}

firebase.initializeApp(config);
firebase.analytics();

var auth = firebase.auth();
document.getElementById('btnloging').addEventListener('click',function(){
    var provider = new firebase.auth.GoogleAuthProvider();
    provider.addScope('profile');
    provider.addScope('email');
    provider.addScope('https://www.googleapis.com/auth/contacts.readonly');
    auth.signInWithPopup(provider)
        .then(function(result){
            var user = result.user;
            console.log(result.user);
            console.log(result.user.providerData[0].displayName);
            console.log(result.user.providerData[0].email);
            console.log(result.user.providerData[0].photoURL);

            $.post("../controlador/usuarioC.php?op=registro",{usu_nom:result.user.providerData[0].displayName, usu_correo:result.user.providerData[0].email, usu_foto:result.user.providerData[0].photoURL, usu_pass:123456},function(data){
                data = JSON.parse(data);
                console.log(data);
                if(data == 0){
                    alert("Registro exitoso");
                    window.open('../index.php','_self');
                }else{
                    alert("Correo ya existe");
                }
            });
        }).catch(function(error){
            console.log(error);
        });
});

function init(){

}
$(document).ready(function(){

});
$(document).on("click", "#btnregistrar", function(){
    console.log("click registrar");
    var usu_nom = $('#usu_nom').val();
    var usu_correo = $('#usu_correo').val();
    var usu_pass = $('#usu_pass').val();
    var usu_pass1 = $('#usu_pass1').val();
    var usu_foto = 'https://image.freepik.com/vector-gratis/perfil-empresario-dibujos-animados_18591-58479.jpg';
    console.log(usu_nom)
    console.log(usu_correo);
    console.log(usu_pass);

    if(usu_nom == '' || usu_correo == '' || usu_pass== '' || usu_pass1== ''){
        alert("Campos vacios");
    }else{
        if(usu_pass == usu_pass1){
            $.post("../controlador/usuarioC.php?op=registro",{usu_nom:usu_nom,usu_correo:usu_correo,usu_foto:usu_foto, usu_pass},function(data){
                //data = JSON.parse(data);
                console.log(data);
                if(data == 0){
                    alert("Registro exitoso");
                    window.open('../index.php','_self');
                }else{
                    alert("Correo ya existe");
                }
            });
        }else{
            alert("contraseñas no coinciden");
        }
        
        
    }
});