<?php
/**
 * Created by PhpStorm.
 * User: lirenjun
 * Date: 2019/7/16
 * Time: 9:35
 */

class CustomConfig{
    const MSDOMAIN='';
    const TSDOMAIN='';

    const MSEMAIL='cd-biosciences.com';
    const TSEMAIL='clinicaldisposal.com';

    const MSMARKED='95';
    const TSMARKED='96';
    const USERNAME="cdwebsCerUNX";
    const PASSWORD="sY1oqMI3NTcsG182bd!cD*H5mqA2c!yK";
    const MKEY="6692CBF6159A4D478D252ABFC555ACB1";
    const TKEY="E8EA9B696D6A42829EDAFB736B16A525";

}

/**
 * @return bool
 *
 * 判断是否为主站
 */

function is_main_domain(){
    $domain=$_SERVER['SERVER_NAME'];
    if(preg_match('/www\.cd-biosciences\.com/i', $domain)){
        return true;
    }else{
        return false;
    }
}

function get_ip()
{
    if (array_key_exists('HTTP_CLIENT_IP',$_SERVER)) {
        $onlineip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (array_key_exists('HTTP_X_FORWARDED_FOR',$_SERVER)) {
        $onlineip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $onlineip = $_SERVER['REMOTE_ADDR'];
    }
    return $onlineip;
}
add_action( 'init', function ()
{
    if ( ! session_id() ) {
        session_start();
    }
}, 1 );

function no_wordpress_errors(){
    return 'Something is wrong!';
}
add_filter( 'login_errors', 'no_wordpress_errors' );


function send_email_inquiry_main($data){
    ini_set("soap.wsdl_cache_enabled", "1");

    $opts = array(
        'ssl' => array('verify_peer' => false, 'verify_peer_name' => false,'cache_wsdl'=>0),
        'https' => array(
            'curl_verify_ssl_peer'  => false,
            'curl_verify_ssl_host'  => false
        )
    );

    $s = new SoapClient('https://202011.cd-payment.com/CDHSLWCoreWebService.asmx?wsdl',array('stream_context' => stream_context_create($opts)));
    $u = new SoapHeader('http://tempuri.org/','CertificateSoapHeader',array('UserName'=>CustomConfig::USERNAME,'Password'=>CustomConfig::PASSWORD),true);
    $s->__setSoapHeaders($u);
    $sessionid=session_id();
    if (is_main_domain()){
        $s->SetSiteInfo(array('id'=>$sessionid,'openKey'=>CustomConfig::MKEY));
    }else{
        $s->SetSiteInfo(array('id'=>$sessionid,'openKey'=>CustomConfig::TKEY));
    }
    $response=$s->SendMailForInquiry($data);
    return $response;
}
function send_email_inquiry_spare($data){
    ini_set("soap.wsdl_cache_enabled", "1");

    $opts = array(
        'ssl' => array('verify_peer' => false, 'verify_peer_name' => false,'cache_wsdl'=>0),
        'https' => array(
            'curl_verify_ssl_peer'  => false,
            'curl_verify_ssl_host'  => false
        )
    );

    $s = new SoapClient('https://202012.cd-payment.com/CDHSLWCoreWebService.asmx?wsdl',array('stream_context' => stream_context_create($opts)));
    $u = new SoapHeader('http://tempuri.org/','CertificateSoapHeader',array('UserName'=>CustomConfig::USERNAME,'Password'=>CustomConfig::PASSWORD),true);
    $s->__setSoapHeaders($u);
    $sessionid=session_id();
    if (is_main_domain()){
        $s->SetSiteInfo(array('id'=>$sessionid,'openKey'=>CustomConfig::MKEY));
    }else{
        $s->SetSiteInfo(array('id'=>$sessionid,'openKey'=>CustomConfig::TKEY));
    }
    $response=$s->SendMailForInquiry($data);
    return $response;
}