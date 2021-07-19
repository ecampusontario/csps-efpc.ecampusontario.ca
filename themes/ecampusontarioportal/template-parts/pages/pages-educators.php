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
<section id="educators_splash" class="page_splash region <?php if(is_user_logged_in()){?>wp-user<?php }?>" role="search">
    <div class="sidebar_box">
    	<a name="educators_splash" class="mobilescrollpoint" tabindex="0"></a>
        <!-- SPLASH -->
    	<h1 id='title'><?php the_title(); ?></h1>
    	<?php get_template_part('template-parts/actions/actions', 'educators' );?>
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

<section id="educator-testimonials" class="region" role="region">
  <div class="testimonial_box">
      <?php $args = array('post_type' => 'testimonial',
          'showposts' => '3',
          'meta_key'    => 'language',
          'meta_value'	=> $_SESSION['page']['language']
      ); ?>
      <?php $loop = new WP_Query($args); ?>
      
      <?php if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); ?>
          <div class="testimonial">
      <div class="testimonial_header">
      <h1><?php
      $testimonial_name='';
      if(get_field('title')){
          $testimonial_name=get_field('title').' ';
      }
      $testimonial_name=$testimonial_name.get_field('firstname').' ';
      if(get_field('middlenames')){
          $testimonial_name=$testimonial_name.get_field('middlenames').' ';
      }
      $testimonial_name=$testimonial_name.get_field('lastname');
      echo preg_replace('/\s+/i',' ',$testimonial_name);?></h1>
      <h3><?php if(get_field('institution')){
          echo get_field('institution');
      }?></h3>
      <div class="testimonial_excerpt"><?php
      the_excerpt();
        ?></div>
      </div>
      <div class="testimonial_info">
		<p class="testimonial_portrait">
      	<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><img src="<?php the_field('portrait');?>"></a>
      	<span><?php the_field('portrait_credit');?></span>
      	</p>
      	<p class="testimonial_commentary"><?php
         echo get_post_meta($post->ID, 'eco_slogan', true);
        ?></p>
      <a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><button><?php switch($_SESSION['user']['language']){
    case "english":?>Read <?php
    echo get_post_meta($post->ID, 'firstname', true);
?>'s story<?php
    break;
case "french":?>Lire l'histoire de <?php
    echo get_post_meta($post->ID, 'firstname', true);
    break;
}?></button></a>
      </div>
      <div class="testimonial_content">
<?php the_content(); ?>
</div>
      
          </div>
      <?php endwhile; else: ?>
      <div class="testimonial"><?php _e('Sorry, no posts matched your criteria.'); ?></div>
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>

  </div>
</section>