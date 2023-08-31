<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body style="background: #343a40">
    
    <table class="table table-striped table-dark">
    <thead>
        <tr>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">type</th>
        <th scope="col">evolution</th>
        <th scope="col">image</th>
        </tr>
    </thead>
    <tbody>
        
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

            $conn->query('SET NAMES utf8');
            
            $sql = "SELECT * FROM pokemon";
            
            $result = $conn->query($sql);

            if ($result->num_rows > 0)
            {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo '<tr><th scope="row">' . $row["id"]. "</th><td>" . $row["nom"]. "</td><td>" . $row["type"]. "</td><td>" . $row["stade d'évolution"]. '</td><td><img src="' . $row["image"]. '"alt="'.$row["nom"].'"></td></tr>';
                }
            }
            else
            {
                echo "0 result";
            }
            $conn->close();

        ?>

    </tbody>
    </table>
    <a href="ajouter.php"><button style="background: rgba(255,255,255,0.2); color: white; width: 200px; height: 50px; font-size: 18pt">Ajouter</button></a>
</body>
</html>