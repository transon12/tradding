<?php
/*
	Template Name: User - ResetPassword

*/

session_start();
$phone=$_SESSION['phone'];
$active=$_SESSION['actived'];

if(empty($phone) || $active==false || $active=='')
{
    $_SESSION['phone']='';
    $_SESSION['actived']=false;
    wp_safe_redirect(home_url('quen-mat-khau'));
    exit();
}else{

    if(isset($_POST['changepass']))
    {
         $pass1=$_POST['password'];
         $pass2=$_POST['passwordverify'];
         $data=get_user_by('login',$phone);
         $current_user=$data->ID;
        if($pass1==$pass2)
        {
            wp_set_password( $pass1, $current_user );
            wp_set_auth_cookie ( $current_user );
            wp_set_current_user( $current_user );
            wp_safe_redirect(home_url('dat-lai-mat-khau-thanh-cong'));
            exit();
        }else{
            $error="<div class='error'>Mật khẩu không giống nhau. Xin vui lòng nhập lại</div>";
        }

       }        
}
?>
<?php get_header(); 
the_post();
?>

<section class="adong-section-login">
    <div class="adong-form-login">

        <div class="adong-form-logo">
            <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/logo.png"
                    title="<?php echo get_bloginfo(); ?> Logo" alt="<?php echo get_bloginfo(); ?> Logo"
                    class="adong-logo">
            </a>
        </div>

        <div>
            <p class="adong-welcome" style="margin-top: 34px;">Cập nhật mật khẩu</p>
            <?php echo $error; ?>
            <div class="adong-login-input">
                <form action="" method="POST" id="loss-password">
                    <div class="form-outline toogle-password-outline">
                            <label class="form-label" for="password_login">Mật khẩu mới</label>
                            <div class="field-group">
                                <input type="password" id="password_login" name="password" class="form-control form-adong-input-password eye-disable" value="<?php echo $_POST['pass1']; ?>" placeholder="Mật khẩu" required/>
                                <span class="adong-toggle-password eye-disable">
                                    <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/eye.svg" alt="" class="eye-toggle">
                                </span>
                            </div>
                    </div>
                    <div class="form-outline toogle-password-outline">
                            <label class="form-label" for="password_login_verify">Xác nhận mật khẩu mới</label>
                            <div class="field-group">
                                <input type="password" id="password_login_verify" name="passwordverify" class="form-control form-adong-input-password eye-disable" value="<?php echo $_POST['pass2']; ?>" placeholder="Mật khẩu" required/>
                                <span class="adong-toggle-password eye-disable">
                                    <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/eye.svg" alt="" class="eye-toggle">
                                </span>
                            </div>
                    </div>
                    <button name="changepass" id="reset__pw__submit" type="submit" class="btn btn-primary btn-block adong-login-btn adong-login-submit" style="margin-top: 8px;">
                        Thay đổi mật khẩu
                    </button>
                </form>
            </div>
        </div>

    </div>
</section>


<div id="myModal" class="modal adong-form-login">
   <div class="modal-dialog">                         
        <div class="modal-content">
            <span class="close">
                <img class="svg-img" src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/close.svg" title="Close" alt="Close">
            </span>
            <div class="adong-login-success">
                <div class="adong-success-icon">
                    <span></span>
                    <img class="svg-img" src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/check.svg" title="Đặt lại mật khẩu thành công" alt="Đặt lại mật khẩu thành công">
                </div>
                <div class="adong-success-noitice">
                    <p style="font-size: 30px; font-weight: 600;margin-bottom: 8px;color: #101828;">Hoàn thành</p>
                    <p style="font-size: 18px; font-weight: 400; line-height: 28px; color: #344054; margin-bottom: 20px;">Chúng tôi đã gửi link cập nhật lại mật khẩu<br/>qua email của bạn. Vui lòng kiểm tra Email !</p>
                </div>
            </div>
            <button type="button" class="btn btn-primary btn-block adong-login-btn adong-login-submit btn-home-resend-success" style="margin-bottom: 32px">
                <img class="svg-img" src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/home.svg" title="icon-home" alt="icon-home" style="margin-right: 12px">
                <a href="<?php echo home_url(); ?>" style="color:#101828;"> Trang chủ</a>
            </button>
        </div>
    </div>
</div>

<script>
    var modal = document.getElementById("myModal");
    var span = document.getElementsByClassName("close")[0];

    span.onclick = function() {
        modal.style.display = "none";
    }
    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<?php get_footer(); ?>