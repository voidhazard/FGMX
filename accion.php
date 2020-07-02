 <?php
  session_start();

    if(!isset($_SESSION["id"])){
    header('location: ../profesor/index2.php');
  }
?>


<?php

$conex = mysqli_connect("localhost","scaeupii_root","pelusa","scaeupii_scae");
if (isset($_POST['buscar'])) {
 
        $nombre_p= $_POST['nombre_p'];
        

        if(empty($nombre_p)){

            echo "Selecciona un nombre";
            header("location: consulta_profesor.php");
          

        }else{
             
            $busca_p=mysqli_query($conex,"SELECT  * FROM profesor where nombre_p='$nombre_p'");
            $resbusca= mysqli_fetch_array($busca_p);
            $id_profesor=$resbusca['id_profesor'];
            $nombre_p=$resbusca['nombre_p'];
            $telefono=$resbusca['telefono'];
            $direc=$resbusca['direccion'];
            $archivo=$resbusca['documentos'];
            $correo=$resbusca['correo'];


            ?>

           <html lang="en-US">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ADMINISTRADOR</title>
<link href="../alumno/css/singlePageTemplate.css" rel="stylesheet" type="text/css">

<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/source-sans-pro:n2:default.js" type="text/javascript"></script>
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/main.js"></script>
<script src="js/jquery-ui.js"></script>

<link rel="icon" type="image/png" href="../images/SCAE.png" />
</head>

<div class="container"> 
  
<header>
        
<strong><H1 class="logo">SCAE</H1></strong>

    <nav>
      <ul>
  
         <li><a href="http://scaeupiicsa.com.mx/admin/submenu_profesor.php">INICIO</a></li>
        <li><a href="http://scaeupiicsa.com.mx/profesor/cambiar_contra.php">CAMBIAR CLAVE</a></li>
        <li><a href="http://scaeupiicsa.com.mx/profesor/controller/cerrarSesion.php">CERRAR SESSION</a></li>
      </ul>
    </nav>
  </header>

        <div style="width: 500px;margin: auto;padding: 30px;">
     <h1 class="sub">Consultar Docente</h1>
      <br>
      <br>
     <div class="cuadro">
         <br>
            <form method="post" enctype="multipart/form-data">
                <center><table>
                    
                           <tr>
                        <td><label>Nombre</label></td>
                        <td><input type="text" name="nombre_p" value="<?php echo $nombre_p; ?>" style="width: 170px"  readonly="readonly"></td>
                    </tr>

                      <tr>
                        <td><label>Teléfono</label></td>
                        <td><input type="text" name="telefono" value="<?php echo $telefono; ?>" style="width: 170px"  readonly="readonly"></td>
                    </tr>

                     <tr>
                        <td><label>Domicilio</label></td>
                        <td><input type="text" name="direccion" value="<?php echo $direc; ?>" style="width: 170px"  readonly="readonly"></td>
                    </tr>
                    
                    <tr>
                        <td><label>Correo</label></td>
                        <td><input type="text" name="correo" value="<?php echo $correo; ?>" style="width: 170px"  readonly="readonly"></td>
                    </tr>
                     
                    <tr>
                        <td><label>Documentos</label></td>
                        <td><a href="archivo_p.php?id_profesor=<?php echo $resbusca['id_profesor']?>"><?php echo $resbusca['documentos']; ?></td>
                        </tr> 
         




            
    
                </table>        </div>




            </form>  
            
            
        </div>
        
        
        
        <br>
           <br>
            <center><a href="http://scaeupiicsa.com.mx/admin/consulta_profesor.php" class="button" style="text-decoration:none">Regresar</a>
            
            <br>
           <br>
           <br>
           <br>
           <br>
           <br>
           <br>
           <br>
           <br>
           <br>
           <br>
            <section class="footer_banner" id="contact">
    <h2 class="hidden">Footer Banner Section </h2>
     </section>
  <!-- Copyrights Section -->
  <div class="copyright">&copy;2020 - <strong>scae upiicsa</strong></div>
</div>
    </body>
</html>




            <?php



}


}




