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
    provider.addScope('https://www.googleapis.com/auth/contacts.readonly');
    auth.signInWithPopup(provider)
        .then(function(result){
            var user = result.user;
            console.log(user);
        }).catch(function(error){
            console.log(error);
        });
});
function init(){

}
$(document).ready(function(){

});
$(document).on("click", "#btnlogin", function(){
    console.log("click inicias session");
    var usu_correo = $('#txtcorreo').val();
    var usu_pass = $('#txtpass').val();
    console.log(usu_correo);
    console.log(usu_pass);
    if(usu_correo == '' || usu_pass== ''){
        alert("Campos vacios");
    }else{
        //uso de AJAX
        $.post("../controlador/usuarioC.php?op=acceso",{usu_correo:usu_correo,usu_pass:usu_pass},function(data){
            data = JSON.parse(data);
            console.log(data);
            if(data == 1){
                window.open('../index.html','_self');
            }else{
                alert("Credenciales incorrectos");
            }
        });
    }
});