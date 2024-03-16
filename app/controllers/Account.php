<?php
class Account extends Controller{
    private $__model,$__data;
    function __construct()
    {
        $this->__model['account']=$this->model('accountModel');
    }

    public function index(){
        $this->login();
    }
    
    public function login(){
        $this->__data['content']='client/account/login';
        $this->__data['sub_content']['title']='trang dang nhap';
        $this->view('layouts/client_layout',$this->__data);
    }
    
    public function sign_up(){
        $this->__data['content']='client/account/sign_up';
        $this->__data['sub_content']['title']='trang dang nhap';
        $this->view('layouts/client_layout',$this->__data);
    }

    function check_account(){
        $this->__data['account']=$this->__model['account']->find_account($_POST['userNameLogin']);
        echo count($this->__data['account']);
    }

    function get_account(){
        $this->__data['account']=$this->__model['account']->find_account($_POST['userNameLogin']);
        echo json_encode($this->__data['account']);
    }

    function handle_sign_up(){
        if(!empty($_POST)){
            // $this->__data['account']->add($_POST);
            $kh_ten=$_POST['kh_ten'];
            $kh_taikhoan=$_POST['kh_taikhoan'];
            $kh_email=$_POST['kh_email'];
            $kh_sdt=$_POST['kh_sdt'];
            $kh_matkhau=$_POST['kh_matkhau'];
            $sql="INSERT INTO `khach_hang` (`kh_id`, `kh_ten`, `kh_taikhoan`, `kh_email`, `kh_sdt`, `kh_matkhau`) VALUES (NULL, '".$kh_ten."', '".$kh_taikhoan."', '".$kh_email."', '".$kh_sdt."', '".$kh_matkhau."')";
            $result=$this->db->query($sql);
            $this->__model['account']->return_front($result);
        }
    }

    function handle_login(){
        if(!empty($_POST)){
            $account=json_encode($_POST);
            setcookie("sany_account", $account, time() + 3600, "/");
        }
        $response= new Response();
        $response->redirect('home');
    }

    function logout(){
     if(!empty($_COOKIE['sany_account'])){
        setcookie("sany_account",'', time() - 3600, "/");
     }   
     $response= new Response();
     $response->redirect('home');
    }
}