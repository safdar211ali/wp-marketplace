<?php
/* Template Name: currencyrates */
get_header();
?>
    <div class="container container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="ifram-div">
                        <iframe src="http://pakbiz.com/finance/open_market_rates.aspx" width="100%" height="800px" scrolling="no" frameBorder="0" class="yarn-iframe"></iframe>
                    </div>

                </div>
            </div>
            <div class="col-md-3 " >
                <?php get_sidebar() ?>
            </div>

        </div>
    </div>


<?php get_footer(); ?>