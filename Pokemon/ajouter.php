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

                            $nom = $type = $evolution = $image = "";
                            $nomErreur = $typeErreur = $evolutionErreur = $imageErreur = "";
                            $erreur = false;

                            if ($_SERVER['REQUEST_METHOD'] == "POST"){
                                //CAS #2
                                //On vient de recevoir le formulaire
                                
                                if(empty($_POST['nom'])){
                                    $nomErreur = "Le nom ne peut pas être vide";
                                    $erreur  = true;
                                }
                                else{
                                    $nom = trojan($_POST['nom']);
                                }

                                if(empty($_POST['type'])){
                                    $typeErreur = "Le type ne peut pas être vide";
                                    $erreur  = true;
                                }
                                else{
                                    $type = trojan($_POST['type']);
                                }

                                if(empty($_POST['evolution'])){
                                    $evolutionErreur = "L'évolution ne peut pas être vide";
                                    $erreur  = true;
                                }
                                else{
                                    $evolution = trojan($_POST['evolution']);
                                }

                                if(empty($_POST['image'])){
                                    $imageErreur = "L'image ne peut pas être vide";
                                    $erreur  = true;
                                }
                                else{
                                    $image = trojan($_POST['image']);
                                }

                                //AFFICHER LE RÉSULTAT DE MON FORM
                            }
                            if ($_SERVER['REQUEST_METHOD'] != "POST" || $erreur == true){
                                // Cas #1 On veut afficher le formulaire
                            ?>
                                <h3>Ajouter un pokémon</h3>
                                <p>Remplissez les champs ci-dessous</p>
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" name="nom" maxLength="25" placeholder="Nom" value="<?php echo $nom;?>">
                                        <p style="color:red;"><?php echo $nomErreur; ?></p>
                                    </div>

                                    <div class="col-md-12">
                                        <select class="form-select" name="type" style="margin-top: 0px">
                                            <option selected disabled value="">Type</option>
                                            <option value="Bug" <?php if($type == "Bug"){echo "Selected";} ?>>Bug</option>
                                            <option value="Dark" <?php if($type == "Dark"){echo "Selected";} ?>>Dark</option>
                                            <option value="Dragon" <?php if($type == "Dragon"){echo "Selected";} ?>>Dragon</option>
                                            <option value="Electric" <?php if($type == "Electric"){echo "Selected";} ?>>Electric</option>
                                            <option value="Fairy" <?php if($type == "Fairy"){echo "Selected";} ?>>Fairy</option>
                                            <option value="Fire" <?php if($type == "Fire"){echo "Selected";} ?>>Fire</option>
                                            <option value="Fighting" <?php if($type == "Fighting"){echo "Selected";} ?>>Fighting</option>
                                            <option value="Flying" <?php if($type == "Flying"){echo "Selected";} ?>>Flying</option>
                                            <option value="Ghost" <?php if($type == "Ghost"){echo "Selected";} ?>>Ghost</option>
                                            <option value="Grass" <?php if($type == "Grass"){echo "Selected";} ?>>Grass</option>
                                            <option value="Ground" <?php if($type == "Ground"){echo "Selected";} ?>>Ground</option>
                                            <option value="Ice" <?php if($type == "Ice"){echo "Selected";} ?>>Ice</option>
                                            <option value="Normal" <?php if($type == "Normal"){echo "Selected";} ?>>Normal</option>
                                            <option value="Poison" <?php if($type == "Poison"){echo "Selected";} ?>>Poison</option>
                                            <option value="Psychic" <?php if($type == "Psychic"){echo "Selected";} ?>>Psychic</option>
                                            <option value="Rock" <?php if($type == "Rock"){echo "Selected";} ?>>Rock</option>
                                            <option value="Steel" <?php if($type == "Steel"){echo "Selected";} ?>>Steel</option>
                                            <option value="Water" <?php if($type == "Water"){echo "Selected";} ?>>Water</option>
                                        </select>
                                        <p style="color:red;"><?php echo $typeErreur; ?></p>
                                    </div>
                                    <div class="col-md-12">
                                        <select class="form-select" name="evolution" style="margin-top: 0px" value="<?php echo $evolution;?>">
                                            <option selected disabled value="">évolution</option>
                                            <option value="1" <?php if($evolution == "1"){echo "Selected";} ?>>1</option>
                                            <option value="2" <?php if($evolution == "2"){echo "Selected";} ?>>2</option>
                                            <option value="3" <?php if($evolution == "3"){echo "Selected";} ?>>3</option>
                                        </select>
                                        <p style="color:red;"><?php echo $evolutionErreur; ?></p>
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" name="image" placeholder="Image" value="<?php echo $image;?>">
                                        <p style="color:red;"><?php echo $imageErreur; ?></p>
                                    </div>

                                    <div class="form-button mt-3" style="text-align:right;">
                                        <a href="index.php"><span class="btn btn-primary">Annuler</span></a>
                                        <button id="submit" type="submit" class="btn btn-primary">Ajouter</button>
                                    </div>
                                </form>
                            <?php
                                } else if ($_SERVER['REQUEST_METHOD'] != "POST" || $erreur == false){
                                    $sql = "INSERT INTO pokemon (id, nom, type, evolution, image)
                                    VALUES (NULL, '$nom', '$type', $evolution, '$image')";
                                    if (mysqli_query($conn, $sql)) {
                                        header("Location: index.php");
                                        die();
                                    } else {
                                    echo "<div style='color: white'>Error: " . $sql . "<br>" . mysqli_error($conn) . "</div>";
                                    }
                                    mysqli_close($conn);
                                    
                                }
                            ?>
                            <?php
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