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

    <main id="pocetna">

        <?php         
            $queryKategorija = "SELECT * FROM kategorije";
            $resultKategorija = mysqli_query($dbc, $queryKategorija);

            if ($resultKategorija) {
                while ($rowKategorija = mysqli_fetch_array($resultKategorija)) {
                    $idKategorija = $rowKategorija["id"];
                    $nazivKategorija = $rowKategorija["naziv"];
                    
                    // ispis sekcije i naziva kategorije
                    echo "<section>";
                    echo "<h2>" . $nazivKategorija . "</h2>";
                    echo '<div class="clanci">';
                    
                    ispisClanaka($idKategorija, $dbc, 4);

                    echo "</div>";
                    echo "</section>";
                }
            }

            mysqli_close($dbc);
        ?>

    </main>

    <footer>
        <div class="copyright">
            <p>Les sites du réseau Groupe L'Express</p>
            <p>&copyL'Express</p>
        </div>
    </footer>

</body>
</html>