<?php
/**
 * Created by PhpStorm.
 * User: lirenjun
 * Date: 2019/9/20
 * Time: 9:38
 */
$s = get_search_query();
if (empty($s)) {
    get_template_part('404');
    die;
}

$ty=1;
if(isset($_GET['ty']) && $_GET['ty']=='2'){
    $ty=2;
}

function custom_page_title_baner(){
    $title='Search Results for: '.get_search_query();
    return $title;
}

add_filter('custom_page_title_baner','custom_page_title_baner',10,1);

get_header();
?>
<!--serach banner-->
<div class="banner_inpage online-bg">
    <div class="auto-container">
        <h2>Online Inquiry</h2>
        <div class="bread-center">
            <ul class="bread-crumb">
                <li><a href="">Home</a></li>
                <li>Online Inquiry</li>
            </ul>
        </div>

    </div>

</div>

<div class="container services-container index-iconbg index-services-iconbg">
    <div class="index_container">
        <div class="row service-tit">
            <div class="col-md-12 col-lg-12">
                <h2>Search for "<?php echo get_search_query() ?>"</h2>
            </div>
        </div>
        <div class="container-left">
            <?php if ($ty == 2):
                $page = isset($_REQUEST["page"]) ? $_REQUEST["page"] : null;
                if ($page == null) {
                    $page = 1;
                }

                $pagesize = 10;
                global $wpdb;
                $s_s = '"' . $s . '"';
                $total=0;
                $total = intval($wpdb->get_var('SELECT COUNT(*) FROM `'.$wpdb->prefix.'products` as a INNER JOIN `'.$wpdb->prefix.'products_json` as b ON b.productid = a.id WHERE (`product_keywords` LIKE "%'.$s.'%" or `cat` LIKE "%'.$s.'%" or `productname` LIKE "%'.$s.'%" or json_extract(b.jsontxt,"$.Synonym") like "%'.$s.'%") and isdel=0'));
                $rows = $wpdb->get_results('SELECT `id`,`cid`,`cat`,`size`,`productname` FROM `'.$wpdb->prefix.'products` as a INNER JOIN `'.$wpdb->prefix.'products_json` as b ON b.productid = a.id WHERE  (`product_keywords` LIKE "%'.$s.'%" or `cat` LIKE "%'.$s.'%" or `productname` LIKE "%'.$s.'%" or json_extract(b.jsontxt,"$.Synonym") like "%'.$s.'%") and isdel=0 limit ' . (($page - 1) * $pagesize) . ',' . $pagesize);


                if ($rows):
                    ?>
                    <div class="table-responsive" style="margin-top: 25px;">

                        <table class="pro-table" id="table-breakpoint">
                            <thead>
                            <tr>

                                <th>Cat. #</th>
                                <th>Product Name</th>
                                <th>Size</th>

                                <th class="text-center" width="95">Prize</th>


                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($rows as $k => $v):
                                $url = home_url() . '/' . sanitize_title(preg_replace('/[^A-Za-z0-9\-\s\-]/', '', $v->productname)) . '-item-' . $v->id . '.html';

                                ?>
                                <tr>
                                    <td><?php echo $v->cat; ?></td>
                                    <td><a href="<?php echo $url; ?>"><?php echo $v->productname; ?></a></td>
                                    <td><?php echo $v->size; ?></td>

                                    <td class="text-center">
                                        <a rel="nofollow"  class="btn-inquiry" href="<?php echo home_url(); ?>/online-inquiry.html?t=(<?php echo $v->cat; ?>) <?php echo $v->productname; ?>"><span class="icon fa fa-commenting"></span></a>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="pagenav">
                        <ul class="pagination">
                            <?php
                            if ($total > $pagesize) {

                                $pager = new pager($total, $page, 10, '?ty=' . $ty . '&s=' . urlencode($s) . '&page='); // $pager
                                echo $pager->showpager();
                            }
                            ?>
                        </ul>
                    </div>
                <?php else: ?>
                    <br>
                    <h3>Search Results</h3>
                    <p>Sorry that we did not find a match to your query. Please refine your search using the
                        following instructions:</p>
                    <p>1. In the search box, enter only accession number such as NM_001200, or gene symbol, such as
                        BMP2, or protein name, like Bone morphogenetic protein 2 precursor.</p>
                    <p>2. Do not include product type descriptions, such as clone, antibody, or shRNA, <i>etc</i>.
                    </p>
                    <p>3. Do not include species in search.</p>
                    <p>4. When one key word does not return any result, try the following options:</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;B. Try both full and abbreviated gene names, <i>e.g.</i>, relaxin 3
                        vs. RLN3</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;C. Remove space or dash (-) in your search terms, like IL2 for
                        IL-2.</p>
                    <p>Alternatively, our Customer Care and Technology team is standing by email
                        (<span id="xload-he2" class="xload-tel" data-file="<?php echo get_template_directory_uri();?>/_noindex/ajax/786a0b4a39efab23" data-scroll="false"></span><script>$(function () { $("#xload-he2").xload(); });</script><noscript><a class="email-info" href="info@cd-biosciences.com">info@cd-biosciences.com</a></noscript>) to personally match your needs with the most appropriate product.</p>
                <?php endif; ?>
            <?php else: ?>
                <?php

                if (have_posts()) :
                    /* Start the Loop */
                    while (have_posts()) : the_post();
                        $s = trim(get_search_query()) ? trim(get_search_query()) : 0;
                        $title = get_the_title();
                        $post_content = strip_tags(get_the_content());
                        $postion = stripos($post_content, $s);
                        if ($postion !== false) {
                            $start = ($postion > 50) ? $postion - 50 : 0;
                            $content = mb_strimwidth($post_content, $start, 200, '...');
                        } else {
                            //                    continue;
                            $content = mb_strimwidth(strip_tags(apply_filters('the_content', $post_content)), 0, 200, "...");
                        }

                        if ($s) {
                            $title = preg_replace('/(' . $s . ')/iu', '<span style="color: red;">\0</span>', $title);
                            $content = preg_replace('/(' . $s . ')/iu', '<span style="color: red;">\0</span>', $content);
                        }
                        ?>
                        <div class="post-holder">
                            <div class="post-content">
                                <h3>??? <a href="<?php the_permalink(); ?>"><?php echo $title; ?></a></h3>
                                <p>
                                    <?php echo $content; ?>
                                </p>
                            </div>
                        </div>
                    <?php

                    endwhile; // End of the loop.

                    the_posts_pagination(array());

                else : ?>

                    <br>
                    <h3>Search Results</h3>
                    <p>Sorry that we did not find a match to your query. Please refine your search using the
                        following instructions:</p>
                    <p>1. In the search box, enter only accession number such as NM_001200, or gene symbol, such as
                        BMP2, or protein name, like Bone morphogenetic protein 2 precursor.</p>
                    <p>2. Do not include product type descriptions, such as clone, antibody, or shRNA, <i>etc</i>.
                    </p>
                    <p>3. Do not include species in search.</p>
                    <p>4. When one key word does not return any result, try the following options:</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;B. Try both full and abbreviated gene names, <i>e.g.</i>, relaxin 3
                        vs. RLN3</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;C. Remove space or dash (-) in your search terms, like IL2 for
                        IL-2.</p>
                    <p>Alternatively, our Customer Care and Technology team is standing by email
                        (<span id="xload-he1" class="xload-tel" data-file="<?php echo get_template_directory_uri();?>/_noindex/ajax/786a0b4a39efab23" data-scroll="false"></span><script>$(function () { $("#xload-he1").xload(); });</script><noscript><a class="email-info" href="info@cd-biosciences.com"></a></noscript>) to personally match your needs
                                                                                                                                                                                                                                                                                                                                              with the most appropriate product.</p>
                <?php
                endif;
                ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        var navli= $("ul.navbar-nav>li").has("ul");
        var navlis= $("li.droper").has("ul");
        navli.addClass("dropdown");
        navli.find('span:first').addClass("caret");
        navlis.find('span:first').addClass("caret");
        navli.find('a:first').addClass("dropdown-toggle").attr('data-toggle','dropdown');
        var getWindow = $(window).width();
        $(document).off('click.bs.dropdown.data-api');
        if( getWindow > 1000 ){
            dropdownOpen();
        }
        else {
            $(".head-nav a.dropdown-toggle>.caret", this).on('click', function (e) {
                e.stopPropagation();
                $(this).closest("li.dropdown").find(".dropdown-menu").first().stop().fadeToggle();
                $(this).closest("li.dropdown").first().toggleClass("on");
                return false;
            });

        }

    });
    function dropdownOpen() {
        var $dropdownLi = $('.head-nav li.dropdown');
        $dropdownLi.mouseover(function() {
            $(this).addClass('open');
        }).mouseout(function() {
            $(this).removeClass('open');
        });
    }
    var scrollTopLast = 0;
    window.onscroll=function(e){
        var scrollTop = e.target.scrollingElement.scrollTop;
        if(scrollTop > scrollTopLast){
            $(".head-nav").removeClass("isStuck")
        }else{
            $(".head-nav").addClass("isStuck")
        }
        scrollTopLast = scrollTop;
    }
</script>

<?php
get_footer();
?>