if (isset($_POST['editar'])) {
 
        $nombre_p= $_POST['nombre_p'];
        

        if(empty($nombre_p)){

            echo "Selecciona un nombre";
            header("location: consulta_profesor.php");
          

        }else{
             
            $busca_p=mysqli_query($conex,"SELECT  * FROM profesor where nombre_p='$nombre_p'");
            $resbusca= mysqli_fetch_array($busca_p);
            $id_profesor=$resbusca['id_profesor'];
            $nombre_p=$resbusca['nombre_p'];
            $telefono=$resbusca['telefono'];
            $direc=$resbusca['direccion'];
            $archivo=$resbusca['documentos'];
            $correo=$resbusca['correo'];


            ?>
  
<html lang="en-US">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ADMINISTRADOR</title>
<link href="../alumno/css/singlePageTemplate.css" rel="stylesheet" type="text/css">

<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/source-sans-pro:n2:default.js" type="text/javascript"></script>
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/main.js"></script>
<script src="js/jquery-ui.js"></script>
<script>
  function soloLetras(e) {
      key = e.keyCode || e.which;
      tecla = String.fromCharCode(key).toLowerCase();
      letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
      especiales = [8, 37, 39, 46];
  
      tecla_especial = false
      for(var i in especiales) {
          if(key == especiales[i]) {
              tecla_especial = true;
              break;
          }
      }
  
      if(letras.indexOf(tecla) == -1 && !tecla_especial)
          return false;
  }
  
  function limpia() {
      var val = document.getElementById("miInput").value;
      var tam = val.length;
      for(i = 0; i < tam; i++) {
          if(!isNaN(val[i]))
              document.getElementById("miInput").value = '';
      }
  }

  function SoloNumeros(evt){
 if(window.event){//asignamos el valor de la tecla a keynum
  keynum = evt.keyCode; //IE
 }
 else{
  keynum = evt.which; //FF
 } 
 //comprobamos si se encuentra en el rango numérico y que teclas no recibirá.
 if((keynum > 47 && keynum < 58) || keynum == 8 || keynum == 13 || keynum == 6 ){
  return true;
 }
 else{
  return false;
 }
}

  </script>

<link rel="icon" type="image/png" href="../images/SCAE.png" />
</head>

<div class="container"> 
  
<header>
        
<strong><H1 class="logo">SCAE</H1></strong>

    <nav>
      <ul>
  
         <li><a href="http://scaeupiicsa.com.mx/admin/submenu_profesor.php">INICIO</a></li>
        <li><a href="http://scaeupiicsa.com.mx/profesor/cambiar_contra.php">CAMBIAR CLAVE</a></li>
        <li><a href="http://scaeupiicsa.com.mx/profesor/controller/cerrarSesion.php">CERRAR SESSION</a></li>
      </ul>
    </nav>
  </header>

        <div style="width: 500px;margin: auto;padding: 30px;">
            <h1 class="sub">Editar Registros</h1>
            <br>
             <br>
              <br>
            <div class="cuadro"> 
             <form id="formulario_editar" name="formulario_editar" enctype="multipart/form-data" method="POST">
                <center> <table>


                        <tr>
                        <td><label>ID</label></td>
                        <td><input type="text" name="id_profesor" value="<?php echo $id_profesor; ?>" style="width: 170px" readonly="readonly"></td>
                    </tr>
                           

                           <tr>
                        <td><label>Nombre</label></td>
                        <td><input type="text" name="nunombre" value="<?php echo $nombre_p; ?>" style="width: 170px" pattern="[a-zA-Z-\s]+" onkeypress="return soloLetras(event)"></td>
                    </tr>

                      <tr>
                        <td><label>Teléfono</label></td>
                        <td><input type="text" name="nutelefono" value="<?php echo $telefono; ?>" style="width: 170px" maxlength="10" minlength="10" pattern="[0-9]+" required onKeyPress="return SoloNumeros(event);"></td>
                    </tr>

                     <tr>
                        <td><label>Domicilio</label></td>
                        <td><input type="text" name="nudireccion" value="<?php echo $direc; ?>" style="width: 170px"  minlength="10" ></td>
                    </tr>
                    
                     <tr>
                        <td><label>Correo</label></td>
                        <td><input type="email" name="nucorreo" value="<?php echo $correo; ?>" style="width: 170px" ></td>
                    </tr>

                    <tr>
                        </center><td><label>Editar Documentos</label></td>
                         <br>
                        <td colspan="2"><input type="file" name="nuarchivo"  ></td> </tr>
               
    
                </table>
                  
                   <center><input type="button"   value="GUARDAR"  id="btn" name="btn" onclick="guardar();">
                   
</div>


            </form>            
        </div>
        
         <br>
           <br>
            <center><a href="http://scaeupiicsa.com.mx/admin/consulta_profesor.php" class="button" style="text-decoration:none">Regresar</a>
            
            <br>
           <br>
           <br>
           <br>
           <br>
           <br>
           <br>
           <br>
           <br>
           <br>
           <br>
            <section class="footer_banner" id="contact">
    <h2 class="hidden">Footer Banner Section </h2>
     </section>
  <!-- Copyrights Section -->
  <div class="copyright">&copy;2020 - <strong>scae upiicsa</strong></div>
</div>
        <script src="js/profesor.js"></script>
    </body>
</html>




            <?php



}
   

}



