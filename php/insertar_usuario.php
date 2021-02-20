<?php 

if(isset($_POST["dni"]) && isset($_POST["nombre"]) && isset($_POST["apellidos"]) && isset($_POST["fecha"])) {

  $dni = $_POST["dni"] ?? die("Introduzca un dni válido");
  $nombre = $_POST["nombre"] ?? die("Introduzca un nombre válido");
  $apellidos = $_POST["apellidos"] ?? die("Introduzca un apellidos válido");
  $fecha = $_POST["fecha"] ?? die("Introduzca un fecha válido");


  try
    {
    //datos de la conexión
    $servidor = 'localhost';
    $dbname = 'socios_registrados';
    $user = 'root';
    $password = '';

    //conexion a mysql
      $dsn = "mysql:host=localhost;dbname=$dbname";
      $dbh = new PDO($dsn, $user, $password);
      
      //Gestion de errores
      $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

      // prepare the query
      $sql = "INSERT into socios (dni, nombre, apellidos, fecha) values (:dni, :nombre, :apellidos, :fecha)";

      // bind date to the query
      $stmt = $dbh->prepare($sql);
      $stmt->bindParam(':dni', $dni);
      $stmt->bindParam(':nombre', $nombre);
      $stmt->bindParam(':apellidos', $apellidos);
      $stmt->bindParam(':fecha', $fecha);
      
      // execute query
      $result = $stmt->execute();

      // print message on success
      if($result) {
        echo json_encode("ok");
      }
    }
    catch(PDOException $e)
    {
      // echo '<pre>';
      // echo 'Line: '.$e->getLine().'<br>';
      // echo 'File: '.$e->getFile().'<br>';
      // echo 'Message: '.$e->getMessage();
      // echo '</pre>';

      // echo json_encode($e->getCode());
      echo json_encode($e->getMessage());

      // echo json_encode("error");

    } finally 
  {
    //cerrar la conexion 
    $dbh = null;
  }

} else {
  echo "<pre>";
  var_dump($GLOBALS);
  echo "</pre>";
}

?>