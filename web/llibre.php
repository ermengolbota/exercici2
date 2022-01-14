<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
?>
<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estils.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Palanquin+Dark&display=swap" rel="stylesheet">
    <title>Un llibre concret</title>
</head>
<body>
    <main>
         <article>
            <h1>Detalls del llibre</h1>
<?php
    $idBook=$_GET["id"];
    $DBhost = "labs.inspedralbes.cat";
    $DBuser = "ebota_unUsuari";
    $DBpass = "1GranPassword";
    $DBname = "ebota_algunesDades";

 try{
  $DBcon = new PDO("mysql:host=$DBhost;dbname=$DBname",$DBuser,$DBpass);
  $DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }catch(PDOException $ex){
  die($ex->getMessage());
 }

 $query = "SELECT * FROM BOOK WHERE id=".$idBook;
 $stmt = $DBcon->prepare($query);
 $stmt->execute();
 
 
 while($row=$stmt->fetch(PDO::FETCH_ASSOC))
  {  

?>
    <header>
        <?php echo $row[title]; ?>
    </header>
    <p>
        <?php echo $row[summary]; ?>
  </p>
 <?php
    }
 
?>
        
</article>
</main>
<a href="./index.php" title="Inici">Inici</a>
</body>

</html>