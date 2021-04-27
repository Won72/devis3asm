<?php
    if(isset($_COOKIE["idDevis"])) {
     $idDevis = $_COOKIE["idDevis"];
  }

  //recuperer les donnees de mySQL
  $bdd = mysqli_connect("HoteFTP","idSQL","MotDePasseSQL","devis");
  //ex) $bdd = mysqli_connect("62.73.5.143","root","mdp1111","devis");
  $findDevisSql = "SELECT * FROM devis_client WHERE numDevis = '".$idDevis."'";
  $resultFindDevisSql = mysqli_query($bdd, $findDevisSql);
  $rowResultDevis = mysqli_fetch_all($resultFindDevisSql);

  foreach($rowResultDevis as $result){
      $numDevis = $result['1'];
      $nomClient = $result['2'];
      $prenomClient = $result['3'];
      $adresseClient = $result['4'];
      $agenceChoisi = $result['5'];
      $emailClient = $result['6'];
      $metierChoisi = $result['7'];
      $programmeChoisi = $result['8'];
      $frequenceChoisi = $result['9'];
      $dateEmissionFin = $result['10'];
      $dateActuel = $result['11'];
      $typeDevis = $result['12'];
      $prixParMois = $result['14'];
      $prixParAnnee = $result['15'];
      $prixEnTotal = $result['16'];
  }
  //Service SQL
  $findServiceSql = "SELECT * FROM `info_services` WHERE `typeClassification` = '".$typeDevis."'";
  $resultFindServiceSql = mysqli_query($bdd, $findServiceSql);
  $rowResultService = mysqli_fetch_all($resultFindServiceSql);

  //frequence SQL
  $findFrequenceSql = "SELECT * FROM `info_frequence` WHERE `codeFrequence` = '".$frequenceChoisi."'";
  $resultFindFrequenceSql = mysqli_query($bdd, $findFrequenceSql);
  $rowResultFrequence = mysqli_fetch_all($resultFindFrequenceSql);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Devis</title>
    <link rel="stylesheet" type="text/css" href="style/styledevis.css" />
</head>


<body>
    <div class="wrapper">
        <div id="pdfDiv">
            <div class="wrapper_header">
                <div class="header_logo">
                    <h1>3asm</h1>
                </div>
                <div class="header_titre">
                    <h1>LA MAISON ARIANE</h1>
                    <p>CENTRE POLYVALENT DE SOINS</p>
                    <p class="text_small">RIS-ORANGIS "LES IRIS" et PALAISEAU</p>
                </div>
            </div>

            <section>
                <div class="div_violet">
                    <h1 class="text_white">Devis</h1>
                </div>
                <div class="flex_wrapper">
                    <div class="flex_gauche_3">
                        <div class="div_with_border">
                            <p>3ASM</p>
                            <p>83, route de Grigny</p>
                            <p>91130 RIS ORANGIS</p>
                        </div>
                        <div>
                            <p>Agence</p>
                            <p><?php echo $agenceChoisi; ?></p>
                        </div>
                        <div class="text_left">
                            <p>Beneficiare des seance : </p>
                            <p><?php echo $nomClient . " $prenomClient"; ?></p>
                        </div>
                    </div>
                    <div class="flex_droite_3">
                        <div class="flex_center_align">
                            <table>
                                <tr class="div_violet text_white">
                                    <th>N Devis</th>
                                    <th>Date</th>
                                </tr>
                                <tr>
                                    <td class="text_side_padding"><?php echo $numDevis; ?></td>
                                    <td class="text_side_padding"><?php echo $dateActuel; ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="div_with_border">
                            <p><?php echo $nomClient . " $prenomClient"; ?></p>
                            <p><?php echo $adresseClient; ?></p>
                        </div>
                        <div>
                            <p>Date d'emission: <?php echo $dateActuel; ?></p>
                            <p>Date de fin de validité : <?php echo $dateEmissionFin; ?></p>
                        </div>
                    </div>
                </div>
                <div class="text_left">
                    <p>Mode de réglement : Chèque</p>
                    <p>A l'ordre de la 3ASM</p>
                    <p>Ce devis est valable 3 mois à compter de sa date d'emission</p>
                </div>
                <div>
                    <table>
                        <tr class="div_violet text_white">
                            <th rowspan="2">Motifs de consultation, Praticiens</th>
                            <th rowspan="2">Unité</th>
                            <th colspan="3">Quantité</th>
                            <th rowspan="2">Tarif TTC Unitaire</th>
                            <th rowspan="2">Total TTC Mensuel</th>
                            <th rowspan="2">Total TTC Annuel</th>
                        </tr>
                        <tr class="div_violet text_white">
                            <th>à la semaine</th>
                            <th>au mois</th>
                            <th>à l'année</th>
                        </tr>

                        <?php
                        
                        foreach ($rowResultService as $service){
                        echo "<tr>";
                        echo "<td class='text_left'>" .$service['1'] ." " .$service['2'] ."</td>";
                        echo "<td>" .$service['3']."</td>"; // unite
                        if($programmeChoisi == "bilan"){
                            echo "<td>" .$service['5']."</td>"; // semaine
                            echo "<td>" .$service['6']."</td>";// mois
                            echo "<td>" .$service['7']."</td>"; // annee
                        }else{
                            foreach($rowResultFrequence as $frequenceFE){
                            echo "<td>" .$frequenceFE['2']."</td>"; // semaine
                            echo "<td>" .$frequenceFE['3']."</td>";// mois
                            echo "<td>" .$frequenceFE['4']."</td>"; // annee
                            }
                        }
                        echo "<td>" .$service['9']." €"."</td>";//prix unitaire
                        echo "<td>" .$prixParMois." €"."</td>";//Prix Mois
                        echo "<td>" .$prixParAnnee." €" ."</td>";//Prix Annee
                        echo "</tr>";
                        }
                        
                        ?>

                        <tr>
                            <td colspan="6" class="text_right div_violet text_white"> Total </td>
                            <td><?php echo $prixParMois ." €"; ?></td>
                            <td><?php echo $prixEnTotal ." €"; ?></td>
                        </tr>
                    </table>
                </div>
                <div class="div_with_border">
                    <p>Conformement a l'ordonnacne ~~~</p>
                </div>
                <div>
                    <p>Signature precedee de la mention "Bon pour accord"</p>
                </div>
            </section>

            <footer>
                <div>3asm association pour l'aide, l'assistance et le Secour mutuel</div>
            </footer>
        </div>
    </div>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/jspdf.min.js"></script>
    <script src="js/jspdf.js"></script>
</body>

</html>