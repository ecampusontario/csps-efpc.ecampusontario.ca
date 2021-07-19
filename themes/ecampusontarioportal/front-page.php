<?php get_header();?>
<?php get_template_part('template-parts/navigation/navigation','main');?>
<?php
 $englishtemplateconfigs=['language'=>"enlang",'get-started'=>"HOW TO GET STARTED?",'browse-btn'=>"Browse",'browse-desc'=>"Find courses, activities and templates to use in your learning design",'share-btn'=>'share','share-desc'=>'Upload your learning resources for others to use in training and facilitation'];
 $frenchtemplateconfigs=['language'=>"enlang",'get-started'=>"Comment commencer?",'browse-btn'=>"PARCOURIR",'browse-desc'=>"Trouvez des cours, des activités et des modèles à utiliser dans la conception de solutions d’apprentissage",'share-btn'=>'PARTAGER','share-desc'=>'Téléchargez vos ressources d’apprentissage pour que les autres les utilisent dans le cadre d’activités de formation et de facilitation'];
 unset($_SESSION['template']['configs']);
 //code for alternate language, for handling interface items based on language. Some metadata / DSpace data might NOT correspond to the user language!
 switch($_SESSION['user']['language']){
   case "english":
   $_SESSION['template']['configs']=$englishtemplateconfigs;
   break;
   case "french":
   $_SESSION['template']['configs']=$frenchtemplateconfigs;
   break;
 } 
?>
<section class="container-fluid p-0">
    <div class="row">
        <div class="col-12 col-sm-4 justify-content-center front-left-img d-none d-sm-block">
            <!--<h4 class="text-center front-page-heading"><?php echo $_SESSION['template']['configs']['get-started'];?>
            </h4>-->
        </div>
        <div class="col-12 col-sm-8 pt-5 home-background">
            <div class="row has-text-align-center justify-content-center">
                <div class="col-12">
                    <div class="row">
                        <img class="union-image"
                            src="<?php echo get_site_url(); ?>/wp-content/themes/ecampusontarioportal/assets/images/logos/union.png">
                    </div>

                    <?php if(is_active_sidebar($_SESSION['page']['language'].'_front-page-title')):
                        dynamic_sidebar( $_SESSION['page']['language'].'_front-page-title' );
                    endif; ?>
                    <?php if(is_active_sidebar($_SESSION['page']['language'].'_front-page-subtitle')):
                        dynamic_sidebar( $_SESSION['page']['language'].'_front-page-subtitle' );
                    endif; ?>
                    <?php get_template_part('template-parts/search/search', 'catalogue' );?>
                    <?php //get_template_part('template-parts/actions/actions', 'screen' );?>

                </div>
                <div class="col-12 col-md-6 mt-md-3 mb-3 pt-5 pb-5 pl-4 pr-4">
                    <img class="front-icons ml-auto mr-auto" alt="browse icon"
                        src="/wp-content/themes/ecampusontarioportal/assets/images/icons/browse-icon.png">
                    <a href="/catalogue"
                        class="btn btn-dark mt-3 mb-3 ml-auto mr-auto w-50 d-block front-box-button text-uppercase"><?php echo $_SESSION['template']['configs']['browse-btn']; ?></a>
                    <p class="front-box-text pl-3 pr-3"><?php echo $_SESSION['template']['configs']['browse-desc']; ?>
                    </p>
                </div>
                <div class="col-12 col-md-6 mt-md-3 mb-3 pt-5 pb-5 pl-4 pr-4">
                    <img class="front-icons ml-auto mr-auto" alt="browse icon"
                        src="/wp-content/themes/ecampusontarioportal/assets/images/icons/share-icon.png">
                    <a href="/share"
                        class="btn btn-dark mt-3 mb-3 ml-auto mr-auto w-50 d-block front-box-button text-uppercase"><?php echo $_SESSION['template']['configs']['share-btn']; ?></a>
                    <p class="front-box-text pl-3 pr-3"><?php echo $_SESSION['template']['configs']['share-desc']; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>