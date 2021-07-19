<?php //language configs for this template
    $englishtemplateconfigs=['language'=>"enlang",'other-versions'=>"Other Versions",'back-btn'=>"Back to Search",'ooln-btn'=>"join ooln",'review_url'=>"/review-an-oer/",'read-online-hover'=>"Read this title online: ",'review-book-alt'=>"Review this item",'no-review-txt'=>'This resource has not been reviewed','read-all-reviews-btn'=>'Read All Reviews','rating-heading'=>'Overall Rating','institutional-heading'=>'Institutional Affiliations','id-heading'=>'Universal ID','licence-heading'=>'License','languages-heading'=>'Languages','contributors-heading'=>'Contributors','date-heading'=>'Date Published','subjects-heading'=>'Subjects','authors-heading'=>'Authors ','additional-desc'=>'Some Instructor Resources Must Be Requested by E-mail.','order-print-link'=>'ORDER PRINT COPY','download-book_btn'=>'Download','first-review-book_btn'=>'Be the first to review this item','read-review-book_btn'=>'Read the reviews','get-this-book_btn'=>'Get text and resources','share'=>'Share on ','description_title'=>'Description','get-this-book_title'=>'Get This Text','read_title'=>'Read','download_title'=>'Download','print_title'=>'Order','additional_title'=>'Additional Resources','about_title'=>'About','reviews_title'=>'Reviews','get-this-book_info'=>'Materials are presented free of charge under a Creative Commons License. Print copies are available via the University of Waterloo Print on Demand service. Click here for more information about ordering print copies.'];
    $frenchtemplateconfigs=['language'=>"frlang",'other-versions'=>"Autres versions",'back-btn'=>"Retour à la recherche",'ooln-btn'=>"rejoindre ooln",'review_url'=>"/evaluer-une-rel/",'read-online-hover'=>"Lire ce titre en ligne: ",'review-book-alt'=>"Évaluez cet article",'no-review-txt'=>"Cette ressource n'a pas été évaluée",'read-all-reviews-btn'=>'Lire toutes les revues','rating-heading'=>'Appréciation globale','institutional-heading'=>'Institutions affiliées','id-heading'=>'Identificateur universel','licence-heading'=>'Licence','languages-heading'=>'Langues','contributors-heading'=>'Contributeurs','date-heading'=>'Date de publication','subjects-heading'=>'Sujets','authors-heading'=>'Auteurs','additional-desc'=>'Certaines ressources destinées aux formateurs et formatrices doivent être demandées par courriel.','order-print-link'=>'Commande de version imprimée','download-book_btn'=>'Télécharger','first-review-book_btn'=>'Être le premier à évaluer cet article','read-review-book_btn'=>'Consultez les revues','get-this-book_btn'=>'Obtenez ce Livre','share'=>'Partagez sur ','description_title'=>'Description','get-this-book_title'=>'Obtenir cette ressource','read_title'=>'Lire','download_title'=>'Telecharger','print_title'=>'Commander','additional_title'=>'Ressources supplémentaires','about_title'=>'À propos','reviews_title'=>'Revues','get-this-book_info'=>'Les documents sont offerts gratuitement en vertu d’une licence de Creative Commons. Des exemplaires imprimés sont disponibles par l’entremise du service d’impression sur demande de l’Université de Waterloo. Cliquez ici pour en savoir plus sur la commande d’exemplaires imprimés.'];
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
            $link="https://search.ecampusontario.ca/?itemTypes=6&sourceWebsiteTypes=3&returnUrl=https://openlibrary.ecampusontario.ca";
          }} ?>
