<?php 
session_name('ecampusontarioportal');
session_start();
$_SESSION['page']['slug']=get_post_field('post_name', get_post());
$_SESSION['page']['language']=get_field('pagelanguage');
if(empty($_SESSION['page']['language'])){
    $_SESSION['page']['language']='english';
}
if(empty($_SESSION['user']['language'])){
$_SESSION['user']['language']='english'; 
}

$handlelanguages=true;
//these pages handle language internally, combining user language and metadata fields, along with item content. they do not use http header routing, nor do they have alternate pages in WP
$nolanguagehandling=['home-page','item','catalogue','temoignages']; //,'catalogue','browse','item'
$englishconfigs=['alternatelangcode'=>'fr','js-lang'=>'enlang','feedback-subject'=>'Share your feedback about GCshare','feedback-link'=>'Provide feedback','feedback-banner-text'=>'GCshare is in the beta phase of development. Regular site updates are made to enhance your experience!','feedback-footer'=>'Share your feedback','new-search-btn'=>'New Search','alternatelanguage'=>'french','maintitle'=>'Open Library','ecampustitle'=>'eCampusOntario','show-mobile-menu_title'=>'Open mobile menu','switchlanguagebtn_title'=>'change the language','close-mobile-menu_title'=>'Close this menu','quick-search-btn_title'=>'Go','long-search_placeholder'=>'','switchlanguage'=>'Changer en français'];
$frenchconfigs=['alternatelangcode'=>'en','js-lang'=>'frlang','feedback-subject'=>'Faites-nous part de vos commentaires sur GCpartage','feedback-link'=>'Donnez votre avis','feedback-banner-text'=>"GCpartage est en phase de développement bêta. Des mises à jour régulières du site sont effectuées afin d'améliorer votre expérience ! ",'alternatelanguage'=>'english','feedback-footer'=>'Faites-nous part de vos commentaires','new-search-btn'=>'Nouvelle Recherche','maintitle'=>'Bibliothèque Ouverte','ecampustitle'=>'eCampusOntario','show-mobile-menu_title'=>'Oeuvre menu cellulaire','switchlanguagebtn_title'=>'changer la langue','close-mobile-menu_title'=>'Fermer ce menu','quick-search-btn_title'=>'rechercher rapidement pour ce phrase','long-search_placeholder'=>'','switchlanguage'=>'Switch to English'];

//code for alternate language, used in icons
switch($_SESSION['user']['language']){
    case "english":
        $_SESSION['page']['configs']=$englishconfigs;
    break;
    case "french":
        $_SESSION['page']['configs']=$frenchconfigs;
    break;
}
//returns array! use first. Front page (home-page slug) has no alternate
$_SESSION['page']['alternateslug']='';
$alternatepage=get_field('alternatepage');
$_SESSION['page']['alternateslug']=isset($alternatepage[0]) ? get_post_field('post_name',$alternatepage[0]) : null;
if(in_array($_SESSION['page']['slug'],$nolanguagehandling)){
    $_SESSION['page']['language']=$_SESSION['user']['language'];
    $handlelanguages=false;
}elseif($_SESSION['user']['language']!=$_SESSION['page']['language']){
    //reroute to page with appropriate user language
    header('Location: /'.$_SESSION['page']['alternateslug']);
}

//Admin Configs
//$_SESSION['admin']['pod']['baseurl']="https://fortuna-dev.uwaterloo.ca/cgi-bin/cgiwrap/rsic/eco/";
$_SESSION['admin']['pod']['baseurl']="https://fortuna.uwaterloo.ca/cgi-bin/cgiwrap/rsic/eco/scan/se=";

// Remove scripts with targetted contexts

if (!is_page(['item','catalogue','browse','review'])) {
  wp_dequeue_script('oer_discovery_ui_extensions');
  wp_dequeue_script('oer_discovery_browser');
}
//Start Added by Muhammad to add jquery for Counter and Formidable plugin 
if (is_page(['item','catalogue','review'])) { 
wp_deregister_script('jquery');
}
//End
if (!is_page(['item','review'])) {
  global $wp_scripts;
  wp_dequeue_script('oer_catalogue_item');
}?>

