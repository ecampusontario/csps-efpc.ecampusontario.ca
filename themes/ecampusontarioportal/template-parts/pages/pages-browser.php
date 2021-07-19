<?php //language configs for this template
$englishtemplateconfigs=['catalogue_title'=>'Open Resource Catalogue','reset-search'=>'Clear search','contain-term'=>'containing the term'];
$frenchtemplateconfigs=['catalogue_title'=>'Catalogue des ressources libres','reset-search'=>'Reinitialiser la recherche','contain-term'=>'contenant les']; 
unset($_SESSION['template']['configs']);
//code for alternate language, for handling interface items based on language. Some metadata / DSpace data might NOT correspond to the user language!
switch($_SESSION['user']['language']){
    case "english":
        $_SESSION['template']['configs']=$englishtemplateconfigs;
        break;
    case "french":
        $_SESSION['template']['configs']=$frenchtemplateconfigs;
        break;
}?>
<div class="container-fluid catalogue-banner">
    <div class="row  pl-3">
        <div id="primary-nav-wayfinding">
            <?php if(!is_front_page()){?>
            <div class="breadcrumbs text-capitalize" role="navigation">
                <!-- BREADCRUMBS-->
                <?php make_breadcrumbs(); ?>
            </div>
            <?php }?>
        </div>
    </div>
    <div class="row">
        <div class="col-12 p-0">
            <div id='oer-search' data-widget='discovery-search-controller' data-controller-key='HTMLSearchBox'
                data-controller-criteria>
                <div id="quick-search_box" class="quicksearchdown mt-3 mb-3 pl-4 pr-4" data-facet
                    data-op='setSearchTerm' data-param='%%|matches' data-ui-type="textfield"
                    data-label='<?php echo $_SESSION['template']['configs']['contain-term'];?> %%'
                    data-label-plural='containing the Terms %%' data-label-position='after'>
                    <form action="/catalogue/" method="get" id="quick-search" class="search-form">
                        <div class="row d-flex justify-content-between">
                            <div class="col-7 col-sm-8 d-flex flex-column justify-content-center">
                                <input class="search-input-field w-100 font-size-xs" value="" id="quick-search-term"
                                    name="quick-search-term" type="text" data-user-input type="text">
                                <input value="1" name="reset-state" type="hidden">
                            </div>
                            <div class="col-5 col-sm-4 search-btn pr-0">
                                <button class="btn m-0 w-100 filter-reset-btn text-uppercase font-weight-bold"
                                    style="white-space: normal;"
                                    data-reset><?php echo $_SESSION['template']['configs']['reset-search'];?></button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<section id="primary-content" class="--region" role="main">
    <div class="page-content_box container-fluid p-0 m-0">

        <div class='page-content'>
            <a name="browser" class="mobilescrollpoint" tabindex="1"></a>
            <article id="browser">
                <?php if(is_active_sidebar('browser')):
        dynamic_sidebar('browser');
        endif;?>
            </article>
        </div>

    </div>
</section>
<style>
.breadcrumbs,
.breadcrumbs a {
    color: #fff;
    font-size: 1.1em;
}

.breadcrumbs:hover,
.breadcrumbs a:hover {
    color: #fff;
    font-size: 1.1em;
}
</style>