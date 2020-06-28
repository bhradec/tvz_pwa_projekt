<!DOCTYPE html>

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
        <?php 
            include "connect.php";
            include "util.php";

            session_start();

            navigacija($dbc);
        ?>
    </header>

    <main class="prijava">

        <h1>Prijava korisnika</h1>

        <form name="prijava" action="prijava.php" method="post">
            <div>
                <label for="korisnickoIme">Korisničko ime</label>
                <input type="text" name="korisnickoIme" id="korisnickoIme">
                <span id="korisnickoImeError" class="error"></span>
            </div>
            <div>
                <label for="zaporka">Zaporka</label>
                <input type="password" name="zaporka" id="zaporka">
                <span id="zaporkaError" class="error"></span>
            </div>
            <div class="buttons">
                <button id="prijava" name="prijava" type="submit" onclick="validatePrijava(event)">Prijava</button>
                <p>Nemate korisnički račun?</p>
                <a href="registracija.php">Registrirajte se</a>
            </div>
        </form>

        <div class="message">
            <?php
                if (isset($_POST["prijava"])) {
                    
                    $korisnickoIme = $_POST["korisnickoIme"];
                    $zaporka = $_POST["zaporka"];
                    $hashed_password = "";

                    $selectQuery = "SELECT zaporka FROM korisnici WHERE korisnickoIme = ?";
                    $selectStatement = mysqli_stmt_init($dbc);

                    if (mysqli_stmt_prepare($selectStatement, $selectQuery)) {
                        
                        mysqli_stmt_bind_param($selectStatement, "s", $korisnickoIme);
                        mysqli_stmt_execute($selectStatement) or 
                            die('<span class="error">Nije moguće izvršiti upit</span>');
                        
                        mysqli_stmt_store_result($selectStatement);
                        
                        // Ako nema rezultata, onda korisnik ne postoji
                        if ((mysqli_stmt_num_rows($selectStatement) > 0)) {
                            mysqli_stmt_bind_result($selectStatement, $hashed_password);
                            mysqli_stmt_fetch($selectStatement);

                             // Je li zaporka ispravna?
                            if (password_verify($zaporka, $hashed_password)) {
                                $_SESSION["korisnickoIme"] = $korisnickoIme;
                            } else {
                                echo '<span class="error">Neispravna zaporka</span>';
                            }

                        } else {
                            echo '<span class="error">Korisnik s tim korisničkim imenom ne postoji</span>';
                        }
                    }
                }
            ?>

            <?php 
                // Je li korisnik prijavljen? Ako je ispisuje se poruka za nastavak na administraciju
                if (isset($_SESSION["korisnickoIme"])) {
                    echo '<span class="info">Prijavljeni ste kao korisnik: ' . 
                        $_SESSION["korisnickoIme"] . '</span>';
                    echo '<a href="administracija.php">Nastavite na administraciju</a>';
                } else {
                    echo '<span class="info">Niti jedan korisnik trenutno nije prijavljen</span>';
                }
            ?>
        </div>

    </main>
    <?php
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