<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
         
         
  
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
  
 <script language="javascript" src="javascript.js"></script> 
  
  
  <link rel="stylesheet" href="css.css" type="text/css">
    </head>
    <body>
        <div class="container">
            <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><center><table border="1" class="tabla">
            <tr><th>Matricula</th><th>Modelo</th><th>Conductor</th><th>Ocupado</th></tr>
            <?php
            $conexion=mysqli_connect("localhost:3306","root","","helenam6_taxi");
            $sel="select * from taxis";
            $query=mysqli_query($conexion,$sel);
           
            
            while ($registro=mysqli_fetch_array($query)) {
             $Ocupado="";
             if ($registro[4]=="0")
                 $Ocupado="No";
             if ($registro[4]=="1")
                 $Ocupado="Si";
             
            
                ?>
            <tr><td><?php echo($registro[0]); ?></td><td><?php echo($registro[1]); ?></td><td><?php echo($registro[2] . " " . $registro[3]); ?></td><td><?php echo($Ocupado); ?></td></tr>
            <?php
            }
            ?>
            <tr><td colspan="4" align="center"><font color="red">
                    Taxis libres:
                   <?php  $sel2="select * from taxis where Ocupado='0'";
            $query=mysqli_query($conexion,$sel2);
                   echo(mysqli_affected_rows($conexion)); ?>  -  Total Taxis: <?php
                   $sel="select * from taxis";
            $query=mysqli_query($conexion,$sel);
            echo(mysqli_affected_rows($conexion)); ?></font> </td></tr>
                </table></center></div></div></div>
        
    </body>
</html>
