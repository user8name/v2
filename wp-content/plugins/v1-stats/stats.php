<?php

if (!is_user_logged_in() || !current_user_can('level_10')) {
    echo 'Please log in.';
    die();
}

$q = '';
if (isset($_GET['q'])) {
    $q = $_GET['q'];
}

$qv = '';
if (isset($_GET['qv'])) {
    $qv = $_GET['qv'];
}

$blogid = '';
if (is_multisite()) {
    $blogid = get_current_blog_id();
    if ($blogid == "1") {
        $blogid = '';
    }
}

if ($blogid != '') {
    $blogid .= '_';
}

$insertcount = 0;
$updatecount = 0;
$deletecount = 0;

if ($q == 'stats') {
    global $wpdb;
    if ($qv == 'year') {
        echo '<table>';
        for ($i = 1; $i <= 12; $i++) {
            $firstday = date('Y-m-01', strtotime('2018-' . $i . '-01')) . ' 00:00:00';
            $lastday = date('Y-m-d', strtotime("$firstday +1 month -1 day")) . ' 23:59:59';
            $is_product=$wpdb->get_row("select * from information_schema.tables where table_name ='".$wpdb->prefix."products'");
            if ($is_product) {
                $insertcount = $wpdb->get_var($wpdb->prepare('SELECT count(*) as insertcount FROM `wp_' . $blogid . 'products` WHERE isdel=0 and `itime` between %s and %s', $firstday, $lastday));
                $updatecount = $wpdb->get_var($wpdb->prepare('SELECT count(*) as updatecount FROM `wp_' . $blogid . 'products` WHERE isdel=0 and itime<>utime and `utime` between %s and %s', $firstday, $lastday));
                $deletecount = $wpdb->get_var($wpdb->prepare('SELECT count(*) as deletecount FROM `wp_' . $blogid . 'products` WHERE isdel=1 and `utime` between %s and %s', $firstday, $lastday));
            }else{
                $insertcount=0;
                $updatecount=0;
                $deletecount=0;
            }

            $insertcount2 = $wpdb->get_var($wpdb->prepare('SELECT count(*) as insertcount FROM `wp_' . $blogid . 'posts` WHERE `post_status`=%s and `post_type`=%s and `post_date` between %s and %s', 'publish', 'page', $firstday, $lastday));
            $updatecount2 = $wpdb->get_var($wpdb->prepare('SELECT count(*) as updatecount FROM `wp_' . $blogid . 'posts` WHERE  `post_status`=%s and `post_type`=%s and `post_date`<>`post_modified` and `post_modified` between %s and %s', 'publish', 'page', $firstday, $lastday));
            $deletecount2 = $wpdb->get_var($wpdb->prepare('SELECT count(*) as deletecount FROM `wp_' . $blogid . 'posts` WHERE  `post_status`=%s and `post_type`=%s and `post_modified` between %s and %s', 'trash', 'page', $firstday, $lastday));

            echo '<tr>';
            echo '<td>' . $insertcount . '</td>';
            echo '<td>' . $updatecount . '</td>';
            echo '<td>' . $deletecount . '</td>';
            echo '<td>' . $insertcount2 . '</td>';
            echo '<td>' . $updatecount2 . '</td>';
            echo '<td>' . $deletecount2 . '</td>';
            echo '</tr>';
        }
        echo '</tr></table>';

        $firstday = date('Y-m-01', strtotime('2018-01-01')) . ' 00:00:00';
        $lastday = date('Y-m-d', strtotime("$firstday +12 month -1 day")) . ' 23:59:59';

        $rows1 = $wpdb->get_results($wpdb->prepare('SELECT ID,post_title,post_date,post_modified,post_status FROM `wp_' . $blogid . 'posts` WHERE  (`post_status`=%s)  and `post_type`=%s and (`post_date` between %s and %s) order by `post_date` asc', 'publish', 'page', $firstday, $lastday));

        $rows2 = $wpdb->get_results($wpdb->prepare('SELECT ID,post_title,post_date,post_modified,post_status FROM `wp_' . $blogid . 'posts` WHERE  (`post_status`=%s)  and `post_type`=%s and (`post_modified` between %s and %s) order by `post_modified` asc', 'publish', 'page', $firstday, $lastday));
        ?>
            insert:<br />
            <table>
            <tr  style="background:#86b02b">
            <td>title</td><td>url</td><td>insert time</td>
            </tr>
            <?php foreach ($rows1 as $row) {
            setup_postdata($row);
            ?>
            <tr>
            <td><?php echo $row->post_title ?></td><td><?php echo get_permalink($row->ID) ?></td><td><?php echo $row->post_date ?></td>
            </tr>
                <?php
wp_reset_postdata();
        }
        ?>
            </table>

            update:<br />
            <table>
            <tr  style="background:#86b02b">
            <td>title</td><td>url</td><td>update time</td>
            </tr>
            <?php foreach ($rows2 as $row) {
            setup_postdata($row);
            ?>
            <tr>
            <td><?php echo $row->post_title ?></td><td><?php echo get_permalink($row->ID) ?></td><td><?php echo $row->post_modified ?></td>
            </tr>
                <?php
wp_reset_postdata();
        }
        ?>
            </table>


        <?php

    } else {
        if ($qv == '') {
            $qv = date("Y-m-d H:i:s", time());
        }

        $firstday = date('Y-m-01', strtotime($qv)) . ' 00:00:00';
        $lastday = date('Y-m-d', strtotime("$firstday +1 month -1 day")) . ' 23:59:59';

        if ($qv == 'all') {
            $qv = date("Y-m-d h:i:sa", time());
            $qv1 = date("Y-m-d h:i:sa", mktime(0, 0, 0, 7, 1, 2000));
            $firstday = date('Y-m-01', strtotime($qv1)) . ' 00:00:00';
            $lastday = date('Y-m-d', strtotime("$qv +1 month -1 day")) . ' 23:59:59';
        }

        $is_product=$wpdb->get_row("select * from information_schema.tables where table_name ='".$wpdb->prefix."products'");
        if ($is_product) {
            $insertcount = $wpdb->get_var($wpdb->prepare('SELECT count(*) as insertcount FROM `wp_' . $blogid . 'products` WHERE isdel=0 and `itime` between %s and %s', $firstday, $lastday));

            $updatecount = $wpdb->get_var($wpdb->prepare('SELECT count(*) as updatecount FROM `wp_' . $blogid . 'products` WHERE isdel=0 and itime<>utime and `utime` between %s and %s', $firstday, $lastday));

            $deletecount = $wpdb->get_var($wpdb->prepare('SELECT count(*) as deletecount FROM `wp_' . $blogid . 'products` WHERE isdel=1 and `utime` between %s and %s', $firstday, $lastday));
        } else{
            $insertcount=0;
            $updatecount=0;
            $deletecount=0;
        }
        $insertcount2 = $wpdb->get_var($wpdb->prepare('SELECT count(*) as insertcount FROM `wp_' . $blogid . 'posts` WHERE `post_status`=%s and `post_type`=%s and `post_date` between %s and %s', 'publish', 'page', $firstday, $lastday));

        $updatecount2 = $wpdb->get_var($wpdb->prepare('SELECT count(*) as updatecount FROM `wp_' . $blogid . 'posts` WHERE  `post_status`=%s and `post_type`=%s and `post_date`<>`post_modified` and `post_modified` between %s and %s', 'publish', 'page', $firstday, $lastday));

        $deletecount2 = $wpdb->get_var($wpdb->prepare('SELECT count(*) as deletecount FROM `wp_' . $blogid . 'posts` WHERE  `post_status`=%s and `post_type`=%s and `post_modified` between %s and %s', 'trash', 'page', $firstday, $lastday));

        $rows = $wpdb->get_results($wpdb->prepare('SELECT ID,post_title,post_date,post_modified,post_status FROM `wp_' . $blogid . 'posts` WHERE  (`post_status`=%s or `post_status`=%s)  and `post_type`=%s and (`post_date` between %s and %s or `post_modified` between %s and %s)', 'publish', 'trash', 'page', $firstday, $lastday, $firstday, $lastday));

        ?>

    <html>
    <body>
    <h3>From <?php echo $firstday . ' to ' . $lastday ?></h3>
    <h3>Products infomation</h3>
    <table>
    <tr style="background:#86b02b">
    <td>insertcount</td><td>updatecount</td><td>deletecount</td>
    </tr>
    <tr>
    <td><?php echo $insertcount ?></td><td><?php echo $updatecount ?></td><td><?php echo $deletecount ?></td>
    </tr>
    </table>
    <h3>Services infomation</h3>
    <table>
    <tr  style="background:#86b02b">
    <td>insertcount</td><td>updatecount</td><td>deletecount</td>
    </tr>
    <tr>
    <td><?php echo $insertcount2 ?></td><td><?php echo $updatecount2 ?></td><td><?php echo $deletecount2 ?></td>
    </tr>
    </table>
    <?php if (count($rows) > 0) {?>
    <h3>Services list</h3>
    <table>
    <tr  style="background:#86b02b">
    <td>title</td><td>url</td><td>insert time</td><td>update time</td><td>status</td>
    </tr>
    <?php foreach ($rows as $row) {
            setup_postdata($row);
            ?>
    <tr>
    <td><?php echo $row->post_title ?></td><td><?php echo get_permalink($row->ID) ?></td><td><?php echo $row->post_date ?></td><td><?php echo $row->post_modified ?></td><td><?php echo $row->post_status ?></td>
    </tr>
        <?php
wp_reset_postdata();
        }
            ?>
    </table>
        <?php
}
        ?>
    </body>
    </html>
<?php
}}
?>
