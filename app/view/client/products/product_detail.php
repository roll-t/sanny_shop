<body>
    <div class="header_link">
        <a href="#" class="link">Home /</a>
        <a href="#" class="link">All Product /</a>
        <a href="#" class="link">product</a>
    </div>
    <div class="container">
        <?php
        if(!empty($product_detail)){
            $img_des=render_array_img($product_detail['list_img']);
            echo '<div class="left">
            <div class="slide">
                <div class="des-img">
                ';
                if(!empty($img_des)){
                    foreach($img_des as $key=>$img){
                        if($key==0){
                            echo '<div class="list-items active">
                            <img src="'._WEB_ROOT.'/public/imgs/product/'.$img.'" alt="">
                        </div>';
                        }else{
                            echo '<div class="list-items">
                            <img src="'._WEB_ROOT.'/public/imgs/product/'.$img.'" alt="">
                         </div>';
                        }
                    }
                };
              echo '
                </div>
                <div class="main-display">
                    <div class="control">
                        <ion-icon name="chevron-up-outline"></ion-icon>
                        <ion-icon name="chevron-down-outline"></ion-icon>
                    </div>
                    <div class="display">
                        <img src="'._WEB_ROOT.'/public/imgs/product/'.$product_detail['avatar'].'" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="right">
            <h5 class="name-product">'.$product_detail['sp_ten'].'</h5>
            <div class="product-price"><span>' .  number_format($product_detail['sp_gia'], 0, ',', '.') . ' </span> VND</div>
            <div class="assess">
                <span>Đánh giá sản phẩm</span>
                <li class="show-right-side" style="cursor: pointer;">Xem đánh giá</li>
            </div>
            <div class="color select-color ">
                <div class="title-color">
                    <p>Màu:</p>
                </div>
                <div class="list-color-product">
                    <div class="color-item active" style="background-color: red;">
                        <div class="border"></div>
                    </div>
                    <div class="color-item" style="background-color: green;">
                        <div class="border"></div>
                    </div>
                    <div class="color-item" style="background-color: blue;">
                        <div class="border"></div>
                    </div>
                </div>
            </div>
            <div class="voucher">
                <div class="head">
                    <ion-icon name="pricetag-outline"></ion-icon>
                    <span>voucher của sany</span>
                </div>
                <div class="icon show-right-side"><ion-icon name="chevron-forward-outline"></ion-icon></div>
            </div>
            <div class="size">
                <div class="head">
                    <span>size</span>
                    <span class="show-right-side">Bảng size</span>
                </div>
                <div class="select-size">';
                if(!empty($list_size)){
                    foreach($list_size as $size){
                        echo  '<div class="size-items">size '.$size['s_ten'].' </div>';
                    }
                }
                echo '</div>
            </div>
            <div class="quantity">
                <span>Số lượng</span>
                <div class="control-quantity">
                    <div class="div btn"><ion-icon name="remove-outline"></ion-icon></div>
                    <input type="number" class="number" value="0" />
                    <div class="plus btn"><ion-icon name="add-outline"></ion-icon></div>
                </div>
            </div>
            <button class="btn add-cart">Thêm vào giỏ hàng</button>
            <button class="btn buy-now">Mua ngay</button>
            <div class="des-exten show-right-side">
                <div>
                    <span>Thông tin sản phẩm</span>
                </div>
                <ion-icon name="chevron-forward-outline"></ion-icon>
            </div>
            <div class="des-exten show-right-side">
                <div>
                    <span>Chính sách vận chuyển</span>
                    <span>Miễn phí vận chuyển hoá đơn trên 1.000.000đ</span>
                </div>
                <ion-icon name="chevron-forward-outline"></ion-icon>
            </div>
            <div class="des-exten show-right-side">
                <div>
                    <span>Chính sách đổi trả</span>
                    <span>Miễn phí đổi trả trong vòng 7 ngày</span>
                </div>
                <ion-icon name="chevron-forward-outline"></ion-icon>
            </div>
        </div>';
        }
        ?>

    </div>
    <div class="right-side">
        <div class="main">
            <div class="head">
                <div class="close-right-side"><ion-icon name="chevron-back-outline"></ion-icon></div>
                <h3>Thông tin sản phẩm</h3>
            </div>
            <div class="main-content">
                <h5>Levents® Meeting You Knit Sweater/ Green</h5>
                <p>
                    Áo sweater form oversize có độ dài phủ quá mông, phần tay áo rộng rãi, phần tay áo rộng rãi, form dáng thoải mái, thoáng mát khi mặc.
                    Size: 2/3/4<br />

                    Mặt trước:<br />
                    - Dòng quote "meeting you was a nice accident" với phối màu đen nằm giữa ngực, tăng thêm điểm nhấn cho áo<br />
                    - Graphic được áp dụng kỹ thuật thêu tỉ mì, chi tiết dem lại độ bền cao<br />
                    - Cổ áo và bo tay áo ôm gọn không quá chật hay quá rộng giúp cho outfits của bạn trong sang trọng hơn, không giãn sau nhiều lần giặt<br />
                    - GREEN: phối màu mới lạ, bắt mắt và nổi bật tạo điểm nhấn cho outfit<br />

                    - Cấu trúc sản phẩm: Len.<br />
                    - Len - dày dặn nhưng vẫn được sự thoáng mát.</p>
            </div>
        </div>
        <div class="space-close"></div>
    </div>
    <div class="container-body">
        <?php
            $this->view('client/products/list',$data_product);
        ?>
    </div>
