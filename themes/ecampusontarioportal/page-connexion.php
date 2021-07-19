<?php get_header();
?>
<?php get_template_part('template-parts/navigation/navigation','main');?>

<div class="container-fluid has-white-background-color">
    <div class="row">
        <div class="col-12 col-md-10 m-auto">
            <div class="row pt-5 pb-5">
                <div class="col-12 col-sm-4">
                    <img class="footer-logo"
                        src="<?php echo get_site_url(); ?>/wp-content/themes/ecampusontarioportal/assets/images/logos/gcpartage-black.png">
                    <div class="hr-line"></div>
                    <h2 class=" ml-0 text-uppercase has-black-color" style="font-size:1.8em !important;">Connectez-vous
                        à votre compte d’administrateur.</h2>
                    <p class=" pb-4 has-black-color">Entrez votre nom d’utilisateur et votre mot de passe ci-dessous
                        pour accéder à votre compte.
                    </p>
                    <div class="wp_login_error">
                        <?php if( isset( $_GET['login'] ) && $_GET['login'] == 'failed' ) { 
                    echo "<p class=".'"alert alert-danger"'."><strong>ERROR:</strong>Nom d'utilisateur et / ou mot de passe incorrect.</p>";
                 } 
                    else if( isset( $_GET['login'] ) && $_GET['login'] == 'empty' ) { 
                
                echo "<p class=".'"alert alert-danger"'."><strong>ERROR:</strong> Veuillez saisir le nom d'utilisateur et le mot de passe.</p>";
                 } ?>
                    </div>
                    <?php
            if ( ! is_user_logged_in() ) { // Display WordPress login form:
                $args = array(
                    'redirect' => admin_url(), 
                    'form_id' => 'loginform-custom',
                    'label_username' => __( '' ),
                    'label_password' => __( '' ),
                    'label_remember' => __( 'Souviens-toi de moi' ),
                    'label_log_in' => __( 'Connexion' ),
                    'label_log_out' => __( 'Se déconnecter' ),
                    'remember' => true
                );
                wp_login_form( $args );
            } else { // If logged in:
                wp_loginout( home_url() ); // Display "Log Out" link.
                echo " | ";
                wp_register('', ''); // Display "Site Admin" link.
            }?>
                    <a href="<?php echo esc_url( wp_lostpassword_url( get_permalink() ) ); ?>"
                        alt="<?php esc_attr_e( 'Mot de passe perdu?', 'textdomain' ); ?>">
                        <?php esc_html_e( 'Mot de passe perdu?', 'textdomain' ); ?>
                    </a>
                </div>
                <div class="col-12 col-sm-8">
                    <h2 class=" ml-0 mt-0 pt-sm-0 text-uppercase has-black-color text-center text-upercase">
                        Vous devez avoir un compte pour :

                    </h2>
                    <div class="row">
                        <div class="col-12 col-sm-6 mt-5 has-text-align-center ">
                            <div class="border border-dark has-text-align-center h-100 pb-5">
                                <h4 class="text-uppercase mb-4">PARCOURIR</h4>
                                <img class="share-page-icon"
                                    src="<?php echo get_site_url(); ?>/wp-content/themes/ecampusontarioportal/assets/images/icons/csps-docu.png">
                                <p class="p-4">Tout le contenu de la plateforme (une partie du contenu n’est pas
                                    accessible à tous).</p>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 mt-5 has-text-align-center">
                            <div class="border border-dark has-text-align-center h-100 pb-5">
                                <h4 class="text-uppercase mb-4">PARTAGER</h4>
                                <img class="share-page-icon"
                                    src="<?php echo get_site_url(); ?>/wp-content/themes/ecampusontarioportal/assets/images/icons/csps-mail.png">
                                <p class="p-4">Vous devez partager du contenu.</p>
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
password.innerHTML = '&#x1f512; Le mot de passe';
document.getElementById("user_pass").placeholder = password.textContent;
</script>