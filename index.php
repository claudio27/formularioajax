<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Enviar formulario con Ajax Jquery</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.css">


<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>

<script>   
$(function(){
     
      var notificacion = $("#notificacion"); // para q sea mas rapido
      notificacion.hide();
     
     $("#btn_enviar").click(function(){
     var url = "dame-datos.php"; // El script a dónde se realizará la petición.
    
        $.ajax({
               type: "POST",
               url: url,
               data: $("#formulario").serialize(), // Adjuntar los campos del formulario enviado.
               success: function(data)
               {
                   $("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                    notificacion.show(1000);
                    notificacion.fadeOut(3000);
                   
                }
             });
        return false; // Evitar ejecutar el submit del formulario.
     });
     
     $("#btn1").on('click',function(){

        $('#texto').toggle(1000);
     });

     $("#btn2").on('click',function(){

        $('#texto').show(1000,function(){});
     });

     $("#btn3").on('click',function(){

        $('#texto').hide(1000,function(){});
     });

     $("#envia_post").on('click', function(){
// setear variables para enviar
  var nombre_valor = $("#fname").val();
  var clave_valor = $("#fpass").val();

      $.post("post.php",{nombre: nombre_valor, clave: clave_valor},
        function(datos_recuperados){

          $("#respuesta_post").html(datos_recuperados);
          // retornar falso para que no actualice la pagina
          return false; 

        });

     });

});
</script>
</head>
<body>

<div class="row">
<div class="container">
      <a href="#" class="btn btn-primary">fdsafdaf</a>

  <input type="button" id="btn1" value="toogle" class="btn btn-primary" >
  <input type="button" id="btn2" value="mostrar show">
  <input type="button" id="btn3" value="esconder hide">

</div>
</div>  
  <div id="texto" class="container">
<p>Al enviar el formulario vía ajax, consultaremos en el archivo dame-datos.php si el valor del campo nombre se 
encuentra en el array y la respuestas será positiva o negativa, según su valor.</p>
<p>El Array contiene los siguientes nombres ... <b>antonio, pedro, alberto</b></p>
  </div>

<div class="row" id="notificacion">
   
      <div class="col-md-4 col-md-offset-4">
        <div class="alert alert-success alert-dismissible" role="alert">
           
            <div id="respuesta"></div>

      </div>
    </div>
  
</div>

<div class="row">
  <div class="container">
      <div class="col-md-6">
        <form method="post" id="formulario">
          <div class="form-group">
        <label for="fnombre">Introduce un nombre:</label>
        <input type="text" name="nombre" id="fnombre" class="form-control">
        <!-- <input type="button" id="btn_enviar" value="Buscar nombre"> -->
          </div>
        <button type="submit" class="btn btn-default" id="btn_enviar">Buscar</button>
        </form>

      </div>
  </div>
</div>


<h2>Ejemplo alert con botón</h2>
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <strong>Warning!</strong> Better check yourself, you're not looking too good.
</div>

<br>

 <h1 class="text-center">Ejemplo del método post de ajax</h1>
<div class="row">
  <div class="container">
    <div class="col-md-4 col-md-offset-4">

      <form method="post" id="formpost">
        <div class="form-group">
          <label for="fname"> Nombre
          </label>
          <input type="text" name="name" id="fname" class="form-control">
          <label for="fpass"> Clave
          </label>
          <input type="password" name="pass" id="fpass" class="form-control">
        </div>
        <button type="button" class="btn btn-success" id="envia_post">Enviar post</button>
      </form>

    </div>
  </div>
</div>

<br>

<div class="row">
<div class="col-md-4 col-md-offset-4">
  <div class="alert alert-success">
      >  <p id="respuesta_post"></p>  <!-- acá va el mensaje que llega desde el php -->
    </div>
</div>
</div>




</body>
</html>