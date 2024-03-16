
<body>
    <div class="head">
        <div class="bg"><img src="<?php echo _WEB_ROOT?>/public/imgs/banner/banner.jpg" alt=""></div>
        <h2>sany cloth</h2>
    </div>
    <div class="container">
        <div class="left part">
            <div class="group-input">
                <div class="title-input">
                    <h3>Liên hệ</h3>
                    <span>
                        <span>Bạn có tài khoản đăng nhập?</span>
                        <a href="<?php echo _WEB_ROOT?>/account">Đăng nhập</a>
                    </span>
                </div>
                <input type="number" placeholder="Nhập vào số điện thoại">
            </div>
            <div class="group-input">
                <div class="title-input">
                    <h2>Giao Hàng</h2>
                </div>
                
               <select name="" id="">
                    <option value="" selected disabled>Chọn quốc gia</option>
                    <option value="">Quoc gia</option>
                    <option value="">Quoc gia</option>
                    <option value="">Quoc gia</option>
               </select>
            </div>
            <div class="group-input name">
                <input type="text" placeholder="Tên">
                <input type="text" placeholder="Họ">
            </div>
            <div class="group-input address">
                <input type="text" placeholder="Địa chỉ">
            </div>
            <div class="group-input name">
                <div class="title-input">
                    <p>+ Thêm căn hộ, dãy...</p>
                </div>
            </div>
            <div class="group-input name">
                <input type="text" placeholder="Thành Phố">
                <input type="text" placeholder="Mã bưa chính">
            </div>

            <div class="group-input ">
                <input type="number" placeholder="Điện thoại">
            </div>
            <div class="group-input check">
                <div>
                    <input type="checkbox" class="check">
                    <span>Lưu lại thông tin này cho lần sau</span>
                </div>
            </div>
            <div class="box-select">
                <div class="title-input">
                    <h4>Phương thức vận chuyển</h4>
                    <div class="main">
                        <div class="items active">
                            <div class="check">
                                <input name="sl-1" type="radio">
                                <label for="">Giao hàng tiêu chuẩn</label>
                            </div>
                            <div class="price">
                                <span>35000 </span>
                                <span>đ</span>
                            </div>
                        </div>
                        <div class="items">
                            <div class="check">
                                <input name="sl-1" type="radio">
                                <label for="">Giao hàng siêu hỏa tốc</label>
                            </div>
                            <div class="price">
                                <span>35000 </span>
                                <span>đ</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-select">
                <div class="title-input">
                    <h4>Thanh toán</h4>
                    <div class="main">
                        <div class="items active">
                            <div class="check">
                                <input name="sl-2" type="radio">
                                <label for="">Thanh toán khi nhận hàng</label>
                            </div>
                        </div>
                        <div class="items">
                            <div class="check">
                                <input name="sl-2" type="radio">
                                <label for="">Phương thức chuyển khỏan</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-select">
                <div class="title-input">
                    <h4>Địa chỉ thanh toán</h4>
                    <div class="main">
                        <div class="items active">
                            <div class="check">
                                <input name="sl-3" type="radio">
                                <label for="">Giống địa chỉ vận chuyển</label>
                            </div>
                        </div>
                        <div class="items">
                            <div class="check">
                                <input name="sl-3" type="radio">
                                <label for="">Sử dụng địa chỉ thanh toán khác</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn-confirm-order">Hoàn tất đơn hàng</button>
            <div class="copyright">Mọi quyền được bảo lưu Sany</div>
        </div>
        <div class="right part">
            <div class="main">
                <div class="list-order-detail">
                    <?php
                    if(!empty($orders)){
                       foreach($orders as $items){
                        echo '<div class="items">
                        <div class="img">
                            <img src="'._WEB_ROOT.'/public/imgs/product/'.$items['img'].'" alt="">
                            <div class="quantity">'.$items['quantity'].'</div>
                        </div>
                        <div class="content">
                            <div class="name">'.$items['product_info']['sp_ten'].'</div>
                            <div class="des"><span>'. number_format($items['product_info']['sp_gia'], 0, ',', '.') .'</span> <span>VND</span></div>
                            <div class="des"><span>'.$items['size'].' </span>/ <span>Black</span></div>
                        </div>
                        <div class="price"><span>'. number_format(($items['product_info']['sp_gia']*$items['quantity']), 0, ',', '.') .'</span> <span>VND</span></div>
                    </div>';
                       }
                    }
                    ?>
                    <div class="reduce-code">
                        <input type="text" placeholder="Mã giảm giá">
                        <button>Áp dụng</button>
                    </div>
                </div>
                <div class="total">
                    <div class="item">
                        <div class="left">Tổng Thu</div>
                        <div class="right"><span><?php echo number_format($payment['total']) ?></span><span>đ</span></div>
                    </div>
                    <div class="item">
                        <div class="left">Vận chuyển</div>
                        <div class="right"><span><?php echo number_format($payment['shipment_pay']) ?></span><span>đ</span></div>
                    </div>
                    <div class="item">
                        <h4 class="left title">Tổng</h4>
                        <div class="right"><span><?php echo number_format($payment['final_total']) ?></span><span>đ</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="body-address">
        <div class="space-close">
        </div>
        <div class="main">
            <div class="close"><ion-icon name="close-outline"></ion-icon></div>
            <div class="group-input">
                <label for="">Huận</label>
                <select name="" id="">
                    <option value="" selected disabled>Chọn Huận</option>
                    <option value="">chon 1</option>
                    <option value="">chon 1</option>
                    <option value="">chon 1</option>
                </select>
            </div>
            <div class="group-input">
                <label for="">Huyện</label>
                <select name="" id="">
                    <option value="" selected disabled>Chọn Huyện</option>
                    <option value="">chon 1</option>
                    <option value="">chon 1</option>
                    <option value="">chon 1</option>
                </select>
            </div>
            <div class="group-input">
                <label for="">Mô tả</label>
                <input type="text" placeholder="Mô tả">
            </div>
            <div class="group-input submit">
                <input type="submit" value="Xác Nhận Địa Chỉ">
            </div>
        </div>
    </div>
</body>

<script>
    const bodyAddress=document.querySelector(".body-address")
    const btnShow=document.querySelector(".group-input.address input")
    const btnClose=document.querySelector(".body-address .close")
    const spaceClose=document.querySelector(".space-close")
    const toggleAddress = new ToggleBody(bodyAddress,btnShow,btnClose,spaceClose);
</script>