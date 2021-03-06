<link href="<?php  echo get_template_directory_uri()?>/css/validationEngine.jquery.css" rel="stylesheet" type="text/css">
<script src="<?php echo get_template_directory_uri();?>/js/jquery.validationEngine-en.js"></script>
<script src="<?php echo get_template_directory_uri();?>/js/jquery.validationEngine.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        // binds form submission and fields to the validation engine
        $("#form-inquiry").validationEngine({promptPosition:'topLeft',scroll:false});

        $("#form-inquiry").bind("jqv.form.validating", function (event) {
            $("#hookError").html("");
        });
        $("#form-inquiry").bind("jqv.form.result", function (event, errorFound) {
            if (errorFound) $("#hookError").append("There is some problems with your form");
        });
    });
</script>

<form id="form-inquiry" name="form-inquiry" autocomplete="off" class="inquiry_form" method="post" action="<?php echo home_url();?>/pub.html">
    <ul class="row">
        <li class="col-md-6">
            <label>* Name:</label>
            <input type="text" name="fullname" class="validate[required]" placeholder="Name">
        </li>
        <li class="col-md-6">
            <label>* Phone:</label>
            <input type="text" name="phone" class="validate[required]" placeholder="Phone">
        </li>
        <li class="col-md-6">
            <label>* Email:</label>
            <input type="text" name="email" class="validate[required,custom[email]]" placeholder="Email">
        </li>
        <li class="col-md-6">
            <label>* Products or Services of Interest:</label>
            <input type="text" name="services" class="validate[required]" value="<?php echo apply_filters('custom-inquiry-title','');?>" placeholder="Products or Services of Interest">
        </li>
        <li class="col-md-12">
            <label>Project Description:</label>
            <textarea name="description" cols="40" rows="6" placeholder="Project Description"></textarea>
        </li>
        <li class="col-md-6 verification-code">
            <label>* Verification Code:</label>
            <input type="text" class="validate[required,ajax[ajaxCaptcha]]" name="code" size="15" placeholder="Verification Code">
            <img src="<?php echo home_url();?>/?captcha=1&r=927837190" style="width:120px;height:34px;vertical-align:middle;cursor:pointer;" onclick="javascript: this.src = '<?php echo home_url();?>/?captcha=1&r=' + Math.random()" alt="Verification code" title="Click refresh">
        </li>
        <li class="col-md-12">
            <input type="hidden" name="act" value="send">
            <button class="submit" type="submit">Submit</button>
        </li>
        <div class="clear"></div>
    </ul>
</form> 