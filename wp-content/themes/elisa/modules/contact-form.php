
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

        <form  id="form-inquiry"  name="form-inquiry" autocomplete="off" method="post" action="<?php echo home_url();?>/pub.html">
            <div class="form-group col-md-4">
                <input type="text" name="fullname" class="form-control" placeholder="Name">
            </div>
            <div class="form-group col-md-4">
                <input type="text" name="phone" class="form-control validate[required]" placeholder="Phone *">
            </div>
            <div class="form-group col-md-4">
                <input type="email" name="email" class="form-control validate[required,custom[email]]" placeholder="Email *">
            </div>
            <div class="form-group col-md-12">
                <input name="services" class="form-control validate[required]" placeholder="Services & Products Interested *">
            </div>
            <div class="form-group col-md-12">
                <textarea name="description" rows="4" class="form-control" placeholder="Project Description"></textarea>
            </div>
            <div class="form-group col-md-6">
                <div class="identify-box">
                    <input id="code" maxlength="4" type="text" class="validate[required]] form-control" name="code" placeholder="Verification Code *">
                    <span class="check-fa  icon-check checkright check1" style="display:none"></span>
                    <span class="check-fa  icon-false checkerror check2" style="color: red;"></span>
                    <img src="<?php echo home_url();?>/?captcha=1&r=927837190" style="width:120px;height:52px;cursor:pointer;" onclick="javascript: this.src = '<?php echo home_url();?>/?captcha=1&r=' + Math.random()" alt="Verification code" title="Click refresh">
                </div>
            </div>
            <div class="form-group col-md-2 col-md-offset-5">
                <input type="hidden" name="act" value="send">
                <button type="submit" class="inquiry-submit">SUBMIT</button>
            </div>
        </form>
<script>
    $("#code").bind('input propertychange',function(){
        var value = $("#code").val();
        var url = '<?php echo home_url();?>/wp-admin/admin-ajax.php';
        $.ajax({
            url : url,
            type : 'post',
            data : {
                action : 'verificationcaptcha',
                fieldValue :value,
            },
            success : function( response ) {
                if(response[1] == true){
                    $(".check1").css("display","block");
                    $(".check2").css("display","none");
                }else{
                    $(".check2").css("display","block");
                    $(".check1").css("display","none");
                }
            }
        });
    })
</script>