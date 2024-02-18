<style>
    .table-product td,
    .table-product th {
        padding: 0;
        vertical-align: middle;
        text-align: center;
        padding: .5%;
    }
    .wrap-select{
    display: inline-block;
    display:flex;
    align-items: center;
    gap:30px;
}
.wrap-select select{
    height: 30px;
}
.wrap-select button{
    border:none;
    background: #000;
    text-transform: capitalize;
    color:white;
}

</style>

<div class="wrap-select">
    <form action="">
        <input name="search" type="text" placeholder="Enter Import code..">
        <button>Search</button>
    </form>
    <form action="">
        <label for="date_from">From:</label>
        <input type="date" name="date_from">
        <label for="date_to">To:</label>
        <input type="date" name="date_to">
        <button>
            Find
        </button>
    </form>
</div>

<div class="card mt-4 p-4 body-entry-slip">
    <div class="head-title">
        <h5 class="title"><?php echo !empty($title_page) ? $title_page : "no title"; ?></h5>
    </div>
    <table class="table table-bordered mt-3 table-product table-entry-slip">
        <tr>
            <th>Import code</th>
            <th>Day import</th>
            <th>Total price</th>
            <th>View detail</th>
        </tr>
        <tbody>
            <?php
            if (!empty($list_import)) {
                foreach ($list_import as $items) {
                    echo '
                    <tr>
                    <td>NH' . $items['n_id'] . '</td>
                    <td>' . $items['ngaynhap'] . '</td>
                    <td>' . number_format($items['n_tongtien'], 0, ',', '.') . ' VND</td>
                    <td>
                    <a class="edit-category" href="' . _WEB_ROOT . '/admin/ImportProduct/history_detail?id='.$items['n_id'].'">
                    <i class=" material-icons text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="View detail"><ion-icon name="eye"></ion-icon></i>
                    </a>
                    </td>
                    </tr>
                    ';
                }
            }
            ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <?php
    $this->view('admin/components/pagination', $pagination_data);
    ?>
</div>