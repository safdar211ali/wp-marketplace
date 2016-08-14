<?php
$current_user = wp_get_current_user();
global $wpdb;
if (isset($_POST['submit'])) {
    $owner = addslashes($_POST['owner']);
    $products = addslashes($_POST['products']);
    $location = addslashes($_POST['location']);
    $price = addslashes($_POST['price']);
    $phone = addslashes($_POST['phone']);
    $land_water_type = addslashes($_POST['land_water_type']);
    $land_for = addslashes($_POST['land_for']);
    $area = addslashes($_POST['area']);
    $land_direction = addslashes($_POST['land_direction']);
    $land_major_crops =addslashes( $_POST['land_major_crops']);
    $land_yield = addslashes($_POST['land_yield']);
    $fruit = addslashes($_POST['fruit']);
    $land_distance = addslashes($_POST['land_distance']);
    $status =addslashes( $_POST['status']);
    $p_type = $_POST['p_type'];

    $data =  array(
        'owner' => $owner,
        'products' => $products,
        'location' => $location,
        'price' => $price,
        'phone' => $phone,
        'status' => $status,
        'land_water_type' => $land_water_type,
        'land_for' => $land_for,
        'area' => $area,
        'land_direction' => $land_direction,
        'land_major_crops' => $land_major_crops,
        'land_yield' => $land_yield,
        'fruit' => $fruit,
        'land_distance' => $land_distance,
        'p_type' => $p_type,
        'user_id'=> $current_user->ID

    );

    if (isset($_POST["hidden_id"])) {
        $id = $_POST['hidden_id'];
        $wpdb->update(
            'wp_frontuserdata',
            $data,
            array('id' => $id)
        );
    } else {
        $wpdb->insert(
            'wp_frontuserdata',
            $data
        );
    }

}

?>
<?php
if (isset($_POST['del'])) {
    $mid = $_POST['mid'];
    $sql = "DELETE  FROM wp_frontuserdata WHERE id='" . $mid . "' ";
    $wpdb->query($sql);
}


?>
<?php
if (isset($_GET['edit'])) {
    $mid = $_GET['mid'];
    $sql = "SELECT * FROM wp_frontuserdata WHERE id='" . $mid . "'";
    $result = $wpdb->get_results($sql);

    echo json_encode($result);
    exit;

}

?>

<?php
if (isset($_GET['show'])) {
    $mid = $_GET['mid'];
    $sql = "SELECT * FROM wp_frontuserdata WHERE id='" . $mid . "'";
    $result = $wpdb->get_results($sql);

    echo json_encode($result);
    exit;

}
?>
<?php

get_header();
?>
<?php
/* Template Name: usersfruitfarm */
?>
<div class="hidden-lg hidden-md  top-marg">
</div>
<div class="container ">
    <div class="row">
        <div class="col-md-12">


            <!--listing-->
            <h4><p class="text-center"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/users/fruit.png" alt="fruit" width="50" height="50"><span style="color: #337AB7;">Manage Fruit Farm for lease or sale</span></p></h4>

                <?php $c_user = wp_get_current_user(); ?>
                <?php if ($c_user->user_login == null): ?>
                <p style="color: red;" class="text-center">Please login to Manage Fruit Farm for lease or sale</p>
            <?php endif; ?>
            <p>
                <?php $c_user = wp_get_current_user(); ?>
                <?php if ($c_user->user_login != null): ?>
                <button id="addland" type="button " class="btn btn-primary" data-toggle="modal" data-target=".mymod">Add Data
                </button>
                <?php endif; ?>
                <a href="/wp/dashboard">
                    <span class="glyphicon glyphicon-menu-left btn btn-primary">Dashboard</span>
                </a>
            
            </p>
            <?php
            $sql = "SELECT * FROM wp_frontuserdata WHERE p_type='fruitfarm' AND user_id='".$current_user->ID."'";
            $results = $wpdb->get_results($sql);
            ?>
            <div class="table-responsive">
            <table class="table table-bordered" id="machinery">
                <thead>
                <th>Land</th>
                <th>Land For</th>
                <th>Total Land</th>
                <th>Location</th>
                <th>Status</th>
                <th>Price</th>
                <th >Actions</th>
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


                        <td >
                            <div class="row">
                                <div class="col-md-4">
                                    <button id="show" product_id="<?php echo $result->id ?>" name="show" value="show"
                                            class="btn btn-success btn-sm">
                                        <span class="  glyphicon glyphicon-fullscreen "></span></button>
                                </div>
                                <div class="col-md-4">
                                    <form method="post" action="">
                                        <input type="hidden" name="mid" value="<?php echo $result->id ?>">
                                        <button onclick="return confirm('Are you sure you want to delete this data?');"
                                                name="del" value="delete" type="submit" class="btn btn-danger btn-sm">
                                            <span class=" glyphicon glyphicon-minus"></span></button>
                                    </form>
                                </div>
                                <div class="col-md-4">


                                    <button id="btnedit" product_id="<?php echo $result->id ?>" name="edit" value="edit"
                                            class="btn btn-success btn-sm">
                                        <span class=" glyphicon glyphicon-pencil"></span></button>

                                </div>
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
<?php
get_footer();

