<!DOCTYPE html>
<html lang="en fr">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
   <title>connection</title>
</head>

<body>
   <div class="container w-25 mt-4">
      <h3>CONNECTION</h3>
      <form method="POST" action="../../indexTest.php">
         <!-- utilisateur -->
         <div class="form-group">
            <label for="username">utilisateur</label>
            <input type="text" autocomplete="off" name="username" class="form-control" id="username"
               placeholder="nom d'utilisateur">

            <!-- mot de passe -->
            <div class="form-group">
               <label for="exampleInputPassword1">mot de passe</label>
               <input autocomplete="off" name="password" type="password" class="form-control" id="password"
                  placeholder="mot de passe">
            </div>
            <!-- catégorie d'utilisateur -->
            <label for="role">Role</label>
            <select name="role" class="form-select form-select-sm" aria-label=".form-select-sm example">
               <option value="Admin">Admin</option>
               <option value="enregistrement">Agent Gestionnaire</option>
               <option value="gestion">Agente Administration</option>
               <option value="decideur">Decideur</option>
            </select>
            <button type="submit" class="btn btn-success mt-2">Se connecter</button>
      </form>
   </div>
</body>

</html>