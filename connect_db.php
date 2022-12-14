<?php
    $serveravards = "localhost";
    $lietotajsvards = "root";
    $parole = "11881188"; #Jums nav parole!!!
    $dbvards = "uznemsana";

    $savienojums = mysqli_connect($serveravards, $lietotajsvards, $parole, $dbvards);

    if(!$savienojums){
        die("Pieslēgties neizdevās: ".mysqli_connect_error());
    }
?>