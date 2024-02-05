<?php
$sessionKey=Session::isInvalid();
$errors=Session::flash($sessionKey.'_errors');
$olds=Session::flash($sessionKey.'_olds');

if(!function_exists('form_error')){
    function form_error($fieldName,$before='',$after=''){
        global $errors;
        if(!empty($errors) && array_key_exists($fieldName,$errors)){
            return $before.$errors[$fieldName].$after ;
        }
    }
}

if(!function_exists(('old'))){
    function old($fieldName,$default=''){
        global $olds;
        if(!empty($olds[$fieldName])){
            return $olds[$fieldName];
        }else{
            return $default;
        }
    }
}

function checkImg($value='',$dir=''){
    if(!empty($_FILES[$value]["name"])){
        $target_dir = _DIR_ROOT."/".$dir."/";// đường dẫn tới file upload
        $target_file = $target_dir . basename($_FILES[$value]["name"]);// taoj duong dan
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));//lay duoi phan mo rong
        $nameFile= $_FILES[$value]["name"];
        $uploadOk = true;

        // ham check duoi
        $arr_img=["jpg","png","jpeg","gif"];
        // ham in_arr kiem tra 1 phan tu co trong mang hay khong
        if(!in_array($imageFileType,$arr_img)){
            $uploadOk='pathInfo';
        }

        // check dung luong don vi kb
        if($_FILES[$value]['size']>500000){
            $uploadOk='size';
        }
        
        if(file_exists($target_file)){
            $uploadOk='same';
        }

        if($uploadOk===true){
            move_uploaded_file($_FILES[$value]["tmp_name"],$target_file);
            return $nameFile;
        }else{
            return $uploadOk;
        }
    }else{
        return false;
    }
}

function alert($value=''){
    echo "<script type='text/javascript'>alert('$value');</script>";
}

function auto_import_css(){
    $url = App::$app->getUrl();
    $url = explode('/',$url);
    $url= array_filter($url);
    $url=array_values($url);
    $__root_css=$url[1];
    $__file_css=!empty($url[2])?$url[2]:"app";
    echo '<link rel="stylesheet" href="'._WEB_ROOT.'/public/admin/css/'.$__root_css.'/'.$__file_css.'.css">';
}

function auto_import_js(){
    $url = App::$app->getUrl();
    $url = explode('/',$url);
    $url= array_filter($url);
    $url=array_values($url);
    $__root_js=$url[1];
    $__file_js=!empty($url[2])?$url[2]:"app";
    echo '<script src="'._WEB_ROOT.'/public/admin/js/'.$__root_js.'/'.$__file_js.'.js" ></script>';
}

function  render_option($list,$show='',$value=''){
    if(!empty($list)){
        foreach($list as $values){
            echo '<option value="'.$values[$value].'">'.$values[$show].'</option>';
        }
    }
}