<section id="default_splash" class="page_splash region" role="search">
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
        /* Start the Loop */
        while ( have_posts() ) : the_post();
        
        get_template_part( 'template-parts/post/content', get_post_format() );
        
        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
        comments_template();
        endif;
        
        the_post_navigation( array(
            'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'twentyseventeen' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '</span>%title</span>',
            'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'twentyseventeen' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ) . '</span></span>',
        ) );
        
        endwhile; // End of the loop.
        ?></article>
    </div>
  </div>
</section>
<?php 
get_footer(); ?>