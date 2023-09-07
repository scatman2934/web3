<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="ajouter.css">
</head>
<body> 
  <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Ajouter un pokémon</h3>
                        <p>Remplissez les champs ci-dessous</p>
                        <form method="post">

                            <div class="col-md-12">
                               <input class="form-control" type="text" name="nom" placeholder="Nom" required>
                            </div>

                            <div class="col-md-12">
                                <select class="form-select mt-3" name="type" required>
                                      <option selected disabled value="">Type</option>
                                      <option value="Bug">Bug</option>
                                      <option value="Dark">Dark</option>
                                      <option value="Dragon">Dragon</option>
                                      <option value="Electric">Electric</option>
                                      <option value="Fairy">Fairy</option>
                                      <option value="Fire">Fire</option>
                                      <option value="Fighting">Fighting</option>
                                      <option value="Flying">Flying</option>
                                      <option value="Ghost">Ghost</option>
                                      <option value="Grass">Grass</option>
                                      <option value="Ground">Ground</option>
                                      <option value="Ice">Ice</option>
                                      <option value="Normal">Normal</option>
                                      <option value="Poison">Poison</option>
                                      <option value="Psychic">Psychic</option>
                                      <option value="Rock">Rock</option>
                                      <option value="Steel">Steel</option>
                                      <option value="Water">Water</option>
                               </select>
                            </div>

                           <div class="col-md-12">
                                <select class="form-select mt-3" name="evolution" required>
                                      <option selected disabled value="">évolution</option>
                                      <option value="1">1</option>
                                      <option value="2">2</option>
                                      <option value="3">3</option>
                               </select>
                           </div>


                           <div class="col-md-12">
                                <input class="form-control" type="text" name="image" placeholder="Image" required>
                           </div>

                            <div class="form-button mt-3" style="text-align:right;">
                                <a href="index.php"><span class="btn btn-primary">Annuler</span></a>
                                <button id="submit" type="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                        </form>

                        <?php

                        
                            $servername = "localhost";
                            $username = "root";
                            $password = "root";
                            $db = "Pokemon";

                            // Create connection
                            $conn = new mysqli($servername, $username, $password, $db);

                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $nom = $_POST["nom"];
                            $type = $_POST["type"];
                            $evolution = $_POST["evolution"];
                            $image = $_POST["image"];
                                
                            $sql = "INSERT INTO `pokemon` (`id`, `nom`, `type`, `evolution`, `image`)
                            VALUES (NULL, $nom, $type, $evolution, $image)";
                            if (mysqli_query($conn, $sql)) {
                            echo "Enregistrement réussi";
                            } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            }
                            mysqli_close($conn);
                        ?>


<?php
        $nom = $prenom = $avatar = "";
        $nomErreur = $prenomErreur = $avatarErreur = "";
        $erreur = false;

        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            //CAS #2
            //On vient de recevoir le formulaire
            echo "<h1>POST == TRUE </h1>";
            
            if(empty($_POST['nom'])){
                $nomErreur = "Le nom ne peut pas être vide";
                $erreur  = true;
            }
            else{
                $nom = trojan($_POST['nom']);
            }
            

            $prenom = trojan($_POST['prenom']);
            $avatar = trojan($_POST['avatar']);

            //AFFICHER LE RÉSULTAT DE MON FORM
        }
        if ($_SERVER['REQUEST_METHOD'] != "POST" || $erreur == true){
            // Cas #1 On veut afficher le formulaire
            echo "<h1>On affiche le formulaire </h1>";
        ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                Nom : <input type="text" name="nom" maxLength="15" value="<?php echo $nom;?>"><br>
                <p style="color:red;"><?php echo $nomErreur; ?></p>

                prenom : <input type="text" name="prenom" value="<?php echo $prenom;?>"> <br>

                Avatar : <input type="text" name="avatar" value="<?php echo $avatar;?>">

                <input type="submit">
            </form>
        <?php
        }

        function trojan($data){
            $data = trim($data); //Enleve les caractères invisibles
            $data = addslashes($data); //Mets des backslashs devant les ' et les  "
            $data = htmlspecialchars($data); // Remplace les caractères spéciaux par leurs symboles comme ­< devient &lt;
            
            return $data;
        }

    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>