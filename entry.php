<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uzņemšana LVT</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="images/lvt.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <header>
        <a href="#" class="logo">Liepājas Valsts tehnikums</a>

        <nav class="navbar">
            <a href="index.php#sakums">Sākumlapa</a>
            <a href="index.php#specialitates">Uzņemšana</a>
            <a href="index.php#informacija">Par mums</a>
            <a href="index.php#iepazisti">Iepazīsti tehnikumu</a>
            <a href="index.php#kontakti">Kontakti</a>
        </nav>

        <div id="menu-btn" class="fas fa-bars">
    </header>

    <section class="sakums" id="sakums">
        <div class="content">
            <h3>LVT uzsāk jauno audzēkņu uzņemšanu</h3>
            <p>Sākot no š.g. jūnija jaunieši var iesniegt dokumentus PIKC "Liepājas Valsts tehnikums", lai jau nākamajā mācību gadā apgūtu kādu no darba tirgū pieprasītām profesijām.</p>
            <a href="#specialitates" class="btn">Apskatīt specialitātes</a>
        </div>

        <div class="image">
            <img src="images/learn.png" alt="">
        </div>

        <div class="cloud"></div>

        <div class="cloud cloud2"></div>
    </section>

    <section class="pieteiksanas" id="pieteiksanas">
        <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                require("connect_db.php");
                if(isset($_POST['gatavs'])){
                    $vardss = $_POST['vards'];
                    $uzvardss = $_POST['uzvards'];
                    $dzimDatii = $_POST['dzimDati'];
                    $talruniss = $_POST['talrunis'];
                    $emaill = $_POST['email'];
                    $adresee = $_POST['adrese'];
                    $specc1 = $_POST['spec1'];
                    $specc2 = $_POST['spec2'];
                    $izglitibaa = $_POST['izglitiba'];
                    $vidVertejumss = $_POST['vidVertejums'];
                    $komentarss = $_POST['komentars'];

                    $parbaude = "SELECT * FROM audzekni WHERE Epasts='$emaill'";
                    $parbaudesRezultats = mysqli_query($savienojums, $parbaude) or die ("Nekorekts vaicājums!");

                    if(mysqli_num_rows($parbaudesRezultats) >=1){
                        echo "<div class='pieteiksanasKluda sarkans'>Kļūda! Informācija par Jums jau ir iesniegta! <br> Ja vēlaties veikt kādas izmaiņas - lūdzu sazinieties ar PIKC LVT pa tālruni +371 69 999 999!</div>";
                    }else{
                        if(!empty($vardss) && !empty($uzvardss) && !empty($dzimDatii) && !empty($talruniss) && !empty($emaill) && !empty($adresee) && !empty($specc1) && !empty($izglitibaa) && !empty($vidVertejumss)){
                            $ievietot = "INSERT INTO audzekni(Vards, Uzvards, DzimDati, Talrunis, Epasts, Adrese, Specialitate1, Specialitate2, Izglitiba, VidVertejums, Komentars) VALUE ('$vardss', '$uzvardss', '$dzimDatii', '$talruniss','$emaill','$adresee','$specc1','$specc2','$izglitibaa','$vidVertejumss','$komentarss')";
                            
                            if(mysqli_query($savienojums, $ievietot)){
                                echo "<div class='pieteiksanasKluda zals'>Pieteikšanās ir noritējusi veiksmīgi! Uz drīzu sazināšanos!</div>";
                            }else{
                                echo "<div class='pieteiksanasKluda sarkans'>Reģistrācija nav izdevusies! Kļūda sistēmā!</div>";
                            }
                        }else{
                            echo "<div class='pieteiksanasKluda sarkans'>Pieteikšanās nav izdevusies! Kāds no ievades laukiem aizpildīts NEKOREKTI!</div>";
                        }
                    }

                }else{
        ?>
        <h1 class="heading">Pieteikšanās specialitātē <span><?php $specialitate = $_POST['pieteikties']; echo $specialitate; ?></span></h1>

        <div class="row">
            <form action="" method="post">
                <input type="text" placeholder="Vārds *" name="vards" class="box1" title="Vārds" required>
                <input type="text" placeholder="Uzvārds *" name="uzvards" class="box1" title="Uzvārds" required>
                <input type="text" placeholder="Dzimšanas dati *" name="dzimDati" class="box1" title="Dzimšanas dati" required>
                <input type="number" placeholder="Tālrunis *" name="talrunis" class="box1" title="Tālrunis" required>
                <input type="email" placeholder="E-pasts *" name="email" class="box1" title="E-pasts" required>
                <input type="text" placeholder="Dzīvesvietas adrese *" name="adrese" class="box1" title="Dzīvesvietas adrese" required>
                <input type="text" placeholder="Prioritārā specialitāte *" value="<?php $specialitate = $_POST['pieteikties']; echo $specialitate; ?>" name="spec1" class="box1" title="Prioritārā specialitāte" readonly>
                <input type="text" placeholder="Sekundārā specialitāte " name="spec2" class="box1" title="Sekundārā specialitāte">
                <input type="text" placeholder="Iepriekš absolvētā izglītības iestāde *" name="izglitiba" class="box1" title="Iepriekš absolvētā izglītības iestāde" required>
                <input type="number" placeholder="Vidējais vērtējums diplomā *" name="vidVertejums" class="box1" title="Vidējais vērtējums diplomā" required>
                <input type="text" placeholder="Jūsu komentārs" name="komentars" class="box2" title="Jūsu komentārs">
                <input type="submit" name="gatavs" value="Pieteikties!" class="btn">
            </form>
        </div>
        <?php
            }}else{
                echo "<div class='pieteiksanasKluda sarkans'>Kaut kas nogāja greizi! Atgriezies <a href='index.php'>sākumlapā</a> un mēģini vēlreiz!</div>";
            }
        ?>
    </section>
        

    <section class="footer">
        Liepājas Valsts tehnikums &copy; 2021
    </section>
    <script src="script.js"></script>
</body>
</html>