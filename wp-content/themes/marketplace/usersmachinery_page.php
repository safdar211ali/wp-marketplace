<?php

get_header();
?>
<?php
/* Template Name: usersmachinery */
?>
<?php

global $wpdb;
if (isset($_POST['submit'])) {
    $owner = $_POST['owner'];
    $products = $_POST['products'];
    $model = $_POST['model'];
    $location = $_POST['location'];
    $condition = $_POST['condition'];
    $price = $_POST['price'];
    $phone = $_POST['phone'];
    $status = $_POST['status'];
    $wpdb->insert(
        'wp_frontuserdata',
        array(
            'owner' => $owner,
            'products' => $products,
            'model' => $model,
            'location' => $location,
            'condition' => $condition,
            'price' => $price,
            'phone' => $phone,
            'status' => $status

        )
    );
}

?>
<?php
global $wpdb;
if (isset($_POST['del'])) {
    $mid = $_POST['mid'];
    $sql = "DELETE  FROM wp_frontuserdata WHERE id='" . $mid . "' ";
    $wpdb->query($sql);
}


?>
<div class="container ">
    <div class="row">
        <div class="col-md-9">


            <!--modal-->

            <div data-backdrop="false" class="modal  mymod" tabindex="-1" role="dialog"
                 aria-labelledby="gridSystemModalLabel">
                <div class="modal-dialog" role="dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #F0F0F0;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true" style="color: orangered;">&times;</span></button>
                            <h4 class="modal-title" id="gridSystemModalLabel">Save Agricultural Machinery Data </h4>
                        </div>
                        <div class="modal-body">
                            <!--form-->

                            <div class="formouter">
                                <form id="frontuserdata" method="post" action="" class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Owner Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="owner"
                                                   placeholder="Enter owner name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Product Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="products"
                                                   placeholder="Enter product name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Product Model</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="model"
                                                   placeholder="Enter model">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Location/Address</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="location"
                                                   placeholder="Enter location/address">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Condition</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="condition"
                                                   placeholder="Enter product condition">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Estimate Price</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="price"
                                                   placeholder="Enter estimate product price">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Phone #</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="phone"
                                                   placeholder="Enter phone number">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Status </label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="status"
                                                   placeholder="Enter product status">
                                        </div>
                                    </div>


                                    <div class="modal-footer">
                                        <div class="form-group">
                                            <div class=" col-sm-offset-10 col-sm-2">
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


            <!--listing-->
            <p class="text-center"><span style="color: #337AB7;">Manage Agricultural Machinery</span></p>
            <button type="button " class="btn btn-primary" data-toggle="modal" data-target=".mymod">Add Data</button>
            <?php
            $sql = "SELECT * FROM wp_frontuserdata ";
            $results = $wpdb->get_results($sql);
            ?>
            <table class="table table-bordered">
                <thead>
                <th>Product</th>
                <th>Model</th>
                <th>Condition</th>
                <th>Status</th>
                <th>Price</th>
                <th>Address</th>
                <th>Phone #</th>
                <th>Actions</th>
                </thead>
                <tbody>
                <?php
                foreach ($results as $result) {
                    ?>
                    <tr>
                        <td><?php echo $result->products ?></td>
                        <td><?php echo $result->model ?></td>
                        <td><?php echo $result->condition ?></td>
                        <td><?php echo $result->status ?></td>
                        <td><?php echo $result->price ?></td>
                        <td><?php echo $result->location ?></td>
                        <td><?php echo $result->phone ?></td>
                        <td>
                            <div class="row">
                                <div class="col-md-6">
                                    <form method="post" action="">
                                        <input type="hidden" name="mid" value="<?php echo $result->id ?>">
                                        <button onclick="return confirm('Are you sure you want to delete this data?');"
                                                name="del" value="delete" type="submit" class="btn btn-danger btn-sm">
                                            <span class=" glyphicon glyphicon-minus"></span></button>
                                    </form>
                                </div>
                                <div class="col-md-6">
                                    <form method="post" action="">
                                        <input type="hidden" name="mid" value="<?php echo $result->id ?>">
                                        <button onclick="return confirm('Are you sure you want to delete this data?');"
                                                name="del" value="delete" type="submit" class="btn btn-success btn-sm">
                                            <span class=" glyphicon glyphicon-pencil"></span></button>
                                    </form>
                                </div>
                            </div>


                        </td>

                    </tr>
                    <?php
                }

                ?>
                </tbody>
            </table>
            <?php

            ?>
            <!--end listing-->
        </div>
        <div class="col-md-3">
            <?php get_sidebar() ?>
        </div>
    </div>
</div>
<?php
get_footer();

?>


