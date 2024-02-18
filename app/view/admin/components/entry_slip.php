<style>
    @keyframes show {
        100% {
            visibility: visible;
            opacity: 1;
            transform: translateY(0%);
        }
    }
    .btn-confirm-import-bil{
        display: inline-block;
    }
    .wrap-body-entry-slip {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background: #00000060;
        z-index: 50000;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        visibility: hidden;
        opacity: 0;
        transform: translateY(-100%);
    }
    .wrap-body-entry-slip.active{
        animation: show .25s linear forwards;
    }
    .space-close {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        cursor: pointer;
    }

    .body-entry-slip {
        width: 80%;
        height: fit-content;
        
    }

    li {
        list-style: none;
    }

    h5 {
        display: inline-block;
    }

    .table-product td,
    .table-product th {
        padding: 0;
        vertical-align: middle;
        text-align: center;
        padding: .5%;
    }

    .head-title {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
</style>
<div class="wrap-body-entry-slip">
    <div class="space-close">

    </div>
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
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Sum: <span class="total_price_bil">30000</span><span> VND</span></td>
                </tr>
            </tbody>
        </table>
        <button class="btn btn-dark btn-confirm-import-bil">Confirm import</button>
    </div>
</div>