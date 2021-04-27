<form method="POST" action="validate.php">

    <hr class="my-4">

    <!--Agence-->
    <div class="my-3">
        <h4 class="mb-3">Agence</h4>
        <div class="form-check">
            <input id="paris" name="agence" type="radio" class="form-check-input" value="paris" checked required>
            <label class="form-check-label" for="paris">Paris</label>
        </div>
        <div class="form-check">
            <input id="palaiseau" name="agence" type="radio" class="form-check-input" value="palaiseau" required>
            <label class="form-check-label" for="palaiseau">Palaiseau</label>
        </div>
        <div class="form-check">
            <input id="ris-orangis" name="agence" type="radio" class="form-check-input" value="ris-orangis" required>
            <label class="form-check-label" for="ris-orangis">Ris-Orangis</label>
        </div>
    </div>

    <hr class="my-4">

    <!--prenom-->
    <div class="row g-3">
        <div class="col-sm-6">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" required>
            <div class="invalid-feedback">
                Veuillez vérifier votre prénom.
            </div>
        </div>

        <!--nom-->
        <div class="col-sm-6">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
            <div class="invalid-feedback">
                Veuillez vérifier votre nom.
            </div>
        </div>

        <!--email-->
        <div class="col-12">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com">
            <div class="invalid-feedback">
                Veuillez vérifier votre adresse email.
            </div>
        </div>

        <!--addresse-->
        <div class="col-12">
            <label for="adresse" class="form-label">Adresse <span class="text-muted">(Optionnel)</span></label>
            <input type="text" class="form-control" id="adresse" name="adresse"
                placeholder="1 Avenue Charles De Gaulle, Paris">
            <div class="invalid-feedback">
                Veuillez vérifier votre adresse.
            </div>
        </div>

        <hr class="my-4">
        <!--Metier-->
        <div class="col-12">
            <label for="devis_metier" class="form-label">Métier</label>

            <select class="form-select" name="devis_metier" id="devis_metier" required>

                <?php
                    $$bdd = mysqli_connect("HoteFTP","idSQL","MotDePasseSQL","devis");
                    //ex) $bdd = mysqli_connect("62.73.5.143","root","mdp1111","devis");
                    //Services 3ASM
                    $findServiceSql = "SELECT * FROM `info_services`";
                    $resultFindServiceSql = mysqli_query($bdd, $findServiceSql);
                    $rowService = mysqli_fetch_all($resultFindServiceSql);
                    
                    $arrayService = array();
                    foreach($rowService as $service){
                        array_push($arrayService, $service[1]);
                    }
                    $arrayUniqueService = array_unique($arrayService);
                    
                    //Service Bilan 3ASM
                    $findServiceBilanSql = "SELECT * FROM `info_services` WHERE `typeConsultation` = 'Bilan'";
                    $resultFindServiceBilanSql = mysqli_query($bdd, $findServiceBilanSql);
                    $rowServiceBilan =  mysqli_fetch_all($resultFindServiceBilanSql);
                    $arrayServiceBilan = array();
                    foreach($rowServiceBilan as $serviceBilan){
                        array_push($arrayServiceBilan, $serviceBilan[1]);
                    }
                    $arrayUniqueServiceBilan =array_unique($arrayServiceBilan);
                    //Options Services
                    foreach($arrayUniqueService as $service){
                        echo "<option value='$service' data-bilan='";
                        if(in_array($service, $arrayUniqueServiceBilan)){
                            echo "isBilan";
                        }else{
                            echo "isNotBilan";
                        }
                            echo "'>$service</option>";
                    }                                        
                ?>

            </select>
            <div class="invalid-feedback">
                Veuillez choisir un métier.
            </div>
        </div>

        <!--Programme Bilan / Suivi-->
        <div class="my-3">
            <h4 class="mb-3">Progamme Bilan / Suivi</h4>
            <div class="form-check div_programme_bilan">
                <input id="bilan" name="programme" type="radio" class="form-check-input" value="bilan" checked required>
                <label class="form-check-label" for="bilan">Bilan</label>
            </div>
            <div class="form-check div_programme_suivi">
                <input id="suivi" name="programme" type="radio" class="form-check-input" value="suivi" required>
                <label class="form-check-label" for="suivi">Suivi</label>
            </div>
        </div>

        <!--Programme Frequence-->
        <div class="my-3 div_frequence">
            <h4 class="mb-3">Frequence Suivi</h4>

            <?php
            $findFrequenceSql = "SELECT * FROM `info_frequence`";
            $resultFindFrequenceSql = mysqli_query($bdd, $findFrequenceSql);
            $rowFrequence = mysqli_fetch_all($resultFindFrequenceSql);
            

            foreach($rowFrequence as $frequence){
                echo "<div class='form-check'>";
                echo "<input id=$frequence[0] name='frequence' type='radio' class='form-check-input' value=$frequence[0] data-semaine=$frequence[2] data-mois=$frequence[3]>";
                echo "<label class='form-check-label' for=$frequence[0]>$frequence[1]</label>";
                echo "</div>";
            }
            ?>

            <div class="div_form_seance_box">
                <p class="div_form_seance">* Cela correspond à <span class="span_form_seance1"></span> séance(s) par
                    semaine, et <span class="span_form_seance2"></span> séance(s) par mois</p>
            </div>

        </div>

        <hr class="my-4">

        <!--D'accord-->
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="same-address" required>
            <label class="form-check-label" for="same-address">Je suis d'accord que les
                informations que j'ai
                saisies seront envoyées à 3ASM</label>
            <div class="invalid-feedback">
                Il faut accepter la condition pour avoir un devis.
            </div>
        </div>



        <hr class="my-4">

        <button class="w-100 btn btn-primary btn-lg" type="submit">Verifier le Devis</button>
</form>