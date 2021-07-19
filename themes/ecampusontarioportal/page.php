<?php get_header();
get_template_part('template-parts/navigation/navigation','main');
//language for components handled in templates directly for these pages if needed.
switch($_SESSION['page']['slug']){
    case "educators":
    case "enseignants":
        get_template_part('template-parts/pages/pages', 'educators' );
    break;
    case "review":
    case "revue":
        get_template_part('template-parts/pages/pages', 'reviews' );
    break;
    case "catalogue":
        get_template_part('template-parts/pages/pages', 'browser' );
    break;
    case "browse":
        get_template_part('template-parts/pages/pages', 'browser' );
    break;
    case "item":
        get_template_part('template-parts/pages/pages', 'items' );
    break;
    default:
//general page template
//languages is handled by header.php?>
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
<?php }
get_footer(); ?>