<section id="item_splash" class="page_splash region <?php if(is_user_logged_in()){?>wp-user<?php }?>" role="search">
    <div class="sidebar_box page-items" style="margin-top: 4em;" data-conditional-wrapper data-discovery-item-section>
        <div id="back-div" style="padding-top:1px; padding-bottom:1px;"><a href="<?php echo $link;?>"><button id="back-btn" class="ecampus-primary-btn-dark"><?php print $_SESSION['template']['configs']['back-btn'];?></button></a> 
              <button  class="ecampus-primary-btn-dark"><?php print $_SESSION['template']['configs']['ooln-btn'];?></button> </div>
        <span id="frlang-active" style="display: none;"><?php print $_SESSION['template']['configs']['language'];?></span>
        <a name="item_splash" class="mobilescrollpoint" tabindex="0"></a>
        <!-- SPLASH -->
        <div id="book_header">
            <div id="book_cover" data-conditional-wrapper data-discovery-item-section>
                <div data-op='processCover' data-param='cover' data-discovery-item-element>
                    <div data-view-template-name='cover' data-view-template data-coversrc="%%link%%">
                        <img alt='%%description%%' />
                    <!--<div id="cover-attribution" >%%label%%</div> -->
                    </div>
                </div>
            </div>
            <div id="book-data">
                <h2 id='title' class="ecampus-h2-heading" data-param='dc.title' data-discovery-item-element></h2>
                <h3 id="subtitle" data-param='dc.title.subtitle' data-conditional data-discovery-item-element></h3>
                <h5 id="contributor" data-param='dc.contributor.author' data-op='listSentence' data-conditional data-discovery-item-element></h5>
                <div id="rating-box">
                    <div id="overall_rating" class="top-review-rating" style="display:none;">
                        <div class="ratings">
                            <div class="ratings-top review-rating" style="width: 0%"><span>&#x2605;</span><span >&#x2605;</span><span >&#x2605;</span><span>&#x2605;</span><span>&#x2605;</span></div>
                            <div class="ratings-bottom"><span>&#x2605;</span><span >&#x2605;</span><span >&#x2605;</span><span>&#x2605;</span><span>&#x2605;</span></div>
                        </div>
                    </div>
                    <div class="total-reviews top-review-rating" style="display:none;">
                        <span>
                            <a style="display:none;"class="set-review-link review-numbers-main" onclick="navigateToReview()" href='#overall_rating-text' title='Read Review'>
                                <p id="test-review-numbers"><?php print $_SESSION['template']['configs']['no-review-txt'];?></p>
                            </a>
                        </span>
                    </div>
                    <a  class="no-review-btn ecampus-primary-btn-dark" style="display:none;" href="<?php print $_SESSION['template']['configs']['review_url'];?>" target="_blank"><?php print $_SESSION['template']['configs']['first-review-book_btn'];?></a>
                    <!--<div class="print-share-icon">
                        <img onclick="printer()" class="svg-icons" src="../../wp-content/themes/ecampusontarioportal/assets/images/icons/print.svg"/>
                        <img id="shareBtn" class="svg-icons" src="../../wp-content/themes/ecampusontarioportal/assets/images/icons/share.svg"/>
                    </div> -->
                    <div id="shareModal" class="modal">
                        <!-- Modal content -->
                        <div class="modal-content">
                            
                        </div>
                    </div>
                </div>
                <p class="book-info"><span class="bold-text"><?php print $_SESSION['template']['configs']['date-heading'];?>: </span><span data-param='dc.date' data-discovery-item-element></span></p>
                <p class="book-info"><span class="bold-text"><?php print $_SESSION['template']['configs']['licence-heading'];?>: </span><span data-param="dc.rights.license" data-op="addLicenceURL" data-discovery-item-element></span></p>
                <div class="get-this-book-section">
                    <div class="download-book" style="display: none;">
                        <span class="ecampus-custom-dropdown">
                            <select id="downloaditem" data-op='listResourceLinks' data-param="pod|download|downloads" data-discovery-item-element>
                                <option value='%%link%%' data-format='%%format%%' data-view-template-name='download_link' data-view-template>%%label%%</option>
                            </select>
                        </span>
                    
                        <div>  
                            <a id="downloadicon"  href="" title="<?php print $_SESSION['template']['configs']['download-book_btn'];?>">
                            
                                <img style="margin-bottom:0px;" class="svg-icons" src="../../wp-content/themes/ecampusontarioportal/assets/images/icons/download.svg"></a>
                           
                            <a id="downloalink" href="" title="<?php print $_SESSION['template']['configs']['download-book_btn'];?>" ><?php print $_SESSION['template']['configs']['download-book_btn'];?></a>
                            </a>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="read-order-book">
                        <span id="print-option">
                            <ul>
                                <li data-format='link'>
                                    <a onclick="" class="print-book" href='<?php print $_SESSION['admin']['pod']['baseurl'];?>%22<?php print $_GET['id'] ?>%22/sp=results_books.html' target="_blank" title="<?php print $_SESSION['template']['configs']['order-print-link'];?>">
                                    <img class="svg-icons" src="../../wp-content/themes/ecampusontarioportal/assets/images/icons/order-print-copy.svg">
                                    
                                    </a>
                                    <a onclick="" class="print-book" href='<?php print $_SESSION['admin']['pod']['baseurl'];?>%22<?php print $_GET['id'] ?>%22/sp=results_books.html' target="_blank" title="<?php print $_SESSION['template']['configs']['order-print-link'];?>">
                                        <?php print $_SESSION['template']['configs']['order-print-link'];?>
                                    </a>
                                </li>
                            </ul>
                        </span>
                        <div class="divider"></div>
                        <span  class="read-online-option" data-conditional-wrapper data-discovery-item-section>
                            <ul data-op='listResourceLinks' data-param="read" data-discovery-item-element>
                                <li data-format='%%format%%' data-view-template-name='read_link' data-view-template>
                                    <a id="read-book" onclick=" " href='%%link%%' title="<?php print $_SESSION['template']['configs']['read-online-hover'].'%%description%%';?>" target="_blank">                   
                                    <img class="svg-icons" src="../../wp-content/themes/ecampusontarioportal/assets/images/icons/read-online.svg">
                                    </a>
                                    <a id="read-book" onclick=" " href='%%link%%' title="<?php print $_SESSION['template']['configs']['read-online-hover'].'%%description%%';?>" target="_blank">%%label%%
                                    </a>                                    
                                </li>
                            </ul>
                        </span>
                    </div>
                </div>
                <p style="text-align:left; margin-top: 16px;"><span class="ecampus-h3-heading"><?php print $_SESSION['template']['configs']['description_title'];?></span></p>
                <div id="book_description-text" class="more" data-param='dc.description' data-discovery-item-element></div>
                <div class="accordion"><?php print $_SESSION['template']['configs']['about_title'];?></div>
                <div class="panel">
                    <div class="metadata_subsection">
                        <div class="about-book-row"data-conditional-wrapper>
                            <h6><?php print $_SESSION['template']['configs']['authors-heading'];?></h6>
                            <p data-param='dc.contributor.author' data-op='listSentence' data-discovery-item-element></p>
                        </div>
                        <div class="about-book-row" data-conditional-wrapper>
                            <h6><?php print $_SESSION['template']['configs']['contributors-heading'];?></h6>
                            <p data-param='dc.contributor' data-op='listSentence' data-discovery-item-element></p>
                        </div>
                        <div class="about-book-row" data-conditional-wrapper>
                            <h6><?php print $_SESSION['template']['configs']['contributors-heading'];?></h6>
                            <p data-param='dc.contributor.editor|dc.contributor.illustrator|dc.contributor.advisor|dc.contributor.other' data-op='listSentence' data-discovery-item-element></p>
                        </div>
                        <div class="about-book-row" data-conditional-wrapper>
                            <h6><?php print $_SESSION['template']['configs']['subjects-heading'];?></h6>
                            <p data-param='dc.subject.classification' data-op='listSentence' data-discovery-item-element></p>
                        </div>
                        <div class="about-book-row" data-conditional-wrapper>
                            <h6><?php print $_SESSION['template']['configs']['languages-heading'];?></h6>
                            <p data-param='dc.language.iso' data-op='parseLanguageISOSentence' data-discovery-item-element></p>
                        </div>
                        <div class="about-book-row" data-conditional-wrapper>
                            <h6><?php print $_SESSION['template']['configs']['date-heading'];?></h6>
                            <p data-param='dc.date' data-discovery-item-element></p>
                        </div>
                        <div class="about-book-row" data-conditional-wrapper>
                            <h6><?php print $_SESSION['template']['configs']['licence-heading'];?></h6>
                            <p data-param="dc.rights.license" data-op="addLicenceURL" data-discovery-item-element></p>
                        </div>
                        <div class="about-book-row" data-conditional-wrapper>
                            <h6><?php print $_SESSION['template']['configs']['institutional-heading'];?></h6>
                            <p data-param="ecO-OER.InstitutionalAffiliation" data-discovery-item-element></p>
                        </div>
                        <div class="about-book-row" data-conditional-wrapper>
                            <h6><?php print $_SESSION['template']['configs']['id-heading'];?></h6>
                            <p data-op="getID" data-discovery-item-element></p>
                        </div>
                    </div>
                </div>
                <div class="accordion additional-resources-accordion" style="display: none;"><?php print $_SESSION['template']['configs']['additional_title'];?></div>
                <div class="panel additional-resources-accordion" style="display: none;">
                    <p style="font-size: 16px;margin-top: 1em;font-weight: 400;">
                        <?php print $_SESSION['template']['configs']['additional-desc'];?>                     
                    </p>
                    <div id="additional-resources-section " data-op='listResourceLinks' data-param='ancillary' data-discovery-item-element>
                        <div class= "additional-resources-item" data-view-template-name='ancillary_link' data-view-template>
                            <a class="resourceLink-ga" onclick="" href='%%link%%' title='%%description%%' target="_blank">
                            <img style="margin: 1em;" class="svg-icons" src='%%icon%%'>
                            </a>
                            <a class="resourcelink resourcelink-ga" onclick="" href='%%link%%' title='%%description%%' target="_blank">%%label%%  </a>
                        </div>
                    </div>
                </div>
                <div class="accordion"><?php print $_SESSION['template']['configs']['reviews_title'];?></div>
                <div class="panel">
                    <div class="reviews-stat-box" id="reviews_section_main" role="region"data-discovery-item-review-section>
                        <div id="overall_rating">
                            <div id="overall_rating-text"><?php print $_SESSION['template']['configs']['rating-heading'];?></div>
                            <div class="ratings">
                                <div class="ratings-top review-rating" id="test-review-rating" style="width: 0%"><span>&#x2605;</span><span >&#x2605;</span><span >&#x2605;</span><span>&#x2605;</span><span>&#x2605;</span></div>
                                <div class="ratings-bottom"><span>&#x2605;</span><span >&#x2605;</span><span >&#x2605;</span><span>&#x2605;</span><span>&#x2605;</span></div>
                            </div>
                            <a style="display:none;"class="set-review-link review-numbers" href='#overall_rating-text' title='Read Review'>
                                <p><?php print $_SESSION['template']['configs']['no-review-txt'];?></p>
                            </a>
                        </div>
                        <div>
                            <a href="<?php print $_SESSION['template']['configs']['review_url'];?>" target="_blank" id="reviewcta" class="ecampus-primary-btn-yellow" data-alt-content="<?php print $_SESSION['template']['configs']['review-book-alt'];?>"><?php print $_SESSION['template']['configs']['first-review-book_btn'];?></a>
                        </div>
                    </div>
                    <section id="primary-content" class="region review-details" style="display: none;" role="main" data-template-review-page>
                        <div class="page-content_box" style="padding-left: 0px; padding-right: 0px;">
                            <div class='page-content'>
                                <div class="nav-container"><span id="review-number"></span><button id="prev"><img class="svg-icons" src="../../wp-content/themes/ecampusontarioportal/assets/images/icons/expand-arrow.png"/></button><button id="next"><img class="svg-icons" src="../../wp-content/themes/ecampusontarioportal/assets/images/icons/expand-arrow.png"/></button></div>
                                <div id="review-container">
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="versions-box">
                    <h4 class="version-heading" style="background-color: #fff; margin:0px; padding: 20px 0px;display: none;"><?php print $_SESSION['template']['configs']['other-versions'];?>: </h4>
                    <div class="versions-container">

                    </div>
                </div>            
                <?php 
                    if(is_active_sidebar($_SESSION['page']['language'].'_adopting-a-text')):
                    dynamic_sidebar($_SESSION['page']['language'].'_adopting-a-text');
                    endif; 
                ?>           
            </div>
        </div>
    </div>
