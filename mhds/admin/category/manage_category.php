<?php 
if(isset($_GET['id'])){
    $qry = $conn->query("SELECT * FROM `category_list` where id = '{$_GET['id']}' and delete_flag = 0 ");
    if($qry->num_rows > 0 ){
        foreach($qry->fetch_array() as $k => $v){
            if(!is_numeric($k))
            $$k = $v;
        }
    }
}
?>
<section class="py-5">
    <div class="container">
        <h2 class="fw-bolder text-center"><b><?= isset($id) ? "Edit Hospital" : "Add New Hospital" ?></b></h2>
        <hr>
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm-12 col-xs-12">
                <form action="" id="category-form" class="py-3">
                    <input type="hidden" name="id" value="<?= isset($id) ? $id : '' ?>">
                    <div id="filter-holder">
                        <div class="input-group mb-3 input-group-dynamic <?= isset($name) ? 'is-filled' : '' ?>">
                            <label for="name" class="form-label">Hospital Name <span class="text-primary">*</span></label>
                            <input type="text" id="name" name="name" value="<?= isset($name) ? $name : "" ?>" autofocus class="form-control">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Address <span class="text-primary">*</span></label>
                        <textarea rows="3" id="description" name="description" class="form-control border rounded-0" required="required"><?= isset($description) ? $description : '' ?></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="status" class="form-label">Status <span class="text-primary">*</span></label>
                        <select name="status" id="status" class="form-select rounded-0" required>
                            <option class="px-2 py-2" value="1" <?= isset($status) && $status == 1 ? 'selected': '' ?>>Active</option>
                            <option class="px-2 py-2" value="2" <?= isset($status) && $status == 2 ? 'selected': '' ?>>Inactive</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn bg-primary bg-gradient btn-sm text-light w-25"><span class="material-icons">save</span></button>
                            <a href="./?page=category" class="btn bg-deafult border bg-gradient btn-sm w-25"><span class="material-icons"></span> Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<noscript id="user-filter-clone">
<a href="javascript:void(0)" class="list-group-item list-group-item"></div>
    <div class="d-flex w-100 align-items-center">
        <div class="col-1 text-center">
            <img src="" class="image-thumbnail border rounded-circle image-user-avatar-filter" alt="">
        </div>
        <div class="col-11">
            <div class="lh-1">
                <h4 class="fw-bolder uname mb-0">Mark Cooper</h4>
                <small class="username">mcooper</small>
            </div>
        </div>
    </div>
</a>
</noscript>
<script>
    var fuser_ajax;
    $(function(){
        $('#category-form').submit(function(e){
            e.preventDefault()
            $('.pop-alert').remove()
            var _this = $(this)
            var el = $('<div>')
            el.addClass("pop-alert alert alert-danger text-light")
            el.hide()
            if($('[name="to_user"]').val() == ''){
                el.text('Recepient is required.')
                _this.prepend(el)
                el.show('slow')
                $('html, body').scrollTop(_this.offset().top - '150')
                return false;
            }
            start_loader()
            $.ajax({
                url:'../classes/Master.php?f=save_category',
                method:'POST',
                data:$(this).serialize(),
                dataType:'json',
                error:err=>{
                    console.error(err)
                    el.text("An error occured while saving data")
                    _this.prepend(el)
                    el.show('slow')
                    $('html, body').scrollTop(_this.offset().top - '150')
                    end_loader()
                },
                success:function(resp){
                    if(resp.status == 'success'){
                        location.href= './?page=category';
                    }else if(!!resp.msg){
                        el.text(resp.msg)
                        _this.prepend(el)
                        el.show('slow')
                        $('html, body').scrollTop(_this.offset().top - '150')
                    }else{
                        el.text("An error occured while saving data")
                        _this.prepend(el)
                        el.show('slow')
                        $('html, body').scrollTop(_this.offset().top - '150')
                    }
                    end_loader()
                    console

                }
            })
        })

    })
</script>