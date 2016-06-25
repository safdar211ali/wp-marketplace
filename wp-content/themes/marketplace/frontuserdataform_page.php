<?php
/**
 * Template Name: Frontuserdataform
 */
?>

<?php
global $wpdb;
if ( isset($_POST) ) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $status = $_POST['status'];


    $wpdb->insert(
        'wp_frontuserdata',
        array(
            'name' =>  $name,
            'phone' =>   $phone,
            'status' =>  $status
        )
    );
}

?>

<form  method="post" action="">

    Name  <input type="text" name="name" placeholder="Enter name">

    Phone  <input type="text" name="phone" placeholder="Enter phone">

    Status <input type="text" name="status" placeholder="Enter status">

            <input type="submit" name="submit" value="submit">
        </form>