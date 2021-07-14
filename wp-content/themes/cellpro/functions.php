<?php
/**
 * Created by PhpStorm.
 * User: lirenjun
 * Date: 2019/7/16
 * Time: 9:19
 */

require get_template_directory() . '/inc/custom-config.php';
require get_template_directory() . '/inc/post-custom-fields.php';
require get_template_directory() . '/inc/theme-customfield.php';
require get_template_directory() . '/inc/disable-css-js.php';
require get_template_directory() . '/inc/theme-options.php';
require get_template_directory() . '/inc/theme-shortcode.php';
require get_template_directory() . '/inc/theme-seo.php';
require get_template_directory() . '/inc/nav-menu.php';
require get_template_directory() . '/inc/nav-pages-category.php';
require get_template_directory() . '/inc/custom-breadcrumbs.php';
require get_template_directory() . '/inc/select-category.php';
require get_template_directory() . '/inc/class-page.php';
require get_template_directory() . '/inc/category-temp.php';





/**
 *
 * 注册导航标签
 */
function v1_setup() {
//    remove_theme_support( 'title-tag' );  //删除title标签
//    add_theme_support( 'title-tag' );
    register_nav_menus( array(
        'top' => __('Top Menu', 'v1'),
    ) );

}
add_action( 'after_setup_theme', 'v1_setup' );

