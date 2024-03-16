
function validateFormSignUp() {
    const listInput = document.querySelectorAll(".form-sign-up .group-input input")
    // lưu ý: phần key của object pải giống name của input
    const __WEb_ROOT = document.querySelector('.__WEB_ROOT').value;

    const boxMessError = {
        kh_ten: {
            empty: "không được để trống !!",
            lengthMax: `Tên đăng nhập quá dài !!`,
            lengthMin: `Tên đăng nhập qúa ngắn !!`,
        },

        kh_taikhoan: {
            empty: "không được để trống !!",
            format: "Không chứa dấu 'cách' !!",
            exist: 'Tài khoản đã tồn tại !!',
            lengthMax: "Tên đăng nhập quá dài !!",
            lengthMin: "Tên đăng nhập quá ngắn !!",
        },

        kh_sdt: {
            empty: "không được để trống !!",
            format: "Sai định dạng số điện thoại !!",
        },
        kh_email: {
            empty: "không được để trống !!",
            format: "Sai định dạng email !!",
        },
        kh_matkhau: {
            empty: "không được để trống !!",
            lengthMax: `Mật khẩu quá dài !!`,
            lengthMin: `Mật khẩu quá ngắn !!`,
        },
        passwordConfirm: {
            empty: "không được để trống !!",
            match: `Mật khẩu không trùng khớp !!`,
        },
        default: "Không có thông báo ??",
        getMess: function (key, type) {
            return this[key][type] || this.default; // Trả về giá trị tương ứng hoặc giá trị mặc định
        }
    }

    const regex = {
        regexCode: {
            mail: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/,
            phone: /(84|0[3|5|7|8|9])+([0-9]{8})\b/
        },
        phone: (value) => regex.regexCode.phone.test(value),
        mail: (value) => regex.regexCode.mail.test(value)
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
        $.post(`${__WEb_ROOT}/account/check_account`, { userNameLogin: input.value }, function (data) {
            if (parseInt(data) > 0) {
                showError(input, boxMessError.getMess(input.name, 'exist'));
                callback(false); // Gọi callback với giá trị false nếu tên người dùng đã tồn tại
            } else {
                showSuccess(input);
                callback(true); // Gọi callback với giá trị true nếu tên người dùng là duy nhất
            }
        });
    }

    function checkMail(input) {
        if (!regex.mail(input.value.trim())) {
            showError(input, boxMessError.getMess(input.name, "format"))
        } else {
            showSuccess(input)
            return true
        }
        return false
    }

    function checkSpace(input) {
        let space = input.value.trim().includes(' ');
        if (space) {
            showError(input, boxMessError.getMess(input.name, 'format'))
            return false;
        } else {
            showSuccess(input)
            return true;
        }
    }

    function checkPhone(input) {
        if (!regex.phone(input.value.trim())) {
            showError(input, boxMessError.getMess(input.name, "format"))
        } else {
            showSuccess(input)
            return true
        }
        return false
    }

    function checkLength(input, min, max) {
        if (input.value.trim().length == 0) {
            showError(input, boxMessError.getMess(input.name, "empty"))
        } else if (input.value.trim().length < min) {
            showError(input, boxMessError.getMess(input.name, "lengthMin"))
        } else if (input.value.trim().length > max) {
            showError(input, boxMessError.getMess(input.name, "lengthMax"))
        } else {
            showSuccess(input)
            return true
        }
        return false
    }

    function matchPassword(password, passwordConfirm) {
        if (password.value.trim() != passwordConfirm.value.trim()) {
            showError(passwordConfirm, boxMessError.getMess(passwordConfirm.name, "match"))
        } else {
            showSuccess(passwordConfirm)
            return true
        }
        return false
    }

    // __ main__ handle
    // event validate input

    const validate = {
        kh_ten: false,
        kh_email: false,
        kh_taikhoan: false,
        kh_sdt: false,
        kh_matkhau: false,
        passwordConfirm: false
    }


    function handleInput() {
        listInput.forEach((input, index) => {
            switch (input.name) {
                case 'kh_ten':
                    validate.kh_ten = checkLength(input, 3, 50)
                    break;
                case 'kh_taikhoan':
                    check_user_name_login(input, function (isUnique) {
                        validate.kh_taikhoan = checkLength(input, 5, 20) && checkSpace(input) && isUnique
                        checkLength(input, 5, 20) && checkSpace(input) && check_user_name_login(input, function (isUnique) {
                        });
                    });
                    break;
                case 'kh_sdt':
                    validate.kh_sdt = checkPhone(input)
                    break;
                case 'kh_email':
                    validate.kh_email = checkMail(input)
                    break;
                case 'kh_matkhau':
                    validate.kh_matkhau = checkLength(input, 3, 12)
                    break;
                case 'passwordConfirm':
                    validate.passwordConfirm = matchPassword(listInput[index - 1], input) && checkLength(input, 0, 1000)
                    break;
                default:
                    break;
            }
        })
    }


    listInput.forEach((input, index) => {
        input.addEventListener("input", e => {
            if (e.keyCode != 32) {
                switch (input.name) {
                    case 'kh_ten':
                        validate.kh_ten = checkLength(input, 3, 50)
                        break;
                    case 'kh_taikhoan':
                        check_user_name_login(input, function (isUnique) {
                            validate.kh_taikhoan = checkLength(input, 5, 20) && checkSpace(input) && isUnique
                            checkLength(input, 5, 20) && checkSpace(input) && check_user_name_login(input, function (isUnique) {
                            });
                        });
                        break;
                    case 'kh_sdt':
                        validate.kh_sdt = checkPhone(input)
                        break;
                    case 'kh_email':
                        validate.kh_email = checkMail(input)
                        break;
                    case 'kh_matkhau':
                        validate.kh_matkhau = checkLength(input, 3, 12)
                        break;
                    case 'passwordConfirm':
                        validate.passwordConfirm = matchPassword(listInput[index - 1], input) && checkLength(input, 0, 1000)
                        break;
                    default:
                        break;
                }
            }
        })
    })

    listInput.forEach((input, index) => {
        input.addEventListener("focusout", e => {
            if (e.keyCode != 32) {
                switch (input.name) {
                    case 'kh_ten':
                        validate.kh_ten = checkLength(input, 3, 50)
                        break;
                    case 'kh_taikhoan':
                        check_user_name_login(input, function(isUnique) {
                            validate.kh_taikhoan= checkLength(input, 5, 20) && checkSpace(input) && isUnique
                            checkLength(input, 5, 20) && checkSpace(input) && check_user_name_login(input, function(isUnique) {
                            });
                        });
                        break;
                    case 'kh_sdt':
                        validate.kh_sdt = checkPhone(input)
                        break;
                    case 'kh_email':
                        validate.kh_email = checkMail(input)
                        break;
                    case 'kh_matkhau':
                        validate.kh_matkhau = checkLength(input, 3, 12)
                        break;
                    case 'passwordConfirm':
                        validate.passwordConfirm = matchPassword(listInput[index - 1], input) && checkLength(input, 0, 1000)
                        break;
                    default:
                        break;
                }
            }
        })
    })

    const check = (listCheck) => {
        return Object.values(listCheck).filter(items => items == false).length == 0
    }


    // event confirm register
    const btn = document.querySelector(".confirm-sign-up");
    btn.addEventListener("click", (e) => {
        handleInput()
        !check(validate) && e.preventDefault();
        if (check(validate)) {
            alert("Đăng ký thành công!")
            document.querySelector(".form-value-sign-up").submit()
        }
    });
}


validateFormSignUp()