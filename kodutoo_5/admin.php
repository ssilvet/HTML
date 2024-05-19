<?php
include_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') { // kontrollib kas vorm saadeti post meetodiga
    if (isset($_POST['title'], $_POST['text'])) {// vaatab et postis oleks pealkiri ja tekst
        savePost($_POST['title'], $_POST['text']); // salvestame uue postituse
    } elseif (isset($_POST['delete'])) {
        deletePost($_POST['delete']); 
    }
}

$posts = loadPosts(); // Laeme kõik postitused
?>
<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin leht</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-4">
        <h1>Administraatori leht</h1>
        <form action="index.php?page=admin" method="post" class="mb-4">
            <div class="mb-3">
                <label for="title" class="form-label">Pealkiri</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Pealkiri" required>
            </div>
            <div class="mb-3">
                <label for="text" class="form-label">Lühitekst</label>
                <input type="text" name="text" id="text" class="form-control" placeholder="Lühitekst" required>
            </div>
            <button type="submit" class="btn btn-primary">Lisa postitus</button>
        </form>

        <h2>Postitused</h2>
        <?php if (!empty($posts)): ?> <!-- kui postitus on olemas nätab neid listina -->
        <ul class="list-group">
            <?php foreach ($posts as $index => $post): ?> <!-- Käib läbi kõik postitused -->
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span><?= htmlspecialchars($post[0]) ?>: <?= htmlspecialchars($post[1]) ?></span><!-- näitab pealkirja ja sisu -->
                <form method="post" action="index.php?page=admin" class="m-0"> <!-- kustutamise kast -->
                    <input type="hidden" name="delete" value="<?= $index ?>">
                    <button type="submit" class="btn btn-danger btn-sm">Kustuta</button>
                </form>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php else: ?> <!-- kui postitusi pole -->
            <p>Ei ole postitusi.</p>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
