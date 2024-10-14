<?php include ('config.php'); ?>

<!doctype html>
<html lang="et">
    <head>
        <title>Kohvikud</title>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
    <?php

        //sorteerimise muutujad
        $order_by = 'nimi';  // sorteerimine toimub veeru 'nimi' järgi
        $order_dir = 'ASC';  // suund kasvavas järjekorras

        
        $allowed_columns = ['nimi', 'asukoht', 'keskmine_hinne', 'hinnatud']; // lubatud veerud
        $allowed_dirs = ['ASC', 'DESC']; // sorteerimise suunad

        // kontrollib kas kasutaja on sorteerimisvõimaluse valinud
        if (!empty($_GET['sort']) && in_array($_GET['sort'], $allowed_columns)) {
            $order_by = $_GET['sort'];  // kasutaja valitud veerg
        }

        // kontrollib sorteerimissuunda
        if (!empty($_GET['dir']) && in_array($_GET['dir'], $allowed_dirs)) {
            $order_dir = $_GET['dir']; // ksutaja valitud sorteerimise suund
        }

        // lehitsemine 10 tulemust korraga
        if (isset($_GET['next'])) {
            $algus = $_GET['next'];
        } elseif (isset($_GET['prev'])) {
            $algus = max(0, $_GET['prev'] - 10); // lehitsedes tagasi ei lase minna alla 0 
        } else {
            $algus = 0;// lehitsemist alusatatakse 0
        }
        $lopp = $algus + 10; // järgmise lehe algus +10 edasi

        // vastus sõltuvalt otsingust või lehitsemisest
        if (!empty($_GET["s"])) {
            $s = "%{$_GET['s']}%";
            $stmt = $yhendus->prepare("SELECT * FROM toidukohad WHERE nimi LIKE ? ORDER BY $order_by $order_dir LIMIT ?, 10");
            $stmt->bind_param('si', $s, $algus);
        } else {
            $stmt = $yhendus->prepare("SELECT * FROM toidukohad ORDER BY $order_by $order_dir LIMIT ?, 10");
            $stmt->bind_param('i', $algus);
        }

        // päringu käivitamine
        $stmt->execute();
        $valjund = $stmt->get_result(); // tulemus andmebaasist
    ?>
    

    <div class="container">
            
            <h1 class="my-4">Valige asutus mida hinnata</h1>

            <form method="get" action="index.php" class="mb-4">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Otsi asutuse nime järgi" name="s" value="<?php echo isset($_GET['s']) ? $_GET['s'] : ''; ?>">
                    <button class="btn btn-primary aligne" type="submit">Otsi</button>
                </div>
            </form>

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
    </tr>

    <?php
    if (mysqli_num_rows($valjund) > 0) {
        // tulemused tabelina, iga rida klikitav
        while($rida = mysqli_fetch_assoc($valjund)) {
            ?>
            <tr onclick="window.location.href='hinda_kohta.php?id=<?php echo $rida['id']; ?>'">
                <td><?php echo $rida['nimi']; ?></td>
                <td><?php echo $rida['asukoht']; ?></td>
                <td><?php echo $rida['keskmine_hinne']; ?></td>
                <td><?php echo $rida['hinnatud']; ?></td>
            </tr>
            <?php
        }
    } else {
        // kui tulemusi ei leitud
        echo "<tr><td colspan='4'>Ühtegi söögikohta ei leitud</td></tr>";
    }
    ?>
</table>
    <div class="d-flex justify-content-end">
        <a href="?prev=<?php echo $algus; ?>&sort=<?php echo $order_by; ?>&dir=<?php echo $order_dir; ?>">&lt;&lt; Eelmised</a>
        <a href="?next=<?php echo $lopp; ?>&sort=<?php echo $order_by; ?>&dir=<?php echo $order_dir; ?>">Järgmised&gt;&gt;</a>
    </div>
    </div>

    </body>

    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"
    ></script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"
    ></script>

</html>