</body>

<script>
    const list_img = document.querySelectorAll(".des-img .list-items")
    const main_display = document.querySelector(".main-display .display img")
    const btn = {
        next: document.querySelector(".main-display .control ion-icon:nth-child(1)"),
        prev: document.querySelector(".main-display .control ion-icon:nth-child(2)")

    }

    function toggle_list(items, list, class_ = 'active') {

        list.forEach(tag => {

            tag.classList.remove(class_)

        })

        items.classList.add(class_)

    }

    function change_img(wrap, img_change) {

        wrap.src = img_change

    }


    let current = 0;

    btn.next.addEventListener("click", e => {

        if (current <= 0) {

            current = list_img.length - 1
        } else {
            current--;
        }
        current_items(list_img, current)
    })


    list_img.forEach((items, index) => {
        items.addEventListener('click', e => {
            list_img.forEach(tag => {
                tag.classList.remove('active')
            })
            items.classList.add('active')
            const src_img = items.querySelector('img').src
            change_img(main_display, src_img)
            current = index
        })
    })


    btn.prev.addEventListener("click", e => {
        if (current >= list_img.length - 1) {
            current = 0
        } else {
            current++;
        }
        current_items(list_img, current)
    })


    function current_items(list, current) {
        list.forEach((items, index) => {
            if (index == current) {
                const img_src = items.querySelector("img").src
                change_img(main_display, img_src)
                toggle_list(items, list)
            }
        })
    }
    const list_size = document.querySelectorAll('.select-size .size-items')
    const list_color=document.querySelectorAll('.list-color-product .color-item')
    toggleList(list_size)
    toggleList(list_color)

    const control_quantity = {
        mius: document.querySelector(".control-quantity .div"),
        plus: document.querySelector(".control-quantity .plus"),
        number: document.querySelector(".control-quantity .number")
    }
    input_quantity(control_quantity.mius, control_quantity.number, control_quantity.plus)

    const show_rigth_side=document.querySelectorAll(".show-right-side")
    const space_close_right_side=document.querySelector('.right-side .space-close')
    const btn_close_right_side=document.querySelector(".close-right-side")
    const right_side_body=document.querySelector(".right-side")
    show_rigth_side.forEach(items=>{
        toggleBody(right_side_body,items,btn_close_right_side,space_close_right_side);
    })
</script>