if (isset($_POST['ASIGNAR'])) {
    $nombre_p= $_POST['nombre_p'];

    if(empty($nombre_p)){

        header("location:consulta_profesor.php");

    }else
    {
 
                   
     $busca_p=mysqli_query($conex,"SELECT  * FROM profesor where nombre_p='$nombre_p'");
     $resbusca= mysqli_fetch_array($busca_p);
     $id_profesor=$resbusca['id_profesor'];



  ?><html lang="en-US">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ADMINISTRADOR</title>
<link href="../alumno/css/singlePageTemplate.css" rel="stylesheet" type="text/css">

<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/source-sans-pro:n2:default.js" type="text/javascript"></script>
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/main.js"></script>
<script src="js/jquery-ui.js"></script>
<script>
  function soloLetras(e) {
      key = e.keyCode || e.which;
      tecla = String.fromCharCode(key).toLowerCase();
      letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
      especiales = [8, 37, 39, 46];
  
      tecla_especial = false
      for(var i in especiales) {
          if(key == especiales[i]) {
              tecla_especial = true;
              break;
          }
      }
  
      if(letras.indexOf(tecla) == -1 && !tecla_especial)
          return false;
  }
  
  function limpia() {
      var val = document.getElementById("miInput").value;
      var tam = val.length;
      for(i = 0; i < tam; i++) {
          if(!isNaN(val[i]))
              document.getElementById("miInput").value = '';
      }
  }

  function SoloNumeros(evt){
 if(window.event){//asignamos el valor de la tecla a keynum
  keynum = evt.keyCode; //IE
 }
 else{
  keynum = evt.which; //FF
 } 
 //comprobamos si se encuentra en el rango numérico y que teclas no recibirá.
 if((keynum > 47 && keynum < 58) || keynum == 8 || keynum == 13 || keynum == 6 ){
  return true;
 }
 else{
  return false;
 }
}

  </script>

<link rel="icon" type="image/png" href="../images/SCAE.png" />
</head>

<div class="container"> 
  
<header>
        
<strong><H1 class="logo">SCAE</H1></strong>

    <nav>
      <ul>
  
         <li><a href="http://scaeupiicsa.com.mx/admin/submenu_profesor.php">INICIO</a></li>
        <li><a href="http://scaeupiicsa.com.mx/profesor/cambiar_contra.php">CAMBIAR CLAVE</a></li>
        <li><a href="http://scaeupiicsa.com.mx/profesor/controller/cerrarSesion.php">CERRAR SESSION</a></li>
      </ul>
    </nav>
  </header>
 <div style="width: 500px;margin: auto;padding: 30px;">
            <h1 class="sub">Asignar Actividad</h1>
            <br>
           <br>
           <br>
           <div class="cuadro">
             
          <form id="formulario_asignar" name="formulario_asignar" enctype="multipart/form-data" method="POST">>

               <center><table>
                        <tr>
                        <td><label>ID del Profesor</label></td>
                        <td><input type="text" name="id_profesor" value="<?php echo $id_profesor; ?>" style="width: 170px" readonly="readonly"></td>
                    </tr>
                

                       <tr>
                        <td><label>Nombre de la Actividad</label></td>
                        <td><input type="text" name="nombre_act" style="width: 170px" onkeypress="return soloLetras(event)"></td></td>
                       </tr>
                   

                  
                    <tr>
                        <td><label>Materiales</label></td>
                        <td><textarea name="materiales" style="width: 170px"></textarea></td>
                    </tr>
                    
                    
                     <tr>
                        <td><label>Cupo</label></td>
                        <td><input type="number" name="cupo" style="width: 170px" min="1" max="40" required required onKeyPress="return SoloNumeros(event);"></td>
                    </tr>
                    
                                <tr>
                        <td><label>Horas por Credito</label></td>
                        <td><input type="number" name="creditos" style="width: 170px" min="1" max="40" required required onKeyPress="return SoloNumeros(event);"></textarea></td>
                    </tr>
          

                    
    
                </table>
                        
                   <center><input type="button"   value="GUARDAR"  id="btn" name="btn" onclick="asignar();">
                 </div>
                 
            </form>            
        </div>
         
         <br>
           <br>
            <center><a href="http://scaeupiicsa.com.mx/admin/consulta_profesor.php" class="button" style="text-decoration:none">Regresar</a>
            
            <br>
           <br>
           <br>
           <br>
           <br>
           <br>
           <br>
           <br>
           <br>
           <br>
           <br>
            <section class="footer_banner" id="contact">
    <h2 class="hidden">Footer Banner Section </h2>
     </section>
  <!-- Copyrights Section -->
  <div class="copyright">&copy;2020 - <strong>scae upiicsa</strong></div>
</div>
        <script src="js/profesor.js"></script>
    </body>
    </html>
   

<?php
}
}

?>

