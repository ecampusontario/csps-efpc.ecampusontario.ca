<?php get_header(); ?>
<nav id='mobile-nav-block' class='mobile-nav mobile'>
  <a class='close_btn' href='#' title='Close this menu'>
    <img src='<?php bloginfo('template_url'); ?>/assets/images/svg/ui/general/close.svg' alt='close menu icon' />
  </a>
 <?php /* print the primary navigation as unordered list for mobile */ ?>
</nav>

<section>
 <div id='above-header'></div>
</section>

<header role="navigation" class='region'>
  <div>
    <div class='logo'>
      <!-- Insert Logo -->
    </div>
    <div id='primary-nav' role='navigation'>
      <!-- Primary Nav -->
    </div>
    <div id='search'>
      <!-- Search -->
    </div>
    <div id='mobile-header-nav'>
      <a class='mobile-menu-btn' href='#' title='Close this menu'>
        <img src='<?php bloginfo('template_url'); ?>/assets/images/svg/ui/general/menu.svg' alt='menu icon' />
      </a>
    </div>
  </div>
</header>

<section id="splash">
  <a name="splash" tabindex="0"></a>
  <!-- SPLASH -->
</section>

<section id="wayfinding" class='region' role="navigation">
  <a name="wayfinding" tabindex="-1"></a>
  <div>
    <!-- BREADCRUMBS-->
  </div>
</section>

<section id='title' class='title-area region' role='banner'>
  <div>
    <div class='page-header'>
      <h1><?php the_title(); ?></h1>
      <div class='page-submission'>Posted on <?php the_time('F jS, Y') ?></div>
    </div>
  </div>
</section>  

<main id="primary-content" class='region' role="main">
  <div>
    <div>
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php the_content(__('(more...)')); ?>
      <?php endwhile; else: ?>
      <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
      <?php endif; ?>
    </div>
    <?php 
      if(is_active_sidebar('sidebar-1')):
        get_sidebar();
      endif; 
    ?>
  </div>
</main>

<section id="secondary-content" class='region' role="region">
  <div>
    <a name="secondary-content" tabindex="2"></a>
    <div>
      <!-- SECONDARY CONTENT -->
    </div>
    <?php 
      if(is_active_sidebar('sidebar-2')):
        get_sidebar('sidebar-2');
      endif; 
    ?>
  </div>
</section>

<section id="tertiary-content" class='region' role="region">
  <div>
    <a name="secondary-content" tabindex="3"></a>
    <div>
      <!-- TERTIARY CONTENT -->
    </div>
    <?php 
      if(is_active_sidebar('sidebar-3')):
        get_sidebar('sidebar-3');
      endif; 
    ?>
  </div>
</section>


<?php get_footer(); ?>