console.log("Esta llamando al archivo");

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

    console.log(usu_nom)
    console.log(usu_correo);
    console.log(usu_pass);

    if(usu_nom == '' || usu_correo == '' || usu_pass== '' || usu_pass1== ''){
        alert("Campos vacios");
    }else{
        if(usu_pass == usu_pass1){
            $.post("../controlador/usuarioC.php?op=registro",{usu_nom:usu_nom,usu_correo:usu_correo,usu_pass},function(data){
                data = JSON.parse(data);
                console.log(data);
                if(data == 0){
                    alert("Registro exitoso");
                    window.open('../index.html','_self');
                }else{
                    alert("Correo ya existe");
                }
            });
        }else{
            alert("contraseñas no coinciden");
        }
        
        
    }
});