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

    <main class="prijava">

        <h1>Registracija korisnika</h1>

        <form name="registracija" action="registracija.php" method="post">
            <div>
                <label for="ime">Ime</label>
                <input type="text" name="ime" id="ime">
                <span id="imeError" class="error"></span>
            </div>
            <div>
                <label for="prezime">Prezime</label>
                <input type="text" name="prezime" id="prezime">
                <span id="prezimeError" class="error"></span>
            </div>
            <div>
                <label for="korisnickoIme">Korisničko ime</label>
                <input type="text" name="korisnickoIme" id="korisnickoIme">
                <span id="korisnickoImeError" class="error"></span>
            </div>
            <div class="checkbox">
                <label for="razina">Želim biti administrator</label>
                <input type="checkbox" name="razina" id="razina">
            </div>
            <div>
                <span class="info">
                    Ako ne označite checkbox "želim biti administrator" nećete imati pristup
                    stranici za administraciju i time neće biti u mogućnosti dodavati, uređivati
                    ili brisati članke.
                </span>
            </div>
            <div>
                <label for="zaporka">Zaporka</label>
                <input type="password" name="zaporka" id="zaporka">
                <span id="zaporkaError" class="error"></span>
            </div>
            <div>
                <label for="ponovljenaZaporka">Ponovno unesite zaporku</label>
                <input type="password" name="ponovljenaZaporka" id="ponovljenaZaporka">
                <span id="ponovljenaZaporkaError" class="error"></span>
            </div>
            <div class="buttons">
                <button id="registracija" name="registracija" type="submit" onclick="validateRegistracija(event)">
                    Registracija
                </button>
                <p>Već imate korisnički račun?</p>
                <a href="prijava.php">Prijavite se</a>
            </div> 
        </form>

    </main>

    <?php
        if (isset($_POST["registracija"])) {

            $ime = $_POST["ime"];
            $prezime = $_POST["prezime"];
            $korisnickoIme = $_POST["korisnickoIme"];
            $zaporka = $_POST["zaporka"];

            // Čitanje razine iz checkboxa
            if (isset($_POST["razina"])) $razina = 1;
            else $razina = 0;

            // Postoji li korisnik već u bazi?
            $selectQuery = "SELECT * FROM korisnici WHERE korisnickoIme = ?";
            $selectStatement = mysqli_stmt_init($dbc);

            if (mysqli_stmt_prepare($selectStatement, $selectQuery)) {
                
                mysqli_stmt_bind_param($selectStatement, "s", $korisnickoIme);
                mysqli_stmt_execute($selectStatement) or 
                    die('<span class="error">Nije moguće izvršiti upit</span>');
                
                mysqli_stmt_store_result($selectStatement);
                

                echo '<div class="message">';

                // Ako ima rezultata, onda korisnik već postoji
                if ((mysqli_stmt_num_rows($selectStatement) > 0)) {
                    echo '<p class="error">Korisnik s tim korisničkim imenom već postoji</p>';
                } else {
                    // Ako nema rezultata, onda korisnik ne postoji i može se registrirati
                    $insertQuery = "INSERT INTO korisnici (ime, prezime, korisnickoIme, zaporka, razina)
                        VALUES (?, ?, ?, ?, ?)";

                    $hashed_password = password_hash($zaporka, CRYPT_BLOWFISH);
                    $insertStatement = mysqli_stmt_init($dbc);

                    if (mysqli_stmt_prepare($insertStatement, $insertQuery)) {
                
                        mysqli_stmt_bind_param($insertStatement, "ssssi", 
                            $ime, $prezime, $korisnickoIme, $hashed_password, $razina);
        
                        mysqli_stmt_execute($insertStatement) or die ("Nije moguće izvršiti upit");

                        echo '<p class="info">Korisnik uspješno registriran</p>';
                    }
                }

                echo '</div>';

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