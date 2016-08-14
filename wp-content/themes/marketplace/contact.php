<?php
/* Template Name: contact */
?>
<?php

get_header();
?>
    <div class="hidden-lg hidden-md  top-marg">
    </div>
    <div class="container">
        <div class="row">

            <div class="col-md-6 " style="margin-bottom: 20px;">
                <p>
                    <?php

                    echo do_shortcode('[contact-form-7 id="584" title="Untitled"]');
                    ?>
                </p>


                <p>
                    <?php

                    echo do_shortcode('[wpgmza id="1"]');
                    ?>
                </p>

            </div>


            <div class="col-md-6">
                <div style="font-size: 20px;border-bottom: solid 3px #bfbfbf;">Market Rates</div>
                    <div  style="margin: 15px 0 15px 0 ">
                        <span style="line-height:5px;">
                    New Ghala Mandi Khan Pur Katora<br>
                    District Rahim Yar Khan,<br>
                    Phone: 03337477433<br>
                    Email: sajidshakoor@gmail.com
                        </span>


                    </div>
                <div style="font-size: 20px;border-bottom: solid 3px #bfbfbf;">Instructions</div>
                <div  style="margin: 15px 0 15px 0 ">
                        <span style="line-height:20px;">
                   <ul>
                       <li>Register Yourself on Homepage To Manage Your Data. </li>
                       <li>For Sale or Purchase Go To (Land, Farms, Agri Machinery For Sale or Lease) on Homepage. </li>
                   </ul>
                        </span>


                </div>


            </div>

        </div>
    </div>


<?php

get_footer();
?>