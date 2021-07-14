<?php

/*
Plugin Name: check-content-keywords
Plugin URI: 
Version:V1.01
Author: zhy
Author URI:
Description:Check the service page for specific keywords
*/


global $words;
if(is_admin()){
	$act = strrchr($_SERVER['PHP_SELF'], "/");
	$GLOBALS['$act']=$act;
	if($act=="/post-new.php"||$act=="/post.php"||$act=="/edit-tags.php"||$act=="/term.php"){
        $GLOBALS['$words']=file_get_contents('http://dellogsys.cd-web.org/api/getipblacklist.ashx?token=awq*L*U43tDkAZd'); 
	}else{
		$GLOBALS['$words']="";
	}



add_action( 'admin_print_footer_scripts', 'duplicate_titles_enqueue_scripts', 100 );
function duplicate_titles_enqueue_scripts() {
?>
	<script>
	jQuery(function($){	
	var str=<?php if($GLOBALS['$words']==""){echo '""';}else{echo($GLOBALS['$words']);};?>;
	var act="<?php if($GLOBALS['$act']==""){echo '""';}else{echo($GLOBALS['$act']);};?>";
	if(act=="/post-new.php"||act=="/post.php"){
		$("#post").prepend('<input type="hidden" id="compulsoryinput" name="compulsoryinput" value="false">')
		$("#publishing-action").append('<span class="button button-primary button-large" id="Subm">Submit</span>');
		$("#poststuff").after('<span class="button button-primary button-large" id="compulsory">compulsory Submit</span>')
		$("#postdivrich").after("<div class='updated updateword' style='display:none;border:1px solid red'><p style='color:red' ></p></div>")
		$("#poststuff").before("<div class='updated updateword' style='display:none;border:1px solid red'><p style='color:red' ></p></div>")
		$("#publish").hide();
		$("#publishing-action #Subm").click(function () {
		var cons=$("#post #title").val()+" "+$("#post #content").val()+" "+$("#metaTitle").val()+" "+$("#metaKeyword").val()+" "+$("#metaDescription").val()+" "+$("#bannerImg").val()+" "+$("#coverImg").val()+" "+$("#bannerTitle").val()+" "+$("#bannerText").val();
		cons=cons.replace(/<[^>]+>/g,' ');
		var kstr='';
		for(var i=0;i<str.msg.length;i++){
			var std=str.msg[i];
			let re = new RegExp("\\b"+std+"\\b","i");
	        var nstr = cons.search(re);  
	        if(nstr != -1){
	        	kstr=kstr+std+' | ';
	        }
	    }
	    
	    if (kstr=='') {
	    	$(".updateword").stop(true).animate({"height":"hide",})
		    $(".updateword p").html('');
		    $("#publish").click();
	    } else{
	    	kstr=kstr+"<br>"+"--These words are not allowed to be saved, please check title、content、Page Custom Fields!";
		    $(".updateword").stop(true).animate({"height":"show",});
		    $(".updateword p").html(kstr);
		    var pos = $(".updateword").eq(0).offset().top-50;
		    $("html,body").stop(true).animate({ scrollTop: pos }, 400);
	    }
		})
		$("#compulsory").click(function () {
			$("#compulsoryinput").val("true");
			$("#publish").click();
		})
	}
	if(act=="/edit-tags.php"){
	    $("#submit").before('<span class="button button-primary" id="New-Category" style="font-style: normal;">Add New Category</span>');
	    $("#submit").hide();
	    $("#submit").after('<p style="font-style: normal;margin-top:15px;">If this is no problem, <a id="compulsoryclick" href="javascript:;">Click here</a> to save</p>')
	    $("#col-container").after("<div class='updated updateword' style='display:none;border:1px solid red'><p style='color:red' ></p></div>")
		$("#col-container").before("<div class='updated updateword' style='display:none;border:1px solid red'><p style='color:red' ></p></div>")
	    $("#col-container #New-Category").click(function () {
			var cons=$("#col-container #tag-name").val()+" "+$("#col-container #tag-slug").val()+" "+$("#parent option:selected").text()+" "+$("#tag-description").val()+" "+$("#cat-pic").val()+" "+$("#banner-pic").val()+" "+$("#seo-title").val()+" "+$("#seo-des").val()+" "+$("#short-des").val()+" "+$("#custom-permalinks-post-slug").val();
			cons=cons.replace(/<[^>]+>/g,' ');
			var kstr='';
			for(var i=0;i<str.msg.length;i++){
				var std=str.msg[i];
				let re = new RegExp("\\b"+std+"\\b","i");
		        var nstr = cons.search(re);  
		        if(nstr != -1){
		        	kstr=kstr+std+' | ';
		        }
		    }
		    if (kstr=='') {
		    	$(".updateword").stop(true).animate({"height":"hide",})
			    $(".updateword p").html('');
			    $("#submit").click();
		    } else{
		    	kstr=kstr+"<br>"+"--These words are not allowed to be saved!";
			    $(".updateword").stop(true).animate({"height":"show",});
			    $(".updateword p").html(kstr);
			    var pos = $(".updateword").eq(0).offset().top-50;
			    $("html,body").stop(true).animate({ scrollTop: pos }, 400);
		    }
		})
		$("#col-container #compulsoryclick").click(function () {
			$(".updateword").stop(true).animate({"height":"hide",})
		    $(".updateword p").html('');
		    $("#submit").click();
		})	
	}
	if(act=="/term.php"){
	    $(".edit-tag-actions input.button").before('<span class="button button-primary" id="Update-Category" style="font-style: normal;">Update</span>');
	    $(".edit-tag-actions input.button").hide();
	    $(".edit-tag-actions").after('<p style="font-style: normal;margin-top:15px;">If this is no problem, <a id="compulsoryupdate" href="javascript:;">Click here</a> to save</p>')
	    $("#edittag").after("<div class='updated updateword' style='display:none;border:1px solid red'><p style='color:red' ></p></div>")
		$("#edittag").before("<div class='updated updateword' style='display:none;border:1px solid red'><p style='color:red' ></p></div>")
	    $("#edittag #Update-Category").click(function () {
			var cons=$("#edittag #name").val()+" "+$("#edittag #slug").val()+" "+$("#parent option:selected").text()+" "+$("#description").val()+" "+$("#cat-pic").val()+" "+$("#banner-pic").val()+" "+$("#seo-title").val()+" "+$("#seo-des").val()+" "+$("#short-des").val()+" "+$("#custom-permalinks-post-slug").val();
			cons=cons.replace(/<[^>]+>/g,' ');
			var kstr='';
			for(var i=0;i<str.msg.length;i++){
				var std=str.msg[i];
				let re = new RegExp("\\b"+std+"\\b","i");
		        var nstr = cons.search(re); 
		        if(nstr != -1){
		        	kstr=kstr+std+' | ';
		        }
		    }
		    if (kstr=='') {
		    	$(".updateword").stop(true).animate({"height":"hide",})
			    $(".updateword p").html('');
			    $(".edit-tag-actions input.button").click();
		    } else{
		    	kstr=kstr+"<br>"+"--These words are not allowed to be saved!";
			    $(".updateword").stop(true).animate({"height":"show",});
			    $(".updateword p").html(kstr);
			    var pos = $(".updateword").eq(0).offset().top-50;
			    $("html,body").stop(true).animate({ scrollTop: pos }, 400);
		    }
		})
		$("#compulsoryupdate").click(function () {
			$(".updateword").stop(true).animate({"height":"hide",})
		    $(".updateword p").html('');
		    $(".edit-tag-actions input.button").click();
		})	
	}
	
	});
	</script>
<?php
} 
function KeyWordsFilter($data , $postarr ) {
	$compulsory = $_REQUEST['compulsoryinput'];
	$word=json_decode(file_get_contents('http://dellogsys.cd-web.org/api/getipblacklist.ashx?token=awq*L*U43tDkAZd'));
	$word=$word->msg;
	$num=count($word);
	$wordpre="\b";
	for($t=0;$t<$num;$t++){
		$wordpre=$wordpre.preg_quote($word[$t],'/').'\b|\b';
	}
	$wordpre="/".$wordpre."endinglist\b/i";
	$strs=$data['post_title'].' '.$data['post_content'].' '.$postarr['metaTitle'].' '.$postarr['metaKeyword'].' '.$postarr['metaDescription'].' '.$postarr['bannerImg'].' '.$postarr['coverImg'].' '.$postarr['bannerTitle'].' '.$postarr['bannerText'];
	$strs=strip_tags($strs); 
	$str=array();
	preg_match_all($wordpre, $strs, $str);
    if($compulsory=="false"){
    	if(empty($str[0])){
	    	return $data;
	    }else{
	    	$str=json_encode($str);
			return false;
	    }
    }else{
    	return $data;
    }
    
}


add_filter( 'wp_insert_post_data', 'KeyWordsFilter', 99, 2 );



define('plugin_ROOT_URL', rtrim(plugin_dir_url(__FILE__), '/'));
function my_add_pages() {
    add_menu_page('check-content-keywords', 'check keywords', 'manage_options', __FILE__, 'my_toplevel_page', plugin_ROOT_URL.'/check.svg');
}
function my_toplevel_page() { 
	global $wpdb;
	$table_prefix = $wpdb->prefix;
	$a=$wpdb->query('SHOW TABLES LIKE "'.$table_prefix.'products"');
    echo '
    <div class="wrap">
    <h2>check keywords</h2>
    <p style="font-size: 15px;">Click to check the page&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="spinner spinnerpage"></span><a href="javascript:;" id="checkbtn">start</a></p>
    <div id="resources"></div>
    <p id="say"></p>
    ';
    if($a){
    	echo '
    	<p style="font-size: 15px;">Click to check the product&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="spinner spinnerproduct"></span><a href="javascript:;" id="checkproduct">start</a></p>
        Product Url Rule：<input class="" id="urlrule" type="text" name="" value="home_url().\'/\'.sanitize_title(preg_replace( \'/[^A-Za-z0-9\\-\\s\\-]/\', \'\', strip_tags($v[\'productname\']))) .\'-item-\'.$v[\'id\'].\'.html\'" placeholder="Please input the URL rule " required="">
	    <div id="product"></div>
	    <p id="productsay"></p>
    	';
    };
    if($a){
    	echo '
    	<p style="font-size: 15px;">Click to check the product categories&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="spinner spinnercategories"></span><a href="javascript:;" id="checkcategories">start</a></p>
	    <div id="categories"></div>
	    <p id="categoriessay"></p>
    	';
    };
    echo '
    </div>
    <style>
    	#urlrule{width:60%;}
    	.spinner{float:none;margin: 0px 10px 0;}
    	table td{border: 1px solid #cacaca;padding:10px;}
    	table { border-collapse: collapse;margin: 1.25em 0 0;width: 100%;border: 1px solid #cacaca;}
    </style>
    ';
}
add_action('admin_menu', 'my_add_pages');

add_action( 'admin_print_footer_scripts', 'checkajax', 100 );
function checkajax() {
?>
	<script>
	jQuery(function($){	
		$("#checkbtn").click(function () {
			$(".spinnerpage").css({'visibility': 'unset',})
			$.ajax({
                type:'post',
                url:ajaxurl,
                data:{'action':'checktext'},
                cache:false,
                dataType:'json',
                success:function(result){
                	var table=[];
                	if(result.length==0){
                		$('#resources').html('<p style="color:#0073aa;">Found '+result.length+' resources</p>');
                	}else{
                		$('#resources').html('<p style="color:#0073aa;">Found '+result.length+' resources&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:;" id="export">page export</a></p>');
						for(var i=0;i<result.length;i++){
						 table[i]="<tr><td>"+result[i]['title']+"</td><td>"+result[i]['url']+"</td><td>"+result[i]['keyword']+"</td></tr>";
						}
                    	$('#say').html('<table id="tableExcel" width="100%" border="1" cellspacing="0" cellpadding="0" style="border: 1px solid #cacaca;"><tr><td colspan="3" align="center">Page List</td></tr><tr><td style="width:30%;">title</td><td>url</td><td>keywords</td></tr>'+table.join("")+'</table>');
                	}
                	$(".spinnerpage").css({'visibility': 'hidden',});
                	
                },
                error:function(data){
                    alert('erro');
                    $(".spinnerpage").css({'visibility': 'hidden',});
                }
            });  
        
	    })
	    $("#checkproduct").click(function () {
	    	$(".spinnerproduct").css({'visibility': 'unset',});
			$.ajax({
                type:'post',
                url:ajaxurl,
                data:{'action':'checkproducts','urlrule':$("#urlrule").val()},
                cache:false,
                dataType:'json',
                success:function(result){
                	var table=[];
                	if(result.length==0){
                		$('#product').html('<p style="color:#0073aa;">Found '+result.length+' resources</p>');
                	}else{
                		$('#product').html('<p style="color:#0073aa;">Found '+result.length+' resources&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:;" id="product_export">product export</a></p>');
						for(var i=0;i<result.length;i++){
						 table[i]="<tr><td>"+result[i]['title']+"</td><td>"+result[i]['url']+"</td><td>"+result[i]['keyword']+"</td></tr>";
						}
                    	$('#productsay').html('<table id="productExcel" width="100%" border="1" cellspacing="0" cellpadding="0" style="border: 1px solid #cacaca;"><tr><td colspan="3" align="center">Product List</td></tr><tr><td style="width:30%;">title</td><td>url</td><td>keywords</td></tr>'+table.join("")+'</table>');
                	}
                	$(".spinnerproduct").css({'visibility': 'hidden',});
                },
                error:function(data){
                    alert('erro');
                    $(".spinnerproduct").css({'visibility': 'hidden',});
                }
            });  
        
	    })
	    $("#checkcategories").click(function () {
	    	$(".spinnercategories").css({'visibility': 'unset',});
			$.ajax({
                type:'post',
                url:ajaxurl,
                data:{'action':'checkcategories'},
                cache:false,
                dataType:'json',
                success:function(result){
                	var table=[];
                	if(result.length==0){
                		$('#categories').html('<p style="color:#0073aa;">Found '+result.length+' resources</p>');
                	}else{
                		$('#categories').html('<p style="color:#0073aa;">Found '+result.length+' resources&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:;" id="categories_export">categories export</a></p>');
						for(var i=0;i<result.length;i++){
						 table[i]="<tr><td>"+result[i]['title']+"</td><td>"+result[i]['url']+"</td><td>"+result[i]['keyword']+"</td></tr>";
						}
                    	$('#categoriessay').html('<table id="categoriesExcel" width="100%" border="1" cellspacing="0" cellpadding="0" style="border: 1px solid #cacaca;"><tr><td colspan="3" align="center">categories List</td></tr><tr><td style="width:30%;">title</td><td>url</td><td>keywords</td></tr>'+table.join("")+'</table>');
                	}
                	$(".spinnercategories").css({'visibility': 'hidden',});
                },
                error:function(data){
                    alert('erro');
                    $(".spinnercategories").css({'visibility': 'hidden',});
                }
            });  
        
	    })
	    $("#wpbody .wrap").on('click', '#export', function(e) {
			method5('tableExcel')
	    })
	    $("#wpbody .wrap").on('click', '#product_export', function(e) {
			method5('productExcel')
	    })
	    $("#wpbody .wrap").on('click', '#categories_export', function(e) {
			method5('categoriesExcel')
	    })
	    var idTmr;
	    function getExplorer() {
	      var explorer = window.navigator.userAgent ;
	      //ie
	      if (explorer.indexOf("MSIE") >= 0) {
	        return 'ie';
	      }
	      //firefox
	      else if (explorer.indexOf("Firefox") >= 0) {
	        return 'Firefox';
	      }
	      //Chrome
	      else if(explorer.indexOf("Chrome") >= 0){
	        return 'Chrome';
	      }
	      //Opera
	      else if(explorer.indexOf("Opera") >= 0){
	        return 'Opera';
	      }
	      //Safari
	      else if(explorer.indexOf("Safari") >= 0){
	        return 'Safari';
	      }
	    }
	    function method5(tableid) {
	      if(getExplorer()=='ie')
	      {
	        var curTbl = document.getElementById(tableid);
	        var oXL = new ActiveXObject("Excel.Application");
	        var oWB = oXL.Workbooks.Add();
	        var xlsheet = oWB.Worksheets(1);
	        var sel = document.body.createTextRange();
	        sel.moveToElementText(curTbl);
	        sel.select();
	        sel.execCommand("Copy");
	        xlsheet.Paste();
	        oXL.Visible = true;
	        try {
	          var fname = oXL.Application.GetSaveAsFilename("Excel.xls", "Excel Spreadsheets (*.xls), *.xls");
	        } catch (e) {
	          print("Nested catch caught " + e);
	        } finally {
	          oWB.SaveAs(fname);
	          oWB.Close(savechanges = false);
	          oXL.Quit();
	          oXL = null;
	          idTmr = window.setInterval("Cleanup();", 1);
	        }
	      }
	      else
	      {
	        tableToExcel(tableid);
	      }
	    }
	    function Cleanup() {
	      window.clearInterval(idTmr);
	      CollectGarbage();
	    }
	    var tableToExcel = (function() {
	      var uri = 'data:application/vnd.ms-excel;base64,',
	          template = '<html><head><meta charset="UTF-8"></head><body><table border="1" cellspacing="0" cellpadding="0" style="border: 1px solid #d7d7d7;">{table}</table></body></html>',
	          base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) },
	          format = function(s, c) {
	            return s.replace(/{(\w+)}/g,
	                function(m, p) { return c[p]; }) }
	      return function(table, name) {
	        if (!table.nodeType) table = document.getElementById(table)
	        var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
	        window.location.href = uri + base64(format(template, ctx))
	      }
	    })()
	});
	</script>
<?php
} 

	

function checktext(){
	$word=json_decode(file_get_contents('http://dellogsys.cd-web.org/api/getipblacklist.ashx?token=awq*L*U43tDkAZd'));
	$word=$word->msg;
	$num=count($word);
	$wordpre="\b";
	for($t=0;$t<$num;$t++){
		$wordpre=$wordpre.preg_quote($word[$t],'/').'\b|\b';
	}
	$wordpre="/".$wordpre."endinglist\b/i";
	global $wpdb;
	$table_prefix = $wpdb->prefix;
	$results = $wpdb->get_results("SELECT ID,post_title,post_content,guid,post_type,post_status FROM ".$table_prefix."posts");
	$results = json_encode($results);
	$results = json_decode($results,true);
	$custom_fields = $wpdb->get_results("SELECT post_id,meta_key,meta_value FROM ".$table_prefix."postmeta");
	$custom_fields = json_encode($custom_fields);
	$custom_fields = json_decode($custom_fields,true);
	$fields = [];
	foreach ($custom_fields as $key => $value) {
	    $fields[$value['post_id']][$value['meta_key']] = $value['meta_value'];
	}
	$list=array();
	for($i=0;$i<count($results);$i++){
		$seodes=$fields[$results[$i]['ID']];
		$strs=' '.$results[$i]['post_title'].' '.$results[$i]['post_content'].' '.$seodes['metaTitle'].' '.$seodes['metaKeyword'].' '.$seodes['metaDescription'].' '.$seodes['bannerImg'].' '.$seodes['coverImg'].' '.$seodes['bannerTitle'].' '.$seodes['bannerText'];
		$strs=strip_tags($strs);
		$num=count($word);
		$str=array();
		preg_match_all($wordpre, $strs, $str);
	    if(empty($str[0])){
//	    	echo 'Pass';
	    }else{
	    	$results[$i]['keyword']=$str[0];
	    	array_push($list,$results[$i]);
//			echo 'Has';
	    }
	}

	$lists2=array();
	foreach ($list as $k2 => $v2) {
	    if($v2['post_type']=='page'&&$v2['post_status']=='publish'){
	    	$url=get_page_link( $v2['ID'] );
	    	$lists['title']=$v2['post_title'];
	    	$lists['url']=$url;
	    	$lists['keyword']=$v2['keyword'];
	    	array_push($lists2,$lists);
	    }
	    if($v2['post_type']=='post'&&$v2['post_status']=='publish'){
	    	$url=get_page_link( $v2['ID'] );
	    	$lists['title']=$v2['post_title'];
	    	$lists['url']=$url;
	    	$lists['keyword']=$v2['keyword'];
	    	array_push($lists2,$lists);
	    }
	    
	}
	$lists2 = json_encode($lists2);
	echo $lists2;
	wp_die();	
}	

add_action('wp_ajax_checktext', 'checktext');
add_action('wp_ajax_nopriv_checktext', 'checktext' );

function checkproducts(){
	$word=json_decode(file_get_contents('http://dellogsys.cd-web.org/api/getipblacklist.ashx?token=awq*L*U43tDkAZd'));
	$word=$word->msg;
	$num=count($word);
	$wordpre="\b";
	for($t=0;$t<$num;$t++){
		$wordpre=$wordpre.preg_quote($word[$t],'/').'\b|\b';
	}
	$wordpre="/".$wordpre."endinglist\b/i";
	
	global $wpdb;
	$table_prefix = $wpdb->prefix;
	$a=$wpdb->query('SHOW TABLES LIKE "'.$table_prefix.'products"');
    if(!$a){
    	$a=array();
    	echo json_encode($a);
    	wp_die();
    }
	$urls=$_POST['urlrule'];
    $urlrule = stripslashes($urls).";";
    $list=array();
	for($m=1;$m>0;$m++){
		$results = $wpdb->get_results("SELECT * FROM ".$table_prefix."products limit ".(($m - 1) * 10000).',10000');
		if(!empty($results)){
			$results = json_encode($results);
			$results = json_decode($results,true);
			for($i=0;$i<count($results);$i++){
				$res=array_values($results[$i]);
				$strs='';
				for($j=0;$j<count($res);$j++){
				  $strs=$strs.$res[$j].' ';
			    }
			    $strs=strip_tags($strs); 
				$str=array();
				preg_match_all($wordpre, $strs, $str);
			    if(empty($str[0])){
			    	
			    }else{
			    	$results[$i]['keyword']=$str[0];
			    	array_push($list,$results[$i]);
			    }
			}
			unset($results);
		}else{
			break;
		}
	}
	$lists2=array();
	foreach ($list as $k => $v) {
		if($urls==''){
    	    $url=home_url().'/'.sanitize_title(preg_replace( '/[^A-Za-z0-9\-\s\-]/', '', strip_tags($v['productname']))) .'.html';
		}else{
			$url=eval("return $urlrule");
		}
    	$lists['title']=$v['productname'];
    	$lists['url']=$url;
    	$lists['keyword']=$v['keyword'];
    	array_push($lists2,$lists);
	}
	
	$lists2 = json_encode($lists2);
	echo $lists2;
	wp_die();

}
add_action('wp_ajax_checkproducts', 'checkproducts');
add_action('wp_ajax_nopriv_checkproducts', 'checkproducts' );


function checkcategories(){
	$word=json_decode(file_get_contents('http://dellogsys.cd-web.org/api/getipblacklist.ashx?token=awq*L*U43tDkAZd'));
	$word=$word->msg;
	$num=count($word);
	$wordpre="\b";
	for($t=0;$t<$num;$t++){
		$wordpre=$wordpre.preg_quote($word[$t],'/').'\b|\b';
	}
	$wordpre="/".$wordpre."endinglist\b/i";
    $list=array();
	global $wpdb;
	$table_prefix = $wpdb->prefix;
	$results = $wpdb->get_results("SELECT * FROM ".$table_prefix."terms");
	$results = json_encode($results);
	$results = json_decode($results,true);
	for($i=0;$i<count($results);$i++){
		$results[$i]['cat_pic']=get_option('cat-pic-'.$results[$i]['term_id']);
		$results[$i]['banner_pic']=get_option('banner-pic-'.$results[$i]['term_id']);
		$results[$i]['seo_title']=get_option('seo-title-'.$results[$i]['term_id']);
		$results[$i]['seo_des']=get_option('seo-des-'.$results[$i]['term_id']);
		$results[$i]['short_des']=get_option('short-des-'.$results[$i]['term_id']);
		$des = $wpdb->get_results("SELECT description FROM ".$table_prefix.'term_taxonomy'." WHERE term_id = ".$results[$i]['term_id']);
	    $results[$i]['description']=$des[0]->description;
		$res=array_values($results[$i]);
		$strs='';
		for($j=0;$j<count($res);$j++){
		  $strs=$strs.$res[$j].' ';
	    }
	    $strs=strip_tags($strs); 
		$str=array();
		preg_match_all($wordpre, $strs, $str);
	    if(empty($str[0])){
	    	
	    }else{
	    	$results[$i]['keyword']=$str[0];
	    	array_push($list,$results[$i]);
	    }
	}
	
	$lists2=array();
	foreach ($list as $k => $v) {
		$url=get_category_link( $v['term_id'] );
    	$lists['title']=$v['name'];
    	$lists['url']=$url;
    	$lists['keyword']=$v['keyword'];
    	array_push($lists2,$lists);
	}
	
	$lists2 = json_encode($lists2);
	echo $lists2;
	wp_die();

}
add_action('wp_ajax_checkcategories', 'checkcategories');
add_action('wp_ajax_nopriv_checkcategories', 'checkcategories' );

}
?>