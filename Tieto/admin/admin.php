<?php
session_start();
include('../config.php');

// Vaatame kas kasutaja on sisse logitud kui ei suuname login lehele
if (!isset($_SESSION['kasutaja'])) {
    header('Location: login.php'); 
    exit();
}

// sorteerimise muutujad
$order_by = 'nimi';  // sorteerimine toimub veeru järgi
$order_dir = 'ASC';  // suund kasvavas järjekorras

$allowed_columns = ['nimi', 'asukoht', 'keskmine_hinne', 'hinnatud']; // lubatud veerud
$allowed_dirs = ['ASC', 'DESC']; // sorteerimise suunad

// kontrollib, kas kasutaja on sorteerimisvõimaluse valinud
if (!empty($_GET['sort']) && in_array($_GET['sort'], $allowed_columns)) {
    $order_by = $_GET['sort'];
}
// kontrollib sorteerimissuunda
if (!empty($_GET['dir']) && in_array($_GET['dir'], $allowed_dirs)) {
    $order_dir = $_GET['dir'];
}
// toidukoha kustutamine id järgi
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $yhendus->prepare("DELETE FROM toidukohad WHERE id = ?");
    $stmt->bind_param('i', $id);
    if ($stmt->execute()) {
        // kui kustutamine õnnestus lähme tagasi admin lehele
        header("Location: admin.php");
        exit();
    } else {
        // kui kustutamine ebaõnnestus
        echo "Kustutamine ebaõnnestus: " . $stmt->error;
    }
}
// lehitsemine
if (isset($_GET['next'])) {
    $algus = $_GET['next'];
} elseif (isset($_GET['prev'])) {
    $algus = max(0, $_GET['prev'] - 10); // lehitsedes tagasi ei lase minna alla 0 
} else {
    $algus = 0; // lehitsemist alustatakse 0
}
$lopp = $algus + 10; // järgmise lehe algus +10 edasi

// vastus sõltuvalt otsingust või lehitsemisest
$stmt = $yhendus->prepare("SELECT * FROM toidukohad ORDER BY $order_by $order_dir LIMIT ?, 10");
$stmt->bind_param('i', $algus);

// päringu käivitamine
$stmt->execute();
$valjund = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Administreerimine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="my-4">Administreerimine</h1>

    <table class="table table-sm table-bordered">
        <tr>
            <th>
                <a href="?sort=nimi&dir=<?php echo ($order_by === 'nimi' && $order_dir === 'ASC') ? 'DESC' : 'ASC'; ?>" style="color: black;">
                    Nimi
                    <?php echo ($order_by === 'nimi') ? ($order_dir === 'ASC' ? '↑' : '↓') : ''; ?>
                </a>
            </th>
            <th>
                <a href="?sort=asukoht&dir=<?php echo ($order_by === 'asukoht' && $order_dir === 'ASC') ? 'DESC' : 'ASC'; ?>" style="color: black;">
                    Asukoht
                    <?php echo ($order_by === 'asukoht') ? ($order_dir === 'ASC' ? '↑' : '↓') : ''; ?>
                </a>
            </th>
            <th>
                <a href="?sort=keskmine_hinne&dir=<?php echo ($order_by === 'keskmine_hinne' && $order_dir === 'ASC') ? 'DESC' : 'ASC'; ?>" style="color: black;">
                    Keskmine hinne
                    <?php echo ($order_by === 'keskmine_hinne') ? ($order_dir === 'ASC' ? '↑' : '↓') : ''; ?>
                </a>
            </th>
            <th>
                <a href="?sort=hinnatud&dir=<?php echo ($order_by === 'hinnatud' && $order_dir === 'ASC') ? 'DESC' : 'ASC'; ?>" style="color: black;">
                    Hinnatud (korda)
                    <?php echo ($order_by === 'hinnatud') ? ($order_dir === 'ASC' ? '↑' : '↓') : ''; ?>
                </a>
            </th>
            <th>Admin</th>
        </tr>

        <?php
        if (mysqli_num_rows($valjund) > 0) {
            while ($rida = mysqli_fetch_assoc($valjund)) {
                ?>
                <!-- toidukoha rea kuvamine ja valimine -->
                <tr onclick="window.location.href='admin_hinnangud.php?id=<?php echo $rida['id']; ?>'">
                    <td><?php echo $rida['nimi']; ?></td>
                    <td><?php echo $rida['asukoht']; ?></td>
                    <td><?php echo $rida['keskmine_hinne']; ?></td>
                    <td><?php echo $rida['hinnatud']; ?></td>
                    <td>
                        <a href="admin_lisa.php?edit=<?php echo $rida['id']; ?>" class="btn btn-sm btn-warning">Muuda</a>
                        <a href="admin.php?delete=<?php echo $rida['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Oled kindel, et soovid kustutada?')">Kustuta</a>
                    </td>
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='5'>Ühtegi söögikohta ei leitud</td></tr>";
        }
        ?>
    </table>

    <div class="d-flex justify-content-end">
    <a href="?prev=<?php echo $algus; ?>&sort=<?php echo $order_by; ?>&dir=<?php echo $order_dir; ?>">&lt;&lt; Eelmised</a>
    <a href="?next=<?php echo $lopp; ?>&sort=<?php echo $order_by; ?>&dir=<?php echo $order_dir; ?>">Järgmised&gt;&gt;</a>
    </div>

    <a href="logout.php" class="btn btn-danger mt-4">Logi välja</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
