<link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/client/css/home/home.css">
<link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/client/css/slide/slide-slip.css">
<link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/client/css/product/view_product.css">
<link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/client/css/product/list_product.css">
<section class="body-3">
    <div class="right-body">
        <div class="title-new-product">
            <?php
            echo  !empty($title)?$title:'No title';
            ?>
        </div>
        <ul class="list-product">
            <?php
            if (!empty($products)) {
                foreach ($products as $items) {
                    echo '
                        <li class="product-item">
                        <div class="top-product">
                           <a href=' . _WEB_ROOT . 'product/product_detail?id=' . $items['sp_id'] . '' . '>
                           <img src="' . _WEB_ROOT . '/public/imgs/product/' . $items['avatar'] . '" alt="" class="img img-main">
                           <img src="' . _WEB_ROOT . '/public/imgs/product/' . $items['sub_avatar'] . '" alt="" class="img img-zoom">
                           </a>
                            <div class="action">
                                <div class="list-action">
                                    <div class="action-item view-more">
                                        <ion-icon name="eye-outline"></ion-icon>
                                    </div>
                                    <div class="action-item add-cart">
                                        <ion-icon name="cart-outline"></ion-icon>
                                    </div>
                                </div>
                            </div>
                            <div class="like">
                                <ion-icon name="heart-outline"></ion-icon>
                                <input type="hidden" value="Đăng nhập trước" class="tag-info">
                            </div>
                            <div class="select-add-cart">
                                <div class="point-close"><ion-icon name="close-outline"></ion-icon></div>
                                <div class="action-add-cart">
                                    <div class="color select-color ">
                                        <div class="title-color">
                                            <p>Màu:</p><span class="current-color">Nâu</span>
                                        </div>
                                        <div class="list-color-product">
                                            <div class="color-item active">
                                                <div class="border"></div>
                                            </div>
                                            <div class="color-item">
                                                <div class="border"></div>
                                            </div>
                                            <div class="color-item">
                                                <div class="border"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="size size-product-view">
                                        <div class="title">
                                            <p>Size: </p><span class="current-size">L</span>
                                        </div>
                                        <div class="list-size">
                                            ';
                    foreach ($items['sizes'] as $value) {
                        echo '<div class="size-item">' . $value . '</div>';
                    }
                    echo '
                                        </div>
                                    </div>
                                    <div class="total-price">
                                        <div class="price"><span class="price-number">' . number_format($items['sp_gia'], 0, ',', '.') . '</span><span>VND</span></div>
                                    </div>
                                    <div class="add-cart form-quantity">
                                        <div class="quantity">
                                            <div class="input">
                                                <div class="prve quantity-item">-</div>
                                                <input class="number quantity-item" value="1" min="1" type="text">
                                                <div class="next quantity-item">+</div>
                                            </div>
                                        </div>
                                        <div class="btn-confirm">
                                            Thêm vào giỏ hàng
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-product">
                            <h4 class="name-product">' . $items['sp_ten'] . '</h4>
                            <div class="des-product">
                                <p class="price-product"><span>' . number_format($items['sp_gia'], 0, ',', '.') . '</span> <span>VND</span></p>
                                <div class="list-color-product">
                                    <div class="color-item">
                                    </div>
                                    <div class="color-item">
                                    </div>
                                    <div class="color-item">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" class="id-product" value="' . $items['sp_id'] . '">
                    </li>
                        ';
                }
            }
            ?>
        </ul>
        <div class="btn-see-more">
            xem thêm
            <div class="background"></div>
        </div>
    </div>
    <div class="body-view-product">
        <div class="close-body"></div>
        <div class="container-view ">
            <div class="left-container">
                <div class="slide-slip">
                    <div class="slide-wrap">
                        <div class="slide-slip-items">
                            <img src="<?php echo _WEB_ROOT ?>/public/client/img/product/product-2/img-1-1.jpg" alt="">
                        </div>
                        <div class="slide-slip-items">
                            <img src="<?php echo _WEB_ROOT ?>/public/client/img/product/product-2/img-1-2.jpg" alt="">
                        </div>
                        <div class="slide-slip-items">
                            <img src="<?php echo _WEB_ROOT ?>/public/client/img/product/product-2/img-1-3.jpg" alt="">
                        </div>
                        <div class="slide-slip-items">
                            <img src="<?php echo _WEB_ROOT ?>/public/client/img/product/product-2/img-1-4.jpg" alt="">
                        </div>
                        <div class="slide-slip-items">
                            <img src="<?php echo _WEB_ROOT ?>/public/client/img/product/product-2/img-1-5.jpg" alt="">
                        </div>
                        <div class="slide-slip-items">
                            <img src="<?php echo _WEB_ROOT ?>/public/client/img/product/product-2/img-1-6.jpg" alt="">
                        </div>
                    </div>
                    <div class="controller ctrl-1">
                        <div class="btn btn-prve"><ion-icon name="chevron-back-outline"></ion-icon></div>
                        <div class="btn btn-next"><ion-icon name="chevron-forward-outline"></ion-icon></div>
                    </div>
                    <div class="controller ctrl-2">
                        <div class="dots active"></div>
                        <div class="dots"></div>
                        <div class="dots"></div>
                        <div class="dots"></div>
                        <div class="dots"></div>
                        <div class="dots"></div>
                    </div>
                </div>
            </div>
            <div class="right-container">
                <div class="close"><ion-icon name="close-outline"></ion-icon></div>
                <div class="info-product">
                    <div class="top-info">
                        <h3 class="name-product">
                            san pham 1
                        </h3>
                        <div class="evaluate">
                            <div class="star">
                                <ion-icon name="star-sharp"></ion-icon>
                                <ion-icon name="star-sharp"></ion-icon>
                                <ion-icon name="star-sharp"></ion-icon>
                                <ion-icon name="star-sharp"></ion-icon>
                                <ion-icon name="star-sharp"></ion-icon>
                            </div>
                            <div class="content-evaluate">
                                <span>3</span>
                                <p>Đánh giá</p>
                            </div>
                        </div>
                        <div class="price-product">
                            <span>500,000</span><span>VND</span>
                        </div>
                        <div class="des-product">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Impedit, mollitia! Quod, placeat neque alias doloribus dolorem non atque quos, et a odit numquam veniam voluptate, optio perferendis est corrupti enim!
                        </div>
                        <a href="#" class="to-detail">Xem chi tiết <ion-icon name="chevron-forward-outline"></ion-icon></a>
                    </div>
                    <div class="center-info">
                        <div class="color select-color ">
                            <div class="title-color">
                                <p>Màu:</p><span class="current-color">Nâu</span>
                            </div>
                            <div class="list-color-product">
                                <div class="color-item active">
                                    <div class="border"></div>
                                </div>
                                <div class="color-item">
                                    <div class="border"></div>
                                </div>
                                <div class="color-item">
                                    <div class="border"></div>
                                </div>
                            </div>
                        </div>
                        <div class="size size-product-view">
                            <div class="title">
                                <p>Size: </p><span class="current-size">L</span>
                            </div>
                            <div class="list-size">
                                <div class="size-item">M</div>
                                <div class="size-item active">L</div>
                                <div class="size-item">XL</div>
                            </div>
                        </div>
                        <div class="total-price">
                            <div class="old-price"><span>450,000 <span>VND</span></span></div>
                            <div class="price"><span>400000</span><span>VND</span></div>
                            <div class="sale">-9%</div>
                        </div>
                        <div class="add-cart form-quantity">
                            <div class="quantity">
                                <div class="input">
                                    <div class="prve quantity-item">-</div>
                                    <input class="number quantity-item" value="1" min="1" type="text">
                                    <div class="next quantity-item">+</div>
                                </div>
                                <div class="btn">
                                    Thêm vào giỏ hàng
                                </div>
                            </div>
                            <div class="btn-confirm">
                                Mua ngay
                            </div>
                        </div>
                    </div>
                    <div class="bottom-info">
                        <div class="pay">
                            <img src="<?php echo _WEB_ROOT ?>/public/client/img/product-details/img.png" alt="" class="img">
                        </div>
                        <div class="contact-us">
                            <div class="text">Share: </div>
                            <div class="list-icon">
                                <ion-icon name="logo-facebook"></ion-icon>
                                <ion-icon name="logo-twitter"></ion-icon>
                                <ion-icon name="logo-google"></ion-icon>
                                <ion-icon name="logo-pinterest"></ion-icon>
                                <ion-icon name="mail-outline"></ion-icon>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<script src="<?php echo _WEB_ROOT ?>/public/client/js/product/Product.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/client/js/product/cart/show.js"></script> <!--1-->
<script src="<?php echo _WEB_ROOT ?>/public/client/js/product/cart/color.js"></script> <!--2-->
<script src="<?php echo _WEB_ROOT ?>/public/client/js/product/cart/size.js"></script><!--3-->
<script src="<?php echo _WEB_ROOT ?>/public/client/js/product/cart/input.js"></script><!--4-->
<script src="<?php echo _WEB_ROOT ?>/public/client/js/product/function_card/sale.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/client/js/product/function_card/describe.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/client/js/product/view/show.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/client/js/product/view/color.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/client/js/product/view/size.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/client/js/product/view/input.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/client/js/product/view/slide.js"></script>