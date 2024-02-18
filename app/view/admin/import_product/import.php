<div class="wrap-select">
    <form action="">
        <input name="search" type="text" placeholder="search info...">
        <button>Search</button>
    </form>
    <form action="">
        <select name="category_id" id="">
            <?php
            render_option($categorys, 'dm_ten', 'dm_id');
            ?>
        </select>
        <button>
            chose
        </button>
    </form>
</div>
<div class="col-md-12 mb-lg-0 mb-4">
    <div class="card mt-4 p-4 body-import-items">
        <form method="post" action="<?php echo _WEB_ROOT ?>/admin/importProduct/import" class="form-import-product" onsubmit="return false">
        <input type="hidden" name="n_tongtien" value="" class="n_tongtien">
            <?php
            if (!empty($product_handle)) {
                echo '<table class="table table-bordered mt-3 table-product">
            <tr>
                <th>No</th>
                <th>Product name</th>
                <th>Product price</th>
                <th>color</th>
                <th>size</th>
                <th>Quantity</th>
            </tr>
            <tbody>';

                if (!empty($product_handle)) {
                    $count = 0;
                    foreach ($product_handle as $value) {
                        $count += 1;
                        echo '
            <tr>
                <td>' . $count . '</td>
                <td class="product-name">' . $value['sp_ten'] . '</td>
                <td><span class="price">' .  number_format($value['sp_gia'], 0, ',', '.') . '</span> VND</td>
                <td class="product-name">' . $value['m_ten'] . '</td>
                <td class="product-name">' . $value['s_ten'] . '</td>
                <td style="width:300px">
                    <input name="sp_id" type="hidden" value="' . $value['sp_id'] . '" >
                    <input class="quantity-input" name="soluong[]" type="number" value="0" >
                    <input name="s_id[]" type="hidden" value="' . $value['s_id'] . '">
                    <input name="m_id[]" type="hidden" value="' . $value['m_id'] . '" >
                </td>   
            </tr>';
                    }
                }
                echo '<tr>
            <td></td>
          </tr>
          </tbody>
        </table>
        <div style="display:flex;justify-content:center;margin-top:30px;">
        <button class="btn-confirm-import btn btn-dark square centerd">Import Product</button>
        </div>';
            } else {
                echo '<h5 class="text-center">Select the process product below</h5>';
            }
            ?>
        </form>
    </div>

    <div class="card mt-4 p-4 ">
        <h5 style="text-transform: capitalize;">Chose product import</h5>
        <table class="table table-bordered mt-3 table-product">
            <tr>
                <th>Count</th>
                <th>Product image</th>
                <th>Product name</th>
                <th>Product price</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
            <tbody>
                <?php
                if (!empty($list_product)) {
                    $count = 0;
                    foreach ($list_product as $value) {
                        $count += 1;
                        echo '
                        <tr>
                        <td>' . $count . '</td>
                        <td style="width:150px"><img class="w-30" src="' . _WEB_ROOT . '/public/imgs/product/' . $value['avatar'] . '" /></td>
                        <td class="product-name">' . $value['sp_ten'] . '</td>
                        <td>' .  number_format($value['sp_gia'], 0, ',', '.') . ' VND</td>
                        <td>' . $value['dm_ten'] . '</td>
                        <td class="action">
                        <div>
                        <a class="edit-category" href="' . _WEB_ROOT . '/admin/product/view_product?id=' . $value['sp_id'] . '" ">
                        <i class=" material-icons text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="View product"><ion-icon name="eye"></ion-icon></i>
                        </a>
                        <a class="edit-category" href="' . _WEB_ROOT . '/admin/importProduct?product_id=' . $value['sp_id'] . '" ">
                        <i class=" material-icons text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Chose Product"><ion-icon name="create-outline"></ion-icon></i>
                        </a>
                        </div>
                        </td>   
                    </tr>
                        ';
                    }
                }
                ?>
                <tr>
                    <td></td>
                </tr>
            </tbody>
            <!-- Bổ sung dữ liệu trong các dòng tiếp theo tại đây -->
        </table>
        <?php
        $this->view('admin/components/pagination', $pagination_data);
        ?>
    </div>

    <script>
        const btn_delete = document.querySelectorAll(".delete-category");
        btn_delete.forEach(items => {
            allow_delete(items, "Do you want delete this category ??");
        })
    </script>
</div>
<?php $this->view('admin/components/entry_slip') ?>

<span class="ms-auto">

</span>