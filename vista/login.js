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