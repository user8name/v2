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

<form class="inquiry-form" action="<?php echo home_url();?>/pub.html">
    <div class="row-layout">
        <div>
            <label>*Name:</label>
            <input type="text" placeholder="Name:">
        </div>
        <div>
            <label>*E-mail:</label>
            <input type="text" placeholder="E-mail:">
        </div>
    </div>
    <div class="row-layout">
        <div>
            <label>*Phone:</label>
            <input type="text" placeholder="Phone:">
        </div>
        <div>
            <label>*Services Interested:</label>
            <input type="text" placeholder="Services Interested:">
        </div>
    </div>
    <div>
        <label>Project Description:</label>
        <textarea rows="4"  placeholder="Project Description:"></textarea>
    </div>

    <div class="row-layout" style="justify-content: flex-start;align-items: flex-end;">
        <div>
            <label>*Verification Code:</label>
            <input type="text" class="validate[required,ajax[ajaxCaptcha]]" name="code" size="15" placeholder="Verification Code">
        </div>
        <img src="<?php home_url();?>/?captcha=1&r=927837190" style="width:120px;height:34px;vertical-align:middle;cursor:pointer;" onclick="javascript: this.src = '<?php home_url();?>/?captcha=1&r=' + Math.random()" alt="Verification code" title="Click refresh">
    </div>
    <button type="submit" class="circle-btn">SEND</button>
</form>