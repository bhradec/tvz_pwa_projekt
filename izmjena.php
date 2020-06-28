<!DOCTYPE html>

<?php
    include "connect.php";
    include "util.php";

    // koristi se ispod za ispis poruke o uspješnoj izmjeni
    $izmjenaUspjesna = false;

    /* Ako je odabran submit u formi za izmjenu, ponovno se izvršavaju sve skripte.
       Ako je odabran submit, izvrsavava se UPDATE na bazi. */
    if (isset($_POST["prihvati"])) {
        $idClanak = $_GET["idClanak"];
        
        $noviNaslov = $_POST["noviNaslov"];
        $noviSazetak = $_POST["noviSazetak"];
        $noviTekst = $_POST["noviTekst"];
        $noviIdKategorija = $_POST["noviIdKategorija"];

        // Je li checkbox oznacen
        if (isset($_POST["novaArhiva"])) $novaArhiva = 1;
        else $novaArhiva = 0;

        /* Ako je unesena nova slika, onda postavljamo novu sliku, 
            * ako nije unesena nova slika, u bazi ostaje slika od prije */
        if ($_FILES["novaSlika"]["size"] != 0) {
            $novaSlika = $_FILES["novaSlika"]["name"];
            $targetDir = $IMAGE_PATH . "/" . $novaSlika;
            move_uploaded_file($_FILES["novaSlika"]["tmp_name"], $targetDir); 

            $updateQuery = "UPDATE clanci 
                SET naslov = ?, sazetak = ?, tekst = ?, slika = ?, arhiva = ?, idKategorija = ? 
                WHERE id = ?";

            $updateStatement = mysqli_stmt_init($dbc);

            if (mysqli_stmt_prepare($updateStatement, $updateQuery)) {

                mysqli_stmt_bind_param($updateStatement, "sssssii", 
                    $noviNaslov, $noviSazetak, $noviTekst, $novaSlika, $novaArhiva, $noviIdKategorija, $idClanak);

                mysqli_stmt_execute($updateStatement) or 
                    die('<span class="error">Nije moguće izvršiti upit</span>');
            }

        } else {                       
            $updateQuery = "UPDATE clanci 
                SET naslov = ?, sazetak = ?, tekst = ?, arhiva = ?, idKategorija = ? 
                WHERE id = ?";

            $updateStatement = mysqli_stmt_init($dbc);

            if (mysqli_stmt_prepare($updateStatement, $updateQuery)) {

                mysqli_stmt_bind_param($updateStatement, "ssssii", 
                    $noviNaslov, $noviSazetak, $noviTekst, $novaArhiva, $noviIdKategorija, $idClanak);

                mysqli_stmt_execute($updateStatement) or 
                    die('<span class="error">Nije moguće izvršiti upit</span>');
            }
        }

        $izmjenaUspjesna = true;
    }
?>

<html>

<head>
    <meta charset="UTF-8">
    <title>L'Express</title>
    <link rel="icon" type="image/png" href="resources/favicon.png"/>
    <link rel="stylesheet" href="style.css">
    <!-- Validacija -->
    <script src="validation.js"></script>
</head>

<body>

    <header>
        <img src="resources/logo.png" alt="logo">
        <?php navigacija($dbc); ?>
    </header>

    <main class="unos">
        <h1>Izmjena vijesti</h1>

        <?php
            /* Dohvacanje podataka za članak. Ovi podatci se prikazuju u formi
             * za izmjenu članka. */
            $idClanak = $_GET["idClanak"];
            $selectQuery = "SELECT * FROM clanci WHERE id = '$idClanak'";
            
            $selectResult = mysqli_query($dbc, $selectQuery) or 
                die('<span class="error">Nije moguće izvršiti upit</span>');;
            
            $selectRow = mysqli_fetch_array($selectResult);
            $dohvaceniNaslov = $selectRow["naslov"];
            $dohvaceniSazetak = $selectRow["sazetak"];
            $dohvaceniTekst = $selectRow["tekst"];
            $dohvacenaArhiva = $selectRow["arhiva"];
            $dohvacenIdKategorija = $selectRow["idKategorija"];
        ?>

        <!-- Forma za unos podataka za izmjenu članka -->
        <?php echo '<form action="izmjena.php?idClanak=' . $idClanak . 
            '" method="post" name="izmjena" enctype="multipart/form-data">' ?>

            <div>
                <label for="naslov">Naslov vijesti</label>
                <?php echo '<input type="text" name="noviNaslov" id="noviNaslov" value="' . $dohvaceniNaslov . '">'; ?>
                <span id="noviNaslovError" class="error"></span>
            </div>

            <div>
                <label for="sazetak">Kratki sadržaj vijesti (do 50 znakova)</label>
                <?php echo '<input type="text" name="noviSazetak" id="noviSazetak" value="' . $dohvaceniSazetak . '">'; ?>
                <span id="noviSazetakError" class="error"></span>
            </div>

            <div>
                <label for="noviTekst">Sadržaj vijesti</label>
                <?php echo '<textarea name="noviTekst" id="noviTekst" cols="30" rows="10">' . 
                    $dohvaceniTekst . '</textarea>'; ?>
                <span id="noviTekstError" class="error"></span>
            </div>

            <div>
                <label for="slika">Slika: </label>
                <input type="file" name="novaSlika" id="novaSlika">
                <p class="info">
                    Ako želite promjeniti sliku članka, odaberite novu sliku. 
                    Ako ne želite promjeniti sliku, ne morate odabrati niti jednu datoteku.
                </p>
            </div>

            <div class="checkbox">
                <label for="arhiva">Arhiva</label>
                <?php
                    // Ako je clanak bio prethodno arhiviran, checkbox za arhiviranje je oznacen
                    if ($dohvacenaArhiva == 0) echo '<input type="checkbox" name="novaArhiva">';
                    else echo '<input type="checkbox" name="novaArhiva" checked>';
                ?>
            </div>

            <div>
                <label for="noviIdKategorija">Kategorija vijesti: </label>
                <select name="noviIdKategorija" id="noviIdKategorija">
                    <?php
                        // Dohvaćanje kategorija za select s kategorijom članka
                        $kategorijaQuery = "SELECT * FROM kategorije";
                        $kategorijaResult = mysqli_query($dbc, $kategorijaQuery);

                        if ($kategorijaResult) {
                            while ($row = mysqli_fetch_array($kategorijaResult)) {
                                $idKategorija = $row["id"];
                                $nazivKategorija = $row["naziv"];
                                
                                /* Kao početna odabrana opcija postavlja se kategorija
                                * kojoj je članak prethodno pripadao */
                                if ($idKategorija == $dohvacenIdKategorija) {
                                    echo '<option value="' . $idKategorija . '" selected="selected">';
                                } else {
                                    echo '<option value="' . $idKategorija . '">';
                                }
                                
                                echo $nazivKategorija;
                                echo "</option>";
                            }
                        }
                    ?>  
                </select>
            </div>

            <div class="buttons">
                <button type="submit" onclick="validateIzmjena(event)" name="prihvati">Prihvati izmjene</button>
            </div>

        </form>

        <?php mysqli_close($dbc); ?>

    </main>
    
    <?php
        // Ispis poruke o uspješnoj izmjeni ako je izmjena bila uspješna
        if ($izmjenaUspjesna == true) {
            echo '<div class="message"><span class="info">Izmjene uspješno pohranjene</div>';
        }
    ?>

    <footer>
        <div class="copyright">
            <p>Les sites du réseau Groupe L'Express</p>
            <p>&copyL'Express</p>
        </div>  
    </footer>

</body>
</html>