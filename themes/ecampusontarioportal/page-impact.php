<?php get_header();
?>
<?php get_template_part('template-parts/navigation/navigation','main');?>


<section id="item_splash" class="page_splash region <?php if(is_user_logged_in()){?>wp-user<?php }?>" role="search">
    <div class="sidebar_box">
        <h1 id='title'>Uploading Learning Content</h1>
        <h3 class"alignleft">What type of file can I upload?</h3>
        <div class="col-full mt-1 mb-1">
            <div class="row ">
                <ol>
                    <li>SCORM (.zip)</li>
                    <li>Word (.doc)</li>
                    <li>PDF (.pdf)</li>
                    <li>Powerpoint (.ppt)</li>
                </ol>
            </div>
        </div>
        <h3 class"alignleft">How can I upload my files?</h3>
        <div class="col-full mt-1 mb-1">
            <div class="row">
                <ul>
                    <li>Choose the file to upload</li>
                    <li>Choose where to upload your learning content</li>
                    <li>Select the 'upload' button</li>
                    <li>*Note that your learning content must be approved. Once you send the request, an admin will take
                        a look. Make sure to follow the guidelines at [ INSERT LINK HERE ]. It can take 2 days to get
                        the approval.</li>
                </ul>
            </div>
        </div>
        <h3 class"alignleft">What are the impacts and benefits of sharing content? </h3>
        <div class="col-full mt-1 mb-1">
            <div class="row">
                <ul>
                    <li>Find the most up to date existing learning content over the GC</li>
                    <li>Share your learning content within the GC
                    </li>
                    <li>Upload your learning content to help other public servants
                    </li>
                    <li>Build on an existing shell of Learning content to save time
                    </li>
                    <li>Spend less time looking and creating from scratch learning content
                    </li>
                    <li>Get feedback from other departments about learning content
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>


<?php  
    get_footer(); ?>
<script type="text/javascript">
jQuery(document).ready(function() {

    //insert commas to numbers and dollar sign  
    jQuery('.currency').each(function(i, obj) {
        var value = $(this).text();
        value = value.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
        $(this).text("$" + value);
    });
    //insert commas to numbers 
    jQuery('.stat-right').each(function(i, obj) {
        var value = $(this).text();
        value = value.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
        $(this).text(value);
    });

    // Calculator method   
    jQuery(".cal-input-field").each(function() {
        jQuery(this).on('keyup change', function() {
            var o1 = jQuery("#input-1").val();
            var o2 = parseInt(jQuery("#input-2").val());
            var o3 = parseInt(jQuery("#input-3").val());
            var total = o3 * o2 * o1;
            var cost = total.toFixed(2);
            if (!isNaN(cost)) {
                cost = cost.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
                jQuery(".total").text("Total Savings: $" + cost);
            } else {
                jQuery(".total").text("Total Savings: $0.00");
            }
        });
    });
});

function embedCalc() {
    var textArea = document.getElementById("embedCode");
    textArea.style.display = "block";
}
</script>