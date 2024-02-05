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

    function list_product()
    {
        $this->__data['sub_content']['list_product'] = $this->__model['product']->list_product();

        $this->render_view('product');
    }

    function add_product()
    {
        $this->__data['sub_content']['categorys'] = $this->__model['product']->all("danh_muc");
        $this->__data['sub_content']['materials'] = $this->__model['product']->all("chat_lieu");
        $this->__data['sub_content']['sizes'] = $this->__model['product']->all("size");
        $this->__data['sub_content']['colors'] = $this->__model['product']->all("mau");
        $this->__data['sub_content']['title_page']="Create Product";
        $this->render_view('add_product');
    }
    
    function edit_product(){
        $id = !empty($_GET['id']) ? $_GET['id'] : 0;
        $this->__data['sub_content']['categorys'] = $this->__model['product']->all("danh_muc");
        $this->__data['sub_content']['materials'] = $this->__model['product']->all("chat_lieu");
        $this->__data['sub_content']['sizes'] = $this->__model['product']->all("size");
        $this->__data['sub_content']['colors'] = $this->__model['product']->all("mau");

        $this->__data['sub_content']['title_page']="Edit Product";

        $product_edit=$this->__model['product']->get_product($id);

        $this->__data['sub_content']['product_edit']=$product_edit[0];

        $this->__model['color_detail']=$this->model('admin/ColorDetailModel');

        $this->__model['size_detail']=$this->model('admin/SizeDetailModel');

        $color_product=$this->__model['color_detail']->get_color_product($id);

        $size_product=$this->__model['size_detail']->get_size_product($id);

        $this->__data['sub_content']['color_product']=$color_product;

        $this->__data['sub_content']['size_product']=$size_product;

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

                // hàm đổi tên ảnh trước khi đưa vào thư mục chỉ định
                function generateUniqueFilename($filename, $uploadDir, $prefix)
                {
                    $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                    $newFileName = $prefix . uniqid('') . '.' . $extension;
                    $fullPath = $uploadDir . $newFileName;
                    return [$newFileName, $fullPath];
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

            function custom_name($list = [])
            {
                $name = '';
                foreach ($list as $key => $value) {
                    if ($key != 0) {
                        $name .= '|' . $value;
                    } else {
                        $name .= $value;
                    }
                }
                return $name;
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

        $product_delete=$this->__model["image"]->find($id);

        $folderPath = _DIR_ROOT.'/public/imgs/product/';

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

    function edit(){
        if(!empty($_POST)){

            $list_require = ['sp_ten', 'sp_gia',  'size', 'color'];

            //Check dữ liệu require của post
            function check_post($list_require)
            {
                $diff = array_diff($list_require, array_keys($_POST));
                return empty($diff);
            }

            if(check_post($list_require)){

                $this->__model["product_detail"] = $this->model('admin/ProductDetailModel');
                $this->__model["image"] = $this->model('admin/ImgModel');
                $this->__model["color"] = $this->model('admin/ColorDetailModel');
                $this->__model["size"] = $this->model('admin/SizeDetailModel');

                $product_id=!empty($_POST['sp_id'])?$_POST['sp_id']:0;

                if (!empty($_POST['dm_id'])) $data_product_edit['dm_id']= $_POST['dm_id'];
                $data_product_edit['sp_ten']=$_POST["sp_ten"];
                $data_product_edit['sp_gia']=$_POST['sp_gia'];

                $this->__model['product']->edit($data_product_edit,$product_id,false);

                $delete_size_success=$this->__model["size"]->delete($product_id,false);

                if (!empty($_POST['size']) && $delete_size_success) {
                    foreach ($_POST['size'] as $value) {
                        $data_size_product['sp_id'] = $product_id;
                        $data_size_product['s_id'] = $value;
                        $this->__model["size"]->add($data_size_product, false);
                    }
                }

                $delete_color_success=$this->__model["color"]->delete($product_id,false);

                if (!empty($_POST['color']) && $delete_color_success) {
                    foreach ($_POST['color'] as $value) {
                        $data_color_product['sp_id'] = $product_id;
                        $data_color_product['m_id'] = $value;
                        $this->__model["color"]->add($data_color_product, false);
                    }
                }

                if(!empty($_POST['cl_id'])) $data_product_detail['cl_id'] = $_POST['cl_id'];
                $data_product_detail['mota'] = $_POST['mota'];
                $this->__model["product_detail"]->edit($data_product_detail, $product_id);
                

            }else{
                $reponse = new Response();
                alert("Please enter all required information!");
                $reponse->redirect('admin/product', true);
            }

            echo '<pre>';
            print_r($_POST);
            echo '</pre>';
        }
    }
}
