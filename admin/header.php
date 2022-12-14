<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Uzņemšanas administrēšana</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="shortcut icon" href="../images/lvt.png" type="image/x-icon">
</head>
<body>
    <header>
        <a href="#" class="logo">Liepājas Valsts tehnikums</a>

        <nav class="navbar">
            <a href="index.php" class="<?php echo($page == "sakums" ? "active" : ""); ?>"><i class="fas fa-home"></i> Sākumlapa</a>
            <a href="audzekni.php" class="<?php echo($page == "audzekni" ? "active" : ""); ?>"><i class="fas fa-users"></i> Audzēkņi</a>
            <a href="specialitates.php" class="<?php echo($page == "specialitates" ? "active" : ""); ?>"><i class="fas fa-tasks"></i> Specialitātes</a>
            <a href="../index.php"><i class="fas fa-sign-out-alt"></i> Uz pieteikšanās vietni</a>
        </nav>

        <nav class="navbar">
            <a href="#"><i class="fas fa-power-off"></i> Administrator</a>
        </nav>

        <div id="menu-btn" class="fas fa-bars">
    </header>