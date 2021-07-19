<?php //language configs for this template
    $englishtemplateconfigs=['language'=>"enlang",'certified'=>'Certified by','copy'=>'Copy link','formats-available'=>'File formats available','related-resources'=>'Related resources','feedback-subject'=>'Share your feedback about a resource','feedback-btn'=>'Share your feedback about this resource','resource-lang'=>'Language','accessibility'=>'Accessibility','resource'=>'Resource status','delivery'=>'Delivery methods','learning'=>'Learning time','audiences'=>'Audiences','skill-level'=>'Skill level','skills'=>'Skills','formats'=>'Resource formats','types'=>'Resource types','keywords'=>'Keywords','topics'=>'Topics','content'=>'Table of contents','objectives'=>'Learning objectives','description'=>'Description','share-btn'=>'Share this Page','download-btn'=>'Download','read-btn'=>'Read Online','conditions'=>'Conditions of use','date'=>'Creation date','organization'=>'Organization','authors'=>'Author','back-btn'=>"Back to Search"];
    $frenchtemplateconfigs=['language'=>"frlang",'certified'=>'Certifié par','copy'=>'Copier le lien','formats-available'=>'Formats de fichiers disponibles','related-resources'=>'Ressources associées','feedback-subject'=>'Partagez vos commentaires sur une ressource','feedback-btn'=>'Partagez vos commentaires sur cette ressource','resource-lang'=>'Langue','accessibility'=>'Accessibilité','resource'=>'État de la ressource','delivery'=>'Mode d’utilisation','learning'=>'Temps d’apprentissage','audiences'=>'Publics cibles','skill-level'=>'Niveau de compétences','skills'=>'Compétences','formats'=>'Formats de la ressource','types'=>'Types de ressource','keywords'=>'Mots clés','topics'=>'Sujets','content'=>'Table des matières','objectives'=>'Objectifs d’apprentissage','description'=>'Description ','share-btn'=>'Partagez cette page','download-btn'=>'Télécharger','read-btn'=>'Visualiser en ligne','conditions'=>'Conditions d’utilisation','date'=>'Date de création','organization'=>'Organisation ','authors'=>'Auteur(e)','back-btn'=>"Retour à la recherche"];
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
    $thisurl = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];?>
<?php  
        global $post;
        $post_slug=$post->post_name; 
        if($post_slug==='item') {
          if(isset($_SERVER['HTTP_REFERER'])) {
            $link= $_SERVER['HTTP_REFERER'];
          }
          else{
            $link="/catalogue";
          }} ?>

<!-- Back to search Start -->
<div class="container-fluid has-white-background-color" style="border-top:1.5px solid #707070">
    <div class="row pt-5 pb-5 ">
        <div class="col-12 col-md-10 d-flex m-auto">
            <a href="<?php echo $link; ?>"
                class="btn has-black-background-color has-white-color text-uppercase d-flex align-items-center"><?php echo $_SESSION['template']['configs']['back-btn'];?></a>

            <div class="ml-5 nav-crumbs text-capitalize"><?php make_breadcrumbs(); ?></div>
        </div>
    </div>
</div>

