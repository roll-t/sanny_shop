function login() {

    const listInput = document.querySelectorAll(".form-login .group-input input")

    // lưu ý: phần key của object pải giống name của input
    
    const __WEb_ROOT = document.querySelector('.__WEB_ROOT').value;

    const boxMessError = {
        kh_taikhoan: {
            empty: "không được để trống !!",
            format: "Không chứa dấu 'cách' !!",
            exist: 'Tài khoản không tồn tại !!',
            lengthMax: "Tên đăng nhập quá dài !!",
            lengthMin: "Tên đăng nhập quá ngắn !!",
        },
        kh_matkhau: {
            empty: "không được để trống !!",
            lengthMax: `Mật khẩu quá dài !!`,
            lengthMin: `Mật khẩu quá ngắn !!`,
            match: `Mật khẩu không trùng khớp !!`,
        },
        default: "Không có thông báo ??",
        getMess: function (key, type) {
            return this[key][type] || this.default; // Trả về giá trị tương ứng hoặc giá trị mặc định
        }
    }

    function showError(input, mess) {
        const boxError = input.parentElement
        if (boxError) {
            const textError = boxError.querySelector(".erorr")
            const lineError = boxError.querySelector(".line")
            textError.innerHTML = mess
            lineError.classList.add("active")
        }
    }

    function showSuccess(input) {
        const boxError = input.parentElement
        if (boxError) {
            const textError = boxError.querySelector(".erorr")
            const lineError = boxError.querySelector(".line")
            textError.innerHTML = ''
            lineError.classList.remove("active")
        }
    }

    function check_user_name_login(input, callback) {
        $.post(`${__WEb_ROOT}/account/get_account`, { userNameLogin: input.value }, function (data) {
            if (JSON.parse(data).length<=0) {
                validate.kh_taikhoan=false
                showError(input, boxMessError.getMess(input.name, 'exist'));
                callback(false); // Gọi callback với giá trị false nếu tên người dùng đã tồn tại
            } else {
                validate.kh_taikhoan=true
                showSuccess(input);
                callback((JSON.parse(data)[0])); // Gọi callback với giá trị true nếu tên người dùng là duy nhất
            }
        });
    }

    const validate = {
        kh_taikhoan: false,
        kh_matkhau: false
    }

    const check = (listCheck) => {
        return Object.values(listCheck).filter(items => items == false).length == 0
    }

    function check_password(input, password){
        if(input.value!=password){
            showError(input, boxMessError.getMess(input.name, 'match'));
            return false;
        }else{
            showSuccess(input)
            return true;
        }
    }

    const btn_login = document.querySelector(".from-login .btn-login")
    listInput[0].addEventListener("focusout",e=>{
        check_user_name_login(listInput[0],function(value){})
    })

    btn_login.addEventListener("click", e => {
        check_user_name_login(listInput[0], function (value) {
            if(value){
                validate.kh_matkhau = value.kh_matkhau
                validate.kh_matkhau = check_password(listInput[1],validate.kh_matkhau)
                if(check(validate)){
                    const tag=document.createElement('input')
                    tag.value=value.kh_id
                    tag.name='kh_id'
                    tag.type='hidden'
                    alert("Đăng nhập thành công")
                    document.querySelector(".from-login").appendChild(tag)
                    document.querySelector(".from-login").submit()
                }
            }
        })
    })

}
login()