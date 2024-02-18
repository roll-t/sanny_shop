const body_detail_import = document.querySelector(".body-import-items table")

if (body_detail_import) {
    const list_detail_import = body_detail_import.querySelectorAll(".quantity-input")
    const confirm_import = document.querySelector(".btn-confirm-import")

    var regex_numer = /^[0-9]+$/;

    list_detail_import.forEach(items => {
        items.addEventListener("keypress", (e) => {
            if (!regex_numer.test(items.value)) {
                items.value = '';
            }
        });
    })

    list_detail_import.forEach(items => {
        items.addEventListener("focusout", (e) => {
            if (!regex_numer.test(items.value)) {
                items.value = '';
            }
        });
    })

    confirm_import.addEventListener("click", e => {
        let allow = false;
        for (let index = 0; index < list_detail_import.length; index++) {
            if (list_detail_import[index].value.trim() != "" && list_detail_import[index].value.trim() != 0) {
                allow = true;
                break;
            }
        }
        if (!allow) {
            alert("Enter quantity product detail !")
        } else {
            for (let index = 0; index < list_detail_import.length; index++) {
                if (list_detail_import[index].value.trim() != "" && list_detail_import[index].value.trim() != 0) {
                    const parent=list_detail_import[index].parentElement.parentElement
                    const name =parent.querySelectorAll("td")[1].innerHTML
                    const price =parent.querySelector("td .price").innerHTML
                    const color =parent.querySelectorAll("td")[3].innerHTML
                    const size =parent.querySelectorAll("td")[4].innerHTML
                    const quantity =parent.querySelector("td .quantity-input").value
                    const new_price=parseFloat(price.replace(".", ""));
                    render_value_entry_slip(name,new_price,color,size,quantity);
                }
                show_entry_slip(true);
            }

            const space_close = document.querySelector(".space-close");
            space_close.addEventListener("click", e => {
                show_entry_slip(false);
            })
        }
    })
}

function render_value_entry_slip(name = "", price = "", color = "", size ="",quantity = "") {
    const body = document.querySelector(".table-entry-slip tbody")
    const tag = document.createElement("tr")
    const total_price= price*quantity;
    const content = `
                <td>1</td>
                <td>${name}</td>
                <td>${price} VND</td>   
                <td>${color}</td>
                <td>${size}</td>
                <td>${quantity}</td>
                <td class="total-price"><span>${new Intl.NumberFormat('vi-VN').format(total_price)}</span> VND</td>
                `
    tag.innerHTML=content;
    body.append(tag)
}

function show_entry_slip(show = false) {
    const body = document.querySelector(".wrap-body-entry-slip");
    if (show) {
        body.classList.add('active')
        const list_price=body.querySelectorAll('.total-price span')
        let sum_bil=0;
        list_price.forEach(items=>{
            sum_bil+= parseFloat((items.innerHTML).replace(/\./g, ""))
        })
        document.querySelector('.total_price_bil').innerHTML=new Intl.NumberFormat('vi-VN').format(sum_bil)
        const btn_confirm =document.querySelector(".btn-confirm-import-bil")
        btn_confirm.addEventListener("click",e=>{
            document.querySelector(".n_tongtien").value=sum_bil;
            document.querySelector(".form-import-product").submit()
        })
    } else {
        body.classList.remove('active')
        body.querySelector('tbody').innerHTML="";   
    }
}