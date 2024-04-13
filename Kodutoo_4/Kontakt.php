<!doctype html>
<html lang="et">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kodutoo_4</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    /* Peida otsingukast vaikimisi */
    .search-box {
      display: none;
    }

    /* Stiilide määratlemine otsingukastile */
    .search-box input[type="text"] {
      width: 200px;
      padding: 5px;
    }
  </style>

</head>

<body>
  <div class="container">
    <header class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 ">
      <div class="col-md-4 d-flex align-items-center">
      </div>

      <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
        <li class="ms-3"><a class="text-body-secondary" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16"
              height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
              <path
                d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
            </svg></a><span> sinu@nimi.ee</span></li>
        <li class="ms-3"><a class="text-body-secondary" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16"
              height="16" fill="currentColor" class="bi bi-headphones" viewBox="0 0 16 16">
              <path
                d="M8 3a5 5 0 0 0-5 5v1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V8a6 6 0 1 1 12 0v5a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h1V8a5 5 0 0 0-5-5" />
            </svg></a><span> +372555656</span></li>
        <li class="ms-3"><a class="text-body-secondary" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16"
              height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
              <path
                d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334q.002-.211-.006-.422A6.7 6.7 0 0 0 16 3.542a6.7 6.7 0 0 1-1.889.518 3.3 3.3 0 0 0 1.447-1.817 6.5 6.5 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.32 9.32 0 0 1-6.767-3.429 3.29 3.29 0 0 0 1.018 4.382A3.3 3.3 0 0 1 .64 6.575v.045a3.29 3.29 0 0 0 2.632 3.218 3.2 3.2 0 0 1-.865.115 3 3 0 0 1-.614-.057 3.28 3.28 0 0 0 3.067 2.277A6.6 6.6 0 0 1 .78 13.58a6 6 0 0 1-.78-.045A9.34 9.34 0 0 0 5.026 15" />
            </svg></a></li>
        <li class="ms-3"><a class="text-body-secondary" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16"
              height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
              <path
                d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
            </svg></a></li>
        <li class="ms-3">
          <a id="searchIcon" class="text-body-secondary" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search"
              viewBox="0 0 16 16">
              <path
                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
            </svg>
          </a>
        </li>
        <li>
          <div id="searchBox" class="search-box">
            <input type="text" placeholder="Sisesta otsingusõna">
          </div>
        </li>
      </ul>
    </header>
  </div>

  <div class="container ">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 ">
      <div class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <h1><strong>Siim Silvet</strong></h1>
      </div>

      <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item"><a class="nav-link" href="Index.html">Avaleht</a>
              </li>
              <li class="nav-item"><a class="nav-link" href="#">Tooted</a>
              </li>
              <li class="nav-item"><a class="nav-link" href="Teenused.php">Teenused</a>
              </li>
              <li class="nav-item"><a href="Kontakt.php" class="nav-link active btn btn-primary text-white"
                  aria-current="page">Kontakt</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
  </div>
  <div class="container">
    <div class="card" style="border: none; width: 50%; margin: auto;">
      <div class="card-header text-center " style="background-color: white;">
        <h1><strong>Minu oskused</strong></h1>
      </div>

      <div class="container">

        <?php
        // Loome massiivid
        $oskused = ["HTML", "CSS", "Bootstrap", "PHP"];
        $varvid = ["primary", "secondary", "success", "danger", "warning", "info", "dark"];

        // käime läbi kõik oskused
        foreach ($oskused as $skill) {
          // valime suvalisevärvi ja suvalise protsendi mis jääb 10 ja 100 vahele
          $randomColor = $varvid[array_rand($varvid)];
          $randomPercentage = rand(10, 100);

          // loome ribad 
          echo "
    <div class='mb-3'>
        <div class='progress'>
            <div class='progress-bar bg-$randomColor' role='progressbar' 
            style='width: $randomPercentage%' 
            aria-valuenow='$randomPercentage' 
            aria-valuemin='10' aria-valuemax='100'>$skill</div>
        </div>
    </div>";

        }
        ?>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row " style="margin-top:50px">

      <?php
      $directory = 'tootajate_pildid'; // Minu piltide kaust
      $images = glob($directory . '/*.jpg'); // Otsib kõiki .jpg pilte sellest kaustast
      
      foreach ($images as $image) {
        $name = basename($image, '.jpg'); // eemaldab pildi nimest laiendi
        $name = ucwords($name); // Muudame esitähe igal nimel suureks
        $email = $name . '@silvet.ee'; // lisame e-posti aadressi nime juurde
      
        // Kuvame iga töötaja profiili
        echo "<div class='col-lg-2 mb-3 text-center'>
                <div class='card' style='width: 100%; border: none;'>
                    <img src='$image' class='card-img-top' alt='Profiilipilt'>
                    <div class='card-body'>
                        <h4 class='card-title text-center'>$name</h4>
                        <p class='card-text'>$email</p>
                    </div>
                </div>
              </div>";


      }
      ?>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      $(document).ready(function () {
        // Kui klikitakse otsinguikoonile
        $('#searchIcon').click(function (e) {
          // Takistab lingi tavapärast toimimist
          e.preventDefault();
          // Kuvab ja peidab otsingukasti
          $('#searchBox').toggle();
        });
      });
    </script>

</body>

</html>