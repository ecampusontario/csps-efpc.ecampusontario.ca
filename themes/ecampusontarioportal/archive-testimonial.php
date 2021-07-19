<?php get_header();
get_template_part('template-parts/navigation/navigation','main');?>
<section id="educators_splash" class="page_splash region" role="search">
    <div class="sidebar_box">
    	<a name="educators_splash" class="mobilescrollpoint" tabindex="0"></a>
        <!-- SPLASH -->
    	<?php if ( have_posts() ) : ?>
        <h1 id="title">Testimonials</h1>
			<?php
				//the_archive_title( '<h1 id="title">', '</h1>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
	<?php endif; ?>
	</div>
</section>

<section id="primary-content" class="region" role="main">
  <div class="page-content_box">
    <div class='page-content'>
<section id="testimonials" class="region" role="region">
  <div class="testimonial_box">
      <?php $args = array('post_type' => 'testimonial',
          'showposts' => '6'
      ); ?>
      <?php $loop = new WP_Query($args); ?>
      
      <?php if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); ?>
          <div class="testimonial">
      <div class="testimonial_portrait">
      <a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><img src="<?php the_field('portrait');?>"></a>
      <span><?php the_field('portrait_credit');?></span>
      </div>
      <div class="testimonial_info">
      <?php the_excerpt(); ?>
      <p class="testimonial_name"><?php
      $testimonial_name='';
      if(get_field('title')){
          $testimonial_name=get_field('title').' ';
      }
      $testimonial_name=$testimonial_name.get_field('firstname').' ';
      if(get_field('middlenames')){
          $testimonial_name=$testimonial_name.get_field('middlenames').' ';
      }
      $testimonial_name=$testimonial_name.get_field('lastname');
      if(get_field('institution')){
          $testimonial_name=$testimonial_name.', '.get_field('institution');
      }
      echo preg_replace('/\s+/i',' ',$testimonial_name);
?></p>
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
          </div>
      <?php endwhile; else: ?>
      <div class="testimonial"><?php _e('Sorry, no posts matched your criteria.'); ?></div>
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>

  </div>
</section>
</div>
  </div>
</section>
<?php get_footer();
