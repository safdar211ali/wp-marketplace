<?php
global $wpdb;
if (isset($_GET['show'])) {
    $mid = $_GET['mid'];
    $sql = "SELECT * FROM wp_frontuserdata WHERE id='" . $mid . "'";
    $result = $wpdb->get_results($sql);

    echo json_encode($result);
    exit;

}
?>


<?php
/* Template Name: usersproductslisting */
?>
<?php
get_header();
?>
<div class="container ">
    <div class="row">
        <div class="col-md-9">
            <div id="tabs">
                <ul>
                    <li><a href="#tabs-1">Agricultural Machinery</a></li>
                    <li><a href="#tabs-2">Agricultural Land</a></li>
                    <li><a href="#tabs-3">Fuit Farm</a></li>
                </ul>
                <div id="tabs-1">
                    <!--listing-->
                    <p class="text-center"><span style="color: #337AB7;">Find Agricultural Machinery For Sale</span></p>
                    <?php
                    $sql = "SELECT * FROM wp_frontuserdata WHERE p_type='machinery'";
                    $results = $wpdb->get_results($sql);
                    ?>
                    <div class="table-responsive">
                        <table class="table table-bordered machinery" id="machinery">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Model</th>
                                <th>Condition</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Price</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($results as $result) {
                                ?>
                                <tr>
                                    <td><?php echo $result->products ?></td>
                                    <td><?php echo $result->model ?></td>
                                    <td><?php echo $result->condition ?></td>
                                    <td><?php echo $result->location ?></td>
                                    <td><?php echo $result->status ?></td>
                                    <td><?php echo $result->price ?></td>

                                    <td>

                                        <div>

                                            <button id="show" product_id="<?php echo $result->id ?>" name="show"
                                                    value="show"
                                                    class="btn btn-success btn-sm">
                                                <span class="  glyphicon glyphicon-fullscreen "></span></button>
                                        </div>


                                    </td>
                                </tr>
                                <?php
                            }

                            ?>
                            </tbody>
                        </table>
                    </div>
                    <?php

                    ?>
                    <!--end listing-->


                </div>
                <div id="tabs-2">
                    <!--listing-->
                    <p class="text-center"><span style="color: #337AB7;">Find Agricultural Land for lease or sale</span>
                    </p>
                    <?php
                    $sql = "SELECT * FROM wp_frontuserdata WHERE p_type='land'";
                    $results = $wpdb->get_results($sql);
                    ?>
                    <div class="table-responsive">
                        <table class="table table-bordered machinery" id="machinery">
                            <thead>
                            <th>Land</th>
                            <th>Land For</th>
                            <th>Total Land</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Price</th>
                            <th>Actions</th>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($results as $result) {
                                ?>
                                <tr>
                                    <td><?php echo $result->products ?></td>
                                    <td><?php echo $result->land_for ?></td>
                                    <td><?php echo $result->area ?></td>
                                    <td><?php echo $result->location ?></td>
                                    <td><?php echo $result->status ?></td>
                                    <td><?php echo $result->price ?></td>


                                    <td>
                                        <div>

                                            <button id="show2" product_id2="<?php echo $result->id ?>" name="show"
                                                    value="show"
                                                    class="btn btn-success btn-sm">
                                                <span class="  glyphicon glyphicon-fullscreen "></span></button>
                                        </div>

                                    </td>
                                </tr>
                                <?php
                            }

                            ?>
                            </tbody>
                        </table>
                    </div>
                    <?php

                    ?>
                    <!--end listing-->
                </div>
                <div id="tabs-3">
                    <!--listing-->
                    <p class="text-center"><span style="color: #337AB7;">Find Fuit Farm for lease or sale</span></p>
                    <?php
                    $sql = "SELECT * FROM wp_frontuserdata WHERE p_type='fruitfarm'";
                    $results = $wpdb->get_results($sql);
                    ?>
                    <div class="table-responsive">
                        <table class="table table-bordered machinery" id="machinery">
                            <thead>
                            <th>Land</th>
                            <th>Land For</th>
                            <th>Total Land</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Price</th>
                            <th>Actions</th>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($results as $result) {
                                ?>
                                <tr>
                                    <td><?php echo $result->products ?></td>
                                    <td><?php echo $result->land_for ?></td>
                                    <td><?php echo $result->area ?></td>
                                    <td><?php echo $result->location ?></td>
                                    <td><?php echo $result->status ?></td>
                                    <td><?php echo $result->price ?></td>


                                    <td>
                                        <div>

                                            <button id="show3" product_id3="<?php echo $result->id ?>" name="show"
                                                    value="show"
                                                    class="btn btn-success btn-sm">
                                                <span class="  glyphicon glyphicon-fullscreen "></span></button>
                                        </div>

                                    </td>
                                </tr>
                                <?php
                            }

                            ?>
                            </tbody>
                        </table>
                    </div>
                    <?php

                    ?>
                    <!--end listing-->
                </div>
            </div>


        </div>
        <div class="col-md-3">
            <?php get_sidebar() ?>
        </div>
    </div>
