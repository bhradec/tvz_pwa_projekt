<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L'Express</title>
    <link rel="icon" type="image/png" href="resources/favicon.png"/>
    <link rel="stylesheet" href="style.css">
    <!-- Validacija -->
    <script src="validation.js"></script>
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
    <main class="unos">
        <h1>Unos nove vijesti</h1>
        <form enctype="multipart/form-data" name="unos" action="unos.php" method="post">
            <div>
                <label for="naslov">Naslov vijesti: </label>
                <input type="text" name="naslov" id="naslov">
                <span id="naslovError" class="error"></span>
            </div>
            <div>
                <label for="sazetak">Kratki sadržaj vijesti (do 50 znakova): </label>
                <input type="text" name="sazetak" id="sazetak">
                <span id="sazetakError" class="error"></span>
            </div>
            <div>
                <label for="tekst">Sadržaj vijesti: </label>
                <textarea name="tekst" id="tekst" cols="30" rows="10"></textarea>
                <span id="tekstError" class="error"></span>
            </div>
            <div>
                <label for="slika">Slika: </label>
                <input type="file" name="slika" id="slika">
                <span id="slikaError" class="error"></span>
            </div>
            <div class="checkbox">
                <label for="arhiva">Arhiva: </label>
                <input type="checkbox" name="arhiva" id="checkbox">
            </div>
            <div>
                <label for="idKategorija">Kategorija vijesti: </label>
                <select name="idKategorija" id="idKategorija">
                    <?php
                        // izbor kategorije vijesti
                        $kategorijaQuery = "SELECT * FROM kategorije";
                        $kategorijaResult = mysqli_query($dbc, $kategorijaQuery);

                        if ($kategorijaResult) {
                            while ($row = mysqli_fetch_array($kategorijaResult)) {
                                $idKategorija = $row["id"];
                                $kategorijaNaziv = $row["naziv"];
                                
                                echo "<option value=\"$idKategorija\">";
                                echo $kategorijaNaziv;
                                echo "</option>";
                            }
                        }
                    ?>  
                </select>
            </div>
            <div class="buttons">
                <button id="prihvati" name="prihvati" type="submit" onclick="validateUnos(event)">Prihvati</button>
                <button name="ponisti" type="reset">Poništi</button>
            </div> 
        </form>
    </main>
    <?php
        // unos clanka u bazu
        if (isset($_POST["prihvati"])) {
            /* unos je vec provjeren validacijom */
            $datum = date("Y-m-d H:i:s");
            $naslov = $_POST["naslov"];
            $sazetak = $_POST["sazetak"];
            $tekst = $_POST["tekst"];
            
            // unos slike
            $slika = $_FILES["slika"]["name"];
            $targetDir = $IMAGE_PATH . "/" . $slika;
            move_uploaded_file($_FILES["slika"]["tmp_name"], $targetDir);

            $idKategorija = $_POST["idKategorija"];

            if (isset($_POST["arhiva"])) $arhiva = 1;
            else $arhiva = 0;
            
            $insertQuery = "INSERT INTO clanci (datum, naslov, sazetak, tekst, slika, idKategorija, arhiva)
                 VALUES (?, ?, ?, ?, ?, ?, ?)";
            
            $insertStatement = mysqli_stmt_init($dbc);

            if (mysqli_stmt_prepare($insertStatement, $insertQuery)) {
                
                mysqli_stmt_bind_param($insertStatement, "sssssii", 
                    $datum, $naslov, $sazetak, $tekst, $slika, $idKategorija, $arhiva);

                mysqli_stmt_execute($insertStatement) or die ("Nije moguće izvršiti upit");
                echo '<div class="message"><span class="info">Članak uspješno unesen</span></div>';
            }
        }

        // zatvaranje konekcije
        mysqli_close($dbc);
    ?>
    <footer>
        <div class="copyright">
            <p>Les sites du réseau Groupe L'Express</p>
            <p>&copyL'Express</p>
        </div>  
    </footer>
</body>
</html>