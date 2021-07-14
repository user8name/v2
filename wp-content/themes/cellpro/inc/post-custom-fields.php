<?php
/**
 * Created by PhpStorm.
 * User: lirenjun
 * Date: 2019/7/4
 * Time: 16:26
 */

//隐藏后台末默认的自定义字段功能


add_action('admin_init','customize_meta_boxes');
function customize_meta_boxes() {
    remove_meta_box(
        'postcustom',
        array('post','page'),
        'normal'
    );
}


//添加自定义的input框


add_action( 'add_meta_boxes', 'page_custom_director' );
function page_custom_director() {
    add_meta_box(
        'page_custom_director',
        'Page Custom Fields',
        'page_custom_director_meta_box',
        array('post','page'),     //字符串 | 数组
        'advanced',                //显示位置包含的值'normal', 'side', 'advanced'
        'high',    				//显示位置的优先级 'high', 'low'  默认值default
        null        //应设置为box数组的$ args属性的数据（这是传递给回调的第二个参数）。
    );

}
function page_custom_director_meta_box($post) {
    // 创建临时隐藏表单，为了安全

    wp_nonce_field( 'page_custom_director_meta_box', 'page_custom_director_meta_box_nonce' );

    // 获取之前存储的值
    $metaTitle = get_post_meta( $post->ID, 'metaTitle', true );
    $metaKeyword=get_post_meta( $post->ID, 'metaKeyword', true );
    $metaDescription=get_post_meta( $post->ID, 'metaDescription', true );
    $bannerImg=get_post_meta($post->ID,'bannerImg',true)?:"/images/servicesbg.jpg";
    $coverImg=get_post_meta($post->ID,'coverImg',true)?:"";
    $bannerTitle=get_post_meta($post->ID,'bannerTitle',true);
    $bannerText=get_post_meta($post->ID,'bannerText',true);
    $auditStatus=get_post_meta($post->ID,'auditStatus',true)?:"0";
    $openLink=get_post_meta($post->ID,'openLink',true)?:"0";
    $noIndex=get_post_meta($post->ID,'noIndex',true)?:"0";

    ?>



    <table class="form-table">
        <tbody><tr class="form-field form-required term-name-wrap">
            <th scope="row"><label for="metaTitle">SEO Title</label></th>
            <td><input type="text" id="metaTitle" name="metaTitle" value="<?php echo esc_attr( $metaTitle ); ?>" placeholder="SEO Title">
                <p class="description"></p></td>
        </tr>
        <tr class="form-field term-slug-wrap">
            <th scope="row"><label for="metaKeyword">SEO Keyword</label></th>
            <td><textarea id="metaKeyword" name="metaKeyword" rows="2" cols="50"><?php echo esc_attr( $metaKeyword ); ?></textarea>
                <p class="description"></p>
            </td>
        </tr>
        <tr class="form-field term-slug-wrap">
            <th scope="row"><label for="metaDescription">SEO Description</label></th>
            <td><textarea id="metaDescription" name="metaDescription" rows="2" cols="50"><?php echo esc_attr( $metaDescription ); ?></textarea>
                <p class="description"></p>
            </td>
        </tr>
        <tr class="form-field term-slug-wrap">
            <th scope="row"><label for="bannerImg">Banner Image</label></th>
            <td>
                <input type="text" id="bannerImg" name="bannerImg" value="<?php echo esc_attr( $bannerImg ); ?>" placeholder="Banner Image">
                <p class="description"></p>
            </td>
        </tr>
        <tr class="form-field term-slug-wrap">
            <th scope="row"><label for="coverImg">Cover Image</label></th>
            <td>
                <input type="text" id="coverImg" name="coverImg" value="<?php echo esc_attr( $coverImg ); ?>" placeholder="Cover Image">
                <p class="description"></p>
            </td>
        </tr>

        <tr class="form-field term-slug-wrap">
            <th scope="row"><label for="bannerTitle">Banner Title</label></th>
            <td>
                <input type="text" id="bannerTitle" name="bannerTitle" value="<?php echo esc_attr( $bannerTitle ); ?>" placeholder="">
                <p class="description"></p>
            </td>
        </tr>
        <tr class="form-field term-slug-wrap">
            <th scope="row"><label for="bannerText">Banner Description</label></th>
            <td>
                <input type="text" id="bannerText" name="bannerText" value="<?php echo esc_attr( $bannerText ); ?>" placeholder="">
                <p class="description"></p>
            </td>
        </tr>

        <tr class="from-field term-slug-wrap">
            <th scope="row"><label for="openLink">Is Open</label></th>
            <th>
                <input type="radio" name="openLink" value="0" <?php checked( '0', $openLink ,true)?>>yes
                <input type="radio" name="openLink" value="1" <?php checked( '1', $openLink ,true)?>>no
            </th>

        </tr>
        <tr class="from-field term-slug-wrap">
            <th scope="row"><label for="auditStatus">IS Audit</label></th>
            <th>
                <input type="radio" name="auditStatus" value="0" <?php checked( '0', $auditStatus ,true)?>>yes
                <input type="radio" name="auditStatus" value="1" <?php checked( '1', $auditStatus ,true)?>>no

            </th>

        </tr>
        <tr class="from-field term-slug-wrap">
            <th scope="row"><label for="noIndex">No Index</label></th>
            <th>
                <input type="radio" name="noIndex" value="0" <?php checked( '0', $noIndex ,true)?>>no
                <input type="radio" name="noIndex" value="1" <?php checked( '1', $noIndex ,true)?>>yes

            </th>

        </tr>
        </tbody>
    </table>
    <?php
}
add_action( 'save_post', 'page_custom_director_save_meta_box' );
function page_custom_director_save_meta_box($post_id){

    // 安全检查
    // 检查是否发送了一次性隐藏表单内容（判断是否为第三者模拟提交）
    if ( ! isset( $_POST['page_custom_director_meta_box_nonce'] ) ) {
        return;
    }
    // 判断隐藏表单的值与之前是否相同
    if ( ! wp_verify_nonce( $_POST['page_custom_director_meta_box_nonce'], 'page_custom_director_meta_box' ) ) {
        return;
    }
    // 判断该用户是否有权限
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    // 判断 Meta Box 是否为空
//    if ( !isset( $_POST['metaTitle']) || !isset( $_POST['metaKeyword']) || !isset( $_POST['metaDescription']) || !isset($_POST['bannerImg']) ) {
//        return;
//    }

    $metaTitle = sanitize_text_field( $_POST['metaTitle'] );
    update_post_meta( $post_id, 'metaTitle', $metaTitle );


    $metaKeyword = sanitize_text_field( $_POST['metaKeyword'] );
    update_post_meta( $post_id, 'metaKeyword', $metaKeyword );

    $metaDescription = sanitize_text_field( $_POST['metaDescription'] );
    update_post_meta( $post_id, 'metaDescription', $metaDescription );


    $bannerImg = sanitize_text_field( $_POST['bannerImg'] );
    update_post_meta( $post_id, 'bannerImg', $bannerImg );

    $coverImg = sanitize_text_field( $_POST['coverImg'] );
    update_post_meta( $post_id, 'coverImg', $coverImg );



    $bannerTitle = sanitize_text_field( $_POST['bannerTitle'] );
    update_post_meta( $post_id, 'bannerTitle', $bannerTitle );

    $bannerText = sanitize_text_field( $_POST['bannerText'] );
    update_post_meta( $post_id, 'bannerText', $bannerText );

    $auditStatus = sanitize_text_field( $_POST['auditStatus'] );
    update_post_meta( $post_id, 'auditStatus', $auditStatus );

    $openLink = sanitize_text_field( $_POST['openLink'] );
    update_post_meta( $post_id, 'openLink', $openLink );

    $noIndex = sanitize_text_field( $_POST['noIndex'] );
    update_post_meta( $post_id, 'noIndex', $noIndex );
    


}