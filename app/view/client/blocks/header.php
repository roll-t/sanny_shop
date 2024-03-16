<header id="top" class="header">
    <div class="headline">
        <div class="contact">
            <div class="left-contact">
                <ul class="list-icon">
                    <li class="icon-item"><a href="#">
                            <ion-icon name="logo-facebook"></ion-icon>
                        </a></li>
                    <li class="icon-item"><a href="#">
                            <ion-icon name="logo-twitter"></ion-icon>
                        </a></li>
                    <li class="icon-item"><a href="#">
                            <ion-icon name="logo-pinterest"></ion-icon>
                        </a></li>
                    <li class="icon-item"><a href="#">
                            <ion-icon name="logo-google"></ion-icon>
                        </a></li>
                    <li class="icon-item"><a href="#">
                            <ion-icon name="logo-instagram"></ion-icon>
                        </a></li>
                    <li class="icon-item call">
                        <div class="title">
                            Call:
                        </div>
                        <div class="number-phone">
                            0812600873
                        </div>
                    </li>
                </ul>
            </div>
            <div class="right-contact">
                hello
            </div>
        </div>
        <div class="site-header ">
            <nav class="menu">
                <li class="menu-item">
                    <a href="<?php echo _WEB_ROOT ?>/home">Trang chủ</a>
                </li>
                <li class="menu-item">
                    <a href="<?php echo _WEB_ROOT ?>/product">Sản phẩm</a>
                    <ion-icon name="chevron-down-outline"></ion-icon>
                    <div class="menu-level-2">
                        <div class="menu-level-2-items">
                            <a href="#">Áo</a>
                            <ion-icon name="chevron-down-outline"></ion-icon>
                            <div class="menu-level-3">
                                <div class="menu-level-3-items"><a href="#">áo thun</a></div>
                                <div class="menu-level-3-items"><a href="#">áo polo</a></div>
                                <div class="menu-level-3-items"><a href="#">áo sơ mi</a></div>
                            </div>
                        </div>
                        <div class="menu-level-2-items">
                            <a href="#">Quần</a>
                            <ion-icon name="chevron-down-outline"></ion-icon>
                            <div class="menu-level-3">
                                <div class="menu-level-3-items"><a href="#">quần dài</a></div>
                                <div class="menu-level-3-items"><a href="#">quần ngắn</a></div>
                            </div>
                        </div>
                        <div class="menu-level-2-items">
                            <a href="#">Áo khoác</a>
                            <ion-icon name="chevron-down-outline"></ion-icon>
                            <div class="menu-level-3">
                                <div class="menu-level-3-items"><a href="#">Hoodie</a></div>
                                <div class="menu-level-3-items"><a href="#">Cardigan</a></div>
                                <div class="menu-level-3-items"><a href="#">sweater</a></div>
                                <div class="menu-level-3-items"><a href="#">jacket</a></div>
                            </div>
                        </div>
                        <div class="menu-level-2-items">
                            <a href="#">phụ kiện</a>
                            <ion-icon name="chevron-down-outline"></ion-icon>
                            <div class="menu-level-3">
                                <div class="menu-level-3-items"><a href="#">nón</a></div>
                                <div class="menu-level-3-items"><a href="#">dép</a></div>
                                <div class="menu-level-3-items"><a href="#">túi xách</a></div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="menu-item">
                    <a href="#">Bài viết</a>
                </li>
                <li class="menu-item">
                    <a href="#">Liên hệ</a>
                </li>
            </nav>
            <div class="logo">
                <a href="<?php echo _WEB_ROOT ?>/home">
                    <img src="<?php echo _WEB_ROOT ?>/public/client/img/logo/logo.png" alt="">
                </a>
            </div>
            <div class="action">
                <div class="action-item search">
                    <form onsubmit="return false" action="#">
                        <input type="text" placeholder="">
                        <button><ion-icon name="search-outline"></ion-icon></button>
                    </form>
                </div>

                <div class="action-item to-profile">
                    <?php
                    if (!empty($user_login)) {
                        echo '<div class="li">
                                    <a href="' . _WEB_ROOT . '/profile"><ion-icon name="person"></ion-icon></a>
                                    <div class="fast-select">
                                        <div class="items"><a href="#">Tài khoản</a></div>
                                        <div class="items"><a href="#">Đơn mua</a></div>
                                        <div class="items"><a href="#">Đăng Xuất</a></div>
                                    </div>
                                </div>';
                    } else {
                        echo '<i class=" material-icons text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="No account">
                                    <a href="' . _WEB_ROOT . '/account"><ion-icon name="person-outline"></ion-icon></a>
                              </i>';
                    }
                    ?>

                </div>
                <div class="action-item">
                    <ion-icon name="heart-outline"></ion-icon>
                </div>
                <div class="action-item cart">
                    <div class="quantity-cart">0</div>
                    <ion-icon name="cart-outline"></ion-icon>
                </div>
            </div>
        </div>
    </div>
    <div class="body-cart">
        <div class="space-block"></div>
        <div class="main-body-cart">
            <div class="headline-cart">
                <div class="title">
                    <span class="cart-title">Giỏ Hàng</span>
                    <ion-icon name="close-outline"></ion-icon>
                </div>
                <div class="total-price">
                    <div class="total">Tổng tiền: </div>
                    <p class="sum-price">0</p><span>VND</span>
                </div>
            </div>
            <form method="post" action="<?php echo _WEB_ROOT . '/order' ?>">
                <div class="list-product-cart">
                </div>

                <div class="checkout">
                    <button type="submit">Thanh toán</button>
                </div>
            </form>
        </div>

    </div>
</header>