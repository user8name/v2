<form role="form" id="formID" name="" method="post" action="<?php echo home_url();?>/pub.html" autocomplete="off">
    <ul>
        <li>
            <label for="Name">Name:</label>
            <input type="text" placeholder="Name" name="fullname" id="I_Name">
        </li>
        <li>
            <label for="Phone">* Phone:</label>
            <input type="text" name="phone" id="I_Phone" placeholder="Phone" class="validate[required] text-input">
        </li>
        <li>
            <label for="Email">* Email: </label>
            <input type="text" placeholder="Email" name="email" id="email" class="validate[required,custom[email]] text-input">
        </li>
        <li>
            <label>* Products or Services Interested:</label>
            <input type="text" name="services" id="I_Subject" placeholder="Products or Services Interested" class="validate[required] text-input">
        </li>
        <li style="width: 100%;">
            <label>Project Description:</label>
            <textarea name="description" id="I_Message" placeholder="Project Description" cols="40" rows="6"></textarea>
        </li>
        <li>
            <label>* Verification Code:</label>
            <input maxlength="4" type="text" placeholder="Verification Code" class="validate[required] text-input" name="code" id="Verification" style="width: 50%; vertical-align: top;">
            <span class="check-fa  icon-check checkright check1" style="display:none"></span>
            <span class="check-fa  icon-false checkerror check2" style="color: red;"></span>
            <img src="<?php echo home_url();?>/?captcha=1&r=927837190" style="width:120px;height:46px;cursor:pointer;" onclick="javascript: this.src = '<?php echo home_url();?>/?captcha=1&r=' + Math.random()" alt="Verification code" title="Click refresh">
        </li>
        <input type="hidden" name="act" value="send">
        <li>&nbsp;</li>
        <li style="margin-top: 20px;"><button class="btn" type="submit">Submit</button></li>
    </ul>
</form>
<script type="text/javascript">jQuery(document).ready(function ()
    {
        jQuery("#formID").validationEngine('attach', { promptPosition: "bottomLeft" }); });
</script>
<script>
    $(function (){
        var codes = '';
        $("#Verification").bind('input propertychange',function(){
            var value = $("#Verification").val();
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
                        codes = response[2];
                        $("#Verification").css("color","green");
                    }else{
                        $("#Verification").css("color","red");
                    }
                }
            });
        });
        $("#formID").submit(function(){
            var val = $("#Verification").val();
            if(codes == val){

                return true;
            }else{
                alert('验证码错误')
                return false;
            }
        });
    })

</script>