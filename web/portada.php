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
    <title>Un recull de llibres</title>
</head>
<body>
    <main>
       <h1>Els llibres de l'<img src="http://ebota.alumnes.inspedralbes.cat/img/logo.png" width="100px" title="logo" alt="logo IP" ></h1>

         <article>

<?php
 require_once("db/db.php");
 try{
  $DBcon = new PDO("mysql:host=$DBhost;dbname=$DBname",$DBuser,$DBpass);
  $DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }catch(PDOException $ex){
  die($ex->getMessage());
 }

 $query = "SELECT * FROM BOOK";
 
 $stmt = $DBcon->prepare($query);
 $stmt->execute();
 
 $userData = array();
 
 while($row=$stmt->fetch(PDO::FETCH_ASSOC))
  {  
  ?>
  <a href="./llibre.php?id=<?php echo $row[id]; ?>" title="Dades del llibre">
<section>
    <header><?php echo $row[title];  ?></header>
    <figure>
        <img src="<?php echo $row[cover]; ?>" ">
        <figcaption><?php echo $row[author]; ?></figcaption>
    </figure>
    <p class="intro">
        <?php echo $row[summary]; ?>
    </p>
</section>
  </a>
  <?php
    }
 
?>

</article>
</main>
</body>

</html>
