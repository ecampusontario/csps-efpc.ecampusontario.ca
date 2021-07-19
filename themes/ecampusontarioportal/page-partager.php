<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<?php get_header();
?>
<?php get_template_part('template-parts/navigation/navigation','main');?>

<div class="container-fluid share-banner p-4">
    <div class="row">
        <div class="col-12 col-md-12 p-0 m-0">
            <div class="row">
                <div class="col-12 col-sm-5 pl-2">
                    <img class="footer-logo p-0 m-0"
                        src="<?php echo get_site_url(); ?>/wp-content/themes/ecampusontarioportal/assets/images/logos/gcpartage-white.png">
                    <div class="hr-line mt-3 mb-3 w-50"></div>
                    <h2 class="has-white-color m-0 p-0 banner-title text-uppercase">Téléverser DU CONTENU
                        D’APPRENTISSAGE</h2>
                    <p class="has-white-color pb-4 banner-subtitle">Partagez les ressources que vous avez<br> créées
                        avec la communauté d’apprentissage.
                    </p>

                    <a href="#share-form" role="button"
                        class=" d-inline-flex align-items-center btn rounded-0 p-3 has-white-background-color mt-3 text-uppercase">
                        <span class="skip-to-form"></span><span class=" bold-text" style="font-size:0.7rem;">Passez au
                            formulaire</span></a>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid has-white-background-color p-5">
    <div class="row">
        <div class="col-12 col-md-10 has-text-align-center m-auto">
            <h2 class="text-uppercase bold-text"> Nous sommes très heureuses et heureux que vous vous joigniez à nous!
            </h2>
            <p class="has-medium-font-size">Voici ce que vous devez savoir avant de partager une ressource
                d’apprentissage avec la communauté :</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-10 p-0 m-auto">
            <div class="row">
                <div class="col-12 col-sm-3 mt-5 has-text-align-center ">
                    <div class="steps-border has-text-align-center h-100">
                        <h2 class="coral-color">1</h2>
                        <h4 class="text-uppercase steps-title">Ce que vous pouvez partager </h4>
                        <img class="pt-4 share-page-icon"
                            src="<?php echo get_site_url(); ?>/wp-content/themes/ecampusontarioportal/assets/images/icons/csps-docu.png">
                        <p class="p-4 steps-text">des ébauches et des versions définitives de cours, d’objectifs
                            d’apprentissage, de modèles, d’activités, d’études de cas, d’aide-mémoires, etc.</p>
                    </div>
                </div>

                <div class="col-12 col-sm-3 mt-5 has-text-align-center ">
                    <div class="steps-border has-text-align-center h-100">
                        <h2 class="coral-color">2</h2>
                        <h4 class="text-uppercase steps-title">Vous devez respecter les droits d’auteurs </h4>
                        <img class="pt-4 share-page-icon"
                            src="<?php echo get_site_url(); ?>/wp-content/themes/ecampusontarioportal/assets/images/icons/csps-copy-magnify.png">
                        <p class="p-4 steps-text">partagez seulement du contenu que vous avez créé ou que vous avez
                            l’autorisation de publier en libre accès.
                    </div>
                </div>

                <div class="col-12 col-sm-3 mt-5 has-text-align-center ">
                    <div class="steps-border has-text-align-center h-100">
                        <h2 class="coral-color">3</h2>
                        <h4 class="text-uppercase steps-title">Votre contenu doit être facile à trouver </h4>
                        <img class="pt-4 share-page-icon"
                            src="<?php echo get_site_url(); ?>/wp-content/themes/ecampusontarioportal/assets/images/icons/share-icon.png">
                        <p class="p-4 steps-text">décrivez votre contenu d’une façon qui aidera les professionnel(le)s
                            de l’apprentissage à le trouver. Remplissez un formulaire différent pour chaque langue.</p>
                    </div>
                </div>

                <div class="col-12 col-sm-3 mt-5 has-text-align-center ">
                    <div class="steps-border has-text-align-center h-100">
                        <h2 class="coral-color">4</h2>
                        <h4 class="text-uppercase steps-title">Vous devez attendre la révision </h4>
                        <img class="pt-4 share-page-icon"
                            src="<?php echo get_site_url(); ?>/wp-content/themes/ecampusontarioportal/assets/images/icons/csps-mail.png">
                        <p class="p-4 steps-text"> notre équipe vérifiera que votre contenu est étiqueté efficacement
                            avant de le publier.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-10 has-text-align-center m-auto">
            <h3 class="bold-text">Avez-vous des questions? <a
                    href="mailto:csps.edtechresearchinnovation-rechercheinnovationteched.efpc@canada.ca?subject=Contactez GCpartage"
                    class=""><u>Contactez-nous</u></a></h3>
        </div>
    </div>
</div>

<div class="container-fluid grey-background-10 pt-5 pb-5">
    <div class="row">
        <div class="col-12 col-md-10 has-text-align-center m-auto">
            <h2 class="text-uppercase bold-text"> REMPLISSEZ LE FORMULAIRE POUR PARTAGER VOS RESSOURCES </h2>

        </div>
    </div>
</div>
<div class="container-fluid p-5 has-white-background-color" id="share-form">
    <div class="row">
        <div class="col-12 col-md-10 has-text-align-center m-auto">
            <?php echo FrmFormsController::get_form_shortcode( array( 'id' => 37, 'title' => false, 'description' => false ) ); ?>
        </div>
    </div>
</div>
<?php get_footer();?>
<script>
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
});
</script>