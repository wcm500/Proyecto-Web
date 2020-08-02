<?php
   $user="root";
   $pass="";
   $server="localhost";
   $db="pruebatarea";
   $con=mysqli_connect($server,$user,$pass);
   mysqli_select_db($con,$db);

    $success  = "";
    
	if (
        isset($_POST['cedula'])) {
    
        $cedula = $_POST['cedula'];
        
        }
    
        $con=mysqli_connect($server,$user,$pass);
        mysqli_select_db($con,$db);
        
        if (isset($_POST['Eliminar'])) {
            try {
                $con=mysqli_connect($server,$user,$pass);
                mysqli_select_db($con,$db);
            
                
                $cedula = $_POST['cedula'];
                
            
                
                if ( $cedula=="") {
                    
                    echo "<script>
                    alert('La cedula esta vacia');
                </script>";
                
                }else{
            
                    $existe = 0;
            
                     $resultados = mysqli_query($con, "SELECT * FROM USUARIO WHERE CEDULA_USUARIO = '$cedula'");
                while ($consulta = mysqli_fetch_array($resultados)) {
            
                    $existe ++;
                }
                if ($existe == 0) {
                 echo "<script>
                alert('El usuario no existe.');
            </script>";
            
                }else{
            
                    $_DELETE_SQL="DELETE FROM USUARIO  WHERE CEDULA_USUARIO = '$cedula'";
            
            
                    mysqli_query($con,$_DELETE_SQL);
                    ECHO  "<script>
                    alert('Eliminado de la tabla');
                </script>";
                
            
                }
                  
            
                 
                }
            } catch (\Throwable $th) {
                echo "<script>
            alert('no se ha eliminado el usuario');
        </script>";
        
            }
        }



    
?>