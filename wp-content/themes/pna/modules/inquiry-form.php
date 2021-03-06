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

 <form id="form-inquiry" class="inquiry-form" autocomplete="off" method="post"  action="<?php echo home_url();?>/pub.html">
                <div>
                    <label>*Name</label>
                    <input type="text" name="fullname" class="validate[required]" placeholder="Your Name">
                </div>
                <div>
                    <label>*Phone</label>
                    <input type="text"  name="phone" class="validate[required]" placeholder="Phone Number">
                </div>
                <div>
                    <label>*E-mail Address:</label>
                    <input type="text" name="email" class="validate[required,custom[email]]" placeholder="E-mail Address">
                </div>
                <div>
                    <label>* Products or Services Interested:</label>
                    <input type="text"  name="services" value="<?php echo apply_filters('custom-inquiry-title','');?>" class="validate[required]" placeholder="Products or Services Interested">
                </div>
                <div>
                    <label>Project Description:</label>
                    <textarea name="description" placeholder="Project Description"></textarea>
                </div>
                <div>
                    <label>*Verification Code:</label>
                    <input type="text" class="validate[required,ajax[ajaxCaptcha]]" name="code" placeholder="Verification Code">
                </div>
                <div>
                            <img src="<?php echo home_url();?>/?captcha=1&r=927837190" style="width:120px;height:34px;vertical-align:middle;cursor:pointer;margin-top:30px;" onclick="javascript: this.src = '<?php echo home_url();?>/?captcha=1&r=' + Math.random()" alt="Verification code" title="Click refresh">
                </div>
                <div>
				  <input type="hidden" name="act" value="send">
                    <button   type="submit"  class="banner-btn" style="width:140px;">Submit</button>
                </div>
            </form>


