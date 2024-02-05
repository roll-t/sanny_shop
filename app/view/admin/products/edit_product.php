<div class="container-add">
    <div class="title mb-2"><?php echo !empty($title_page) ? $title_page : "No title"; ?></div>
    <form enctype="multipart/form-data" action="<?php echo _WEB_ROOT ?>/admin/product/edit" class="submit_value_post" method="post" onsubmit="return false">
    <input name="sp_id" type="hidden" value="<?php echo !empty($_GET['id'])?$_GET['id']:0;?>">    
    <div class="main">
            <div class="left item">
                <div class="col">
                    <div class="group-input category">
                        <label for="dm_id">Category</label>
                        <select name="dm_id" id="category">
                            <option selected disabled value="<?php echo !empty($product_edit['dm_id']) ? $product_edit['dm_id'] : "" ?>">
                                <?php echo !empty($product_edit['dm_ten']) ? $product_edit['dm_ten'] : "" ?>
                            </option>
                            <?php render_option($categorys, 'dm_ten', 'dm_id') ?>
                        </select>
                    </div>

                    <div class="group-input name_product">
                        <label for="sp_ten">Product name</label>
                        <input name="sp_ten" type="text" value="<?php echo !empty($product_edit) ? $product_edit['sp_ten'] : "" ?>" placeholder="Enter product name..">
                    </div>
                    <div class="group-input price_product">
                        <label for="sp_gia">Product price</label>
                        <input name="sp_gia" type="number" value="<?php echo !empty($product_edit) ? $product_edit['sp_gia'] : "" ?>" placeholder="Enter product price..">
                    </div>
                    <div class="group-input">
                        <label for="product_description">Product Description</label>
                        <textarea name="mota" id="product_description" cols="35" rows="5"><?php echo !empty($product_edit) ? $product_edit['mota'] : ""; ?></textarea>
                    </div>
                </div>
                
                <div class="col">
                    <div class="row-list">
                        <div class="group-input material">
                            <label for="material">Material</label>
                            <select name="cl_id" id="material">
                                <option selected disabled value="<?php echo !empty($product_edit['cl_id']) ? $product_edit['cl_id'] : "" ?>">
                                    <?php echo !empty($product_edit['cl_ten']) ? $product_edit['cl_ten'] : "" ?>
                                </option>
                                <?php render_option($materials, 'cl_ten', 'cl_id') ?>
                            </select>
                        </div>
                    </div>

                    <div class="group-input">
                        <label for="size">Size</label>
                        <div class="list-check list-check-size">
                            <?php
                            if (!empty($sizes)) {
                                foreach ($sizes as $size) {
                                    $isChecked  = in_array($size['s_id'], array_column($size_product, 's_id'));
                                    echo '<div class="check_">
                                        <input  ' . ($isChecked ? 'checked' : '') . ' class="form-check-input" name="size[]" type="checkbox" value="' . $size['s_id'] . '">
                                        <label for="size">Size ' . $size['s_ten'] . '</label>
                                        </div>';
                                }
                            }
                            ?>
                        </div>
                    </div>

                    <div class="group-input">
                        <label for="color">Color</label>
                        <div class="list-check list-check-color">
                            <?php
                            if (!empty($colors)) {
                                foreach ($colors as $color) {

                                    $isChecked  = in_array($color['m_id'], array_column($color_product, 'm_id'));
                                    echo '<div class="check_">
                                    <input ' . ($isChecked ? 'checked' : '') . ' class="form-check-input" name="color[]" type="checkbox" value="' . $color['m_id'] . '">
                                    <label for="color">' . $color['m_ten'] . '</label>
                                    </div>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>


            <div class="right item">
                <div class="avata-product part-upload-img">
                    <div class="w avatar__">
                        <label for="">Avata Product</label>
                        <div class="input-avata">
                            <button type="button">change</button>
                            <ion-icon name="camera-outline"></ion-icon>
                            <input type="hidden" name="anh_chinh">
                            <?php
                            if (!empty($product_edit['avatar'])) {
                                echo '<img class="move_img" src="' . _WEB_ROOT . '/public/imgs/product/' . $product_edit['avatar'] . '" />';
                            }
                            ?>
                        </div>
                    </div>

                    <div class="w sub_avatar__">
                        <label for="">Sub-Avata Product</label>
                        <div class="input-avata">
                            <button type="button">change</button>
                            <ion-icon name="camera-outline"></ion-icon>
                            <input type="hidden" name="anh_sub">
                            <?php
                            if (!empty($product_edit['sub_avatar'])) {
                                echo '<img class="move_img" src="' . _WEB_ROOT . '/public/imgs/product/' . $product_edit['sub_avatar'] . '" />';
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="warp-img part-upload-img">
                    <input type="hidden" name="ds_anh" class="ds_anh">
                    <div class="w">
                        <label for="">Photo Description</label>
                        <div class="box-img">
                            <ion-icon name="camera-outline"></ion-icon>
                        </div>
                    </div>
                    <div class="list-img-add">
                        <?php

                        $list_img = !empty($product_edit['list_img'])?explode('|',$product_edit['list_img']):[];

                        foreach($list_img as $value){
                            echo '<div class="img-items">
                            <div class="icon-delete">
                                <ion-icon name="close-outline"></ion-icon>
                            </div>
                            <img src="'._WEB_ROOT.'/public/imgs/product/'.$value.'" alt="">
                            <input class="img_name" type="hidden" value="'.$value.'">
                        </div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <button class="btn_create_product" type="submit">Confirm Edit Product</button>
        </div>
    </form>
</div>