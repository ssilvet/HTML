<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piletite süsteem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="mt-5"><strong>Piletite süsteem</strong></h1>
    <p>Piletite üksikasjad, erinevatel SQL päringutel.</p>

    <?php
    //andmebaasiga ühendamine
    $dbnimi = "localhost";
    $kasutajanimi = "root";
    $pw = "";
    $andmebaas = "tickets";
    $yhendus = new mysqli($dbnimi, $kasutajanimi, $pw, $andmebaas); 

    // kontroll ühenduse üle
    if ($yhendus->connect_error) {
        die("Ühendus ebaõnnestus: " . $yhendus->connect_error); // kui ühendust ei ole kuvab veateate
    }

    // nõutud päringute massiiv
    $queries = [
        "Kõik lahendatud piletid" => "SELECT * FROM tickets WHERE status = 'resolved'",
        "Keskmine hinnanguline lahendusaeg tundides kõikide avatud piletite jaoks" => "SELECT AVG(estimated_duration_hours) AS avg_resolution_time FROM tickets WHERE status = 'open'",
        "Kõik piletid, mis on määratud isikule nimega 'Luisa Caulliere'" => "SELECT * FROM tickets WHERE assigned_to = 'Luisa Caulliere'",
        "Kõik piletid, mis loodi enne '2022-01-01' ja on veel avatud" => "SELECT * FROM tickets WHERE created_date < '2022-01-01' AND status = 'open'"
    ];

    foreach ($queries as $description => $sql) { // käib kõik massiivis olevad päringud läbi
        echo "<h2 class='mt-5'>$description</h2>"; 
        echo "<table class='table table-striped'>"; 
        $result = $yhendus->query($sql); // teeb päringu andmebaasist
        if ($result->num_rows > 0) { //kontrollib et vähemalt 1 rida tuli päringust tagasi

            
            if ($description != "Keskmine hinnanguline lahendusaeg tundides kõikide avatud piletite jaoks") {
                $columns = array_keys($result->fetch_assoc()); // võtab esimese tulemuse rea veerud
                echo "<thead><tr>"; 
                foreach ($columns as $column) { // iga veeru nime läbikäimine ja muutmine
                    switch ($column) {
                        case 'id':
                            $column = 'ID';
                            break;
                        case 'issue_description':
                            $column = 'Probleemi kirjeldus';
                            break;
                        case 'priority':
                            $column = 'Prioriteet';
                            break;
                        case 'assigned_to':
                            $column = 'Määratud isikule';
                            break;
                        case 'status':
                            $column = 'Staatus';
                            break;
                        case 'created_date':
                            $column = 'Loomise kuupäev';
                            break;
                        case 'resolved_date':
                            $column = 'Lahendamise kuupäev';
                            break;
                        case 'estimated_duration_hours':
                            $column = 'Hinnanguline kestus (tundides)';
                            break;
                        case 'actual_duration_hours':
                            $column = 'Tegelik kestus (tundides)';
                            break;
                        case 'category':
                            $column = 'Kategooria';
                            break;
                        case 'avg_resolution_time':
                            $column = 'Keskmine lahendusaeg (tundides)';
                            break;
                    }
                    echo "<th scope='col'>$column</th>";
                }
                echo "</tr></thead><tbody>";
                $result->data_seek(0); 
            }

            while ($row = $result->fetch_assoc()) { // käib läbi iga tulemuse rea
                echo "<tr>";
                foreach ($row as $cell) { // iga lahtri väärtuse tulemuse reas läbi käimine
                    echo "<td>$cell</td>"; // kuvab iga lahtri väärtuse
                }
                echo "</tr>";
            }
            echo "</tbody>";
        } else {
            echo "<tr><td colspan='5'>Päringule vastus puudub</td></tr>"; // kui andmebaasist vastust ei ole
        }
        echo "</table>";
    }

    $yhendus->close(); // sulgeb andmebaasi ühenduse
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
