<span id="actions_screen"><?php
    if(is_active_sidebar($_SESSION['page']['language'].'_browse-box')):
        dynamic_sidebar($_SESSION['page']['language'].'_browse-box');
    endif;
    if(is_active_sidebar($_SESSION['page']['language'].'_adopt-box')):
        //dynamic_sidebar($_SESSION['page']['language'].'_adopt-box');
    endif;
    if(is_active_sidebar($_SESSION['page']['language'].'_adapt-box')):
        dynamic_sidebar($_SESSION['page']['language'].'_adapt-box');
    endif;
?></span>
