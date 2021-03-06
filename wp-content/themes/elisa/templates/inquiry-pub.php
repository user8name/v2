<?php
/**
 * Template Name: Inquiry Pub
 */
$act = trim(array_key_exists('act',$_REQUEST) ? $_REQUEST['act'] :'');
$email = "";
$host = $_SERVER['SERVER_NAME'];
$extend = "";
if (is_main_domain()) {
} else {
    $extend = "[external]";
}


$name = trim(array_key_exists('fullname',$_REQUEST) ?$_REQUEST['fullname'] :'');
$phone = trim(array_key_exists('phone',$_REQUEST) ?$_REQUEST['phone'] : '');
$email = trim(array_key_exists('email',$_REQUEST) ?$_REQUEST['email'] : '');
$services = trim(array_key_exists('services',$_REQUEST) ?$_REQUEST['services'] : 'services');
$description = trim(array_key_exists('description',$_REQUEST) ? $_REQUEST['description'] : '');



if ($act == "send") {
    $Marked = CustomConfig::TSMARKED;
    if($extend==''){
        $Marked = CustomConfig::MSMARKED;
    }
    $valdat = isset($_REQUEST['bad'])?$_REQUEST['bad']:2;
    if($valdat == 2){
        $code = trim($_REQUEST['code']);
        $validate_code=isset($_SESSION['validate_code'])?$_SESSION['validate_code']:'';
        $validate_code=strtolower($validate_code);
        $code=strtolower($code);
        if ($code !== $validate_code || $validate_code=="") {
            showalert("code error!");
        }
        unset($_SESSION['validate_code']);
    }


    $ip = get_ip();

        $content = "<table cellpadding='0' width='100%' cellspacing='0' border='0' style='line-height:32px;  text-align:left;margin:auto;'>
	<tr><td colspan='2' style='background-color:#f5f5f5; padding-left:10px;'>Information</td></tr>
	<tr>
	  <td style='padding-left:10px;  width:200px'>Name: </td>
	  <td>" . $name . "</td>
    </tr>
    <tr>
	  <td style='padding-left:10px;  width:200px'>Phone: </td>
	  <td>" . $phone . "</td>
    </tr>
    <tr>
    <td style='padding-left:10px;'>Email:</td>
    <td>" . $email . "</td>
    </tr>
    <tr>
	  <td style='padding-left:10px;'>Services of Interested:</td>
	  <td>" . $services . "</td>
    </tr>
    <tr>
    <td style='padding-left:10px;'>Project Description:</td>
    <td>" . $description . "</td>
  </tr>
    <tr>
	  <td style='padding-left:10px;'>IP:</td>
	  <td>" . $ip . " (<!--IPMARK:".$ip."--> )</td>
    </tr>
  </table>";


    $title = $services;

    $Device = 'PC';
    if (is_mobile()) {

        $Device = 'Mobile';
    }

    $set = array(
        'markId' => $Marked,
        'sid' => session_id(),
        'email' => $email,
        'subject' => $title,
        'body' => $content,
        'device'=>$Device,
        'filename'=>'',
        'attachmentString'=>'',
        'mediaType'=>'',

    );
    $result = send_email_inquiry_main($set);

    if (isset($result->SendMailForInquiryResult) && strpos($result->SendMailForInquiryResult,'Success')!==false) {

    }else{
        $result=send_email_inquiry_spare($set);
        if (isset($result->SendMailForInquiryResult) && strpos($result->SendMailForInquiryResult,'Success')===false) {
            showalert("The content delivery failed. Please resubmit it later!");
        }
    }


    if ($email == 'cdcd2013@outlook.com') {
    }
}

