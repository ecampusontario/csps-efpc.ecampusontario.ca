<?php //language configs for this template
$englishtemplateconfigs=['language'=>"enlang",'review-book-alt'=>"Review this item",'no-review-txt'=>'This resource has not been reviewed','read-all-reviews-btn'=>'Read All Reviews','rating-heading'=>'Overall Rating','institutional-heading'=>'Institutional Affiliations','id-heading'=>'Universal ID','licence-heading'=>'License','languages-heading'=>'Languages','contributors-heading'=>'Contributors','date-heading'=>'DATE PUBLISHED','subjects-heading'=>'Subjects','authors-heading'=>'Authors ','additional-desc'=>'SOME INSTRUCTOR RESOURCES MUST BE REQUESTED BY E-MAIL.','order-print-link'=>'ORDER PRINT COPY','download-book_btn'=>'Get This Resource','first-review-book_btn'=>'Be the first to review this item','read-review-book_btn'=>'Read the reviews','get-this-book_btn'=>'Get text and resources','share'=>'Share on ','description_title'=>'Description','get-this-book_title'=>'Get This Text','read_title'=>'Read','download_title'=>'Download','print_title'=>'Print','additional_title'=>'Additional Resources','about_title'=>'About','reviews_title'=>'Reviews','get-this-book_info'=>'Materials are presented free of charge under a Creative Commons License. Print copies are available via the University of Waterloo Print on Demand service. Click here for more information about ordering print copies.'];
$frenchtemplateconfigs=['language'=>"frlang",'review-book-alt'=>"Évaluez cet article",'no-review-txt'=>"Cette ressource n'a pas été évaluée",'read-all-reviews-btn'=>'Lire toutes les revues','rating-heading'=>'Appréciation globale','institutional-heading'=>'Institutions affiliées','id-heading'=>'Identificateur universel','licence-heading'=>'Licence','languages-heading'=>'Langues','contributors-heading'=>'Contributeurs','date-heading'=>'Date de publication','subjects-heading'=>'Sujets','authors-heading'=>'Auteurs','additional-desc'=>'Certaines ressources destinées aux formateurs et formatrices doivent être demandées par courriel.','order-print-link'=>'Commande de version imprimée','download-book_btn'=>'Obtenir la ressource','first-review-book_btn'=>'Être le premier à évaluer cet article','read-review-book_btn'=>'Consultez les revues','get-this-book_btn'=>'Obtenez ce Livre','share'=>'Partagez sur ','description_title'=>'Description','get-this-book_title'=>'Obtenir cette ressource','read_title'=>'Lire','download_title'=>'Telecharger','print_title'=>'Imprimer','additional_title'=>'Ressource Supplémentaire','about_title'=>'A Propos','reviews_title'=>'Revues','get-this-book_info'=>'Les documents sont offerts gratuitement en vertu d’une licence de Creative Commons. Des exemplaires imprimés sont disponibles par l’entremise du service d’impression sur demande de l’Université de Waterloo. Cliquez ici pour en savoir plus sur la commande d’exemplaires imprimés.'];
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

