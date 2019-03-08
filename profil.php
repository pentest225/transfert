<?php 
session_start();

require_once ('admin/dataBase.php');
// if(isset($_GET['id'])){
//   $id=$_GET['id'];
// }

$db=DB::connect();
$InfoUser=$db->prepare('SELECT * FROM client WHERE Nom= ?');
$InfoUser->execute(array($_SESSION['Login']));
$Info=$InfoUser->fetch();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <title>PentesBanqueM/Profil</title>
</head>
<body>
  <?php 
    include 'nav.php';
  ?>
  <div class="container profil">
        <div class=" col-md-4">
            <img src="<?php echo'images/'.$Info['UserImage'].''?>" alt="Errur de chagement de l'image" width=auto height=150px>
        </div>
        <div class="col-md-4  ">
          <h4>Login :<em class='orange'><?php echo $Info['Nom'] ?> </em></h4>
          <h4>Numero :<em class='orange'><?php echo $Info['Numero'] ?> </em></h4>
          <h4>Code de payement :<em class='orange'><?php echo $Info['code'] ?> </em></h4>
          <div class="solde">
            <h4>Solde :<em class='orange'><?php echo $Info['Solde'] ?> Frcfa </em></h4>
        </div>
        </div>
        
        <div class=" col-md-4">
            <h4><a href="notification.php" class="btn btn-warning"><span ><?php echo $Info['Notification']?> </span>notification</a></h4>

            <a href="Include/ModifierProfil.php" class="btn btn-info"><span class="glyphicon glyphicon-pencil"> </span> Modifier Mon Profil</a>
        </div>
    </div>
  
  </div>
</body>
</html>