<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 5/31/16
 * Time: 8:05 AM
 */

$query = "
        SELECT      *
        FROM        $wpdb->posts
        WHERE       $wpdb->posts.post_title LIKE 'Mango%'
        AND         $wpdb->posts.post_type = 'product'
        ORDER BY    $wpdb->posts.post_title ";
$q = $wpdb->get_results($query);
?>
<ul>
    <?php
    foreach ($q as $r):
    ?>
    <li><?php echo $r->post_title?></li>
        <?php
        endforeach;
        ?>
</ul>