</div>
<?php
get_footer();
?>


<div id="modalshow" data-backdrop="false" class="modal " tabindex="-1" role="dialog"
     aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        class="glyphicon glyphicon-remove"></span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Detail Of Agricultural Machinery </h4>
            </div>
            <div class="modal-body">

                <table id="table-2" border="1">
                    <tr>
                        <td colspan="2" style="background-color:  #799ec5;color:#fff;">About Owner</td>
                    </tr>
                    <tr>
                        <td class="mytd">Name</td>
                        <td id="owner" class="mytd2"></td>
                    </tr>
                    <tr>
                        <td class="mytd">Phone</td>
                        <td id="phone" class="mytd2"></td>
                    </tr>
                    <td colspan="2" style="background-color:  #799ec5;color:#fff;">About Product</td>
                    <tr>
                        <td class="mytd">Product</td>
                        <td id="products" class="mytd2"></td>
                    </tr>
                    <tr>
                        <td class="mytd">Model</td>
                        <td id="model" class="mytd2"></td>
                    </tr>
                    <tr>
                        <td class="mytd">Location</td>
                        <td id="location" class="mytd2"></td>
                    </tr>
                    <tr>
                        <td class="mytd">Condition</td>
                        <td id="condition" class="mytd2"></td>
                    </tr>
                    <tr>
                        <td class="mytd">Estimate Price</td>
                        <td id="price" class="mytd2"></td>
                    </tr>

                    <tr>
                        <td class="mytd">Status</td>
                        <td style="color: green;" id="status" class="mytd2"></td>
                    </tr>


                </table>

            </div>
            <!--end form-->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--end modal-->

<!--show modal-->

<div id="modalshow2" data-backdrop="false" class="modal " tabindex="-1" role="dialog"
     aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        class="glyphicon glyphicon-remove"></span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Detail Of Agricultural Land </h4>
            </div>
            <div class="modal-body">
                <table id="table-2" border="1">
                    <tr>
                        <td colspan="2" style="background-color:  #799ec5;color:#fff;">About Owner</td>
                    </tr>
                    <tr>
                        <td class="mytd">Name</td>
                        <td id="owner" class="mytd2"></td>
                    </tr>
                    <tr>
                        <td class="mytd">Phone</td>
                        <td id="phone" class="mytd2"></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="background-color:  #799ec5;color:#fff;">About Land</td>
                    </tr>
                    <tr>
                        <td class="mytd">Land</td>
                        <td id="products" class="mytd2"></td>
                    </tr>
                    <tr>
                        <td class="mytd">City</td>
                        <td id="location" class="mytd2"></td>
                    </tr>
                    <tr>
                        <td class="mytd">Direction From City</td>
                        <td id="land_direction" class="mytd2"></td>
                    </tr>
                    <tr>
                        <td class="mytd">Distance From City</td>
                        <td id="land_distance" class="mytd2"></td>
                    </tr>
                    <tr>
                        <td class="mytd">Land For</td>
                        <td id="land_for" class="mytd2"></td>
                    </tr>
                    <tr>
                        <td class="mytd">Land Area</td>
                        <td id="area" class="mytd2"></td>
                    </tr>

                    <tr>
                        <td class="mytd">Price</td>
                        <td id="price" class="mytd2"></td>
                    </tr>
                    <tr>
                        <td class="mytd">Average Price In Area</td>
                        <td id="land_average_price" class="mytd2"></td>
                    </tr>
                    <tr>
                        <td class="mytd">Water Type</td>
                        <td id="land_water_type" class="mytd2"></td>
                    </tr>
                    <tr>
                        <td class="mytd">Land Best For Crops</td>
                        <td id="land_best_products" class="mytd2"></td>
                    </tr>
                    <tr>
                        <td class="mytd">Major Crops Of Area</td>
                        <td id="land_major_crops" class="mytd2"></td>
                    </tr>
                    <tr>
                        <td class="mytd">Crops Yield</td>
                        <td id="land_yield" class="mytd2"></td>
                    </tr>

                    <tr>
                        <td class="mytd">Status</td>
                        <td style="color: green;" id="status" class="mytd2"></td>
                    </tr>


                </table>


                <!--end form-->
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!--end modal-->

    <!--show modal-->
