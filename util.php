<?php
    $IMAGE_PATH = "images";

    /* Ispisuje kategorije iz baze unutar <li> elemenata.
       Parent <ul> ili <ol> mora biti napisan. */
    function ispisKategorija($dbc) {
        $queryKategorija = "SELECT * FROM kategorije";
        $resultKategorija = mysqli_query($dbc, $queryKategorija);

        if ($resultKategorija) {
            while ($rowKategorija = mysqli_fetch_array($resultKategorija)) {
                $idKategorija = $rowKategorija["id"];
                $nazivKategorija = $rowKategorija["naziv"];

                echo "<li>";
                echo '<a href="kategorija.php?idKategorija=' . $idKategorija 
                    . '&nazivKategorija=' . $nazivKategorija . '">';
                echo $nazivKategorija;
                echo "</a></li>";
            }
        }
    }

    /* Ispisuje navigaciju */
    function navigacija($dbc) {
        echo "<nav>";
        echo "<ul>";
        echo '<li><a href="index.php">Početna</a></li>';                    

        ispisKategorija($dbc);

        echo '<li><a href="prijava.php">Administracija</a></li>';
        echo "</ul>";
        echo "</nav>";
    }
    
    /* Ispisuje odredeni broj nearhiviranih clanaka ovisno o zadanom broju (limit),
       iz baze (dbc) koji pripadaju nekoj kategoriji (idKategorija)*/
    function ispisClanaka($idKategorija, $dbc, $limit=null) {
        global $IMAGE_PATH;
        if ($limit == null) {
            $queryClanci = "SELECT * FROM clanci 
                WHERE idKategorija = $idKategorija
                    AND arhiva = 0
                ORDER BY datum DESC";
        } else {
            $queryClanci = "SELECT * FROM clanci 
                WHERE idKategorija = $idKategorija
                    AND arhiva = 0
                ORDER BY datum DESC
                LIMIT $limit";
        }
       
        $resultClanci = mysqli_query($dbc, $queryClanci) or
            die("Query error");
            
        if ($resultClanci) {
            while ($rowClanci = mysqli_fetch_array($resultClanci)) {
                $idClanak = $rowClanci["id"];
                $slikaClanak = $rowClanci["slika"];
                $sazetakClanak = $rowClanci["sazetak"];
                $naslovClanak = $rowClanci["naslov"];

                echo "<article>";
                echo '<a href="clanak.php?idClanak=' . $idClanak . '">';
                echo '<img src="' . $IMAGE_PATH . '/' . $slikaClanak .'" alt="article_image">';
                echo "<h4>$sazetakClanak</h4>";
                echo "<h3>$naslovClanak</h3>";
                echo "</a>";
                echo "</article>";
            }
        }
    }

    /* U tekstu svak newline zapisuje u posebni <p> element */
    function newline2paragraph($tekst) {
        $paragraphs = explode("\n", $tekst);

        foreach ($paragraphs as $paragraph) {
            echo "<p>$paragraph</p>";
        }
    }
?>