<?php get_header(); 
get_template_part('template-parts/navigation/navigation','main');
while ( have_posts() ) : the_post();?>
<section id="educators_splash" class="page_splash region" role="search">
    <div class="sidebar_box">
    	<a name="educators_splash" class="mobilescrollpoint" tabindex="0"></a>
        <!-- SPLASH -->
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
	</div>
</section>

<section id="educator-testimonials" class="region" role="region">
  <div class="testimonial_box">
	<article class="testimonial" id="post-<?php the_ID(); ?>">
      <div class="testimonial_header">
      
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
      </div>
      <div class="testimonial_content">
		<?php the_content(); ?>
	</div>    
	</article>
  </div>
</section>
<?php endwhile;
get_footer(); ?>