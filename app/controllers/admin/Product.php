<?php
class Product extends Controller
{
    private $__data = [];
    private $__model;
    private $__root_page = 'admin/products/';
    private $__root_view = 'layouts/admin_layout';

    function __construct()
    {
        $this->__model['product'] = $this->model('admin/productModel');
    }

    function render_view($page = '')
    {
        $this->__data['content'] = $this->__root_page . $page;
        $this->view($this->__root_view, $this->__data);
    }

    function index()
    {
        $this->list_product();
    }

    function view_product(){
        $id = !empty($_GET['id']) ? $_GET['id'] : 0;
        $this->__data['sub_content']['categorys'] = $this->__model['product']->all("danh_muc");
        $this->__data['sub_content']['materials'] = $this->__model['product']->all("chat_lieu");
        $this->__data['sub_content']['sizes'] = $this->__model['product']->all("size");
        $this->__data['sub_content']['colors'] = $this->__model['product']->all("mau");

        
        $product_edit = $this->__model['product']->get_product($id);
        
        if(!empty($product_edit[0]['sp_ten'])){
            $this->__data['sub_content']['title_page'] ='Information product: '.$product_edit[0]['sp_ten'];
        }

        $this->__data['sub_content']['product_edit'] = $product_edit[0];

        $this->__model['color_detail'] = $this->model('admin/ColorDetailModel');

        $this->__model['size_detail'] = $this->model('admin/SizeDetailModel');

        $color_product = $this->__model['color_detail']->get_color_product($id);

        $size_product = $this->__model['size_detail']->get_size_product($id);

        $this->__data['sub_content']['color_product'] = $color_product;

        $this->__data['sub_content']['size_product'] = $size_product;

        $this->render_view('view_product');
    }

