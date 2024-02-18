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

        <table class="table table-bordered mt-3 table-product">
            <tr>
                <th>Code</th>
                <th>Product name</th>
                <th>Product price</th>
                <th>Color</th>  
                <th>Size</th>
                <th>Quantity</th>
                <th>Status</th>
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
                        <td>SP ' . $value['sp_id'] . '</td>
                        <td class="product-name">' . $value['sp_ten'] . '</td>
                        <td>' .  number_format($value['sp_gia'], 0, ',', '.') . ' VND</td>
                        <td  style="color:'.$value['m_ma'].'">' . $value['m_ten'] . '</td>
                        <td >' . $value['s_ten'] . '</td>
                        <td >' . $value['k_soluong'] . '</td>
                        <td >' . ($value['k_soluong'] > 0 ? "Display" : "Sold out") . '</td>
                        <td class="action">
                        <div>
                        <a class="edit-category" href="' . _WEB_ROOT . '/admin/product/view_product?id=' . $value['sp_id'] . '" ">
                        <i class=" material-icons text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="View product"><ion-icon name="eye"></ion-icon></i>
                        </a>
                        <a class="edit-category" href="' . _WEB_ROOT . '/admin/product/adjust_status?id='.$value['sp_id'].'&color='.$value['m_id'].'&size='.$value['s_id'].'" ">
                        <i class=" material-icons text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Adjust status">edit</i>
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