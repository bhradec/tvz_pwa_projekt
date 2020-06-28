<!DOCTYPE html>

<?php
    include "connect.php";
    include "util.php";

    // Funkcija za ispis članka sa pripadajućim gumbima obriši i izmjeni ispod
    function ispisiClanak($rowClanci) {
        global $IMAGE_PATH;

        $idClanak = $rowClanci["id"];
        $slikaClanak = $rowClanci["slika"];
        $naslovClanak = $rowClanci["naslov"];
        $arhiva = $rowClanci["arhiva"];
        
        if ($arhiva == 0) echo "<article>";
        else echo '<article class="arhiviraniClanak">';

        echo '<div id="sadrzaj">';
        echo '<img src="' . $IMAGE_PATH . 
            '/' . $slikaClanak . '" alt="article_image">';
        echo "<h4>$naslovClanak</h4>";
        echo "</div>";
        echo '<div id="buttons">';

        // Gumb za izmjenu članka
        // Izmjena se dogada na posebnoj stranici za izmjenu clanka (izmjena.php)
        echo '<a href="izmjena.php?idClanak=' . $idClanak . '">';
        echo '<button id="izmjenaButton" type="button" name="idClanakIzmjena">' . 
            'Izmjena</button>';
        echo "</a>";

        // Gumb za brisanje članka
        // Brisanje se događa u ovoj skripti
        echo '<button id="izbrisiButton" type="submit" name="idClanakBrisanje" value=' .
            $idClanak . '>Brisanje</button>';

        echo '</div>';
        echo "</article>";
    }
?>

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
        <?php navigacija($dbc); ?>
    </header>

    <main id="administracija">

        <!-- div za ispis podataka o trenutno prijavljenom korisniku -->
        <div class="message">
            <?php 
                // AKO KORISNIK NIJE PRIJAVLJEN, ADMINISTRACIJA SE NE PRIKAZUJE
                session_start();
                if (isset($_SESSION["korisnickoIme"])) {
                    $korisnickoIme = $_SESSION["korisnickoIme"];
                    // Je li taj korisnik administrator?
                    $korisnikQuery = "SELECT * FROM korisnici WHERE korisnickoIme = '$korisnickoIme'";
                    $korisnikResult = mysqli_query($dbc, $korisnikQuery) or
                        die ('<p class="error">Nije moguće izvršiti upit' . mysqli_error($dbc) . '</p>');

                    if ($korisnikResult) {
                        $rowKorisnik = mysqli_fetch_array($korisnikResult);
                        $razina = $rowKorisnik["razina"];

                        echo '<span>Prijavljeni ste kao korisnik ' .
                            '<strong>' . $korisnickoIme . '</strong>' . '</span>';

                        if ($razina == 0) {
                            echo '<span class="error">Nemate administratorske ovlasti i nemožete uređivati članke</span>';
                            die();
                        } else {
                            echo '<span class="info">Imate administratorske ovlasti i možete uređivati članke</span>';
                        }
                    }
                } else {
                    echo '<span class="error">NISTE PRIJAVLJENI. BEZ PRIJAVE NIJE MOGUĆE PRISTUPITI ADMINISTRACIJI</span>';
                    die();
                }
            ?>
        </div>

        <section>
            <h2>Unos</h2>
            <a href="unos.php">
                <button name="unos">Unesite novi članak</button>
            </a>
        </section>

        <section id="izmjenaBrisanje">
            <h2>Izmjena i brisanje</h2>
            <p class="info">Prozirni članci su arhivirani</p>
            
            <!-- Forma koja sadrži članke i gumbe za izmjenu i brisanje -->
            <form action="administracija.php" method="get">

                <?php 
                    $queryKategorija = "SELECT * FROM kategorije";
                    $resultKategorija = mysqli_query($dbc, $queryKategorija);

                    // Ispis kategorije
                    if ($resultKategorija) {
                        while ($rowKategorija = mysqli_fetch_array($resultKategorija)) {
                            $idKategorija = $rowKategorija["id"];
                            $nazivKategorija = $rowKategorija["naziv"];

                            echo "<h3>$nazivKategorija</h3>";

                            // Ispis članaka u kategoriji
                            echo '<div class="clanci">';
                            $queryClanci = "SELECT * FROM clanci 
                                WHERE idKategorija = $idKategorija
                                ORDER BY datum DESC";

                            $resultClanci = mysqli_query($dbc, $queryClanci);
                            if (mysqli_num_rows($resultClanci) == 0) {
                                echo '<span class="info">Ne postoji niti jedan članak u ovoj kategoriji</span>';
                            }
                            if ($resultClanci) {
                                while ($rowClanci = mysqli_fetch_array($resultClanci)) {
                                    $idClanak = $rowClanci["id"];
                                    
                                    /* Ako je obrisan članak izvršena je GET metoda i postavljen je
                                     * idClanakBrisanje. Nakon izvršavanja te GET metode i tog brisanja
                                     * članka koji ima id idClanakBrisanje, taj clanak se NE ISPISUJE */
                                    if (isset($_GET["idClanakBrisanje"])) {
                                        $idClanakBrisanje = $_GET["idClanakBrisanje"];
                                        if ($idClanakBrisanje != $idClanak) {
                                            ispisiClanak($rowClanci);
                                        }
                                    } else {
                                        ispisiClanak($rowClanci);
                                    }                                  
                                }
                            }
                            echo '</div>';
                        }
                    }
                ?>
            </form>

            <?php 
                // Brisanje odabranog clanka
                if (isset($_GET["idClanakBrisanje"])) {
                    $idClanak = $_GET["idClanakBrisanje"];
                    $deleteQuery = "DELETE FROM clanci WHERE id = $idClanak";
                    
                    $result = mysqli_query($dbc, $deleteQuery) or 
                        die('<p class="error">Nije moguce obrisati clanak</p>');
                }

                mysqli_close($dbc);
            ?>

        </section>
    </main>

    <footer>
        <div class="copyright">
            <p>Les sites du réseau Groupe L'Express</p>
            <p>&copyL'Express</p>
        </div>
    </footer>

</body>
</html>