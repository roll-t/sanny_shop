function f_confirm(mess = "no caption") {
    return confirm(mess)
}

function allow_submit(form, input) {
    form.addEventListener("submit", e => {
        e.preventDefault();
        if (input.value.trim() != "") {
            form.submit();
        }
    })
}

function allow_delete(btn, mess) {
    btn.addEventListener("click", e => {
        if (!f_confirm(mess)) {
            e.preventDefault();
        }
    })
}

function fill_value(input, mess = '') {
    if (mess == '') return false;
    input.value = mess.trim();
}

