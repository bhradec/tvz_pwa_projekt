<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <main id="kategorija">
        <?php
            $idKategorija = $_GET["idKategorija"];
            $nazivKategorija = $_GET["nazivKategorija"];

            echo "<h2>Članci u kategoriji $nazivKategorija</h2>";
            
            echo '<section class="clanci">';
        
            ispisClanaka($idKategorija, $dbc);

            echo "</section>";

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