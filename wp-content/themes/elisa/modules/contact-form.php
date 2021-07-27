
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
            <div class="form-group col-md-2 col-md-offset-5">
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