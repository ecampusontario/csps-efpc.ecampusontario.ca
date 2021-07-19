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
                        src="<?php echo get_site_url(); ?>/wp-content/themes/ecampusontarioportal/assets/images/logos/gcshare-white.png">
                    <div class="hr-line mt-3 mb-3 w-50"></div>
                    <h2 class="has-white-color m-0 p-0 banner-title">UPLOAD LEARNING <br>CONTENT</h2>
                    <p class="has-white-color pb-4 banner-subtitle">Share learning resources you created with others<br>
                        in
                        the learning
                        community.
                    </p>

                    <a href="#share-form" role="button"
                        class=" d-inline-flex align-items-center btn rounded-0 p-3 has-white-background-color mt-3 text-uppercase">
                        <span class="skip-to-form"></span><span class=" bold-text" style="font-size:0.7rem;">Skip to the
                            Form</span></a>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid has-white-background-color p-5">
    <div class="row">
        <div class="col-12 col-md-10 has-text-align-center m-auto">
            <h2 class="text-uppercase bold-text"> We are so happy you are here!</h2>
            <p class="has-medium-font-size">Here is what you need to know to share a learning resource with
                the
                community:</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-10 p-0 m-auto">
            <div class="row">
                <div class="col-12 col-sm-3 mt-5 has-text-align-center ">
                    <div class="steps-border has-text-align-center h-100">
                        <h2 class="coral-color">1</h2>
                        <h4 class="text-uppercase steps-title">What you can share</h4>
                        <img class="pt-4 share-page-icon"
                            src="<?php echo get_site_url(); ?>/wp-content/themes/ecampusontarioportal/assets/images/icons/csps-docu.png">
                        <p class="p-4 steps-text">Drafts or finalized versions of courses, learning objectives,
                            templates, activities, case studies, job aids...</p>
                    </div>
                </div>

                <div class="col-12 col-sm-3 mt-5 has-text-align-center ">
                    <div class="steps-border has-text-align-center h-100">
                        <h2 class="coral-color">2</h2>
                        <h4 class="text-uppercase steps-title">Respect Copyright</h4>
                        <img class="pt-4 share-page-icon"
                            src="<?php echo get_site_url(); ?>/wp-content/themes/ecampusontarioportal/assets/images/icons/csps-copy-magnify.png">
                        <p class="p-4 steps-text">Only share content you've created or have permission to publish in the
                            open.
                    </div>
                </div>

                <div class="col-12 col-sm-3 mt-5 has-text-align-center ">
                    <div class="steps-border has-text-align-center h-100">
                        <h2 class="coral-color">3</h2>
                        <h4 class="text-uppercase steps-title">Make Content Findable</h4>
                        <img class="pt-4 share-page-icon"
                            src="<?php echo get_site_url(); ?>/wp-content/themes/ecampusontarioportal/assets/images/icons/share-icon.png">
                        <p class="p-4 steps-text">Describe your content in a way that will help learning professionals
                            discover
                            it.<br>
                            Fill out a
                            separate form for each language.</p>
                    </div>
                </div>

                <div class="col-12 col-sm-3 mt-5 has-text-align-center ">
                    <div class="steps-border has-text-align-center h-100">
                        <h2 class="coral-color">4</h2>
                        <h4 class="text-uppercase steps-title">Wait for review</h4>
                        <img class="pt-4 share-page-icon"
                            src="<?php echo get_site_url(); ?>/wp-content/themes/ecampusontarioportal/assets/images/icons/csps-mail.png">
                        <p class="p-4 steps-text"> Our team will make sure your content is tagged effectively before
                            publishing
                            it.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-10 has-text-align-center m-auto">
            <h3 class="bold-text">Have questions? <a
                    href="mailto:csps.edtechresearchinnovation-rechercheinnovationteched.efpc@canada.ca?subject=Contact GCshare"
                    class=""><u>Contact us</u></a></h3>
        </div>
    </div>
</div>

<div class="container-fluid grey-background-10 pt-5 pb-5">
    <div class="row">
        <div class="col-12 col-md-10 has-text-align-center m-auto">
            <h2 class="text-uppercase bold-text"> Fill out the form to share resources</h2>

        </div>
    </div>
</div>
<div class="container-fluid p-5 has-white-background-color" id="share-form">
    <div class="row">
        <div class="col-12 col-md-10 has-text-align-center m-auto">
            <?php echo FrmFormsController::get_form_shortcode( array( 'id' => 36, 'title' => false, 'description' => false ) ); ?>
        </div>
    </div>
</div>
<?php get_footer();?>
<script>
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
});
</script>