    function list_product()
    {
        $this->__model['categorys'] = $this->model('admin/CategoryModel');

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
            $this->__data['sub_content']['list_product'] = $this->__model['product']->list_product_search($items_per_page, $offset_page,$_GET['search']);
        } else {
            $this->__data['sub_content']['list_product'] = $this->__model['product']->list_product($items_per_page, $offset_page);
        }
        $this->render_view('product');
    }


    function add_product()
    {
        $this->__data['sub_content']['categorys'] = $this->__model['product']->all("danh_muc");
        $this->__data['sub_content']['materials'] = $this->__model['product']->all("chat_lieu");
        $this->__data['sub_content']['sizes'] = $this->__model['product']->all("size");
        $this->__data['sub_content']['colors'] = $this->__model['product']->all("mau");
        $this->__data['sub_content']['title_page'] = "Create Product";
        $this->render_view('add_product');
    }

    function edit_product()
    {
        $id = !empty($_GET['id']) ? $_GET['id'] : 0;
        $this->__data['sub_content']['categorys'] = $this->__model['product']->all("danh_muc");
        $this->__data['sub_content']['materials'] = $this->__model['product']->all("chat_lieu");
        $this->__data['sub_content']['sizes'] = $this->__model['product']->all("size");
        $this->__data['sub_content']['colors'] = $this->__model['product']->all("mau");

        $this->__data['sub_content']['title_page'] = "Edit Product";

        $product_edit = $this->__model['product']->get_product($id);

        $this->__data['sub_content']['product_edit'] = $product_edit[0];

        $this->__model['color_detail'] = $this->model('admin/ColorDetailModel');

        $this->__model['size_detail'] = $this->model('admin/SizeDetailModel');

        $color_product = $this->__model['color_detail']->get_color_product($id);

        $size_product = $this->__model['size_detail']->get_size_product($id);

        $this->__data['sub_content']['color_product'] = $color_product;

        $this->__data['sub_content']['size_product'] = $size_product;

        $this->render_view('edit_product');
    }

    function add()
    {
        if (!empty($_POST)) {

            $list_require = ['dm_id', 'sp_ten', 'sp_gia', 'anh_chinh', 'ds_anh', 'cl_id', 'size', 'color'];

            //Check dữ liệu require của post
            function check_post($list_require)
            {
                $diff = array_diff($list_require, array_keys($_POST));
                return empty($diff);
            }

            // Hàm di chuyển ảnh vào thư mục chỉ định
            function moveImagesToProductFolder($files, $uploadDir = _DIR_ROOT . '/public/imgs/product/')
            {
                $result = [
                    'avatar' => [],
                    'sub_avatar' => [],
                    'img_des' => []
                ];

                // Kiểm tra và tạo thư mục đích nếu nó không tồn tại
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                // Xử lý avatar
                if ($files['avatar']['error'] === 0 && in_array(strtolower(pathinfo($files['avatar']['name'], PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png']) && $files['avatar']['size'] <= 1048576) {
                    list($newFilename, $fullPath) = generateUniqueFilename($files['avatar']['name'], $uploadDir, 'avatar_');
                    if (move_uploaded_file($files['avatar']['tmp_name'], $fullPath)) {
                        $result['avatar'][] = $newFilename;
                    } else {
                        $result['avatar'][] = "Không thể chuyển avatar vào thư mục $uploadDir";
                    }
                } else {
                    $result['avatar'][] = "Lỗi khi tải lên avatar. Kiểm tra size và định dạng (jpg, jpeg, png).";
                }

                // Xử lý sub_avatar
                if ($files['sub_avatar']['error'] === 0 && in_array(strtolower(pathinfo($files['sub_avatar']['name'], PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png']) && $files['sub_avatar']['size'] <= 1048576) {
                    list($newFilename, $fullPath) = generateUniqueFilename($files['sub_avatar']['name'], $uploadDir, 'sub_avatar_');
                    if (move_uploaded_file($files['sub_avatar']['tmp_name'], $fullPath)) {
                        $result['sub_avatar'][] = $newFilename;
                    } else {
                        $result['sub_avatar'][] = "Không thể chuyển sub-avatar vào thư mục $uploadDir";
                    }
                } else {
                    $result['sub_avatar'][] = "Lỗi khi tải lên sub-avatar. Kiểm tra size và định dạng (jpg, jpeg, png).";
                }

                // Xử lý img_des    
                for ($i = 0; $i < count($files['img_des']['tmp_name']); $i++) {
                    if ($files['img_des']['error'][$i] === 0 && in_array(strtolower(pathinfo($files['img_des']['name'][$i], PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png']) && $files['img_des']['size'][$i] <= 1048576) {
                        list($newFilename, $fullPath) = generateUniqueFilename($files['img_des']['name'][$i], $uploadDir, 'img_des_');
                        if (move_uploaded_file($files['img_des']['tmp_name'][$i], $fullPath)) {
                            $result['img_des'][$i] = $newFilename;
                        } else {
                            $result['img_des'][$i] = "Không thể chuyển ảnh img_des[$i] vào thư mục $uploadDir";
                        }
                    } else {
                        $result['img_des'][$i] = "Lỗi khi tải lên ảnh img_des[$i]. Kiểm tra size và định dạng (jpg, jpeg, png).";
                    }
                }
                // trả về ảnh chứa tên ảnh
                return $result;
            }

            if (check_post($list_require) && !empty($_POST['anh_chinh']) && !empty($_POST['anh_sub'])) {
                $this->__model["product_detail"] = $this->model('admin/ProductDetailModel');
                $this->__model["image"] = $this->model('admin/ImgModel');
                $this->__model["color"] = $this->model('admin/ColorDetailModel');
                $this->__model["size"] = $this->model('admin/SizeDetailModel');

                $data_product['dm_id'] = $_POST['dm_id'];
                $data_product['sp_ten'] = $_POST['sp_ten'];
                $data_product['sp_gia'] = $_POST['sp_gia'];
                $this->__model['product']->add($data_product, false);

                $lastId = $this->__model['product']->lastId();

                $data_product_detail['sp_id'] = $lastId;
                $data_product_detail['cl_id'] = $_POST['cl_id'];
                $data_product_detail['mota'] = $_POST['mota'];
                $this->__model["product_detail"]->add($data_product_detail, false);

                if (!empty($_POST['size'])) {
                    foreach ($_POST['size'] as $value) {
                        $data_size_product['sp_id'] = $lastId;
                        $data_size_product['s_id'] = $value;
                        $this->__model["size"]->add($data_size_product, false);
                    }
                }

                if (!empty($_POST['color'])) {
                    foreach ($_POST['color'] as $value) {
                        $data_color_product['sp_id'] = $lastId;
                        $data_color_product['m_id'] = $value;
                        $this->__model["color"]->add($data_color_product, false);
                    }
                }

                $uploadedImages = moveImagesToProductFolder($_FILES);

                $list_name_des = custom_name($uploadedImages['img_des']);

                $data_img_product['sp_id'] = $lastId;
                $data_img_product['avatar'] = $uploadedImages['avatar'][0];
                $data_img_product['sub_avatar'] = $uploadedImages['sub_avatar'][0];
                $data_img_product["list_img"] = $list_name_des;

                $this->__model["image"]->add($data_img_product);
            } else {
                $reponse = new Response();
                alert("Please enter all required information!");
                $reponse->redirect('admin/product/add_product', true);
            }
        }
    }

    function delete()
    {
        $id = !empty($_GET['id']) ? $_GET['id'] : 0;

        $this->__model["image"] = $this->model('admin/ImgModel');

        $product_delete = $this->__model["image"]->find($id);

        $folderPath = _DIR_ROOT . '/public/imgs/product/';

        $listImg = $product_delete['list_img'];

        $avatar = $product_delete['avatar'];

        $subAvatar = $product_delete['sub_avatar'];

        // Chuyển danh sách tên file ảnh thành mảng
        $listImgArray = explode('|', $listImg);

        // Hợp nhất tất cả các tên file ảnh vào một mảng để dễ quản lý
        $allImages = array_merge($listImgArray, [$avatar, $subAvatar]);

        // Lặp qua tất cả các tệp trong thư mục
        foreach ($allImages as $fileName) {
            $filePath = $folderPath . $fileName;
            // Kiểm tra xem tệp có tồn tại hay không
            if (file_exists($filePath)) {
                // Nếu có, thực hiện xóa tệp
                unlink($filePath);
                echo "Đã xóa: $fileName <br>";
            } else {
                echo "Không tìm thấy tệp: $fileName <br>";
            }
        }
        $this->__model['product']->delete($id);
    }

    function edit()
    {
        if (!empty($_POST)) {

            $list_require = ['sp_ten', 'sp_gia',  'size', 'color'];

            //Check dữ liệu require của post
            function check_post($list_require)
            {
                $diff = array_diff($list_require, array_keys($_POST));
                return empty($diff);
            }

            if (check_post($list_require)) {

                $this->__model["product_detail"] = $this->model('admin/ProductDetailModel');
                $this->__model["image"] = $this->model('admin/ImgModel');
                $this->__model["color"] = $this->model('admin/ColorDetailModel');
                $this->__model["size"] = $this->model('admin/SizeDetailModel');

                $product_id = !empty($_POST['sp_id']) ? $_POST['sp_id'] : 0;

                if (!empty($_POST['dm_id'])) $data_product_edit['dm_id'] = $_POST['dm_id'];
                $data_product_edit['sp_ten'] = $_POST["sp_ten"];
                $data_product_edit['sp_gia'] = $_POST['sp_gia'];

                $this->__model['product']->edit($data_product_edit, $product_id, false);

                $delete_size_success = $this->__model["size"]->delete($product_id, false);

                if (!empty($_POST['size']) && $delete_size_success) {
                    foreach ($_POST['size'] as $value) {
                        $data_size_product['sp_id'] = $product_id;
                        $data_size_product['s_id'] = $value;
                        $this->__model["size"]->add($data_size_product, false);
                    }
                }

                $delete_color_success = $this->__model["color"]->delete($product_id, false);

                if (!empty($_POST['color']) && $delete_color_success) {
                    foreach ($_POST['color'] as $value) {
                        $data_color_product['sp_id'] = $product_id;
                        $data_color_product['m_id'] = $value;
                        $this->__model["color"]->add($data_color_product, false);
                    }
                }

                $data_img = [];

                if (!empty($_POST['anh_chinh'])) $data_img['avatar'] = $_POST['anh_chinh'];
                if (!empty($_POST['anh_sub'])) $data_img['sub_avatar'] = $_POST['anh_sub'];
                if (!empty($_POST['ds_anh'])) $data_img['list_img'] = $_POST['ds_anh'];

                if (!empty($data_img)) {
                    $list_img_delete = [];
                    $current_product = $this->__model["image"]->find($product_id);

                    // Hàm di chuyển ảnh vào thư mục chỉ định
                    function moveImagesToProductFolder($files, $uploadDir = _DIR_ROOT . '/public/imgs/product/')
                    {
                        $result = [
                            'avatar' => [],
                            'sub_avatar' => [],
                            'img_des' => []
                        ];

                        // Kiểm tra và tạo thư mục đích nếu nó không tồn tại
                        if (!file_exists($uploadDir)) {
                            mkdir($uploadDir, 0777, true);
                        }
                        // Xử lý avatar
                        if (!empty($files['avatar'])) {
                            if ($files['avatar']['error'] === 0 && in_array(strtolower(pathinfo($files['avatar']['name'], PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png']) && $files['avatar']['size'] <= 1048576) {
                                list($newFilename, $fullPath) = generateUniqueFilename($files['avatar']['name'], $uploadDir, 'avatar_');
                                if (move_uploaded_file($files['avatar']['tmp_name'], $fullPath)) {
                                    $result['avatar'][] = $newFilename;
                                } else {
                                    $result['avatar'][] = "Không thể chuyển avatar vào thư mục $uploadDir";
                                }
                            } else {
                                $result['avatar'][] = "Lỗi khi tải lên avatar. Kiểm tra size và định dạng (jpg, jpeg, png).";
                            }
                        }

                        // Xử lý sub_avatar
                        if (!empty($files['sub_avatar'])) {
                            if ($files['sub_avatar']['error'] === 0 && in_array(strtolower(pathinfo($files['sub_avatar']['name'], PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png']) && $files['sub_avatar']['size'] <= 1048576) {
                                list($newFilename, $fullPath) = generateUniqueFilename($files['sub_avatar']['name'], $uploadDir, 'sub_avatar_');
                                if (move_uploaded_file($files['sub_avatar']['tmp_name'], $fullPath)) {
                                    $result['sub_avatar'][] = $newFilename;
                                } else {
                                    $result['sub_avatar'][] = "Không thể chuyển sub-avatar vào thư mục $uploadDir";
                                }
                            } else {
                                $result['sub_avatar'][] = "Lỗi khi tải lên sub-avatar. Kiểm tra size và định dạng (jpg, jpeg, png).";
                            }
                        }

                        // Xử lý img_des  
                        if (!empty($files['img_des'])) {
                            for ($i = 0; $i < count($files['img_des']['tmp_name']); $i++) {
                                if ($files['img_des']['error'][$i] === 0 && in_array(strtolower(pathinfo($files['img_des']['name'][$i], PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png']) && $files['img_des']['size'][$i] <= 1048576) {
                                    list($newFilename, $fullPath) = generateUniqueFilename($files['img_des']['name'][$i], $uploadDir, 'img_des_');
                                    if (move_uploaded_file($files['img_des']['tmp_name'][$i], $fullPath)) {
                                        $result['img_des'][$i] = $newFilename;
                                    } else {
                                        $result['img_des'][$i] = "Không thể chuyển ảnh img_des[$i] vào thư mục $uploadDir";
                                    }
                                } else {
                                    $result['img_des'][$i] = "Lỗi khi tải lên ảnh img_des[$i]. Kiểm tra size và định dạng (jpg, jpeg, png).";
                                }
                            }
                        }
                        // trả về ảnh chứa tên ảnh
                        return $result;
                    }

                    function remove_img($img_name, $path = _DIR_ROOT . '/public/imgs/product/')
                    {
                        $filePath = $path . $img_name;
                        if (file_exists($filePath)) {
                            // Nếu có, thực hiện xóa tệp
                            unlink($filePath);
                            echo "Đã xóa: $img_name <br>";
                        } else {
                            echo "Không tìm thấy tệp: $img_name <br>";
                        }
                    }

                    $list_name_des = [];
                    if (!empty($_FILES)) {
                        $uploadedImages = moveImagesToProductFolder($_FILES);
                    }
                    echo '<pre>';
                    print_r($uploadedImages);
                    echo '</pre>';

                    if (!empty($data_img['avatar'])) {
                        $list_img_delete['avatar'] = $current_product['avatar'];
                        $data_img['avatar'] = $uploadedImages['avatar'][0];
                    }

                    if (!empty($data_img['sub_avatar'])) {
                        $list_img_delete['sub_avatar'] = $current_product['sub_avatar'];
                        $data_img['sub_avatar'] = $uploadedImages['sub_avatar'][0];
                    }

                    function img_save($list_1, $list_2)
                    {
                        $arr_1 = explode("|", $list_1);
                        $arr_2 = explode("|", $list_2);
                        return array_intersect($arr_1, $arr_2);
                    }
                    echo '<pre>';
                    print_r($data_img);
                    echo '</pre>';

                    function findDifferentElements($array1, $array2)
                    {
                        return array_merge(array_diff($array1, $array2), array_diff($array2, $array1));
                    }

                    if (!empty($data_img['list_img'])) {
                        $list_name_des = custom_name($uploadedImages['img_des']);
                        $list_img_save = img_save($current_product["list_img"], $_POST["ds_anh"]);
                        $list_img_delete["list_img"] = findDifferentElements($list_img_save, explode("|", $current_product['list_img']));
                        if (!empty($list_name_des)) {
                            $data_img['list_img'] = (!empty($list_img_save) ? implode('|', $list_img_save) . "|"  : "") . $list_name_des;
                        } else {
                            $data_img['list_img'] = implode('|', $list_img_save);
                        }
                    }

                    if (!empty($list_img_delete["list_img"])) {
                        $folderPath = _DIR_ROOT . '/public/imgs/product/';
                        // Lặp qua tất cả các tệp trong thư mục
                        foreach ($list_img_delete["list_img"] as $fileName) {
                            $filePath = $folderPath . $fileName;
                            // Kiểm tra xem tệp có tồn tại hay không
                            if (file_exists($filePath)) {
                                // Nếu có, thực hiện xóa tệp
                                unlink($filePath);
                                echo "Đã xóa: $fileName <br>";
                            } else {
                                echo "Không tìm thấy tệp: $fileName <br>";
                            }
                        }
                    }

                    if (!empty($list_img_delete['sub_avatar'])) {
                        remove_img($list_img_delete['sub_avatar']);
                    }

                    if (!empty($list_img_delete['avatar'])) {
                        remove_img($list_img_delete['avatar']);
                    }

                    $this->__model["image"]->edit($data_img, $product_id, false);
                }
                if (!empty($_POST['cl_id'])) $data_product_detail['cl_id'] = $_POST['cl_id'];
                $data_product_detail['mota'] = $_POST['mota'];
                $this->__model["product_detail"]->edit($data_product_detail, $product_id);
            } else {
                $reponse = new Response();
                alert("Please enter all required information!");
                $reponse->redirect('admin/product', true);
            }
        }
    }
}
