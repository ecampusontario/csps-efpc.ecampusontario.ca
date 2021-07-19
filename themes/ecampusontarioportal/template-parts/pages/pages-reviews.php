<?php //language configs for this template
$englishtemplateconfigs=['reviewedby'=>'Reviewed by','share'=>'Share on ','description_title'=>'Description','get-this-book_title'=>'Get This Text','read_title'=>'Read','download_title'=>'Download','print_title'=>'Print','additional_title'=>'Additional Resources','about_title'=>'About','get-this-book_info'=>'Materials are presented free of charge under a Creative Commons License. Print copies are available via the University of Waterloo Print on Demand service. Click here for more information about ordering print copies.'];
$frenchtemplateconfigs=['reviewedby'=>'Revue par','share'=>'Partagez sur ','description_title'=>'Description','get-this-book_title'=>'Obtenez cette Texte','read_title'=>'Lire','download_title'=>'Telecharger','print_title'=>'Imprimer','additional_title'=>'Resources Additionel','about_title'=>'A Propos','get-this-book_info'=>'Materials are presented free of charge under a Creative Commons License. Print copies are available via the University of Waterloo Print on Demand service. Click here for more information about ordering print copies.'];
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
<section id="item_splash" class="page_splash region <?php if(is_user_logged_in()){?>wp-user<?php }?>" role="search" data-template-review-page>
    <div class="sidebar_box" data-conditional-wrapper data-discovery-item-section>
    	<a name="item_splash" class="mobilescrollpoint" tabindex="0"></a>
        <!-- SPLASH -->
        <div id="book_header">
    		<h1>Review: <span id='title' data-param='dc.title' data-discovery-item-element></span></h1>
    		<h3 id="subtitle" data-param='dc.title.subtitle' data-conditional data-discovery-item-element></h3>
    		<h5 id="contributors" data-param='dc.contributor' data-op='listSentence' data-conditional data-discovery-item-element></h5>
    		<div id="overall_rating">
        		<div class="ratings">
      				<div class="ratings-top" id="item-review-rating" style="width: 0%"><span>&#9679;</span><span>&#9679;</span><span>&#9679;</span><span>&#9679;</span><span>&#9679;</span></div>
      				<div class="ratings-bottom"><span>&#9679;</span><span>&#9679;</span><span>&#9679;</span><span>&#9679;</span><span>&#9679;</span></div>
    			</div>
    			<div id="overall_rating-text"></div>
    		</div>
    		<div id="review_header">
    			<h6><?php echo $_SESSION['template']['configs']['reviewedby'];?></h6>
    			<h4 id="review_author" data-op='getReviewContributor'></h4>
    			<p id="review_date"></p>
    			<p id="review_copyright"><img src="/wp-content/themes/ecampusontarioportal/assets/images/logos/creative-commons-white.png"> <a href="https://creativecommons.org/licenses/by-nd/3.0/" target="_blank">CC-BY-ND 3.0 (Attribution-NoDerivs 3.0)</a></p>
    		</div>
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

<section id="primary-content" class="region" role="main">
  <div class="page-content_box">
    <div class='page-content'>
      <article id="review"><?php if(is_active_sidebar('review')):
        dynamic_sidebar('review');
        endif;?>
            <div class="review-item row" data-template-criterion>
                <div class="criterion" >
                	<h6 class='criterion-title'></h6>
                	<div class="criterion-rating">
                		<div class="ratings">
          						<div class="ratings-top review-rating" style="width: 0%"><span>&#9679;</span><span>&#9679;</span><span>&#9679;</span><span>&#9679;</span><span>&#9679;</span></div>
          						<div class="ratings-bottom"><span>&#9679;</span><span>&#9679;</span><span>&#9679;</span><span>&#9679;</span><span>&#9679;</span></div>
        					  </div>
                	</div>
                </div>
                <div class="criterion-detail">
                	<h6 class="criterion-question">Q: <span class="criterion-question_text"></h6>
                	<p class="criterion-text"></p>
                  <p class="criterion-showanswer"><span class="reviewansweraction"><span class="resourceicon"><img src="/wp-content/themes/ecampusontarioportal/assets/images/svg/ui/general/arrow_right_white.svg"></span><span class="answeraction reviewansweraction">hide</span> answer</span></p>
        		    </div>
          </div>
        </article>
    </div>
  </div>
</section>

<section id="reviews_section" class="region" role="region" data-discovery-item-review-section style='display: none'>
  <div class="page-content_box">
    <div class='page-content'>
  		<hr>
  		<h2>All Reviews</h2>
      <div id="overall_rating">
        <div id="overall_rating-text">Overall Rating</div>
    		<div class="ratings">
  				<div class="ratings-top" id="review-rating" style="width: 0%"><span>&#9679;</span><span>&#9679;</span><span>&#9679;</span><span>&#9679;</span><span>&#9679;</span></div>
  				<div class="ratings-bottom"><span>&#9679;</span><span>&#9679;</span><span>&#9679;</span><span>&#9679;</span><span>&#9679;</span></div>
			  </div>
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
        </div>
      </span>
    </div>
  </div>
</section>
<section id='reviewscta-section' class='region' role="region">
  <a href="https://openlibrary.ecampusontario.ca/call-for-reviewers/" target="_blank" id="reviewcta" class="btn" data-alt-content="Review this item">Review this item</a>
</section>