<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <title>L'Express</title>
    <link rel="icon" type="image/png" href="resources/favicon.png"/>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <img src="resources/logo.png" alt="logo">
        <?php 
            include "connect.php";
            include "util.php";

            navigacija($dbc);
        ?>
    </header>

    <main id="clanak">
        <article>
            <?php
                // Dohvat i ispis podataka o članku         
                $idClanak = $_GET["idClanak"];
                $queryClanci = "SELECT * FROM clanci WHERE id = '$idClanak'";

                $resultClanci = mysqli_query($dbc, $queryClanci) or
                    die("Query error");

                    
                if ($resultClanci) {
                    $rowClanci = mysqli_fetch_array($resultClanci);

                    $sazetakClanak = $rowClanci["sazetak"];
                    $naslovClanak = $rowClanci["naslov"];
                    $datumClanak = $rowClanci["datum"];
                    $slikaClanak = $rowClanci["slika"];
                    $tekstClanak = $rowClanci["tekst"];

                    echo "<h4>$sazetakClanak</h4>";
                    echo "<h1>$naslovClanak</h1>";
                    echo '<p id="datum">' . "Datum objave: $datumClanak</p>";
                    echo '<img src="' . $IMAGE_PATH . '/' . $slikaClanak . '" alt="' . $slikaClanak . '">';

                    echo '<div id="tekstClanak">';
                    newline2paragraph($tekstClanak);
                    "</div>";                            
                }

                mysqli_close($dbc);
            ?>
        </article>
    </main>
    <footer>
        <div id="clanakCopyright" class="copyright">
            <p>Les sites du réseau Groupe L'Express</p>
            <p>&copyL'Express</p>
        </div>
    </footer>
</body>
</html>