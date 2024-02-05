function add_img() {
    const btn_add = document.querySelector(".container-add .box-img")
    const avata = document.querySelectorAll(".input-avata")[0]
    const sub_avata = document.querySelectorAll(".input-avata")[1]

    if(document.querySelector(".w.avatar__ .move_img")){
        document.querySelector(".w.avatar__  button").classList.add("active")
    }

    if(document.querySelector(".w.sub_avatar__ .move_img")){
        document.querySelector(".w.sub_avatar__  button").classList.add("active")
    }

    avata.addEventListener("click", e => {
        create_avata(avata, 'avatar');
    })


    sub_avata.addEventListener("click", e => {
        create_avata(sub_avata, 'sub_avatar');
    })

    btn_add.addEventListener("click", e => {
        create_img('.list-img-add');
    })
    remove_img();   

    function create_avata(wrap, name_) {
        const file = document.createElement('input');
        file.type = "file";
        file.click();
        const img = document.createElement('img');
        const btn_change = wrap.querySelector("button")

        file.addEventListener("change", e => {
            const targetFile = e.target.files[0];
            // check type data
            if (!targetFile.type.startsWith("image/")) {
                alert("Input is not an image type !");
                return;
            }
            const link_img = URL.createObjectURL(targetFile);
            img.src = link_img;

            file.name = name_
            file.className = "move_img"
            if (!wrap.querySelector('img')) {
                wrap.append(img)
            } else {
                wrap.querySelector('img').src = link_img
            }
            wrap.querySelector('input').value = targetFile.name
            if (wrap.querySelector(".move_img")) {
                wrap.querySelector(".move_img").remove
                wrap.append(file)
            } else {
                wrap.append(file)
            }
            btn_change.classList.add("active")
        })

    }



    function create_img(class_name_list_img) {
        const box_list_img = document.querySelector(class_name_list_img);
        const file = document.createElement('input');

        file.type = "file";
        file.click();

        file.addEventListener("change", e => {
            const targetFile = e.target.files[0];

            // check type data
            if (!targetFile.type.startsWith("image/")) {
                alert("Input is not an image type !");
                return;
            }

            const list_check = document.querySelectorAll(".container-add .img_name")

            const link_img = URL.createObjectURL(targetFile);

            if (list_check.length > 5) {
                alert("allow up to 6 photos !");
                return;
            }

            file.name = `img_des[]`

            const wrap = document.createElement('div');
            wrap.className = "img-items";

            const content = `<div class="icon-delete">
                                <ion-icon name="close-outline"></ion-icon>
                            </div>
                            <img src="${link_img}" alt="">
                            <input class="img_name" type="hidden" value="${targetFile.name}">
                            `;

            wrap.innerHTML = content;
            wrap.append(file)
            box_list_img.append(wrap);
            render_name_list_img()
            remove_img();
        });
    }


    function render_name_list_img() {
        const input_ds_anh = document.querySelector('.container-add .ds_anh')
        let list_input = document.querySelectorAll(".container-add .img-items .img_name")
        let ds_anh = ''
        list_input.forEach((items, index) => {
            if (index == 0) {
                ds_anh += items.value;
            } else {
                ds_anh += '|' + items.value;
            }
        })
        input_ds_anh.value = ds_anh
    }

    function remove_img() {
        const list_img_add = document.querySelectorAll('.container-add .list-img-add .img-items');
        list_img_add.forEach((items) => {
            const btn_delete = items.querySelector(".icon-delete")
            btn_delete.addEventListener("click", e => {
                items.remove();
                render_name_list_img()
            })
        })
    }

}

add_img();


function validate() {


    const input_price=document.querySelector(".group-input.price_product input")

    var regex_numer = /^[0-9]+$/;
    input_price.addEventListener("keypress", (e) => {
        if (!regex_numer.test(input_price.value)) {
            input_price.value = '';
        }
    });
    
    input_price.addEventListener("focusout", (e) => {
        if (!regex_numer.test(input_price.value)) {
            input_price.value = '';
        }
    });
    

    // allow submit
    const btn_submit = document.querySelector(".btn_create_product");

    btn_submit.addEventListener("click", e => {
        // check_avatar
        if (!document.querySelector(".part-upload-img .move_img")) {
            alert("Select 1 avatar picture !");
            return;
        }

        if (document.querySelectorAll('.list-img-add .img-items').length<2){
            alert("Select at least 2 descriptive photos !")
            return;
        }

        function count_check(class_list){
            let count= 0;
            const inputs = document.querySelectorAll(class_list)      
            inputs.forEach(items=>{
                if(items.checked){
                    count+=1
                }
            })
            return count;
        }

        function check_empty(class_input){
            const input =document.querySelector(class_input)
            return input.value=='';
        }

        const count_size=count_check('.list-check-size .check_ input')
        const count_color=count_check('.list-check-color .check_ input')
        const emp_name=check_empty(".group-input.name_product input")
        const emp_price=check_empty(".group-input.price_product input")
        const emp_category=check_empty('.group-input.category select')
        const emp_material=check_empty('.group-input.material select')

        if(emp_category){
            alert("select category !")
            return;
        }
        if(emp_material){
            alert("Select material !")
            return;
        }
        if(emp_name){
            alert("fill in input name !");
            return;
        }

        if(emp_price){
            alert("fill in input price !");
            return;
        }

        if(count_size==0){
            alert("Select at least 1 size !")
            return;
        }

        if(count_color==0){
            alert("Select at least 1 color !")
            return;
        }

        document.querySelector(".submit_value_post").submit()
        
    })
}

validate();