<html>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="<?php echo bloginfo('template_url').'/assets/js/vendor/jquery.js'; ?>"></script>
    <script src="<?php echo bloginfo('template_url').'/assets/js/vendor/jquery-ui.js'; ?>"></script>
    <!--<link rel="stylesheet" href="<?php //echo bloginfo('template_url').'/assets/css/style.css';?>"> -->
    <script>
    jQuery(function() {
        jQuery('.switchlanguagebtn').click(function() {
            // sessionStorage.clear(); Added by Muhammad to clear session for catalouge page
            sessionStorage.clear();
            jQuery.post('/wp-content/themes/ecampusontarioportal/switchlanguage.php', {
                language: '<?php echo $_SESSION['page']['configs']['alternatelanguage'];?>'
            }, function() {
                <?php //page sorts language in header.php using php header using user language to match to page - checks language, then alternative slug. for home page just uses session variable - reloads?>
                location.reload();
            });
        });
        if (window.matchMedia("(max-width: 56.24em)").matches) {
            jQuery('#quick-search-term').attr('placeholder',
                '<?php echo $_SESSION['page']['configs']['small-search_placeholder'];?>');
        } else {
            jQuery('#quick-search-term').attr('placeholder',
                '<?php echo $_SESSION['page']['configs']['long-search_placeholder'];?>');
        }

    });
    $.fn.isInViewport = function() {
        var elementTop = $(this).offset().top;
        var elementBottom = elementTop + $(this).outerHeight();
        var viewportTop = $(window).scrollTop();
        var viewportBottom = viewportTop + $(window).height();
        return elementBottom > viewportTop && elementTop < viewportBottom;
    };
    var scrolling = false;
    $(window).on('scroll', function(e) {
        e.preventDefault();
        e.stopPropagation();
        $('.mobilescrollpoint').each(function(e) {
            if (!scrolling && window.matchMedia("(max-width: 56.24em)").matches) {
                scrolling = true;
                if ($(this).isInViewport()) {
                    if ($('#main_title,#catalogue_title').length > 0) {
                        $('#main_title,#catalogue_title,#main_subtitle').slideDown(500, function() {
                            scrolling = false;
                        }).fadeIn(1000);
                        $('#quick-search_box').addClass('quicksearchdown').removeClass('quicksearchup');
                    } else {
                        $('#top_nav').addClass('transparentbg').removeClass('whitebg');
                        scrolling = false;
                    }
                } else {
                    if ($('#main_title,#catalogue_title').length > 0) {
                        $('#main_title,#catalogue_title,#main_subtitle').slideUp(500, function() {
                            scrolling = false;
                        }).fadeOut(1000);
                        $('#quick-search_box').addClass('quicksearchup').removeClass('quicksearchdown');
                    } else {
                        $('#top_nav').addClass('whitebg').removeClass('transparentbg');
                        scrolling = false;
                    }
                }
                return false;
            }
        });
        <?php if(!is_front_page()){?>
        $('.page_splash').each(function(e) {
            if (!scrolling && window.matchMedia("(max-width: 56.24em)").matches) {
                scrolling = true;
                if ($(this).isInViewport()) {
                    $('#top_nav').css('border-bottom', 'none');
                    scrolling = false;
                } else {
                    $('#top_nav').css('border-bottom', 'solid 2px #595959');
                    scrolling = false;
                }
                return false;
            }
        });
        <?php }?>
    });
    </script>
    <!-- Matomo -->
    <script type="text/javascript">
    var _paq = window._paq || [];
    /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
    _paq.push(['trackPageView']);
    _paq.push(['enableLinkTracking']);
    (function() {
        var u = "//webanalytics.csps-efpc.ca/";
        _paq.push(['setTrackerUrl', u + 'matomo.php']);
        _paq.push(['setSiteId', '20']);
        var d = document,
            g = d.createElement('script'),
            s = d.getElementsByTagName('script')[0];
        g.type = 'text/javascript';
        g.async = true;
        g.defer = true;
        g.src = u + 'matomo.js';
        s.parentNode.insertBefore(g, s);
    })();
    </script>
    <!-- End Matomo Code -->
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-D329D15EGB"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-D329D15EGB');
</script>


    <?php wp_head(); ?>

</head>

<body <?php if($handlelanguages){?>data-language="<?php echo $_SESSION['page']['language'];?>"
    data-slug="<?php echo $_SESSION['page']['slug'];?>"
    data-alternateslug="<?php echo $_SESSION['page']['alternateslug'];?>" <?php }?>
    data-sessionlanguage="<?php echo $_SESSION['user']['language'];?>">
    <!-- Hidden element to change some strings by detecting language using jquery -->
    <span id="frlang-active" style="display: none;"><?php echo $_SESSION['page']['configs']['js-lang'];?></span>