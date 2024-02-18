<style>
    .wrap-select {
        display: inline-block;
        display: flex;
        align-items: center;
        gap: 30px;
    }

    .wrap-select select {
        height: 30px;
    }

    .wrap-select button {
        border: none;
        background: #000;
        text-transform: capitalize;
        color: white;
    }
</style>
<div class="col-md-12 mb-lg-0 mb-4">
    <div class="card mt-4 p-4">
        <h5><?php
            echo !empty($title_page) ? $title_page : "No title";
            ?></h5>
        <div class="wrap-select">
            <form action="<?php echo _WEB_ROOT . 'admin/product/emplement_adjust_status' ?>">
                <input name="sp_id" type="hidden" value="<?php echo $product_id ?>">
                <input name="m_id" type="hidden" value="<?php echo $_GET['color'] ?>">
                <input name="s_id" type="hidden" value="<?php echo $_GET['size'] ?>">
                <label for="trang_thai">Handle: </label>
                <select name="trang_thai" id="">
                    <option selected disabled>Chose status</option>
                    <option value="1">Display</option>
                    <option value="0">Hidden</option>
                </select>
                <button>
                    Confirm
                </button>
            </form>
        </div>
    </div>

</div>