<?php

try{
  $user="root";
  $pass="";
  $server="localhost";
  $db="mercadovirtualcr";
  $con=mysqli_connect($server,$user,$pass);
  mysqli_select_db($con,$db);
  echo "<script>
  alert('Conectado a la base de datos');
</script>";
}
catch(MysqlException $e){
  die("Eror al conectarse con Mysql ");
}

?>