<!-- Back to search End -->
<!-- Item cover Start -->
<div class="container-fluid item-view-background">
    <div class="row">
        <div class="col-12 col-md-10 m-auto">
            <div class="row" data-discovery-item-section data-conditional-wrapper>
                <div class="col-12 col-sm-4 pt-3">
                    <!--<img src="/wp-content/themes/ecampusontarioportal/assets/images/backgrounds/home-bg.png" /> -->
                    <div data-op='processCover' data-param='cover' data-discovery-item-element>
                        <div data-view-template-name='cover' data-view-template data-coversrc="%%link%%">
                            <img alt='%%description%%' />
                            <!--<div id="cover-attribution" >%%label%%</div> -->
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-8">
                    <h2 class="m-0" data-param='dc.title' data-discovery-item-element></h2>
                    <div class="m-0" data-param="dc.creator" data-op="listAuthors" data-discovery-item-element>
                        <h3 data-view-template><?php echo $_SESSION['template']['configs']['authors'];?><small
                                class="item-details ml-3">%%value%%</small>
                            <h3>
                    </div>
                    <h3 class="m-0 org-heading"><?php echo $_SESSION['template']['configs']['organization'];?><small
                            class="item-details ml-3" data-param="dc.contributor.other" data-op="organizationValue"
                            data-discovery-item-element></small>
                    </h3>
                    <h3 class="m-0"><?php echo $_SESSION['template']['configs']['date'];?><small
                            class=" item-details ml-3" data-param="dc.date.created" data-discovery-item-element></small>
                    </h3>
                    <h3 class="m-0"><?php echo $_SESSION['template']['configs']['conditions'];?><small
                            class="item-details ml-3" data-op="addLicenceURL" data-param="dc.rights.license"
                            data-discovery-item-element></small>
                    </h3>
                    <div class="row mt-3">

                        <div class="col-12 col-sm-4 pl-sm-0 mb-4 mb-sm-0" data-discovery-item-section
                            data-conditional-wrapper>
                            <div data-discovery-item-element data-op="readOnlineBtn"
                                data-param="dc.relation.isformatof">
                                <a href="%%value%%" data-view-template
                                    class="btn btn-dark mb-0 text-uppercase readonline-btn">
                                    <?php echo $_SESSION['template']['configs']['read-btn'];?>
                                </a>
                            </div>

                        </div>

                        <div class="col-6 col-sm-4 ">
                            <a class="btn btn-dark mt-0 mb-0 download-main-btn text-uppercase download-btn">
                                <?php echo $_SESSION['template']['configs']['download-btn'];?>
                            </a>
                            <div class="triangle-up-download"></div>

                        </div>

                        <div class=" col-6 col-sm-4">
                            <a
                                class="btn btn-light mt-0 mb-0 share-main-btn text-uppercase transparentbg border-0 share-btn">
                                <?php echo $_SESSION['template']['configs']['share-btn'];?>
                            </a>


                            <div class="triangle-up-share"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6 pb-5 text-center download-box">
                            <h4 class="text-center">
                                <?php echo $_SESSION['template']['configs']['formats-available'];?>
                            </h4>
                            <div class="mb-4 d-flex justify-content-center" data-op='listResourceLinks'
                                data-param="downloads" data-discovery-item-element>
                                <div data-view-template class="d-flex flex-column text-center col-3 m-1 p-0">
                                    <a href="%%link%%">
                                        <img class="download-link w-100" src='%%icon%%' />
                                        <p>%%label%%</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-8 ml-auto text-center share-box">
                            <div class="row">
                                <div class="col-12 form-group">
                                    <input type="text" value="" class="form-control input-sm mt-3 " id="urlinput">
                                    <button
                                        class="copy-text btn btn-dark"><?php echo $_SESSION['template']['configs']['copy'];?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Item cover End -->
            <!-- Item Details Start -->
            <div class="container-fluid p-0 mt-3 item-details-border">
                <div class="row pl-5 pr-5 d-flex has-white-background-color" data-conditional-wrapper
                    data-discovery-item-section>
                    <div class="col-12 p-0 item-details-border-bottom">
                        <div data-conditional-wrapper data-discovery-item-section>
                            <h3><?php echo $_SESSION['template']['configs']['description'];?></h3>
                            <p data-param="dc.description" data-discovery-item-element>

                            </p>
                        </div>
                    </div>
                    <div class="col-12 p-0">
                        <div data-conditional-wrapper data-discovery-item-section>
                            <h3><?php echo $_SESSION['template']['configs']['objectives'];?></h3>
                            <p data-op="listPoints" data-param="gc.learningObjectives" data-discovery-item-element>
                            </p>
                        </div>
                        <div data-conditional-wrapper data-discovery-item-section>
                            <h3><?php echo $_SESSION['template']['configs']['content'];?></h3>
                            <p data-op="listPoints" data-param="dc.description.tableofcontents"
                                data-discovery-item-element>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row d-flex pl-5 pr-5 has-white-background-color" data-conditional-wrapper
                    data-discovery-item-section>
                    <div class="col-12 col-sm-6 item-details-border-bottom">
                        <h3><?php echo $_SESSION['template']['configs']['topics'];?></h3>
                        <p data-op="listSentence" data-param="dc.subject.other" data-discovery-item-element>
                        </p>
                    </div>

                    <div class="col-12 col-sm-6 item-details-border-left item-details-border-bottom">
                        <h3><?php echo $_SESSION['template']['configs']['keywords'];?></h3>
                        <p data-op="listSentence" data-param="dc.subject" data-discovery-item-element>
                        </p>
                    </div>
                </div>
                <div class="row d-flex pl-5 pr-5 has-white-background-color" data-conditional-wrapper
                    data-discovery-item-section>
                    <div class="col-12 col-sm-6 item-details-border-bottom">
                        <h3><?php echo $_SESSION['template']['configs']['types'];?></h3>
                        <p data-op="listSentence" data-param="lrmi.learningResourceType" data-discovery-item-element>
                        </p>
                    </div>

                    <div class="col-12 col-sm-6 item-details-border-left item-details-border-bottom">
                        <h3><?php echo $_SESSION['template']['configs']['formats'];?></h3>
                        <p data-op="listSentence" data-param="dc.type" data-discovery-item-element>
                        </p>
                    </div>
                </div>
                <div class="row d-flex pl-5 pr-5 has-white-background-color" data-conditional-wrapper
                    data-discovery-item-section>
                    <div class="col-12 col-sm-6 item-details-border-bottom">
                        <h3><?php echo $_SESSION['template']['configs']['skills'];?></h3>
                        <p data-op="listSentence" data-param="gc.skill" data-discovery-item-element>
                        </p>
                    </div>

                    <div class="col-12 col-sm-6 item-details-border-left item-details-border-bottom">
                        <h3><?php echo $_SESSION['template']['configs']['skill-level'];?></h3>
                        <p data-op="listSentence" data-param="gc.skillLevel" data-discovery-item-element>
                        </p>
                    </div>
                </div>
                <div class="row d-flex pl-5 pr-5 has-white-background-color" data-conditional-wrapper
                    data-discovery-item-section>
                    <div class="col-12 col-sm-6 item-details-border-bottom">
                        <h3><?php echo $_SESSION['template']['configs']['audiences'];?></h3>
                        <p data-op="listSentence" data-param="dcterms.audience" data-discovery-item-element>
                        </p>
                    </div>

                    <div class="col-12 col-sm-6 item-details-border-left item-details-border-bottom">
                        <h3><?php echo $_SESSION['template']['configs']['learning'];?></h3>
                        <p data-op="listSentence" data-param="dcterms.extent" data-discovery-item-element>
                        </p>
                    </div>
                </div>
                <div class="row d-flex pl-5 pr-5 has-white-background-color" data-conditional-wrapper
                    data-discovery-item-section>
                    <div class="col-12 col-sm-6 item-details-border-bottom">
                        <h3><?php echo $_SESSION['template']['configs']['delivery'];?></h3>
                        <p data-op="listSentence" data-param="dcterms.instructionalMethod" data-discovery-item-element>
                        </p>
                    </div>

                    <div class="col-12 col-sm-6 item-details-border-left item-details-border-bottom">
                        <h3><?php echo $_SESSION['template']['configs']['resource'];?></h3>
                        <p data-op="listSentence" data-param="gc.resourceStatus" data-discovery-item-element>
                        </p>
                    </div>
                </div>
                <div class="row d-flex pl-5 pr-5 has-white-background-color" data-conditional-wrapper
                    data-discovery-item-section>
                    <div class="col-12 col-sm-6">
                        <h3> <?php echo $_SESSION['template']['configs']['accessibility'];?></h3>
                        <p data-op="addAccessibilityLink" data-param="gc.accessibility" data-discovery-item-element>
                        </p>
                    </div>

                    <div class="col-12 col-sm-6 item-details-border-left">
                        <h3><?php echo $_SESSION['template']['configs']['resource-lang'];?></h3>
                        <p data-op="parseLanguageISOSentence" data-param="dc.language.iso" data-discovery-item-element>
                        </p>
                    </div>
                </div>
                <div class="row d-flex pt-5 justify-content-center has-white-background-color" data-conditional-wrapper
                    data-discovery-item-section>
                    <div class="col-12 col-sm-4 grey-background-color ml-auto mr-auto">
                        <h3 class="has-white-color text-center">
                            <?php echo $_SESSION['template']['configs']['certified'];?></h3>
                        <p class="has-white-color text-center" data-op="listSentence" data-param="gc.certifiedBy"
                            data-discovery-item-element>
                        </p>
                    </div>
                </div>
                <div class="row pt-3 pb-3">
                    <div class="versions-box w-100 pl-5 pr-5">
                        <h3 class="version-heading" style="display:none;">
                            <?php echo $_SESSION['template']['configs']['related-resources'];?> </h3>
                        <div class="versions-container">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid ">
    <div class="row">
        <div class="col-12 p-0 m-0 text-center">
            <a href="mailto:csps.edtechresearchinnovation-rechercheinnovationteched.efpc@canada.ca?subject=<?php echo $_SESSION['template']['configs']['feedback-subject'];?>"
                class="btn btn-dark m-3"><?php echo $_SESSION['template']['configs']['feedback-btn'];?></a>
        </div>
    </div>
</div>

<script>
jQuery(document).ready(function($) {
    // $('.sharetastic').sharetastic();

    $('.download-box').hide();
    $('.triangle-up-download').hide();
    $('.share-box').hide();
    $('.triangle-up-share').hide();
    /*$(document).on('click', '.download-link', function() {
        var link = $(this).data('link');
        $(this).addClass('grey-background-color');
        $('#download-file-btn').attr('href', link);
    });*/
    $(document).on('click', '.download-main-btn', function() {
        $('.share-box').hide();
        $('.triangle-up-share').hide();
        $('.download-box').toggle();
        $('.triangle-up-download').toggle();
    });
    $(document).on('click', '.share-main-btn', function() {
        $('.download-box').hide();
        $('.triangle-up-download').hide();
        $('.share-box').toggle();
        $('.triangle-up-share').toggle();
    });
    var pageURL = $(location).attr("href");
    $("#urlinput").val(pageURL);
    $(document).on('click', '.copy-text', function() {
        //var copyText = $("#urlinput").val();
        var copyText = document.getElementById("urlinput");
        copyText.select();
        copyText.setSelectionRange(0, 99999)
        document.execCommand("copy");
        $(this).text('Copied');
    });

});
</script>