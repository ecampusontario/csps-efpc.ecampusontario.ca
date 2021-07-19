<footer id='--page-footer' role="contentinfo" class="fluid-container p-0 pt-5 pb-5">
    <div id="--mainfooter" class="row">
        <div class='col-12 col-sm-4 footer-gc-contact-info pb-2 pl-0'>
            <!-- CONTACT INFO -->
            <?php if (is_active_sidebar($_SESSION['page']['language'] . '_footer-eco_information')):
				dynamic_sidebar($_SESSION['page']['language'] . '_footer-eco_information');
			endif;?>
        </div>

        <div class="col-12 col-sm-8">
            <div class="row">
                <div class="col-12 col-sm-3 footermenu">
                    <!-- FOOTER MENUS -->
                    <!--<h4>Open Library</h4> -->
                    <?php wp_nav_menu(array(
						'theme_location' => $_SESSION['page']['language'] . '_footer-left',
						'menu_id' => 'footer-left',
					));?>
                </div>
                <div class="col-12 col-sm-3 footermenu">
                    <!--
        			<?php switch ($_SESSION['user']['language']) {
						case 'english': ?> <h4>Get Involved</h4> <?php
					break;
						case 'french': ?><h4>étre impliqué </h4><?php
					break;
					}?>
          			-->
                    <?php wp_nav_menu(array(
						'theme_location' => $_SESSION['page']['language'] . '_footer-center',
						'menu_id' => 'footer-center',
					));?>
                </div>
                <div class="col-12 col-sm-3 footermenu">
                    <!--
					<?php switch ($_SESSION['user']['language']) {
						case 'english': ?> <h4>Social Media</h4> <?php
					break;
						case 'french': ?><h4>Médias Sociaux </h4><?php
					break;
					}?> -->

                    <?php wp_nav_menu(array(
						'theme_location' => $_SESSION['page']['language'] . '_footer-right',
						'menu_id' => 'footer-right',
					));?>
                </div>
            </div>
        </div>
    </div>
    <div class="row d-flex flex-column flex-sm-row">
        <div class="col-12 col-sm-6 text-sm-right text-center pr-0">
            <div class="row">
                <div class="col-5">
                    <a href="mailto:csps.edtechresearchinnovation-rechercheinnovationteched.efpc@canada.ca?subject=<?php echo $_SESSION['page']['configs']['feedback-subject']; ?>"
                        class=" has-black-background-color text-uppercase border-white pt-3 pb-3 pl-1 text-center font-weight-bold"><?php echo $_SESSION['page']['configs']['feedback-footer']; ?></a>
                </div>
                <div class="col-7 pr-0">
                    <a href="https://twitter.com/edtech_gc">
                        <img class="twitter-icon-footer"
                            src="<?php echo get_site_url(); ?>/wp-content/themes/ecampusontarioportal/assets/images/icons/twitter-icon-white.png">
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 text-sm-right has-text-align-center pr-sm-5">
            <img class="canada-logo-footer"
                src="<?php echo get_site_url(); ?>/wp-content/themes/ecampusontarioportal/assets/images/logos/canada-logo.png">

        </div>
    </div>


</footer>
<?php wp_footer();?>
</body>

</html>