<nav id='mobile-nav-block' class='mobile-nav mobile <?php if(is_user_logged_in()){?>wp-user<?php }?>'>
  <div class="menu-container">
      <a id="close-mobile-menu" class='close_btn' href='#' title='<?php echo $_SESSION['page']['configs']['close-mobile-menu_title'];?>'>
        <img src='/wp-content/themes/ecampusontarioportal/assets/images/icons/x-dark-bg.png' alt='close menu icon' />
      </a>
  </div>
 <?php wp_nav_menu( array(
    'theme_location' => $_SESSION['page']['language'].'_top',
    'menu_id'        => 'mobile-top-menu',
  ) ); ?>
</nav>

<section id="top_nav" class="transparentbg <?php if(is_user_logged_in()){?>wp-user<?php }?>">
  <div id='above-header'></div>
    <header class="region" role="navigation">
      <div id="primary-nav-menu">
        <div class='logo'>
          <!-- Insert Logo -->
          <div>
            <?php if($_SESSION['user']['language']=='english'){ ?>
            <a href="/"><img src="/wp-content/themes/ecampusontarioportal/assets/images/logos/Open-Library-Logo-trans-09-1.png" id="titlelogo"></a>
          <?php } else  { ?>
         
             <a href="/"><img src="/wp-content/themes/ecampusontarioportal/assets/images/logos/Open-Library-Logo-FR-trans-10.png" id="titlelogo"></a>
           <?php } ?> 
          </div>
        </div>
        <div id='primary-nav' role='navigation'>   
    
     <!-- Primary Nav -->
    <?php 
      wp_nav_menu( 
        array(
          'theme_location' => $_SESSION['page']['language'].'_top',
          'menu_id'        => 'top-menu',
        ) 
      );
    ?>
      </div>
      <div class="top-right-nav"> 
          <a id="mobileswitchlanguagebtn" onclick="tracker.sendEvent('Home-Page-Links','French-Clicked','Language-toggle-button-clicked');" class="mobile-menu-btn" href="#" title="<?php echo $_SESSION['page']['configs']['switchlanguagebtn_title'];?>">
            <img style="height: 30px;" src="/wp-content/themes/ecampusontarioportal/assets/images/icons/language-<?php echo $_SESSION['page']['configs']['alternatelangcode'].'-yellow-bg.png';?> " alt="language icon" />
          </a>     
          <a class="search-btn">
            <img style="height: 50px;" src="/wp-content/themes/ecampusontarioportal/assets/images/icons/search-icon-dark.png" alt="Search icon" />
          </a>                  
      </div>
        <div id="mobile-language-btn">
        <a id="mobileswitchlanguagebtn" onclick="tracker.sendEvent('Home-Page-Links','French-Clicked','Language-toggle-button-clicked');" class='mobile-menu-btn' href='#' title='<?php echo $_SESSION['page']['configs']['switchlanguagebtn_title'];?>'>
            <img src='/wp-content/themes/ecampusontarioportal/assets/images/icons/language-<?php echo $_SESSION['page']['configs']['alternatelangcode'];?>-yellow-bg.png' alt='language icon' />
          </a>
        </div>
        <div id='mobile-header-nav'>
          <a id="show-mobile-menu" class='mobile-menu-btn' href='#' title='<?php echo $_SESSION['page']['configs']['show-mobile-menu_title'];?>'>
            <img src='/wp-content/themes/ecampusontarioportal/assets/images/icons/mobile-nav-icon-dark.png' alt='menu icon' />
          </a>
        </div>
      </div>
      <div id="primary-nav-wayfinding">
        <?php if(!is_front_page()){?><div class="breadcrumbs" role="navigation">
          <!-- BREADCRUMBS-->
          <?php make_breadcrumbs(); ?>
        </div><?php }?>
        <div id='social-links' role='social'>
         
          <?php $social=[];
            // Ideally these items would be in the oer_portal plugin. Social media links use key in navigation-main in loop - careful!
            $social['youtube']='https://www.youtube.com/channel/UCwVGE7c6gCnNpxV2OLzJQEg';
            $social['linkedin']='https://www.linkedin.com/company/ecampusontario/';
            $social['twitter']='https://twitter.com/ecampusontario';
          foreach($social as $k=>$href){?>
              <a class='social-btn' href='<?php echo $href;?>' title='<?php echo $k;?>'>
                <img src='/wp-content/themes/ecampusontarioportal/assets/images/icons/<?php echo $k;?>-icon-dark.png' alt='<?php echo $k;?> icon' />
              </a>
          <?php }?>
        </div>

      </div>
      
    </header>
</section>

<?php if(is_front_page()){?>
<section id="catalogue_splash" class="page_splash region <?php if(is_user_logged_in()){?>wp-user<?php }?>" role="search">
    <div class="sidebar_box">
      <a name="catalogue" tabindex="0"></a>
      <!-- SPLASH -->
      <?php if(is_active_sidebar($_SESSION['page']['language'].'_front-page-title')):
        dynamic_sidebar( $_SESSION['page']['language'].'_front-page-title' );
          endif; ?>
      <?php if(is_active_sidebar($_SESSION['page']['language'].'_front-page-subtitle')):
        dynamic_sidebar( $_SESSION['page']['language'].'_front-page-subtitle' );
          endif; ?>
      <?php get_template_part('template-parts/search/search', 'catalogue' );?>
      <?php get_template_part('template-parts/actions/actions', 'screen' );?>
    </div>
</section>

<section id="actions-mobile_section" class="region" role="region">
  <div class="sidebar_box">
    <a name="actions-mobile" class="mobilescrollpoint" tabindex="2"></a>
      <!-- ACTIONS CONTENT -->
    <?php get_template_part('template-parts/actions/actions', 'mobile' );?>
  </div>
</section>
<?php }?>