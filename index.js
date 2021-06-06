function init(){

}
$(document).ready(function(){
    
});
$(document).on("click", "#enviar_comment", function(){
    console.log('click en el boton enviar');
    var comendarios = $('#comendarios').val();
    //console.log(comendarios);

    if(comendarios == ''){
        alert('Campo vacio');
    }else{
        $.post("/controlador/usuarioC.php?op=comentar",{comendarios:comendarios},function(data){
            /*data = JSON.parse(data);*/
            console.log(data);
            location.reload();
        });
    }
});