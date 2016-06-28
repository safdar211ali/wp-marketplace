

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
    $p_type = $_POST['p_type'];
    $data =   array(
        'owner' => $owner,
        'products' => $products,
        'model' => $model,
        'location' => $location,
        'condition' => $condition,
        'price' => $price,
        'phone' => $phone,
        'status' => $status,
        'p_type' => $p_type

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
/* Template Name: usersmachinery */
?>

<div class="container ">
    <div class="row">
        <div class="col-md-9">

            <!--listing-->
            <p class="text-center"><span style="color: #337AB7;">Manage Agricultural Machinery</span></p>
           <p>  <button id="addland" type="button " class="btn btn-primary" data-toggle="modal" data-target=".mymod">Add Data
               </button></p>
            <?php
            $sql = "SELECT * FROM wp_frontuserdata WHERE p_type='machinery'";
            $results = $wpdb->get_results($sql);
            ?>
            <div class="table-responsive">
            <table class="table table-bordered" id="machinery">
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
        <div class="col-md-3">
            <?php get_sidebar() ?>
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
<!--modal-->

<div id="modalid" data-backdrop="false" class="modal  mymod" tabindex="-1" role="dialog"
     aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary "  >
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        class="glyphicon glyphicon-remove"></span></button>
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
                            <label class="col-sm-2 control-label">Status</label>
                            <div class="col-sm-10">
                                <select name="status" id="" class="form-control">
                                    <option value="">Select Status</option>
                                    <option value="pending">pending</option>
                                    <option value="processed">processed</option>

                                </select>
                            </div>
                        </div>
                        <input type="hidden" id="hidden_id" name="hidden_id">
                        <input  type="hidden" name="p_type" value="machinery">
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



<!--show modal-->

<div id="modalshow" data-backdrop="false" class="modal " tabindex="-1" role="dialog"
     aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    class="glyphicon glyphicon-remove"></span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Detail Of Agricultural Machinery  </h4>
            </div>
            <div class="modal-body">

              <table id="table-2" border="1">
              <tr>  <td colspan="2" style="background-color:  #799ec5;color:#fff;">About Owner</td></tr>
                  <tr>
                      <td class="mytd">Name</td> <td id="owner" class="mytd2"></td>
                  </tr>
                  <tr>
                      <td class="mytd">Phone</td> <td id="phone" class="mytd2"></td>
                  </tr>
                  <td colspan="2" style="background-color:  #799ec5;color:#fff;">About Product</td>
                  <tr>
                      <td class="mytd">Product</td> <td id="products" class="mytd2"></td>
                  </tr>
                  <tr>
                      <td class="mytd">Model</td> <td id="model" class="mytd2"></td>
                  </tr>
                  <tr>
                      <td class="mytd">Location</td> <td id="location" class="mytd2"></td>
                  </tr>
                  <tr>
                      <td class="mytd">Condition</td> <td id="condition" class="mytd2"></td>
                  </tr>
                  <tr>
                      <td class="mytd">Estimate Price</td> <td id="price" class="mytd2"></td>
                  </tr>

                  <tr>
                      <td class="mytd">Status</td> <td style="color: green;" id="status" class="mytd2"></td>
                  </tr>



              </table>

            </div>
            <!--end form-->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--end modal-->