function is_mobile()
{
    $user_agent = strtolower($_SERVER['HTTP_USER_AGENT']);
    if (preg_match('/playstation/i', $user_agent) or preg_match('/ipad/i', $user_agent) or preg_match('/ucweb/i', $user_agent)) {
        return false;
    }
    if (preg_match('/iemobile/i', $user_agent) or preg_match('/mobile\ssafari/i', $user_agent) or preg_match('/iphone\sos/i', $user_agent) or preg_match('/android/i', $user_agent) or preg_match('/symbian/i', $user_agent) or preg_match('/series40/i', $user_agent)) {
        return true;
    }
    return false;
}
function showalert($title, $action = 'back', $href = null)
{
    $htmlStr = "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
    $htmlStr .= "<script language='javascript'>";
    if ($title) {
        $htmlStr .= 'alert("' . $title . '");';
    }
    switch ($action) {
        case 'back':
            $htmlStr .= "history.back(-1);";
            break;
        case 'close':
            $htmlStr .= "window.close();";
            break;
        case 'replace':
            $htmlStr .= "location.replace(location.href);";
            break;
        case 'reback':
            $htmlStr .= "location.href='" . $_SERVER ['HTTP_REFERER'] . "'";
            break;
        case 'redirect':
            if (!empty($href)) {
                $htmlStr .= "location.href='$href'";
            }
            break;
        case 'parent':
            $htmlStr .= "window.parent.location.href='" . $href . "'";
            break;
        case 'oper':
            $htmlStr .= "window.close();window.opener.location.href='" . $href . "'; ";
            break;
        case 'pclose':
            $htmlStr .= "window.parent.close();";
            break;
        default:
            break;
    }
    $htmlStr .= "</script>";
    echo $htmlStr;
    exit;
}
function curl($url, $postFields = null)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FAILONERROR, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    if (is_array($postFields) && 0 < count($postFields)) {
        $postBodyString = "";
        foreach ($postFields as $k => $v) {
            $postBodyString .= "$k=" . urlencode($v) . "&";
        }
        unset($k, $v);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, substr($postBodyString, 0, -1));
    }
    $reponse = curl_exec($ch);
    if (curl_errno($ch)) {
        throw new Exception(curl_error($ch), 0);
    } else {
        $httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if (200 !== $httpStatusCode) {
            //t            hrow new Exception($reponse,$httpStatusCode);
        }
    }
    curl_close($ch);
    return $reponse;
}
function custom_page_title_baner(){
    $title=get_the_title(get_the_ID());
    return $title;
}

add_filter('custom_page_title_baner','custom_page_title_baner',10,1);

function banener_img($banner_img){
    $img=get_post_meta(get_the_ID(), 'bannerImg', true);
    if($img){
        $banner_img=$img;
    }
    return $banner_img;
}
add_filter('custom_banner_img','banener_img',10,1);
function custom_page_txt_baner($bannerText){
    $bannerText=get_post_meta(get_the_ID(), 'bannerText', true);

    return $bannerText;
}
add_filter('custom_page_txt_baner','custom_page_txt_baner',10,1);

get_header();?>
    <div class="second-banner" style="background: url(<?php echo get_template_directory_uri();?>/images/services-bg.jpg) no-repeat  center;background-size: cover;">
        <div class="container">
            <div class="second-box" >
                <div class="second-title">
                    <h2>Online Inquiry</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="bread-box">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="<?php echo home_url();?>" ><span class="icon-home"></span>&nbsp;Home</a></li>
                <li class="active">&nbsp;Online Inquiry</li>
            </ol>
        </div>
    </div>
    <div class="nomain-content container ">
            <div class="row">
                <div class="col-md-12">
                    <div class="outer_layer_title">Thank you!</div>
                    <p>You may also <a rel="nofollow" href="/contact-us.html" target="_blank">contact our Client Support Team</a>.</p>
                    <p>We welcome any feedback and will respond to your questions, suggestions or comments wherever possible.</p>
                    <table>
                        <tr>
                            <td colspan="2" style=" font-weight:bold; font-size:16px; color:#FFF; background-color:#199EB8; text-align:center;"><?php the_title(); ?></td>
                        </tr>
                        <tr>
                            <td width="25%" style="font-weight:bold;">Name:</td>
                            <td><?php echo $name ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold;">Phone:</td>
                            <td><?php echo $phone ?></td>
                        </tr>

                        <tr>
                            <td style="font-weight:bold;">Email:</td>
                            <td><?php echo $email ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold;">Products or Services Interested:</td>
                            <td><?php echo $services ?></td>
                        </tr>

                        <tr>
                            <td style="font-weight:bold;">Project Description:</td>
                            <td><?php echo $description ?></td>
                        </tr>

                    </table>
                </div>
            </div>
    </div>



<?php get_footer();
?>