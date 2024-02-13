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
    <div class="card mt-4 p-4 ">
        <div class="card-header pb-0 p-3">
            <div class="row">

                <div class=" w-30 ms-auto text-end btn-add-new">

                    <a class="btn bg-gradient-dark mb-0" href="<?php echo _WEB_ROOT ?>/admin/product/add_product"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New product</a>
                </div>
            </div>
        </div>

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
                        <a class="edit-category" href="' . _WEB_ROOT . '/admin/product/edit_product?id=' . $value['sp_id'] . '" ">
                        <i class=" material-icons text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="View product"><ion-icon name="eye"></ion-icon></i>
                        </a>
                        <a class="edit-category" href="' . _WEB_ROOT . '/admin/product/edit_product?id=' . $value['sp_id'] . '" ">
                        <i class=" material-icons text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit product">edit</i>
                        </a>
                        <a class="delete-category" href="' . _WEB_ROOT . '/admin/product/delete?id=' . $value['sp_id'] . '">
                        <i class="material-icons text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete product">delete</i>
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

<span class="ms-auto">

</span>