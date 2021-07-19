<?php //language configs for this template
$englishtemplateconfigs=[];
$frenchtemplateconfigs=[];
unset($_SESSION['template']['configs']);
//code for alternate language, for handling interface items based on language. Some metadata / DSpace data might NOT correspond to the user language!
switch($_SESSION['user']['language']){
    case "english":
        $_SESSION['template']['configs']=$englishtemplateconfigs;
        break;
    case "french":
        $_SESSION['template']['configs']=$frenchtemplateconfigs;
        break;
}?>
<section id="default_splash" class="page_splash region <?php if(is_user_logged_in()){?>wp-user<?php }?>" role="search">
    <div class="sidebar_box">
    	<a name="default_splash" class="mobilescrollpoint" tabindex="0"></a>
        <!-- SPLASH -->
    	<h1 id='title'><?php the_title(); ?></h1>
	</div>
</section>

<section id="primary-content" class="region" role="main">
  <div class="page-content_box">
    <div class='page-content'>
      <article><?php
			while ( have_posts() ) : the_post();
			
			the_content();
				//get_template_part( 'template-parts/page/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?></article>
    </div>
  </div>
</section>