function v1_widgets_init()
{
    register_sidebars(4, array(
        'name' => __('Footer Sidebar %d', 'v1'),
        'id' => 'footerbar',
        'description' => __('Add widgets here to appear in all page footer.', 'v1'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'v1_widgets_init');

function custom_posts_where($where)
{

    if (is_main_domain()) {
        if ((is_single() || is_search() || is_category() || is_front_page() || is_page()) && !is_admin()) {
            global $wpdb;
            $where .= " AND not  EXISTS (SELECT * FROM {$wpdb->postmeta} WHERE post_id={$wpdb->posts}.ID and meta_key = 'auditStatus' and meta_value = '0')";

        }
    }

    return $where;
}
add_filter('posts_where', 'custom_posts_where',10);

function v1_robots_txt($output,$public)
{


    if(is_main_domain()){

//        $output.='Disallow: /wp-content/* '.PHP_EOL;
    }else{
        $output='User-agent: * '.PHP_EOL.'Disallow: / '.PHP_EOL;

    }
    return $output;

}
add_filter('robots_txt', 'v1_robots_txt',0,2);

function v1_scripts() {


    wp_enqueue_style('s-v1-font-awesome', get_theme_file_uri('/css/font-awesome.css'), array(), filemtime(get_stylesheet_directory() . '/css/font-awesome.css'));
    wp_enqueue_style('s-v1-bootstrap', get_theme_file_uri('/css/bootstrap.css'), array(), filemtime(get_stylesheet_directory() . '/css/bootstrap.css'));
    wp_enqueue_style('s-v1-public', get_theme_file_uri('/css/public.css'), array(), filemtime(get_stylesheet_directory() . '/css/public.css'));
    wp_enqueue_style('s-v1-style', get_theme_file_uri('/css/style.css'), array(), filemtime(get_stylesheet_directory() . '/css/style.css'));

    wp_register_script( 'jquery', get_theme_file_uri('/js/jquery-3.1.1.min.js'));
    wp_enqueue_script( 'jquery' );
	//wp_enqueue_script('v1-jquery-base64', get_theme_file_uri('/ajax/jquery.base64.js'), array(), filemtime(get_stylesheet_directory() . '/ajax/jquery.base64.js'), false);
    //wp_enqueue_script('v1-jquery-xload', get_theme_file_uri('/ajax/jquery.xload.js'), array(), filemtime(get_stylesheet_directory() . '/ajax/jquery.xload.js'), false);
    wp_enqueue_script('v1-jquery-min', get_theme_file_uri('/js/jquery-3.1.1.min.js'), array(), filemtime(get_stylesheet_directory() . '/js/jquery-3.1.1.min.js'), false);
    //wp_enqueue_script('v1-particles', get_theme_file_uri('/js/particles.js'), array(), filemtime(get_stylesheet_directory() . '/js/particles.js'), true);
    //wp_enqueue_script('v1-signaling', get_theme_file_uri('/js/signaling.js'), array(), filemtime(get_stylesheet_directory() . '/js/signaling.js'),true);


}
add_action( 'wp_enqueue_scripts', 'v1_scripts' );








function add_query_vars_filter($vars)
{
    $vars[] = "captcha";
    return $vars;
}
add_filter('query_vars','add_query_vars_filter');

function add_template_redirect()
{
    $captcha = get_query_var('captcha');
    if ($captcha == '1') {
        require dirname(__FILE__).'/inc/v-code.php';
        die;
    }
}
add_action("template_redirect", 'add_template_redirect');


function tin_ajax_verificationcaptcha(){
    $fieldId=$_REQUEST['fieldId'];
    $code = trim($_REQUEST['fieldValue']);
    $validate_code=isset($_SESSION['validate_code'])?$_SESSION['validate_code']:'';
    $validate_code=strtolower($validate_code);
    $code=strtolower($code);
    if ($code !== $validate_code || $validate_code=="") {
        $result=[$fieldId,false,""];
    }else{
        $result=[$fieldId,true,""];
    }
    header( 'content-type: application/json; charset=utf-8' );
    echo json_encode( $result );
    exit;
}
add_action( 'wp_ajax_verificationcaptcha', 'tin_ajax_verificationcaptcha' );
add_action( 'wp_ajax_nopriv_verificationcaptcha', 'tin_ajax_verificationcaptcha' );


add_filter('wp_default_editor', function (){
    return "html";
});

function custom_rewrite_rules1($aRules)
{

    $aNewRules = array(
//        '^pdf/?$' => 'index.php?pdf=down',
        '(.*)-item-([1-9][0-9]*).html$' => 'index.php?vpid1=$matches[2]',
    );

    $aRules = $aNewRules + $aRules;

    return $aRules;
}

function custom_rewrite_rule1()
{
    add_rewrite_rule('(.*)-item-([1-9][0-9]*).html$', 'index.php?vpid1=$matches[2]', 'bottom');

}

function add_query_vars_filter1($vars)
{
//    $vars[] = "pdf";
    $vars[] = "vpid1";
    return $vars;
}


add_action('init','custom_rewrite_rule1');
add_filter('query_vars', 'add_query_vars_filter1');
add_filter('rewrite_rules_array','custom_rewrite_rules1');

/**
 * @param $template
 * @return string
 * 产品详情页模板加载
 */
function v1_page_template($template)
{


    $vpid = get_query_var('vpid1');

    if (!empty($vpid)) {
        $new_template = locate_template(array('content/content-product.php'));
        if ('' != $new_template) {
            return $new_template;
        }
    }
    return $template;
}

add_filter('template_include', 'v1_page_template', 99);


function custom_add_template_redirect()
{
    $pdf = get_query_var('pdf');

    if ($pdf == 'down') {
        require 'product-pdf/custom-pdf.php';
        die;
    }
}
//add_action("template_redirect",  'custom_add_template_redirect');

//禁止编辑器自动添加p标签
remove_filter (  'the_content' ,  'wpautop'  );
remove_filter (  'the_excerpt' ,  'wpautop'  );
add_filter('user_can_richedit','__return_false'); //禁用可视化编辑

//解析source标签中的视频地址中的短标签，可以将系统中不包含的html都加入到tags数组中     wp-includes/kses.php
function custom_wp_kses_allowed_html($tags, $context){
    if ($context=='post'){
        $tags['source']=['src'=>true,'type'=>true];
    }

    return $tags;

}

add_filter('wp_kses_allowed_html','custom_wp_kses_allowed_html',10,2);

remove_filter('the_content', 'wptexturize'); //解决字符被转译


//以下是基于 Custom Permalinks 插件url的定义  要使用此功能必须启用 Custom Permalinks 插件
//add_action( 'save_post', 'custom_permalinks_save_post1', 10, 3);
function custom_permalinks_save_post1( $id,$post,$update ) {
    if ($update && $post->post_type=='page'){
        if ($post->post_name){
            $link=sanitize_title($post->post_name);
        }else{

            $link=sanitize_title($post->post_title);
        }
        //delete_post_meta( $id, 'custom_permalink' );

        //$cp_frontend = new Custom_Permalinks_Frontend();
        //$original_link = $cp_frontend->custom_permalinks_original_post_link( $id );     //默认的
        if ( array_key_exists('custom_permalink',$_REQUEST) && $_REQUEST['custom_permalink'] ) {
            update_post_meta( $id, 'custom_permalink',
                str_replace( '%2F', '/',
                    urlencode( ltrim( stripcslashes( $_REQUEST['custom_permalink'] ), "/" ) )
                )
            );
        }else{
            update_post_meta( $id, 'custom_permalink',
                //str_replace() 函数以其他字符替换字符串中的一些字符（区分大小写）。
                str_replace( '%2F', '/',
                    //stripcslashes() 函数删除由 addcslashes() 函数添加的反斜杠。
                    //ltrim() 函数移除字符串左侧的空白字符或其他预定义字符。
                   //urlencode() 编码 URL 字符串函数。
                    urlencode( ltrim( stripcslashes( $link.'.html' ), "/" ) )
                )
            );
        }
    }
}


//处理分类名称自动删除斜体问题
function custom_pre_term_name($filtered, $str){
    if(strpos($str,'<em>C. elegans</em>') !== false){
        return $str;
    }else{
        return $filtered;
    }
}
add_filter( 'sanitize_text_field', 'custom_pre_term_name',11111,2 );


function custom_requested_url($r){
    $requested_url1=untrailingslashit($r);
    return $requested_url1;
}
add_filter('redirect_canonical','custom_requested_url',10);

//处理分类名称自动删除html问题
remove_filter('pre_term_name', 'wp_filter_kses');
remove_filter('pre_term_name', 'sanitize_text_field');
remove_filter('term_name', 'wp_kses_data');
remove_filter('term_name', 'sanitize_text_field');


//Wordpress 5.0+ 禁用 Gutenberg 编辑器
add_filter('use_block_editor_for_post', '__return_false');
remove_action( 'wp_enqueue_scripts', 'wp_common_block_scripts_and_styles' );



/**
 * url后面加上  '.html'后缀，配合固定连接'%postname%.html'使用
 */
/*add_action('init', 'html_page_permalink', -1);
function html_page_permalink() {
    global $wp_rewrite;
    //strpos() 函数查找字符串在另一字符串中第一次出现的位置。
    if ( !strpos($wp_rewrite->get_page_permastruct(), '.html')){
        $wp_rewrite->page_structure = $wp_rewrite->page_structure . '.html';
    }
}*/



function custom_permalink_manager_filter_default_post_uri($default_uri, $slug, $post, $post_name, $native_uri){
    if ($slug==''){
        return $post_name.'.html';
    }else{
        return $slug.'.html';
    }


}
add_filter('permalink_manager_filter_default_post_uri','custom_permalink_manager_filter_default_post_uri',10,5);