</section>
<style>
.widgetbox h2{
    font-size: 22px;
}
#book_header button {
    margin-bottom: 0em;
}
.widgetbox button {
    min-width: auto; 
    margin:0px;
    background-color: #f8da99;
    border-radius: 22px;
    border: 8px solid #F1B434;
    display: inline-block;
    cursor: pointer;
    color: #000;
    font-family: "Frutiger LT Std";
    font-size: 22px;
    font-weight: bold;
    padding: 14px;
    text-decoration: none;
    width: -webkit-fit-content;
    width: -moz-fit-content;
    width: fit-content;
}
.widgetbox hr{
    display: none;
}
.widgetbox p{
    font-size: 16px;
    font-weight: 400;
}
.cta-btn{
    margin-top: auto;
    margin-bottom: 0px;
    transform: translateY(50%);
}
.widgetbox{
    padding:0px;
    margin-top: 1em;
    margin-bottom: 7em;
    border: 0.1875rem solid #1e1a34;
    border-radius: 1.375rem;
    padding: 10px 10px 0px 10px;
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    flex-direction: column;
    background-color: #FAFAFA;
    /* text-align: center; */
}
</style>
<script>
    var select = document.getElementById('downloaditem');
    select.onchange = function () {
      document.getElementById("downloalink").href = this.value;
      document.getElementById("downloadicon").href = this.value;
    }
    
    
    
    jQuery(document).ready(function() {   
      // Google analytics events 
      jQuery("#downloalink").click(function(){
        var textbookName= jQuery('#title').text();
        var downloadType= jQuery('#downloaditem option:selected').text();
        var value= jQuery('#downloaditem option:selected').val();
        if( value !=" "){
          tracker.trackTextbookDownload(downloadType,textbookName);
        }
      }); 
      // Google analytics events 
      jQuery("#downloadicon").click(function(){
        var textbookName= jQuery('#title').text();
        var downloadType= jQuery('#downloaditem option:selected').text();
        var value= jQuery('#downloaditem option:selected').val();
        if( value !=" "){
          tracker.trackTextbookDownload(downloadType,textbookName);
        }
      }); 
    });
    function navigateToReview() { 
    var acc = document.getElementsByClassName("accordion");
    var total=acc.length;
    if(acc[total-1].classList.contains("active-accordion")===false){
    acc[total-1].classList.toggle("active-accordion");
    var panel = acc[total-1].nextElementSibling;
    if (panel.style.maxHeight) {
        panel.style.maxHeight = null;
    } 
    else {
        panel.style.maxHeight = panel.scrollHeight + "px";
    } 
    }                           
} 
            
</script>