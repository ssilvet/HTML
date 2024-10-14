<?php
session_start();
include('../config.php');

if (!isset($_SESSION['kasutaja'])) {
    header('Location: login.php');
    exit();
}

if (isset($_GET['id'])) {
    $toidukoht_id = $_GET['id'];
    $stmt = $yhendus->prepare("SELECT nimi, asukoht FROM toidukohad WHERE id = ?");
    if (!$stmt) {
        die("SQL ettevalmistus ebaõnnestus: " . $yhendus->error);
    }
    $stmt->bind_param('i', $toidukoht_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $toidukoht = $result->fetch_assoc();

    if (!$toidukoht) {
        die("Toidukohta ei leitud!");
    }
} else {
    die("Toidukoha ID puudub!");
}

if (isset($_GET['delete'])) {
    $hinnang_id = $_GET['delete'];

    $stmt = $yhendus->prepare("DELETE FROM hinnangud WHERE id = ?");
    if (!$stmt) {
        die("SQL ettevalmistus ebaõnnestus: " . $yhendus->error);
    }
    $stmt->bind_param('i', $hinnang_id);
    if ($stmt->execute()) {
        $stmt = $yhendus->prepare("UPDATE toidukohad SET 
            keskmine_hinne = (SELECT AVG(hinnang) FROM hinnangud WHERE toidukohad_id = ?),
            hinnatud = (SELECT COUNT(*) FROM hinnangud WHERE toidukohad_id = ?)
            WHERE id = ?");
        $stmt->bind_param('iii', $toidukoht_id, $toidukoht_id, $toidukoht_id);
        $stmt->execute();

        header("Location: admin_hinnangud.php?id=$toidukoht_id");
        exit();
    } else {
        echo "Hinnangu kustutamine ebaõnnestus: " . $stmt->error;
    }
}

$veateade = ''; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nimi = $_POST['nimi'];
    $hinnang = $_POST['hinnang'];
    $kommentaar = $_POST['kommentaar'];

    if (empty($nimi) || empty($hinnang) || empty($kommentaar)) {
        $veateade = "Kõik väljad on kohustuslikud!";
    } else {
        
        $stmt = $yhendus->prepare("INSERT INTO hinnangud (nimi, hinnang, kommentaar, toidukohad_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('sisi', $nimi, $hinnang, $kommentaar, $toidukoht_id);
        $stmt->execute();

        // arvutame ümber keskmise hinde ja uuendame hindajate arvu 1 võrra
        $stmt = $yhendus->prepare("UPDATE toidukohad SET 
        keskmine_hinne = (SELECT AVG(hinnang) FROM hinnangud WHERE toidukohad_id = ?), 
        hinnatud = hinnatud + 1 WHERE id = ?");
        // $stmt = $yhendus->prepare("UPDATE toidukohad SET 
        // keskmine_hinne = IFNULL((SELECT AVG(hinnang) FROM hinnangud WHERE toidukohad_id = ?), 0),
        // hinnatud = (SELECT COUNT(*) FROM hinnangud WHERE toidukohad_id = ?)
        // WHERE id = ?");
        $stmt->bind_param('ii', $toidukoht_id, $toidukoht_id);
        
        
        $stmt->execute();

        header("Location: admin_hinnangud.php?id=$toidukoht_id");
        exit();
    }
}

$stmt = $yhendus->prepare("SELECT id, nimi, hinnang, kommentaar FROM hinnangud WHERE toidukohad_id = ?");
if (!$stmt) {
    die("SQL ettevalmistus ebaõnnestus: " . $yhendus->error);
}
$stmt->bind_param('i', $toidukoht_id);
$stmt->execute();
$hinnangud = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Admin Hinnangud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="my-4">Administreeri hinnanguid > <?php echo htmlspecialchars($toidukoht['nimi']); ?></h1>

    <h2 class="my-4">Lisa uus hinnang</h2>

    <?php if ($veateade): ?>
        <div class="alert alert-danger"><?php echo $veateade; ?></div>
    <?php endif; ?>

    <form method="post">
        <div class="mb-3">
            <label for="nimi" class="form-label">Nimi</label>
            <input type="text" class="form-control" id="nimi" name="nimi" required>
        </div>

        <div class="mb-3">
            <label for="hinnang" class="form-label">Hinnang</label><br>
            <?php for ($i = 1; $i <= 10; $i++): ?>
                <input type="radio" id="hinnang<?php echo $i; ?>" name="hinnang" value="<?php echo $i; ?>" required>
                <label for="hinnang<?php echo $i; ?>"><?php echo $i; ?></label>
            <?php endfor; ?>
        </div>

        <div class="mb-3">
            <label for="kommentaar" class="form-label">Kommentaar</label>
            <textarea class="form-control" id="kommentaar" name="kommentaar" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Saada</button>
        <a href="admin.php" class="btn btn-secondary">Tagasi</a>
    </form>

    <br>
    <h2 class="my-4">Teised hinnangud</h2>
    <div>
    <?php
    if ($hinnangud->num_rows > 0) {
        while ($hinnang = $hinnangud->fetch_assoc()) {
            ?>
            <div class='card mb-3'>
                <div class='card-body'>
                    <h5 class='card-title'>
                        <?php echo htmlspecialchars($hinnang['nimi']); ?> (Hinne: <?php echo $hinnang['hinnang']; ?>/10)
                        <a href="admin_hinnangud.php?id=<?php echo $toidukoht_id; ?>&delete=<?php echo $hinnang['id']; ?>" class="text-danger float-end" onclick="return confirm('Oled kindel, et soovid kustutada?')">X</a>
                    </h5>
                    <p class='card-text'><?php echo htmlspecialchars($hinnang['kommentaar']); ?></p>
                </div>
            </div>
            <?php
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
