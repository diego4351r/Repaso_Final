<?php 

try
  {
    //datos de la conexión
    $servidor = 'localhost';
    $dbname = 'socios_registrados';
    $user = 'root';
    $password = '';
    
    //conexión a mysql
    $dsn = "mysql:host=localhost;dbname=$dbname";
    $dbh = new PDO($dsn, $user, $password);
    
    //Gestion de errores
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    // prepare the query
    $sql = "SELECT * from socios";
    
    //OBTENEMOS UN RESULTSET
    $stmt = $dbh->query($sql);
    $resultset = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //RESPUESTA AJAX
     echo json_encode($resultset);
  }
  catch(PDOException $e)
  {
    echo '<pre>';
    echo 'Linea: '.$e->getLine().'<br>';
    echo 'Archivo: '.$e->getFile().'<br>';
    echo 'Mensaje: '.$e->getMessage();
    echo '</pre>';
  } finally 
  {
  //cerrar la conexion 
  $dbh = null;
  }

?>