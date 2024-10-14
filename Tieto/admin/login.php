<?php
session_start();
include('../config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kasutaja = $_POST['kasutaja'];
    $parool = $_POST['parool'];

    // Kontrollime, kas kasutajanimi ja parool klapivad
    if ($kasutaja == "admin" && $parool == "salasona123") {
        $_SESSION['kasutaja'] = $kasutaja; //  sessiooni loomine
        header('Location: admin.php'); //  admin lehele edasi suunamine
        exit();
    } else {
        
        $viga = "Vale kasutajanimi või parool!";
    }
}
?>

<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Logi sisse</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container d-flex align-items-center justify-content-center vh-100">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title text-center">Logi sisse</h1>
                <!-- veateade kui sisselogimine ebaõnnestub -->
                <?php if (isset($viga)): ?>
                    <p class="text-danger text-center"><?php echo $viga; ?></p>
                <?php endif; ?>

                <form method="POST">
                    <div class="mb-3">
                        <label for="kasutaja" class="form-label">Kasutajanimi</label>
                        <input type="text" class="form-control" id="kasutaja" name="kasutaja" required>
                    </div>
                    <div class="mb-3">
                        <label for="parool" class="form-label">Parool</label>
                        <input type="password" class="form-control" id="parool" name="parool" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Logi sisse</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
