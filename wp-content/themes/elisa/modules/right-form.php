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
<style>
    .inquiry-form>.row-layout div {
        width: auto;
    }
    .navi-layout .inquiry-form>.row-layout {
        justify-content: space-between;
        margin: 0;
        flex-direction: column;
        align-items: unset;
    }

</style>
<div class="navi-layout">
    <h3 class="file-title">Online Inquiry</h3>

    <form id="form-inquiry" name="form-inquiry" class="inquiry-form" method="post" action="<?php echo home_url();?>/pub.html">
        <div class="row-layout">
            <div>
                <label>*Name:</label>
                <input type="text" placeholder="Name:" name="fullname" class="validate[required]">
            </div>
            <div>
                <label>*E-mail:</label>
                <input type="text" placeholder="E-mail:" name="email" class="validate[required,custom[email]]">
            </div>
        </div>
        <div class="row-layout">
            <div>
                <label>*Phone:</label>
                <input type="text" placeholder="Phone:" name="phone" class="validate[required]">
            </div>
            <div>
                <label>*Services Interested:</label>
                <input type="text" placeholder="Products/Services Interested:" name="services" class="validate[required]" value="<?php echo apply_filters('custom-inquiry-title','');?>">
            </div>
        </div>
        <div class="column-layout">
            <label>Project Description:</label>
            <textarea rows="4" name="description" placeholder="Project Description:"></textarea>
        </div>

        <div class="nomain-row-layout" style="justify-content: flex-start;align-items: flex-end;">
            <div style="display: inline-block">
                <label>*Verification Code:</label>
                <input type="text" name="code" placeholder="Verification Code" class="validate[required,ajax[ajaxCaptcha]]">
            </div>
            <div style="display: inline-block">
                <img  src="<?php echo home_url();?>/?captcha=1&amp;r=1010437475" style="width:120px;height:40px;vertical-align:middle;cursor:pointer;margin-bottom:10px;" onclick="javascript: this.src = 'http://kinase-phosphatase-biology.141154.cd-web.org/?captcha=1&amp;r=' + Math.random()" alt="Verification code" title="Click refresh">
                <input type="hidden" name="act" value="send">
            </div>
        </div>
        <input type="hidden" name="act" value="send">
        <button type="submit" class="circle-btn">SEND</button>
    </form>
</div>