<section id="item_splash" class="page_splash region <?php if(is_user_logged_in()){?>wp-user<?php }?>" role="search">
  <div class="sidebar_box page-items" data-conditional-wrapper data-discovery-item-section>
    <span id="frlang-active" style="display: none;"><?php print $_SESSION['template']['configs']['language'];?></span>
   <a name="item_splash" class="mobilescrollpoint" tabindex="0"></a>
   <!-- SPLASH -->
   <div id="book_header">
    <h1 id='title' data-param='dc.title' data-discovery-item-element></h1>
    <h3 id="subtitle" data-param='dc.title.subtitle' data-conditional data-discovery-item-element></h3>
    <!--<h5 id="contributors" data-param='dc.contributor' data-op='listSentence' data-conditional data-discovery-item-element></h5>-->
    <h5 id="contributor" data-param='dc.contributor.author' data-op='listSentence' data-conditional data-discovery-item-element></h5>
    <a href='#get_this' title="<?php print $_SESSION['template']['configs']['get-this-book_btn'];?>"><button id="get-this-book_btn"><?php print $_SESSION['template']['configs']['get-this-book_btn'];?></button></a>
    <!-- <button id="get-this-book_btn"><?php print $_SESSION['template']['configs']['get-this-book_btn'];?></a></button> -->
        <!-- <button id="twitter_btn" class="socialmedia_button"><a class="twitter-share-button"
          href="https://twitter.com/share" title='Share on Twitter' target="_blank"><img src="/wp-content/themes/ecampusontarioportal/assets/images/icons/twitter-icon-white.png"><?php print $_SESSION['template']['configs']['share'];?>Twitter</a></button> -->
          <a id="readreviews_btn" href="#reviews_section" title="<?php print $_SESSION['template']['configs']['read-review-book_btn'];?>" style='display: none; font-size:1.5em;'><?php print $_SESSION['template']['configs']['read-review-book_btn'];?></a>
          <a id="firstreview_btn" href="https://openlibrary.ecampusontario.ca/call-for-reviewers/" style='display: none; font-size:1.5em;' title="<?php print $_SESSION['template']['configs']['first-review-book_btn'];?>" target="_blank"><?php print $_SESSION['template']['configs']['first-review-book_btn'];?></a>
          <!--<button id="facebook_btn" class="socialmedia_button"><a href='https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($thisurl); ?>' title='Share on Facebook'><img src="/wp-content/themes/ecampusontarioportal/assets/images/icons/facebook-icon-white.png"><?php print $_SESSION['template']['configs']['share'];?>Facebook</a></button>-->
        </div>
        <div id="book_cover" data-conditional-wrapper data-discovery-item-section>
         <div data-op='processCover' data-param='cover' data-discovery-item-element>
           <div data-view-template-name='cover' data-view-template data-coversrc="%%link%%">
            <img alt='%%description%%' />
            <div id="cover-attribution" >%%label%%</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="book_description" class="book metadata_section conditional_metadata region" role="main" data-conditional-wrapper data-discovery-item-section>
    <div class="page-content_box">
      <div class='page-content'>
        <hr>
        <h2><?php print $_SESSION['template']['configs']['description_title'];?></h2>
        <div id="book_description-text"  data-param='dc.description' data-discovery-item-element></div>
      </div>
    </section>

    <a name='get_this'></a>
    <section id="get-this-book" class="book region" role="main">
      <div class="page-content_box">
        <div class='page-content'>
          <hr>
          <h2><?php print $_SESSION['template']['configs']['get-this-book_title'];?></h2>
          <p id="get-this-book_info"><?php print $_SESSION['template']['configs']['get-this-book_info'];?></p>
          <div id="read-this-book">
           <span class="read-action" data-conditional-wrapper data-discovery-item-section>
             <h4><?php print $_SESSION['template']['configs']['read_title'];?></h4>
             <ul data-op='listResourceLinks' data-param="read" data-discovery-item-element> 
              <li data-format='%%format%%' data-view-template-name='read_link' data-view-template><a href='%%link%%' title='%%description%%' target="_blank"><span class="resourceicon readicon"><img src="/wp-content/themes/ecampusontarioportal/assets/images/svg/ui/general/arrow_downward_white.svg"></span>%%label%%</a></li>
            </ul>
          </span>
          <span id="download_actions" class="read-action" data-conditional-wrapper data-discovery-item-section>
            <h4><?php print $_SESSION['template']['configs']['download_title'];?></h4>
            <!-- Start Added by Muhammad to display drop down list -->
            <select id="downloaditem" class="select-css" data-op='listResourceLinks' data-param="pod|download|downloads" data-discovery-item-element>
              <option value='%%link%%' data-format='%%format%%' data-view-template-name='download_link' data-view-template>%%label%%</option>
            </select>
            <div>
              <a id="downloalink" href=""> <button title="<?php print $_SESSION['template']['configs']['download-book_btn'];?> "id="download-btn"><?php print $_SESSION['template']['configs']['download-book_btn'];?></button></a> 
            </div>
            <script>
                var select = document.getElementById('downloaditem');
                select.onchange = function () {
                  document.getElementById("downloalink").href = this.value;
                }
                jQuery(document).ready(function() {
                  jQuery("#download-btn").click(function(){
                    var bookName= jQuery('#title').text();
                    var bookFormat= jQuery('#downloaditem option:selected').text();
                    var value= jQuery('#downloaditem option:selected').val();
                    //var downloadlink= "tracker.trackTextbookDownload('"+format+"','"+title+"');";
                    if( value !=" "){
                      tracker.trackTextbookDownload(bookFormat,bookName);   
                      //jQuery('#download-btn').attr('onclick',downloadlink);
                  }
                  }); 
                });
              </script>
              <!-- End -->
            </span>  
              <!-- Commented by Muhammad to Hide all download items  
              <ul data-op='listResourceLinks' data-param="pod|download|downloads" data-discovery-item-element>
                  <li data-format='%%format%%' data-view-template-name='download_link' data-view-template><a href='%%link%%' title='%%description%%' target="_blank"><span class="resourceicon downloadicon"><img src="/wp-content/themes/ecampusontarioportal/assets/images/svg/ui/general/arrow_downward_white.svg"></span>%%label%%</a></li>
                 </ul>-->

                 <span class="read-action">
                  <h4><?php print $_SESSION['template']['configs']['print_title'];?></h4>
                  <ul>
                    <li data-format='link'><span class="resourceicon printicon"><a href='<?php print $_SESSION['admin']['pod']['baseurl'];?>%22<?php print $_GET['id'] ?>%22/sp=results_books.html' target="_blank" title="<?php print $_SESSION['template']['configs']['order-print-link'];?>"><img src="/wp-content/themes/ecampusontarioportal/assets/images/svg/ui/general/arrow_downward_white.svg"></span><?php print $_SESSION['template']['configs']['order-print-link'];?></a></li>
                  </ul>
                </span>
              </div>
              <div id="book_additional-resources" class="conditional_metadata" data-conditional-wrapper data-discovery-item-section>
               <h4><?php print $_SESSION['template']['configs']['additional_title'];?></h4>
               <h5 style="font-size: 0.75em;"><?php print $_SESSION['template']['configs']['additional-desc'];?></h5>

               <div id="additional-resources-section" data-op='listResourceLinks' data-param='ancillary' data-discovery-item-element>
                <div class= "additional-resources-item" data-view-template-name='ancillary_link' data-view-template>
                    <a href='%%link%%' title='%%description%%' target="_blank">
                        <span class="resourceicon additionalicon">
                            <img src="/wp-content/themes/ecampusontarioportal/assets/images/svg/ui/general/arrow_downward_white.svg">
                        </span>
                    </a>
                    <a class="resourcelink"href='%%link%%' title='%%description%%' target="_blank">%%label%%  </a>
                </div>
              </div>
               <!-- old- Start Added by Muhammad to Display items in Column -->
               <!--<div id="additional-resources-section" data-op='listResourceLinks' data-param='ancillary' data-discovery-item-element>
                <div class= "additional-resources-item" data-view-template-name='ancillary_link' data-view-template><a href='%%link%%' title='%%description%%' target="_blank"><span class="resourceicon additionalicon"><img src="/wp-content/themes/ecampusontarioportal/assets/images/svg/ui/general/arrow_downward_white.svg"></span>%%label%%</a>
                </div>
              </div> -->
              <!-- End--> 

               <!-- Commented by Muhammad to show the Items in column <ul data-op='listResourceLinks' data-param='ancillary' data-discovery-item-element>
                <li data-view-template-name='ancillary_link' data-view-template><a href='%%link%%' title='%%description%%' target="_blank"><span class="resourceicon additionalicon"><img src="/wp-content/themes/ecampusontarioportal/assets/images/svg/ui/general/arrow_downward_white.svg"></span>%%label%%</a></li>
              </ul> -->
            </div>
          </div>
        </div>
      </section>
      <section class="region"><div class="spacer"></div></section>
      <section id="book_about" class="book metadata_section region" role="main">
        <div class="page-content_box">
          <div class='page-content'>
            <hr>
            <h2><?php print $_SESSION['template']['configs']['about_title'];?></h2>
            <div id="book_about_metadata" data-discovery-item-section>
              <div class="metadata_subsection">
                <div data-conditional-wrapper>
                  <h6><?php print $_SESSION['template']['configs']['authors-heading'];?></h6>
                  <p data-param='dc.contributor.author' data-op='listSentence' data-discovery-item-element></p>
                  <h6><?php print $_SESSION['template']['configs']['contributors-heading'];?></h6>
                  <div data-conditional-wrapper><p data-param='dc.contributor' data-op='listSentence' data-discovery-item-element></p></div>
                  <p data-param='dc.contributor.editor|dc.contributor.illustrator|dc.contributor.advisor|dc.contributor.other' data-op='listSentence' data-discovery-item-element></p>
                </div>
                <div data-conditional-wrapper>
                </div>
              </div>
              <div class="metadata_subsection">
                <div data-conditional-wrapper>
                 <h6><?php print $_SESSION['template']['configs']['subjects-heading'];?></h6>
                 <p data-param='dc.subject.classification' data-op='listSentence' data-discovery-item-element></p>
               </div>
               <div data-conditional-wrapper>
                <h6><?php print $_SESSION['template']['configs']['languages-heading'];?></h6>
                <p data-param='dc.language.iso' data-op='parseLanguageISOSentence' data-discovery-item-element></p>
              </div>
              <div data-conditional-wrapper>
                <h6><?php print $_SESSION['template']['configs']['id-heading'];?></h6>
                <p data-op="getID" data-discovery-item-element></p>
              </div>
            </div>
            <div id="" class="metadata_subsection" data-conditional-wrapper>
              <h6><?php print $_SESSION['template']['configs']['date-heading'];?></h6>
              <p data-param='dc.date' data-discovery-item-element></p>
              <h6><?php print $_SESSION['template']['configs']['licence-heading'];?></h6>
              <p data-param="dc.rights.license" data-op="addLicenceURL" data-discovery-item-element></p>
              <h6><?php print $_SESSION['template']['configs']['institutional-heading'];?></h6>
              <p data-param="ecO-OER.InstitutionalAffiliation" data-discovery-item-element></p>
            </div>
          </div>
        </div>
      </div>
    </section>
    
        
        <section id="reviews_section" class="region" role="region"data-discovery-item-review-section >
            <div class="page-content_box adopt-oer">
        <div class='page-content'>
            <a name="adopting-a-text" tabindex="3"></a>
        <!-- TERTIARY CONTENT -->
        <?php 
        if(is_active_sidebar($_SESSION['page']['language'].'_adopting-a-text')):
          dynamic_sidebar($_SESSION['page']['language'].'_adopting-a-text');
        endif; 
        ?>
        </div>
    </div>
      <div class="page-content_box review-rating-box">
        <div class='page-content widgetbox'>
          <hr>
          <h2><?php print $_SESSION['template']['configs']['reviews_title'];?></h2>
          <div id="overall_rating">
            <div class="ratings">
              <div class="ratings-top" id="review-rating" style="width: 0%"><span>&#9679;</span><span>&#9679;</span><span>&#9679;</span><span>&#9679;</span><span>&#9679;</span></div>
              <div class="ratings-bottom"><span>&#9679;</span><span>&#9679;</span><span>&#9679;</span><span>&#9679;</span><span>&#9679;</span></div>
            </div>
            <div id="overall_rating-text"><?php print $_SESSION['template']['configs']['rating-heading'];?></div>
          </div>
          <span id="reviews_preview" style="display: none;" >
            
            <div class="reviewbox" data-view-template>
             
             <div id="review-28">
               <div class="ratings">
                 <div class="ratings-top" id="review-rating" style="width: %%rating%%" ><span>&#9679;</span><span>&#9679;</span><span>&#9679;</span><span>&#9679;</span><span>&#9679;</span></div>
                 <div class="ratings-bottom"><span>&#9679;</span><span>&#9679;</span><span>&#9679;</span><span>&#9679;</span><span>&#9679;</span></div>
               </div>
             </div>
             <div class="reviewer-details">
               <h4 class="review_author" data-discovery-item-element>%%author%%</h4>
               <p data-discovery-item-element data-conditional-element>%%credentials%%</p>
             </div> 
            
             
                 
             
             <a class="get-review-link" data-discovery-item-element href='/review?id=<?php print $_GET['id']; ?>&reviewid=%%reviewid%%' title='Read Review'><button class="review-box_btn">Read Review</button></a>
           </div>
         
        </span>
        <p id="review-numbers"><?php print $_SESSION['template']['configs']['no-review-txt'];?></p>
        
            <a style="display:none;"class="set-review-link" href='' title='Read Review'><button class="review-box_btn"><?php print $_SESSION['template']['configs']['read-all-reviews-btn'];?></button></a>
            <a href="https://openlibrary.ecampusontario.ca/call-for-reviewers/" target="_blank" id="reviewcta" class="btn" data-alt-content="<?php print $_SESSION['template']['configs']['review-book-alt'];?>"><?php print $_SESSION['template']['configs']['first-review-book_btn'];?></a>
       
       </div>
     </div>
   </section> 
    
   <!-- Start Commented by Muhammad 
    <section id="adopting-a-text_section" class="region" role="region">
      <div class="sidebar_box">
        <a name="adopting-a-text" tabindex="3"></a>
        <!-- TERTIARY CONTENT -->
        <?php 
        //if(is_active_sidebar($_SESSION['page']['language'].'_adopting-a-text')):
          //dynamic_sidebar($_SESSION['page']['language'].'_adopting-a-text');
        //endif; 
        ?>
      <!--</div>

    </section>-->

