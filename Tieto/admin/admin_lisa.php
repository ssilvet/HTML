<?php
session_start();
include('../config.php');

if (!isset($_SESSION['kasutaja'])) {
    header('Location: login.php');
    exit();
}

$nimi = '';
$asukoht = '';
$tuup = '';

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    // kui muudetakse siis väljad on eeltäidetud
    $stmt = $yhendus->prepare("SELECT * FROM toidukohad WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $rida = $result->fetch_assoc();
        $nimi = $rida['nimi'];
        $asukoht = $rida['asukoht'];
        $tuup = $rida['tuup'];
    }
}

// kui vorm on esitatud
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nimi = $_POST['nimi'];
    $asukoht = $_POST['asukoht'];
    $tuup = $_POST['tuup'];

    if (isset($_POST['muuda'])) {
        // muutmine
        $id = $_POST['id'];
        $stmt = $yhendus->prepare("UPDATE toidukohad SET nimi = ?, asukoht = ?, tuup = ? WHERE id = ?");
        $stmt->bind_param('sssi', $nimi, $asukoht, $tuup, $id);
    } elseif (isset($_POST['lisa'])) {
        // uue toidukoha lisamine
        $stmt = $yhendus->prepare("INSERT INTO toidukohad (nimi, asukoht, tuup) VALUES (?, ?, ?)");
        $stmt->bind_param('sss', $nimi, $asukoht, $tuup);
    }

    $stmt->execute();
    header('Location: admin.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Administreerimine > Muuda / Lisa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Administreerimine > Muuda / Lisa</h1>

    <form method="post">
        <?php if (isset($_GET['edit'])): ?>
            <input type="hidden" name="id" value="<?php echo $_GET['edit']; ?>">
        <?php endif; ?>
        
        <div class="mb-3">
            <label for="nimi" class="form-label">Nimi</label>
            <input type="text" class="form-control" id="nimi" name="nimi" value="<?php echo htmlspecialchars($nimi); ?>" required>
        </div>

        <div class="mb-3">
            <label for="asukoht" class="form-label">Aadress</label>
            <input type="text" class="form-control" id="asukoht" name="asukoht" value="<?php echo htmlspecialchars($asukoht); ?>" required>
        </div>

        <div class="mb-3">
            <label for="tuup" class="form-label">Tüüp</label>
            <select class="form-select" id="tuup" name="tuup" required>
                <option value="">Vali tüüp</option>
                <option value="Söögikoht" <?php echo ($tuup == 'Söögikoht') ? 'selected' : ''; ?>>Söögikoht</option>
                <option value="Kohvik" <?php echo ($tuup == 'Kohvik') ? 'selected' : ''; ?>>Kohvik</option>
                <option value="Toidukäru" <?php echo ($tuup == 'Toidukäru') ? 'selected' : ''; ?>>Toidukäru</option>
                <option value="Restoran" <?php echo ($tuup == 'Restoran') ? 'selected' : ''; ?>>Restoran</option>
            </select>
        </div>

        <?php if (isset($_GET['edit'])): ?>
            
            <button type="submit" class="btn btn-primary" name="muuda">Salvesta muudatused</button>
        <?php endif; ?>

        
        <button type="submit" class="btn btn-success" name="lisa">Lisa uus</button>

        <a href="admin.php" class="btn btn-secondary">Tagasi</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
