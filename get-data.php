<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

            // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "SELECT Nome, Investimento_total, Latitude, Longitude FROM EMPREENDIMENTO NATURAL JOIN UF";
    $result = $conn->query($sql);

    $output = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo json_encode(
                $row["Nome"] . ',' .
                $row["Investimento_total"] . ',' .
                $row["Latitude"] . ',' .
                $row["Longitude"] . ';' . 
                //$row["Imagem_Bandeira"] . ';' . 
                '<br>'
                );
        }
        //print json_encode(array_values($output));
    } else {
        echo json_encode(0);
    }
    $conn->close();
?>