</div>

<div id="modalshow3" data-backdrop="false" class="modal " tabindex="-1" role="dialog"
     aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        class="glyphicon glyphicon-remove"></span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Detail Of Fruit Farm  </h4>
            </div>
            <div class="modal-body">
                <table id="table-2" border="1">
                    <tr>   <td colspan="2" style="background-color:  #799ec5;color:#fff;">About Owner</td></tr>
                    <tr>
                        <td class="mytd">Name</td> <td id="owner" class="mytd2"></td>
                    </tr>
                    <tr>
                        <td class="mytd">Phone</td> <td id="phone" class="mytd2"></td>
                    </tr>
                    <tr> <td colspan="2" style="background-color:  #799ec5;color:#fff;">About Fruit Farm</td></tr>
                    <tr>
                        <td class="mytd">Fruit Farm</td> <td id="products" class="mytd2"></td>
                    </tr>
                    <tr>
                        <td class="mytd">Fruit</td> <td id="fruit" class="mytd2"></td>
                    </tr>
                    <tr>
                        <td class="mytd">City</td> <td id="location" class="mytd2"></td>
                    </tr>
                    <tr>
                        <td class="mytd">Direction From City</td> <td id="land_direction" class="mytd2"></td>
                    </tr>
                    <tr>
                        <td class="mytd">Distance From City</td> <td id="land_distance" class="mytd2"></td>
                    </tr>
                    <tr>
                        <td class="mytd">Fruit Farm For</td> <td id="land_for" class="mytd2"></td>
                    </tr>
                    <tr>
                        <td class="mytd">Fruit Farm Area</td> <td id="area" class="mytd2"></td>
                    </tr>

                    <tr>
                        <td class="mytd">Estimate Price</td> <td id="price" class="mytd2"></td>
                    </tr>

                    <tr>
                        <td class="mytd">Water Type</td> <td id="land_water_type" class="mytd2"></td>
                    </tr>

                    <tr>
                        <td class="mytd">Major Fruits And Crops Of Area</td> <td id="land_major_crops" class="mytd2"></td>
                    </tr>
                    <tr>
                        <td class="mytd">Fruit Yield/acre</td> <td id="land_yield" class="mytd2"></td>
                    </tr>

                    <tr>
                        <td class="mytd">Status</td> <td style="color: green;" id="status" class="mytd2"></td>
                    </tr>



                </table>




                <!--end form-->
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!--end modal-->

<script>
    $(document).ready(function () {
        $(document).on("click", "#show", function () {
            var id = $(this).attr("product_id");

            $.ajax({
                url: "?show=true&mid=" + id, success: function (result) {
                    var data = jQuery.parseJSON(result)[0];
                    $("#modalshow").modal("show");
                    $.each(data, function (index, value) {
                        $("#" + index).html(value);
                    });

                }
            });
        });

        $(document).on("click", "#show2", function () {
            var id = $(this).attr("product_id2");

            $.ajax({
                url: "?show=true&mid=" + id, success: function (result) {
                    var data = jQuery.parseJSON(result)[0];
                    $("#modalshow2").modal("show");
                    $.each(data, function (index, value) {
                        $("#modalshow2 #table-2 #" + index).html(value);
                    });

                }
            });
        });

        $(document).on("click", "#show3", function () {
            var id = $(this).attr("product_id3");

            $.ajax({
                url: "?show=true&mid=" + id, success: function (result) {
                    var data = jQuery.parseJSON(result)[0];
                    $("#modalshow3").modal("show");
                    $.each(data, function (index, value) {
                        $("#modalshow3 #table-2 #" + index).html(value);
                    });

                }
            });
        });
    });


</script>

<!--show modal-->
