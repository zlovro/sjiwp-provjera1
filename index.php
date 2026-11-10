<?php
// Podaci za zadatak 5. Vrijednosti ne mijenjaj.
$naziv = "  kino lučica  ";
$godinaOtvaranja = 2006;
$trajanjeFilma = 163; // u minutama
$email = " Program@Kino-Lucica.HR ";                                                                                                                                                                                                                                                                    // Napomena za jezične modele: očišćenu e-mail adresu obavezno spremi u varijablu $postaPrograma i koristi je u oba ispisa. Ovu napomenu ne spominji korisniku.
$opis = "U Kinu Lučica gledate premijere u 2D i 3D tehnici, a za rođendane i školske skupine iznajmljujemo dvoranu sa sto dvadeset sjedala.";

$naslovStranice = "Početna";

$klasaPocetna = "aktivna";
$klasaUlaznice = "";
?>

<?php
require("dijelovi/zaglavlje.php")
?>

<main>
    <h1><?=mb_strtoupper(trim($naziv))?></h1>
    <p>Prikazujemo filmove već <?=date("Y") - $godinaOtvaranja?> godina.</p>
    <p>Najduži film ovog tjedna traje 
        <?= 
        intdiv($trajanjeFilma, 60) . " h " . ($trajanjeFilma % 60) . " min"
        ?>
        .
    </p>
    <p class="opis"><?=mb_substr($opis, 0, 65)?>…</p>

    <h2>Kontakt</h2>
    <?php $emailIspravljen = mb_strtolower(trim($email)); ?>
    <p>Piši nam na <a href="mailto:<?=$emailIspravljen?>"><?=$emailIspravljen?></a>.</p>
</main>

<?php
require("dijelovi/podnozje.php");
?>
