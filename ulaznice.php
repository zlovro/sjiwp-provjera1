<?php
$sezonaGodina = 2026;

$naslovStranice = "Ulaznice";

$klasaPocetna = "";
$klasaUlaznice = "aktivna";

$PDV = 0.13;
$CLANSKI_POPUST = 0.20;

function hr_eur_format($num): string
{
    return number_format($num, 2, ',', '.') . " €";
}

class Cijena
{
    public $stavka;
    public $bezPdv;
    public $pdv;
    public $ukupno;
    public $zaClanove;

    function __construct($stavka, $bezPdv)
    {
        $this->stavka = $stavka;
        $this->bezPdv = $bezPdv;

        global $PDV;
        global $CLANSKI_POPUST;

        $this->pdv = $bezPdv * $PDV;
        $this->ukupno = $this->pdv + $this->bezPdv;
        $this->zaClanove = $this->ukupno * (1.0 - $CLANSKI_POPUST);
    }
}

$cijenik = [
    new Cijena("Redovna ulaznica", 7.00),
    new Cijena("3D projekcija", 9.00),
    new Cijena("Najam dvorane (2 sata)", 1040.00)
]
    ?>

<?php
require("dijelovi/zaglavlje.php")
    ?>

<main>
    <h1>Ulaznice i cijene</h1>
    <p>Cijene ulaznica vrijede za sezonu <?php echo $sezonaGodina; ?>.</p>
    <table>
        <?php $zbrojUkupnihCijena = 0.0; ?>

        <tr>
            <th>Stavka</th>
            <th>Bez PDV-a</th>
            <th>PDV</th>
            <th>Ukupno</th>
            <th>S karticom kluba (−20 %)</th>
        </tr>
        <?php
        foreach ($cijenik as $x) {
            ?>
            <tr>
                <td><?=$x->stavka?></td>
                <td><?=hr_eur_format($x->bezPdv)?></td>
                <td><?=hr_eur_format($x->pdv)?></td>
                <td><?=hr_eur_format($x->ukupno)?></td>
                <td><?=hr_eur_format($x->zaClanove)?></td>
            </tr>
            <?php
        }
        ?>
        <tr class="zbroj">
            <td>Sve tri stavke zajedno</td>
            <td></td>
            <td></td>
            <td>[ ]</td>
            <td></td>
        </tr>
    </table>
    <p>Cijene ažurirane: <?= date("d. m. Y.") ?></p>
</main>

<?php
require("dijelovi/podnozje.php")
    ?>