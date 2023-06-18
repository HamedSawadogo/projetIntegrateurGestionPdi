<?php
if(!isset($_SESSION['username'])&&!isset($_SESSION['role'])) {
    header("location:../login.php");
    die();
}
$username=$_SESSION['username'];
$role=$_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="en fr">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Administration du Systeme</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
   <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="css/style.css">

<body>

   <nav class="navbar  navbar-expand-lg navbar-light bg-dark" id="navbar">
      <a class="navbar-brand text-primary" href="#"> Espace Admin, Bienvenu <?=$username??""  ?></a>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav mr-auto">

            <li class="nav-item active">
               <a class="nav-link text-light" href="#">éditer Mon Compte</a>
            </li>
            <li class="nav-item active">
               <form method="post" action="deconnection.php">
                  <!--  <a class="nav-link text-light" href="deconnection.php">Se déconnecter</a>!-->
                  <button type="submit" value="Se Déconnecter">SE deconnecter</button>
               </form>
            </li>
         </ul>
      </div>
   </nav>

   <div class="container">
      <div class="table-wrapper">
         <div class="table-title">
            <div class="row">
               <div class="col-sm-6">
                  <h2>Gestion des <b>Utilisateurs</b></h2>
               </div>
               <div class="col-sm-6">
                  <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i
                        class="material-icons">&#xE147;</i> <span>Ajouter un utilisateur</span></a>
                  <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i
                        class="material-icons">&#xE15C;</i> <span>Supprimer</span></a>
               </div>
            </div>
         </div>
         <table class="table table-striped table-hover">
            <thead>
               <tr>
                  <th>
                     <span class="custom-checkbox">
                        <input type="checkbox" id="selectAll">
                        <label for="selectAll"></label>
                     </span>
                  </th>
                  <th>nom</th>
                  <th>mot de passe</th>
                  <th>telephone</th>
                  <th>role</th>
                  <th>Actions</th>
               </tr>
            </thead>
            <tbody>



            </tbody>
         </table>
         <div class="clearfix">

            <ul class="pagination">
               <li class="page-item disabled"><a href="#">précédent</a></li>
               <li class="page-item"><a href="#" class="page-link">1</a></li>
               <li class="page-item"><a href="#" class="page-link">2</a></li>
               <li class="page-item active"><a href="#" class="page-link">3</a></li>
               <li class="page-item"><a href="#" class="page-link">4</a></li>
               <li class="page-item"><a href="#" class="page-link">5</a></li>
               <li class="page-item"><a href="#" class="page-link">Suivant</a></li>
            </ul>
         </div>
      </div>
   </div>
   <!-- Edit Modal HTML -->
   <div id="addEmployeeModal" class="modal fade">
      <div class="modal-dialog">
         <div class="modal-content">
            <form>
               <div class="modal-header">
                  <h4 class="modal-title">ajouter Utilisateur</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               </div>
               <div class="modal-body">
                  <div class="form-group">
                     <label>nom utilisateur</label>
                     <input type="text" class="form-control" required>
                  </div>
                  <div class="form-group">
                     <label>role</label>
                     <input type="text" class="form-control" required>
                  </div>
                  <div class="form-group">
                     <label>mot de passe</label>
                     <input type="password" class="form-control" required>
                  </div>
                  <div class="form-group">
                     <label>contact</label>
                     <input type="text" class="form-control" required>
                  </div>
               </div>
               <div class="modal-footer">
                  <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                  <input type="submit" class="btn btn-success" data-dismiss="modal" value="Enregistrer">
               </div>
            </form>
         </div>
      </div>
   </div <!-- Edit Modal HTML -->
   <div id="editEmployeeModal" class="modal fade">
      <div class="modal-dialog">
         <div class="modal-content">
            <form>
               <div class="modal-header">
                  <h4 class="modal-title">Modifier Utilisateur</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               </div>
               <div class="modal-body">
                  <div class="form-group">
                     <label>nom utilisateur</label>
                     <input type="text" class="form-control" required>
                  </div>
                  <div class="form-group">
                     <label>role</label>
                     <input type="email" class="form-control" required>
                  </div>
                  <div class="form-group">
                     <label>mot de passe</label>
                     <input type="text" class="form-control" required>
                  </div>
                  <div class="form-group">
                     <label>contact</label>
                     <input type="text" class="form-control" required>
                  </div>
               </div>
               <div class="modal-footer">
                  <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                  <input type="submit" class="btn btn-info" value="Enregistrer">
               </div>
            </form>
         </div>
      </div>
   </div>
   <!-- Delete Modal HTML -->
   <div id="deleteEmployeeModal" class="modal fade">
      <div class="modal-dialog">
         <div class="modal-content">
            <form>
               <div class="modal-header">
                  <h4 class="modal-title">Supprimer un utilisateur</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               </div>
               <div class="modal-body">
                  <p>etes vous sur de supprimer cet Utilisateur?</p>
                  <p class="text-warning"><small>Cette action ne peut pas être annulée.</small></p>
               </div>
               <div class="modal-footer">
                  <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                  <input type="submit" class="btn btn-danger" data-dismiss="modal" value="Supprimer">
               </div>
            </form>
         </div>
      </div>
   </div>
</body>

</html>