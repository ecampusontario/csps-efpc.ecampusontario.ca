<span id="actions_mobile" class="<?php if(is_user_logged_in()){?>wp-user<?php }?>"><?php
    if(is_active_sidebar($_SESSION['page']['language'].'_browse-box')):
        dynamic_sidebar($_SESSION['page']['language'].'_browse-box');
    endif;
    if(is_active_sidebar($_SESSION['page']['language'].'_adopt-box')):
        dynamic_sidebar($_SESSION['page']['language'].'_adopt-box');
    endif;
    if(is_active_sidebar($_SESSION['page']['language'].'_adapt-box')):
        dynamic_sidebar($_SESSION['page']['language'].'_adapt-box');
    endif;
?></span>
