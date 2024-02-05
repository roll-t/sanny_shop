<div class="col-md-12 mb-lg-0 mb-4">
    <div class="card mt-4">
        <div class="card-header pb-0 p-3">
            <div class="row">
                <div class="col-6 d-flex align-items-center">
                    <h6 class="mb-0">List Category</h6>
                </div>
                <div class="col-6 text-end btn-add-new">
                    <a class="btn bg-gradient-dark mb-0" href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New Category</a>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <input class="_WEB_ROOT" type="hidden" value="<?php echo _WEB_ROOT ?>">
                    <form action="" class="form-add-category" method="post">
                        <input type="hidden" name="dm_id" class="id-hidden" value="">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add new category</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Category name.</label>
                                        <input name="dm_ten" type="text" class="form-control border border-2 p-2 category-name" id="exampleFormControlInput1" placeholder="Enter frist category name">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="btn" data-bs-dismiss="modal">Close</div>
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body p-3">
            <div class="row">
                <?php
                if (!empty($list_category)) {
                    foreach ($list_category as $value) {
                        echo '
                        <div class="col-md-12  cursor-pointer">
                            <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                                <input class="id-edit" type="hidden" value="'.$value['dm_id'].'">
                                <img class="w-3 me-3 mb-0" src="' . _WEB_ROOT . '/public/admin/img/logos/mastercard.png" alt="logo">
                                <h6 class="mb-0 dm_ten">' . $value['dm_ten'] . '</h6>
                                <span class="ms-auto">
                                    <a class="edit-category" href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="material-icons p-2 text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit category">edit</i>
                                    </a>
                                    <a class="delete-category" href="' . _WEB_ROOT . '/admin/category/delete?id=' . $value['dm_id'] . '">
                                    <i class="material-icons p-2 text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete category">delete</i>
                                    </a>
                                </span>
                            </div>
                        ';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>

<script>

    const form = document.querySelector('.form-add-category');
    const _WEB_ROOT=document.querySelector("._WEB_ROOT").value;
    const btn_add_new =document.querySelector(".btn-add-new");
    const input = document.querySelector('.category-name');

    btn_add_new.addEventListener("click",e=>{
        form.action=_WEB_ROOT+"/admin/category/add";
    })

    const btn_delete = document.querySelectorAll(".delete-category");
    const edit_category=document.querySelectorAll(".edit-category");
    const id_hidden=document.querySelector(".id-hidden")
    edit_category.forEach(items=>{
        items.addEventListener("click",e=>{
            const parent = e.currentTarget.parentElement.parentElement
            const name =parent.querySelector(".dm_ten").innerHTML;
            const id =parent.querySelector(".id-edit").value;
            form.action=_WEB_ROOT+"/admin/category/edit";
            fill_value(id_hidden,id);
            fill_value(input,name);
        })
    })

    allow_submit(form, input);
    
    btn_delete.forEach(items=>{
        allow_delete(items, "Do you want delete this category ??");
    })

</script>

