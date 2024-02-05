<div class="container-add">
    <div class="title mb-2"><?php echo !empty($title_page)?$title_page:"No title";?></div>
    <form enctype="multipart/form-data" action="<?php echo _WEB_ROOT ?>/admin/product/add" class="submit_value_post" method="post" onsubmit="return false">
        <div class="main">
            <div class="left item">
                <div class="col">
                    <div class="group-input category">
                        <label for="dm_id">Category</label>
                        <select name="dm_id" id="category">
                            <option selected disabled value="">Choose Category</option>
                            <?php render_option($categorys,'dm_ten','dm_id')?>
                        </select>
                    </div>
                    <div class="group-input name_product">
                        <label for="sp_ten">Product name</label>
                        <input name="sp_ten" type="text" placeholder="Enter product name..">
                    </div>
                    <div class="group-input price_product">
                        <label for="sp_gia">Product price</label>
                        <input name="sp_gia" type="number" placeholder="Enter product price..">
                    </div>
                    <div class="group-input">
                        <label for="product_description">Product Description</label>
                        <textarea name="mota" id="product_description" cols="35" rows="5"></textarea>
                    </div>
                </div>
                <div class="col">
                    <div class="row-list">
                        <div class="group-input material">
                            <label for="material">Material</label>
                            <select name="cl_id" id="material">
                                <option selected disabled value="">Choose Material</option>
                                <?php render_option($materials,'cl_ten','cl_id')?>
                            </select>
                        </div>
                    </div>
                    <div class="group-input">
                        <label for="size">Size</label>
                        <div class="list-check list-check-size">
                            <?php 
                                if(!empty($sizes)){
                                    foreach($sizes as $size){
                                        echo '<div class="check_">
                                        <input class="form-check-input" name="size[]" type="checkbox" value="'.$size['s_id'].'">
                                        <label for="size">Size '.$size['s_ten'].'</label>
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
                            if(!empty($colors)){
                                foreach($colors as $color){
                                    echo '<div class="check_">
                                    <input class="form-check-input" name="color[]" type="checkbox" value="'.$color['m_id'].'">
                                    <label for="color">'.$color['m_ten'].'</label>
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
                    <div class="w">
                        <label for="">Avata Product</label>
                        <div class="input-avata">
                            <button type="button">change</button>
                            <ion-icon name="camera-outline"></ion-icon>
                            <input type="hidden" name="anh_chinh">
                        </div>
                    </div>

                    <div class="w">
                        <label for="">Sub-Avata Product</label>
                        <div class="input-avata">
                            <button type="button">change</button>
                            <ion-icon name="camera-outline"></ion-icon>
                            <input type="hidden" name="anh_sub">
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
                    </div>
                </div>
            </div>
            <button class="btn_create_product" type="submit">Confirm Add Product</button>
        </div>
    </form>
</div>