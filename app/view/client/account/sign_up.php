<link rel="stylesheet" href="<?php echo _WEB_ROOT?>/public/client/css/account/acount.css">
<div class="container banner">
    <div class="main-body">
        <h2 class="title">Đăng ký tài khoản</h2>
        <div class="form-sign-up">
            <input type="hidden" class="__WEB_ROOT" value="<?php echo _WEB_ROOT?>">
            <form onsubmit="return false" class="form-value-sign-up" method='post' action="<?php _WEB_ROOT?>/account/handle_sign_up">
                <div class="group-input">
                    <input type="text" name="kh_ten" placeholder="Họ và Tên" class="user-name input-signup">
                    <span class="erorr"></span>
                    <div class="line"></div>
                </div>
                <div class="group-input">
                    <input type="text" name="kh_taikhoan" placeholder="Tên Đăng nhập" class="user-name input-signup">
                    <span class="erorr"></span>
                    <div class="line"></div>
                </div>
                <div class="group-input">
                    <input type="mail" name="kh_email" placeholder="Email" class="mail input-signup">
                    <span class="erorr"></span>
                    <div class="line"></div>
                </div>
                <div class="group-input">
                    <input type="text" name="kh_sdt" placeholder="Số điện thoại" class="phone input-signup">
                    <span class="erorr"></span>
                    <div class="line"></div>
                </div>
                <div class="group-input">
                    <input type="password" name="kh_matkhau" placeholder="Mật khẩu" class="password input-signup">
                    <span class="erorr"></span>
                    <div class="line"></div>
                </div>
                <div class="group-input">
                    <input type="password" name="passwordConfirm" placeholder="Nhập lại mật khẩu" class="pw-confirm input-signup">
                    <span class="erorr"></span>
                    <div class="line"></div>
                </div>

                <div class="remember note">
                    <input type="checkbox"><span>Tôi đồng ý với các điều khoản và điều kiện, chính sách bảo mật và chính sách cookie</span>
                </div>
                <div class="confirm">
                    <a href="#" class="forget"></a>
                    <input type="submit" class="confirm-sign-up" name='confirmSignUp' value="Đăng ký">
                </div>
            </form>
        </div>
    </div>
</div>
<script src='<?php echo _WEB_ROOT?>/public/client/js/account/sign_up.js'></script>