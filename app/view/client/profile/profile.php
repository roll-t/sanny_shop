<div class="container profile">
    <div class="left">
        <div class="avatar">
            <div class="img">
                <img src="./img/avatar_65d700ed8dbed.png" alt="">
            </div>
            <div class="des">
                <h5>Phạm phước Trường</h5>
                <a href="#" class="edit">
                    <ion-icon name="pencil-outline"></ion-icon>
                    <h5>sửa hồ sơ</h5>
                </a>
            </div>
        </div>
        <div class="menu">
            <div class="menu-items active">
                <div class="title">
                    <ion-icon name="person-outline"></ion-icon>
                    <h5>tài khoản của tôi</h5>
                </div>
                <div class="list">
                    <a href="<?php echo _WEB_ROOT?>/profile/profile_info" class="items">
                        hồ sơ
                    </a>
                    <a href="<?php echo _WEB_ROOT?>/profile" class="items">
                        Ngân hàng
                    </a>
                    <a href="<?php echo _WEB_ROOT?>/profile" class="items">
                        Địa chỉ
                    </a>
                    <a href="<?php echo _WEB_ROOT?>/profile" class="items">
                        Đổi mật khẩu
                    </a>
                    <a href="<?php echo _WEB_ROOT?>/profile" class="items">
                        Đăng xuất
                    </a>
                </div>
            </div>
            <div class="menu-items">
                <div class="title">
                    <ion-icon name="reader-outline"></ion-icon>
                    <h5>Đơn mua</h5>
                </div>
            </div>
            <div class="menu-items">
                <div class="title">
                    <ion-icon name="notifications-outline"></ion-icon>
                    <h5>tài khoản của tôi</h5>
                </div>
                <div class="list">
                    <div class="items">
                        Cập nhật đơn hàng
                    </div>
                    <div class="items">
                        Khuyến mãi
                    </div>
                </div>
            </div>
            <div class="menu-items">
                <div class="title">
                    <ion-icon name="receipt-outline"></ion-icon>
                    <h5>Voucher</h5>
                </div>
            </div>

        </div>
    </div>
    <div class="right">
        <div class="menu">
            <li class="menu-items active">
                <a href="#">Tất cả</a>
            </li>
            <li class="menu-items">
                <a href="#">chờ thanh toán</a>
            </li>
            <li class="menu-items">
                <a href="#">Vận chuyển</a>
            </li>
            <li class="menu-items">
                <a href="#">Chờ giao hàng <span>(1)</span></a>
            </li>
            <li class="menu-items">
                <a href="#">Hoàn thành</a>
            </li>
            <li class="menu-items">
                <a href="#">Đã hủy</a>
            </li>
            <li class="menu-items">
                <a href="#">Trả hàng/Hoàn tiền</a>
            </li>
        </div>
        <div class="main">
            <?php
            $this->view($profile_display);
            ?>
        </div>
    </div>
</div>
<script>
    const listSideBar = document.querySelectorAll('.container .left .menu-items')
    listSideBar.forEach(items => {
        const btn = items.querySelector(".title")
        btn.addEventListener('click', e => {
            items.classList.toggle('active')
        })
    })
</script>