?>

<script>
    $(document).ready(function () {
        $(document).on("click", "#btnedit", function () {
            var id = $(this).attr("product_id");

            $.ajax({
                url: "?edit=true&mid=" + id, success: function (result) {
                    var data = jQuery.parseJSON(result)[0];
                    $("#modalid").modal("show");
                    //$("#modalid #owner_name").val(data.owner);
                    $.each(data, function (index, value) {
                        $("input[name='" + index + "']").val(value);
                        $("select[name='" + index + "']").val(value);

                        $("#hidden_id").val(id);
                    });

                }
            });
        });
    });
    
    
</script>

<script>
    $(document).ready(function () {
        $(document).on("click", "#show", function () {
            var id = $(this).attr("product_id");

            $.ajax({
                url: "?show=true&mid=" + id, success: function (result) {
                    var data = jQuery.parseJSON(result)[0];
                    $("#modalshow").modal("show");
                    $.each(data, function (index, value) {
                        $("#"+index).html(value);
                    });

                }
            });
        });
    });


</script>
<!--modal 1-->

<div id="modalid" data-backdrop="false" class="modal  mymod" tabindex="-1" role="dialog"
     aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary" >
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        class="glyphicon glyphicon-remove"></span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Save Fruit Farm Data </h4>
            </div>
            <div class="modal-body">
                <!--form-->

                <div class="formouter">
                    <form id="frontuserdata" method="post" action="" class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Owner Name</label>
                            <div class="col-sm-10">
                                <input id="owner_name" value="" class="form-control" type="text" name="owner"
                                   maxlength="100" required="required"   placeholder="Enter owner name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Phone #</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="phone"
                                       maxlength="20" required="required"   placeholder="Enter phone number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Fruit Farm</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="products" value="Fruit Farm"
                                       maxlength="100" required="required"    placeholder="Enter Fruit Farm">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Fruit</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="fruit"
                                       maxlength="50" required="required"     placeholder="Enter Fruit">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Land Water Type</label>
                            <div class="col-sm-10">
                                <select name="land_water_type" id="" class="form-control"  required="required">
                                    <option value="">Select Land Water Type</option>
                                    <option value="Barani">Barani</option>
                                    <option value="Canal">Canal</option>
                                    <option value="Tubewell">Tubewell</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Fruit Farm For</label>
                            <div class="col-sm-10">
                                <select name="land_for" id="" class="form-control"  required="required">
                                    <option value="">Select Fruit Farm For</option>
                                    <option value="Lease">Lease</option>
                                    <option value="Rent">Rent</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Estimate Price</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" name="price"
                                       placeholder="Enter estimate Fruit Farm price">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Fruit Farm Area</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="area"
                                       maxlength="20" required="required"    placeholder="Enter Fruit Farm area">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Location/Address</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="location"
                                       required="required"    placeholder="Enter location/address">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Direction From City</label>
                            <div class="col-sm-10">
                                <select name="land_direction" id="" class="form-control" required="required">
                                    <option value="">Select land direction from city</option>
                                    <option value="East">East</option>
                                    <option value="West">West</option>
                                    <option value="North">North</option>
                                    <option value="South">South</option>
                                </select>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Distance From City</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="land_distance"
                                    required="required" maxlength="25"   placeholder="Enter distance of land from city">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Major Fruit And Crops of Area</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="textarea" name="land_major_crops"
                                     required="required"   placeholder="Enter Major Fruit And Crops of Area">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Average Yield/acre</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="land_yield"
                                    required="required" maxlength="25"     placeholder="Enter average yield per acre">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Status</label>
                            <div class="col-sm-10">
                                <select name="status" id="" class="form-control"  required="required"  >
                                    <option value="">Select Status</option>
                                    <option value="pending">pending</option>
                                    <option value="processed">processed</option>

                                </select>
                            </div>
                        </div>

                        <input type="hidden" name="p_type" value="fruitfarm">
                        <div class="modal-footer">
                            <div class="form-group">
                                <div class=" col-sm-offset-10 col-sm-2">
                                    <input type="hidden" id="hidden_id" name="hidden_id">
                                    <button type="submit" name="submit" class="btn btn-primary">Save
                                    </button>
                                </div>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--end form-->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--end modal-->

<!--show modal-->

<div id="modalshow" data-backdrop="false" class="modal " tabindex="-1" role="dialog"
     aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        class="glyphicon glyphicon-remove"></span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Detail Of Fruit Farm </h4>
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
