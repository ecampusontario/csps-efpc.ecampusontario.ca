<div id='oer-search' data-widget='discovery-search-controller' data-controller-key='HTMLSearchBox'
    data-controller-criteria>
    <div id="quick-search_box" class="quicksearchdown facet" data-facet data-op='setSearchTerm' data-param='%%|matches'
        data-ui-type="textfield" data-label='containing the term %%' data-label-plural='containing the Terms %%'
        data-label-position='after'>
        <form action="/catalogue/" method="get" id="quick-search">
            <input value="" id="quick-search-term" name="quick-search-term" type="text" data-user-input type="text">
            <input value="1" name="reset-state" type="hidden">
            <button type="submit" form="quick-search" id="quick-search-btn" data-submit>
                <img src="<?php echo get_site_url(); ?>/wp-content/themes/ecampusontarioportal/assets/images/icons/search-icon-dark.png"
                    title="<?php echo $_SESSION['page']['configs']['quick-search-btn_title'];?>">
            </button>

        </form>
        <!-- New Search Button ADDED BY Muhammad -->
        <?php if(!is_front_page()){?>
        <span id="search-reset-btn" class="btn"
            data-reset><?php echo $_SESSION['page']['configs']['new-search-btn'];?></span>
        <?php }?>
        <!-- end-->
    </div>

</div>