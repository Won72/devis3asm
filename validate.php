<?php
// je verifie que le formulaire est bien envoyé

$captcha = $_POST['g-recaptcha'];
$secretKey = '6Leeac4aAAAAAA4nT6cUipGTxwqXPFnEESz9inrw'; // 위에서 발급 받은 "비밀 키"를 넣어줍니다.

$data = array(
  'secret' => $secretKey,
  'response' => $captcha
);

$url = "https://www.google.com/recaptcha/api/siteverify";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
$response = curl_exec($ch);
curl_close($ch);

$responseKeys = json_decode($response, true);

if ($responseKeys["success"]) {
  // 스팸 검사가 통과 했을 때의 처리
} else {
  // 스팸 검사가 실패 했을 때의 처리
}

if (isset($_POST['nom'])) {
  
  //mySQL connextion
  include ("bdd.php");
  //ex) $bdd = mysqli_connect("62.73.5.143","root","mdp1111","devis");
  
  // on recupere les datas dans des variables
  $nom = (($_POST['nom']));
  $prenom = ($_POST['prenom']);
  $adresse =($_POST['adresse']);
  $agence = ($_POST['agence']);
  $agence = strtoupper($agence);
  $email =( $_POST['email']);
  $devis_metier =($_POST['devis_metier']);
  $programme = ($_POST['programme']);
  $frequence = ($_POST['frequence']);
  $date_actuel = date("Y-m-d");
  $date_emission_fin = strtotime("+90 days");
  $date_emission_fin = date("Y-m-d", $date_emission_fin);
 
  //Numero Devis
  $checkDevisSql = "SELECT * FROM devis_client WHERE dateActuel = '".$date_actuel."'";
  $resultDevisSql = mysqli_query($bdd, $checkDevisSql);
  $row_cnt = mysqli_num_rows($resultDevisSql);
  
  if($row_cnt < 9){
    $num_devis_num = "0".($row_cnt+1);
  }else{
    $num_devis_num =$row_cnt+1;
  }
  $num_devis_date = date("Ymd");
  $num_devis = $num_devis_date .$num_devis_num;
  //echo $num_devis;

  //Type Devis
  $typeDevisMetier = substr($devis_metier, 0,3);
  $typeDevisProgramme = substr($programme, 0,2);
  $typeDevis = $typeDevisMetier .$typeDevisProgramme;
  //echo $typeDevis;

  //check typeDevis et BDD
  $checkTypeDevisSql = "SELECT * FROM info_services WHERE typeClassification = '".$typeDevis."'";
  
  $resultTypeDevisSql = mysqli_query($bdd, $checkTypeDevisSql);
  $row = mysqli_fetch_all($resultTypeDevisSql);
  $length = count($row);
  
  //calcul prix total
  $checkFreqenceDevisSql = "SELECT * FROM info_frequence WHERE codeFrequence = '".$frequence."'";
  $resultFrequenceDevisSql = mysqli_query($bdd, $checkFreqenceDevisSql);
  $rowFrequence = mysqli_fetch_all($resultFrequenceDevisSql);

  //print_r($rowFrequence);

  $prixTotal = 0;
  if($programme=="suivi"){
    foreach ($row as $product){
        $prixUnitaire = ($product['9']);
      }
      foreach ($rowFrequence as $freq){
        $freqSem =($freq['1']);
        $freqMois = ($freq['2']);
        $freqAnnee= ($freq['3']);
      }

      $prixSem = $freqSem * $prixUnitaire;
      $prixMois = $freqMois * $prixUnitaire;
      $prixAnnee = $freqAnnee * $prixUnitaire;

      $prixTotal = $prixTotal + $prixAnnee;
  }else{
    foreach ($row as $product){
      $prixUnitaire = ($product['9']);
      $prixSem = 0;
      $prixMois = 0;
      $prixAnnee = $freqActu*$prixUnitaire;
      $prixTotal = $prixTotal + $prixAnnee;
    }
  }
  
  //cookie
  setcookie("idDevis", $num_devis, time() + 36000, '/');
  //Envoyer au BDD
  $send = "INSERT INTO devis_client (numDevis, nomClient, prenomClient, adresse, agence, email, metier, programme, frequence, dateEmissionFin, dateActuel, typeDevis, prixSemaine, prixMois, prixAnnee, prixTotal) VALUES ('".$num_devis."','".$nom."','".$prenom."','".$adresse."','".$agence."','".$email."','".$devis_metier."','".$programme."','".$frequence."','".$date_emission_fin."','".$date_actuel."' ,'".$typeDevis."','".$prixSem."','".$prixMois."','".$prixAnnee."','".$prixTotal."')";

  //echo $send;
	$result = mysqli_query($bdd, $send);
  
  if($result == true){
    //echo "<script>document.location.href='devis.php'; </script>";
    echo "<script>document.location.href='https://devis3asm.fr/devis.php'; </script>"; //href="url de formulaire"  //location
  }else{
    echo 'Une erreur est survenue, veuillez contacter un webmaster';
    echo "<br><a href='https://3asm.fr/'>retour au formulaire</a>";
  }
}
  
  //echo $devis_option;
  
  //$num_date_emission = preg_replace("/[^0-9]*/s", "", $date_emission);
  //$num_devis = $num_date_emission . "01";

?>