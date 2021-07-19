<nav id='mobile-nav-block' class='mobile-nav mobile <?php if(is_user_logged_in()){?>wp-user<?php }?>'>
    <div class="menu-container">
        <a id="close-mobile-menu" class='close_btn' href='#'
            title='<?php echo $_SESSION['page']['configs']['close-mobile-menu_title'];?>'>
            <img src='/wp-content/themes/ecampusontarioportal/assets/images/icons/x-dark-bg.png'
                alt='close menu icon' />
        </a>
    </div>
    <?php wp_nav_menu( array(
		'theme_location' => $_SESSION['page']['language'].'_top',
		'menu_id'        => 'mobile-top-menu',
	) ); ?>
</nav>

<section id="top_nav" class="transparentbg <?php if(is_user_logged_in()){?>wp-user<?php }?>">
    <div id='above-header'></div>
    <header class="region mw-100" role="navigation">
        <div id="primary-nav-menu" class="mw-100 pl-sm-5 pr-sm-5">
            <div class='logo'>
                <!-- Insert Logo -->
                <div>
                    <?php if($_SESSION['user']['language']=='english'){ ?>
                    <a href="/"><img
                            src="<?php echo get_site_url(); ?>/wp-content/themes/ecampusontarioportal/assets/images/logos/csps-logo.png"
                            id="titlelogo"></a>
                    <?php } else  { ?>

                    <a href="/"><img
                            src="<?php echo get_site_url(); ?>/wp-content/themes/ecampusontarioportal/assets/images/logos/csps-logo.png"
                            id="titlelogo"></a>
                    <?php } ?>
                </div>
                <div>

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

            <div id='mobile-header-nav'>
                <a id="show-mobile-menu" class='mobile-menu-btn' href='#'
                    title='<?php echo $_SESSION['page']['configs']['show-mobile-menu_title'];?>'>
                    <img src='/wp-content/themes/ecampusontarioportal/assets/images/icons/mobile-nav-icon-dark.png'
                        alt='menu icon' />
                </a>
            </div>
        </div>

        <?php  
        global $post;
        $post_slug=$post->post_name; 
        if($post_slug==='item') {
          $link= wp_get_referer();
          if(!strpos($link, 'quick-search-term')){
            $link='/catalogue';
          }?>
        <?php if($_SESSION['user']['language']=='english'){ ?>

        <?php } ?>
        <?php if($_SESSION['user']['language']=='french'){ ?>

        <?php } ?>
        <?php } ?>
    </header>
    <div class="container-fluid w-100 p-0 mx-0">
        <div class="row p-0">
            <div class="col-12 px-5 py-3 text-center grey-background-color">
                <p class="m-0 has-white-color"><?php echo $_SESSION['page']['configs']['feedback-banner-text'];?><a
                        class="has-white-color"
                        href="mailto:csps.edtechresearchinnovation-rechercheinnovationteched.efpc@canada.ca?subject=<?php echo $_SESSION ['page']['configs']['feedback-subject'];?>">
                        <u><?php echo $_SESSION ['page']['configs']['feedback-link'];?></u></a>
                </p>
            </div>
        </div>
    </div>
</section>