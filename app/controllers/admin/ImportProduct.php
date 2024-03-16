<?php
class ImportProduct extends Controller
{
    private $__data = [];
    private $__model;
    private $__root_page = 'admin/import_product/';
    private $__root_view = 'layouts/admin_layout';

    function render_view($page = '')
    {
        $this->__data['content'] = $this->__root_page . $page;
        $this->view($this->__root_view, $this->__data);
    }

    function index()
    {
        $this->list_product();
    }

    function list_product()
    {
        $this->__model['categorys'] = $this->model('admin/CategoryModel');

        $this->__model['product'] = $this->model('admin/ProductModel');

        $this->__data['sub_content']['categorys'] = $this->__model['categorys']->all();

        $current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;

        $total_items =  ($this->__model["product"]->count())[0]['count'];

        $items_per_page = 3;

        $total_pages = ceil($total_items / $items_per_page);

        $this->__data["sub_content"]['pagination_data']["total_pages"] = $total_pages;

        // Đảm bảo trang hiện tại không vượt quá số trang tổng cộng
        $current_page = min($total_pages, max(1, $current_page));

        $offset_page = ($current_page - 1) * $items_per_page;
        if ($total_items != 0) {
            if (!empty($_GET['category_id'])) {
                $this->__data['sub_content']['list_product'] = $this->__model['product']->list_product_category($items_per_page, $offset_page, $_GET['category_id']);
            } else if (!empty($_GET['search'])) {
                $this->__data['sub_content']['list_product'] = $this->__model['product']->list_product_search($items_per_page, $offset_page, $_GET['search']);
            } else {
                $this->__data['sub_content']['list_product'] = $this->__model['product']->list_product($items_per_page, $offset_page);
            }
            if (!empty($_GET['product_id'])) {
                $list_detail_import = $this->__model['product']->list_product_import($_GET['product_id']);
                $this->__data['sub_content']['product_handle'] = $list_detail_import;
            }
        }
        $this->render_view('import');
    }

    function history()
    {

        $this->__model['import'] = $this->model('admin/ImportModel');

        $current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;

        $total_items =  ($this->__model["import"]->count())[0]['count'];

        $items_per_page = 15;

        $total_pages = ceil($total_items / $items_per_page);

        $this->__data["sub_content"]['pagination_data']["total_pages"] = $total_pages;

        // Đảm bảo trang hiện tại không vượt quá số trang tổng cộng
        $current_page = min($total_pages, max(1, $current_page));

        $offset_page = ($current_page - 1) * $items_per_page;

        $this->__data['sub_content']['title_page'] = "History Import Product";

        if (!empty($_GET['search'])) {
            $this->__data["sub_content"]["list_import"] = $this->__model['import']->list_import_history_search($items_per_page, $offset_page, $_GET['search']);
        } else if (!empty($_GET['date_from']) && !empty($_GET['date_to'])) {
            $this->__data["sub_content"]["list_import"] = $this->__model['import']->list_import_history_date($items_per_page, $offset_page, $_GET['date_from'], $_GET['date_to']);
        } else {
            $this->__data["sub_content"]["list_import"] = $this->__model['import']->list_import_history($items_per_page, $offset_page);
        }
        $this->render_view('history');
    }

    function history_detail()
    {
        if (!empty($_GET['id'])) {
            $this->__model['import'] = $this->model('admin/ImportModel');
            $this->__data['sub_content']['import_detail'] = $this->__model['import']->get_detail($_GET['id']);
        }

        $this->render_view('history_detail');
    }

    function import()
    {
        $this->__model['import'] = $this->model('admin/ImportModel');
        $this->__model['import_detail'] = $this->model('admin/ImportDetailModel');
        $this->__model['StoreHouse'] = $this->model('admin/storeHouseModel');
        if (!empty($_POST)) {
            $import_value['ngaynhap'] = date("Y-m-d H:i:s");
            $this->__model['import']->add($import_value, false);

            $product_id = $_POST['sp_id'];
            $sizes = $_POST['s_id'];
            $quantity = $_POST['soluong'];
            $lastId = $this->__model['import']->lastId();

            for ($i = 0; $i < count($quantity); $i++) {
                if (!empty($quantity[$i])) {
                    $value_add['n_id'] = $lastId;
                    $value_add['sp_id'] = $product_id;
                    $value_add['s_id'] = $sizes[$i];
                    $value_add['soluong'] = $quantity[$i];
                    $value_add['trang_thai'] = 1;
                    if (count($this->__model['import_detail']->find_imported($value_add['sp_id'], $sizes[$i])) == 0) {
                        $value_storeHouse['k_soluong'] = $quantity[$i];
                        $value_storeHouse['sp_id'] = $value_add['sp_id'];
                        $value_storeHouse['s_id'] = $sizes[$i];
                        $this->__model['StoreHouse']->add($value_storeHouse, false);
                    } else {
                        $current_quantity = $this->__model['StoreHouse']->find($product_id)['k_soluong'] + $value_add['soluong'];
                        $value_storeHouse['k_soluong'] = $current_quantity;
                        // $value_add['sp_id']=$product_id;
                        $this->__model['StoreHouse']->update_storeHouese($product_id, $sizes[$i], $current_quantity);
                    }

                    $this->__model['import_detail']->add($value_add, false);
                }

                if ($i == count($quantity) - 1) {
                    $respose = new Response();
                    // $value_sum_bill
                    $total_bill['n_tongtien'] = $_POST['n_tongtien'];
                    $this->__model['import']->edit($total_bill, $lastId, false);
                    alert("Import product success");
                    $respose->redirect('admin/importProduct', true);
                }
            }
        }
    }
}
