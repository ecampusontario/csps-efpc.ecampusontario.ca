<span id="actions_educators"><?php
    if(is_active_sidebar($_SESSION['page']['language'].'_educator-cta1')):
        dynamic_sidebar($_SESSION['page']['language'].'_educator-cta1');
    endif;
    if(is_active_sidebar($_SESSION['page']['language'].'_educator-cta2')):
        dynamic_sidebar($_SESSION['page']['language'].'_educator-cta2');
    endif;
    if(is_active_sidebar($_SESSION['page']['language'].'_educator-cta3')):
        dynamic_sidebar($_SESSION['page']['language'].'_educator-cta3');
    endif;
?></span>