
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
            <div class="form-group col-md-6">
                <input type="text" name="fullname" class="form-control" placeholder="Name">
            </div>
            <div class="form-group col-md-6">
                <input type="email" name="email" class="form-control validate[required,custom[email]]" placeholder="Email *">
            </div>
            <div class="form-group col-md-12">
                <textarea name="description" rows="3" class="form-control" placeholder="Message"></textarea>
            </div>
            <div class="form-group col-md-12">
                <div class="identify-box">
                    <input id="code1" maxlength="4" type="text" name="code" placeholder="Verification Code" class="validate[required]] form-control">
                    <span class="check-fa  icon-check checkright kright" style="display:none"></span>
                    <span class="check-fa  icon-false checkerror kerror" style="color: red;"></span>
                    <div style="display: inline-block">
                        <img  src="<?php echo home_url();?>/?captcha=1&amp;r=1010437475" style="width:120px;height:40px;vertical-align:middle;cursor:pointer;margin-bottom:10px;" onclick="javascript: this.src = 'http://kinase-phosphatase-biology.141154.cd-web.org/?captcha=1&amp;r=' + Math.random()" alt="Verification code" title="Click refresh">
                        <input type="hidden" name="act" value="send">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="inquiry-submit">SUBMIT</button>
            </div>
        </form>
<script>
    $("#code1").bind('input propertychange',function(){
        var value = $("#code1").val();
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
                    $(".kright").css("display","block");
                    $(".kerror").css("display","none");
                }else{
                    $(".kerror").css("display","block");
                    $(".kright").css("display","none");
                }
            }
        });
    })
</script>