<!-- Start Commented by Muhammad 
    <section id="reviews_section" class="region" role="region"data-discovery-item-review-section >
      <div class="page-content_box">
        <div class='page-content'>
          <hr>
          <h2><?php print $_SESSION['template']['configs']['reviews_title'];?></h2>
          <div id="overall_rating">
            <div class="ratings">
              <div class="ratings-top" id="review-rating" style="width: 0%"><span>&#9679;</span><span>&#9679;</span><span>&#9679;</span><span>&#9679;</span><span>&#9679;</span></div>
              <div class="ratings-bottom"><span>&#9679;</span><span>&#9679;</span><span>&#9679;</span><span>&#9679;</span><span>&#9679;</span></div>
            </div>
            <div id="overall_rating-text">Overall rating</div>
          </div>
          <span id="reviews_preview" >
            <div class="reviewbox" data-view-template>
             <div id="review-28">
               <div class="ratings">
                 <div class="ratings-top" id="review-rating" style="width: %%rating%%" ><span>&#9679;</span><span>&#9679;</span><span>&#9679;</span><span>&#9679;</span><span>&#9679;</span></div>
                 <div class="ratings-bottom"><span>&#9679;</span><span>&#9679;</span><span>&#9679;</span><span>&#9679;</span><span>&#9679;</span></div>
               </div>
             </div>
             <div class="reviewer-details">
               <h4 class="review_author" data-discovery-item-element>%%author%%</h4>
               <p data-discovery-item-element data-conditional-element>%%credentials%%</p>
             </div>
             <a data-discovery-item-element href='/review?id=<?php print $_GET['id']; ?>&reviewid=%%reviewid%%' title='Read Review'><button class="review-box_btn">Read Review</button></a>
           </div>
         </span>
       </div>
     </div>
   </section> 
    -->
   <!-- Commented by Muhammad to remove this button 
   <section id='reviewscta-section' style="display:none" class='region' role="region">
    <a href="https://openlibrary.ecampusontario.ca/call-for-reviewers/" target="_blank" id="reviewcta" class="btn" data-alt-content="Review this item">Be the first to review this item</a>
  </section>
  End -->
