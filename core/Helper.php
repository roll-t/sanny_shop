<?php
$sessionKey = Session::isInvalid();
$errors = Session::flash($sessionKey . '_errors');
$olds = Session::flash($sessionKey . '_olds');

if (!function_exists('form_error')) {
    function form_error($fieldName, $before = '', $after = '')
    {
        global $errors;
        if (!empty($errors) && array_key_exists($fieldName, $errors)) {
            return $before . $errors[$fieldName] . $after;
        }
    }
}

if (!function_exists(('old'))) {
    function old($fieldName, $default = '')
    {
        global $olds;
        if (!empty($olds[$fieldName])) {
            return $olds[$fieldName];
        } else {
            return $default;
        }
    }
}


function alert($value = '')
{
    echo "<script type='text/javascript'>alert('$value');</script>";
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

function render_array_img($value){
    return explode('|',$value);
}

// hàm đổi tên ảnh trước khi đưa vào thư mục chỉ định
function generateUniqueFilename($filename, $uploadDir, $prefix)
{
    $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $newFileName = $prefix . uniqid('') . '.' . $extension;
    $fullPath = $uploadDir . $newFileName;
    return [$newFileName, $fullPath];
}

function auto_import_css()
{
    $url = App::$app->getUrl();
    $url = explode('/', $url);
    $url = array_filter($url);
    $url = array_values($url);
    $__root_css = $url[1];
    $__file_css = !empty($url[2]) ? $url[2] : "app";
    echo '<link rel="stylesheet" href="' . _WEB_ROOT . '/public/admin/css/' . $__root_css . '/' . $__file_css . '.css">';
}
function auto_import_css_client()
{
    $url = App::$app->getUrl();
    $url = explode('/', $url);
    $url = array_filter($url);
    $url = array_values($url);
    if(!empty( $url[0])){
        $__root_css = $url[0];
        $__file_css = !empty($url[1]) ? $url[1] : "app";
        echo '<link rel="stylesheet" href="' . _WEB_ROOT . '/public/client/css/' . $__root_css . '/' . $__file_css . '.css">';
    }
}

function auto_import_js()
{
    $url = App::$app->getUrl();
    $url = explode('/', $url);
    $url = array_filter($url);
    $url = array_values($url);
    $__root_js = $url[1];
    $__file_js = !empty($url[2]) ? $url[2] : "app";

    echo '<script src="' . _WEB_ROOT . '/public/admin/js/' . $__root_js . '/' . $__file_js . '.js" ></script>';

}

function  render_option($list, $show = '', $value = '')
{
    if (!empty($list)) {
        foreach ($list as $values) {
            echo '<option value="' . $values[$value] . '">' . $values[$show] . '</option>';
        }
    }
}
