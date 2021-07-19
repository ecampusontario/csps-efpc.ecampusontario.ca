<?php get_header();
?>
<?php get_template_part('template-parts/navigation/navigation','main');?>

<div class="container-fluid has-white-background-color">
    <div class="row">
        <div class="col-12 col-md-10 m-auto">
            <div class="row pt-5 pb-5">
                <div class="col-12 col-sm-4">
                    <img class="footer-logo"
                        src="<?php echo get_site_url(); ?>/wp-content/themes/ecampusontarioportal/assets/images/logos/gcshare-black.png">
                    <div class="hr-line"></div>
                    <h2 class=" ml-0 text-uppercase has-black-color" style="font-size:1.8em !important;">Login to your
                        admin account</h2>
                    <p class=" pb-4 has-black-color">Enter your username and password below to access your
                        account.
                    </p>
                    <div class="wp_login_error">
                        <?php if( isset( $_GET['login'] ) && $_GET['login'] == 'failed' ) { 
                    echo '<p class="alert alert-danger"><strong>ERROR:</strong> Invalid username and/or password.</p>';
                 } 
                    else if( isset( $_GET['login'] ) && $_GET['login'] == 'empty' ) { 
                
                echo '<p class="alert alert-danger"><strong>ERROR:</strong> Please enter both username and password.</p>';
                 } ?>
                    </div>
                    <?php
            if ( ! is_user_logged_in() ) { // Display WordPress login form:
                $args = array(
                    'redirect' => admin_url(), 
                    'form_id' => 'loginform-custom',
                    'label_username' => __( '' ),
                    'label_password' => __( '' ),
                    'label_remember' => __( 'Remember Me' ),
                    'label_log_in' => __( 'Log In' ),
                    'remember' => true
                );
                wp_login_form( $args );
            } else { // If logged in:
                wp_loginout( home_url() ); // Display "Log Out" link.
                echo " | ";
                wp_register('', ''); // Display "Site Admin" link.
            }?>
                    <a href="<?php echo esc_url( wp_lostpassword_url( get_permalink() ) ); ?>"
                        alt="<?php esc_attr_e( 'Lost Password', 'textdomain' ); ?>">
                        <?php esc_html_e( 'Lost Your Password?', 'textdomain' ); ?>
                    </a>
                </div>
                <div class="col-12 col-sm-8">
                    <h2 class=" ml-0 mt-0 pt-sm-0 text-uppercase has-black-color text-center text-upercase">You need an
                        account to:
                    </h2>
                    <div class="row">
                        <div class="col-12 col-sm-6 mt-5 has-text-align-center ">
                            <div class="border border-dark has-text-align-center h-100 pb-5">
                                <h4 class="text-uppercase mb-4">Browse</h4>
                                <img class="share-page-icon"
                                    src="<?php echo get_site_url(); ?>/wp-content/themes/ecampusontarioportal/assets/images/icons/csps-docu.png">
                                <p class="p-4">All the content on the platform (as some content is not open to
                                    everyone)​.</p>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 mt-5 has-text-align-center">
                            <div class="border border-dark has-text-align-center h-100 pb-5">
                                <h4 class="text-uppercase mb-4">Share</h4>
                                <img class="share-page-icon"
                                    src="<?php echo get_site_url(); ?>/wp-content/themes/ecampusontarioportal/assets/images/icons/csps-mail.png">
                                <p class="p-4">You need to share content</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>
<script>
//Add email and password icons to login form placeholder
let user = document.createElement('span');
user.innerHTML = '&#128231; example@example.com';
document.getElementById("user_login").placeholder = user.textContent;

let password = document.createElement('span');
password.innerHTML = '&#x1f512; Password';
document.getElementById("user_pass").placeholder = password.textContent;
</script>