<style>
    .head-title {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    li {
        list-style: none;
    }

    .warp-infor li {
        display: flex;
        gap: 10px;
    }
</style>

<div class="card mt-4 p-4 body-entry-slip">
    <div class="head-title">
        <h5 class="title">Entry Slip</h5>
        <p>Entry date : <i><?php echo date("Y-m-d H:i:s"); ?></i></p>
    </div>
    <div class="warp-infor">
        <li>
            <h5>Importer Name: </h5> <i>Pham phuoc truong</i>
        </li>
        <li>
            <h5>Duty: </h5> <i>Manage</i>
        </li>
    </div>
    <table class="table table-bordered mt-3 table-product table-entry-slip">
        <tr>
            <th>No</th>
            <th>Product name</th>
            <th>Product price</th>
            <th>color</th>
            <th>size</th>
            <th>Quantity</th>
            <th>Total price</th>
        </tr>
        <tbody>
            <?php
            if (!empty($import_detail)) {
                $sum_bil_import = 0;
                foreach ($import_detail as $items) {
                    $total_price_product = $items['sp_gia'] * $items['soluong'];
                    $sum_bil_import += $total_price_product;
                    echo ' 
                    <tr>
                    <td>NH' . $items['n_id'] . '</td>
                    <td>' . $items['sp_ten'] . '</td>
                    <td>' . number_format($items['sp_gia'], 0, ',', '.') . ' VND</td>
                    <td>' . $items['m_ten'] . '</td>
                    <td>' . $items['s_ten'] . '</td>
                    <td>' . $items['soluong'] . '</td>
                    <td>' . number_format($total_price_product, 0, ',', '.') . ' VND</td>
                    </tr>';
                }
            }
            ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Sum: <span class="total_price_bil"><?php echo !empty($sum_bil_import) ? number_format($sum_bil_import, 0, ',', '.') : 0 ?></span><span> VND</span></td>
            </tr>
        </tbody>
    </table>

</div>