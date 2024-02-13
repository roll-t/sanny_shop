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


        $this->render_view('import');
    }

    function import()
    {
        $this->__model['import'] = $this->model('admin/ImportModel');
        $this->__model['import_detail'] = $this->model('admin/ImportDetailModel');
        if (!empty($_POST)) {
            $import_value['ngaynhap'] = date("Y-m-d H:i:s");
            $this->__model['import']->add($import_value, false);



            $product_id = $_POST['sp_id'];
            $colors = $_POST['m_id'];
            $sizes = $_POST['s_id'];
            $quantity = $_POST['soluong'];
            $lastId = $this->__model['import']->lastId();

            for ($i = 0; $i < count($quantity); $i++) {
                $allow=true;
                if (!empty($quantity[$i])) {
                    $value_add['n_id'] = $lastId;
                    $value_add['sp_id'] = $product_id;
                    $value_add['m_id'] = $colors[$i];
                    $value_add['s_id'] = $sizes[$i];
                    $value_add['soluong'] = $quantity[$i];
                    $this->__model['import_detail']->add($value_add, false);
                }

                if($i==count($quantity)-1){
                    $respose=new Response();
                    alert("Import product success");
                    $respose->redirect('admin/importProduct',true);
                }
            }
        }
    }
}
