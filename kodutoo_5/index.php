<?php
include 'functions.php'; //postituste laadimise salvestamise fail
$posts = loadPosts(); //postituste laadimine

// määrame aktiivseks leheks avalehe
$page = isset($_GET['page']) ? $_GET['page'] : 'avaleht';

// kui lehte pole avaneb leht 404
if (!file_exists($page . '.php')) {
    $page = '404';
}
?>
<!doctype html>
<html lang="et">
<head>
    <title>Kodutoo_5</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="author" content="Siim Silvet">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<style>
    .header-background {
        background-image: url('pildid/malta1.jpg');
        background-size: cover;
        background-position: center;
        height: 40vh; /* pildi kõrguse muutmine */
        color: #fff;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
</style>

<body>
<?php
// piltide massiiv relatiivse asukohaga
$images = [
    'pildid/malta1.jpg',
    'pildid/malta2.jpg',
    'pildid/malta3.jpg',
    'pildid/malta4.jpg',
];

// valib random pildi massiivist
$selectedImage = $images[array_rand($images)];
?>

<header class="header-background border-top" style="background-image: url('<?php echo $selectedImage; ?>');"><!-- kirjutab random pildi -->
    <div class="container d-flex flex-wrap ">
        <ul class="nav me-auto">
            <li class="nav-item"><a href="index.php?page=404" class="nav-link px-2 active" style="color: white;" aria-current="page"><h4><strong>Siim Silvet</strong></h4></a></li>
        </ul>
        <ul class="nav">
            <li class="nav-item"><a href="index.php?page=avaleht" class="nav-link" style="color: white;"><strong>AVALEHT</strong></a></li>
            <li class="nav-item"><a href="index.php?page=minust" class="nav-link" style="color: white;"><strong>MINUST</strong></a></li>
            <li class="nav-item"><a href="index.php?page=kontakt" class="nav-link" style="color: white;"><strong>KONTAKT</strong></a></li>
            <li class="nav-item"><a href="index.php?page=admin" class="nav-link" style="color: white;"><strong>ADMIN</strong></a></li>
        </ul>
    </div>
    <div class="text-center" style="color: white;">
        <h1><strong>Praktika Maltal</strong></h1>
        <p>Minu välispraktika HKHKs</p>
    </div>
</header>

<main class="container my-4">
    <?php include $page . '.php'; ?> <!-- valitud lehe sisu lisamine -->
</main>

<footer class="text-center text-lg-start">
    <!-- place footer here -->
    <div class="container py-3 my-4 border-top">
        <div class="d-flex justify-content-center">
            <a href="index.php?page=404" target="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#" class="bi bi-facebook" viewBox="0 0 16 16">
                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                </svg>
            </a>
        </div>
        <div class="text-center py-2">
            <p class="mb-0">Siim Silvet</p>
        </div>
    </div>
</footer>

<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>

