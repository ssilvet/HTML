<?php include ('config.php'); 
// kas söögikoha ID on saadud
if (isset($_GET['id'])) {
    $toidukohad_id = $_GET['id'];

    // toidukoha andmed tämbamine andmebaasist
    $stmt = $yhendus->prepare("SELECT nimi, asukoht FROM toidukohad WHERE id = ?");
    $stmt->bind_param('i', $toidukohad_id); 
    $stmt->execute(); //  SQL päringu käivitamine
    $result = $stmt->get_result(); // saame päringu tulemuse
    $toidukoht = $result->fetch_assoc(); // paneme tulemused muutujasse $toidukoht
    // juhul kui toidukohta ei leitud anname veateate
    if (!$toidukoht) {
        die("Toidukohta ei leitud!");
    }
}

$veateade = ''; // veateate jaoks mis on alguses tühi
// hinnangu lisamine
// kontrollime, kas kasutaja on vormi saatnud
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // andmed vormilt
    $nimi = $_POST['nimi'];
    $hinnang = $_POST['hinnang'];
    $kommentaar = $_POST['kommentaar'];

    // kas kõik hinnangu väljad on täidetud ja kui pole tuleb veateade
    if (empty($nimi) || empty($hinnang) || empty($kommentaar)) {
        $veateade = "Kõik väljad on kohustuslikud!";
    } else {
        // salvestab antud hinnangu andmebaasi
        $stmt = $yhendus->prepare("INSERT INTO hinnangud (nimi, hinnang, kommentaar, toidukohad_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('sisi', $nimi, $hinnang, $kommentaar, $toidukohad_id);
        $stmt->execute();

        // arvutame ümber keskmise hinde ja uuendame hindajate arvu 1 võrra
        $stmt = $yhendus->prepare("UPDATE toidukohad SET keskmine_hinne = (SELECT AVG(hinnang) FROM hinnangud WHERE toidukohad_id = ?), hinnatud = hinnatud + 1 WHERE id = ?");
        $stmt->bind_param('ii', $toidukohad_id, $toidukohad_id);
        $stmt->execute();

        // suunab kasutaja tagasi avalehele
        header("Location: index.php");
        exit();
    }
}
?>

<!doctype html>
<html lang="et">
<head>
    <title>Hinnangud</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container">
    <h1 class="my-4">Hinda kohta > <?php echo isset($toidukoht['nimi']) ? $toidukoht['nimi'] : 'Tundmatu'; ?></h1>

    <?php if ($veateade): ?>
        <div class="alert alert-danger"><?php echo $veateade; ?></div>
    <?php endif; ?>

    <form method="post" action="">
        <div class="mb-3">
            <label for="nimi" class="form-label">Nimi</label>
            <input type="text" class="form-control" id="nimi" name="nimi" value="<?php echo isset($nimi) ? htmlspecialchars($nimi) : ''; ?>">
        </div>

        <div class="mb-3">
            <label for="hinnang" class="form-label">Hinnang</label><br>
            <?php for ($i = 1; $i <= 10; $i++): ?>
                <input type="radio" id="hinnang<?php echo $i; ?>" name="hinnang" value="<?php echo $i; ?>" <?php echo (isset($hinnang) && $hinnang == $i) ? 'checked' : ''; ?>>
                <label for="hinnang<?php echo $i; ?>"><?php echo $i; ?></label>
            <?php endfor; ?>
        </div>

        <div class="mb-3">
            <label for="kommentaar" class="form-label">Kommentaar</label>
            <textarea class="form-control" id="kommentaar" name="kommentaar" rows="3"><?php echo isset($kommentaar) ? htmlspecialchars($kommentaar) : ''; ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Saada</button>
        <a href="index.php" class="btn btn-secondary">Tagasi</a>
    </form>

    <br>

    <h2 class="my-4">Teised hinnangud</h2>
    <div>
    <?php
    // võtame ja näitame kõik hinnangud mis on seotud konkreetse toidukohaga
    $stmt = $yhendus->prepare("SELECT nimi, hinnang, kommentaar FROM hinnangud WHERE toidukohad_id = ?");
    $stmt->bind_param('i', $toidukohad_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // juhul kui hinnanguidon siis näitame need
    if ($result->num_rows > 0) {
        while ($hinnang = $result->fetch_assoc()) {
            echo "<div class='card mb-3'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>" . htmlspecialchars($hinnang['nimi']) . " (Hinne: " . $hinnang['hinnang'] . "/10)</h5>";
            echo "<p class='card-text'>" . htmlspecialchars($hinnang['kommentaar']) . "</p>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<p>Hetkel pole ühtegi hinnangut.</p>";
    }
    ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>
</html>