<?php get_header();
get_template_part('template-parts/navigation/navigation','main');?>
<section id="educators_splash" class="page_splash region" role="search">
    <div class="sidebar_box">
    	<a name="educators_splash" class="mobilescrollpoint" tabindex="0"></a>
        <!-- SPLASH -->
    	<h1 id='title'><?php the_title(); ?></h1>
	</div>
</section>
<?php get_template_part('template-parts/archives/archives','testimonials');
get_footer();
