<?php 
if(isset($_GET['id'])){
    $qry = $conn->query("SELECT * FROM `clinic_list` where id = '{$_GET['id']}' and delete_flag = 0 ");
    if($qry->num_rows > 0 ){
        foreach($qry->fetch_array() as $k => $v){
            if(!is_numeric($k))
            $$k = $v;
        }
        $categories = $conn->query("SELECT c.category_id FROM clinic_category c inner join category_list cc on c.category_id = cc.id where c.clinic_id = '{$id}' ")->fetch_all(MYSQLI_ASSOC);
			$cats = array_column($categories,'category_id');
    }
}
?>
<style>
    #doctor-list{
        counter-reset: doctor;
    }
    .doctor-label::after{
        counter-increment: doctor;
        content:" "counter(doctor);
    }
    #contact-list{
        counter-reset: contact;
    }
    .contact-label::after{
        counter-increment: contact;
        content:" "counter(contact);
    }
    #email-list{
        counter-reset: email;
    }
    .email-label::after{
        counter-increment: email;
        content:" "counter(email);
    }
</style>
<section class="py-5">
    <div class="container">
        <h2 class="fw-bolder text-center"><b><?= isset($id) ? "Edit Clinic" : "Add New Clinic" ?></b></h2>
        <hr>
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm-12 col-xs-12">
                <form action="" id="clinic-form" class="py-3">
                    <input type="hidden" name="id" value="<?= isset($id) ? $id : '' ?>">
                    <div class="input-group mb-3 input-group-static is-filled">
                        <label for="category_id" class="form-label">Category <span class="text-primary">*</span></label>
                        <select id="category_id" name="category_id[]" value="<?= isset($location) ? $location : "" ?>" multiple class="form-select">
                        <?php 
                        $categories = $conn->query("SELECT * FROM `category_list` where delete_flag = 0 and `status` = 1 order by `name` asc");
                        while($row = $categories->fetch_assoc()):
                        ?>
                        <option value="<?= $row['id'] ?>" <?= isset($cats) && in_array($row['id'], $cats) ? "selected" : "" ?>><?= $row['name'] ?></option>
                        <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="input-group mb-3 input-group-dynamic <?= isset($location) ? 'is-filled' : '' ?>">
                        <label for="location" class="form-label">Location <span class="text-primary">*</span></label>
                        <input type="text" id="location" name="location" value="<?= isset($location) ? $location : "" ?>" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Doctor(s) <span class="text-primary">*</span> <button tabindex="-1" class="mb-0 py-0 ms-3 btn btn-sm btn-primary bg-gradient rounded-pill" id="add_doctor" type="button"><i class="fa fa-plus"></i> Add Doctor</button></label>
                        <div id="doctor-list" class="px-3 mt-2">
                            <?php if(!isset($doctors)): ?>
                                <div class="input-group input-group-dynamic doctor-item mb-3">
                                    <label for="" class="form-label doctor-label">Doctor</label>
                                    <input type="text" name="doctor[]" class="form-control" required>
                                    <button tabindex="-1" class="btn btn-default bg-transparent mb-0 text-danger remove-doctor" type="button"><span class="material-icons">close</span></button>
                                </div>
                            <?php else: ?>
                            <?php foreach(explode("||", $doctors) as $doctor): ?>
                                <div class="input-group input-group-dynamic doctor-item mb-3 is-filled">
                                    <label for="" class="form-label doctor-label">Doctor</label>
                                    <input type="text" name="doctor[]" class="form-control" value="<?= $doctor ?>" required>
                                    <button tabindex="-1" class="btn btn-default bg-transparent mb-0 text-danger remove-doctor" type="button"><span class="material-icons">close</span></button>
                                </div>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Contact Number(s) <span class="text-primary">*</span> <button tabindex="-1" class="mb-0 py-0 ms-3 btn btn-sm btn-primary bg-gradient rounded-pill" id="add_contact" type="button"><i class="fa fa-plus"></i> Add Contact</button></label>
                        <div id="contact-list" class="px-3 mt-2">
                            <?php if(!isset($contacts)): ?>
                                <div class="input-group input-group-dynamic contact-item mb-3">
                                    <label for="" class="form-label contact-label">Contact #:</label>
                                    <input type="text" name="contact[]" class="form-control" required>
                                    <button tabindex="-1" class="btn btn-default bg-transparent mb-0 text-danger remove-contact" type="button"><span class="material-icons">close</span></button>
                                </div>
                            <?php else: ?>
                            <?php foreach(explode("||", $contacts) as $contact): ?>
                                <div class="input-group input-group-dynamic contact-item mb-3 is-filled">
                                    <label for="" class="form-label contact-label">Contact #:</label>
                                    <input type="text" name="contact[]" class="form-control" value="<?= $contact ?>" required>
                                    <button tabindex="-1" class="btn btn-default bg-transparent mb-0 text-danger remove-contact" type="button"><span class="material-icons">close</span></button>
                                </div>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Email(s) <span class="text-primary">*</span> <button tabindex="-1" class="mb-0 py-0 ms-3 btn btn-sm btn-primary bg-gradient rounded-pill" id="add_email" type="button"><i class="fa fa-plus"></i> Add email</button></label>
                        <div id="email-list" class="px-3 mt-2">
                            <?php if(!isset($emails)): ?>
                            <div class="input-group input-group-dynamic email-item mb-3">
                                <label for="" class="form-label email-label">Email:</label>
                                <input type="email" name="email[]" class="form-control" required>
                                <button tabindex="-1" class="btn btn-default bg-transparent mb-0 text-danger remove-email" type="button"><span class="material-icons">close</span></button>
                            </div>
                            <?php else: ?>
                            <?php foreach(explode("||", $emails) as $email): ?>
                                <div class="input-group input-group-dynamic email-item mb-3 is-filled">
                                    <label for="" class="form-label email-label">Email</label>
                                    <input type="text" name="email[]" class="form-control" value="<?= $email ?>" required>
                                    <button tabindex="-1" class="btn btn-default bg-transparent mb-0 text-danger remove-email" type="button"><span class="material-icons">close</span></button>
                                </div>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="other" class="form-label">Other Information <span class="text-primary">*</span></label>
                        <textarea name="other" id="other" class="form-control border rounded-0 px-2 py-1" rows="4"><?= isset($other) ? $other : '' ?></textarea>
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
                            <button type="submit" class="btn bg-primary bg-gradient btn-sm text-light w-25"><span class="material-icons">save</span> Save</button>
                            <a href="./?page=clinic" class="btn bg-deafult border bg-gradient btn-sm w-25"><span class="material-icons">keyboard_arrow_left</span> Cancel</a>
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
        $('#category_id').select2({
            placeholder:"Please Select Here",
            width:"100%",
        })
        $('.doctor-item').find('.remove-doctor').click(function(){
            if($('.doctor-item').length > 1){
                $('.doctor-item').remove()
            }
            else{
                $('.doctor-item').find('input').val('')
            }
        })
        $('#add_doctor').click(function(){
            var item = $('.doctor-item').first().clone()
            item.find('input').val('')
            $('#doctor-list').append(item)
            item.find('input').focus()
            item.find('.remove-doctor').click(function(){
                if($('.doctor-item').length > 1){
                    item.remove()
                }
                else{
                    item.find('input').val('')
                }
            })
            item.find('input').on('input',function(){
                if($(this).val() !== ''){
                    item.addClass('is-filled')
                }else{
                    item.removeClass('is-filled')
                }
            })
        })
        $('.contact-item').find('.remove-contact').click(function(){
            if($('.contact-item').length > 1){
                $('.contact-item').remove()
            }
            else{
                $('.contact-item').find('input').val('')
            }
        })
        $('#add_contact').click(function(){
            var item = $('.contact-item').first().clone()
            item.find('input').val('')
            $('#contact-list').append(item)
            item.find('input').focus()
            item.find('.remove-contact').click(function(){
                if($('.contact-item').length > 1){
                    item.remove()
                }
                else{
                    item.find('input').val('')
                }
            })
            item.find('input').on('input',function(){
                if($(this).val() !== ''){
                    item.addClass('is-filled')
                }else{
                    item.removeClass('is-filled')
                }
            })
        })
        $('.email-item').find('.remove-email').click(function(){
            if($('.email-item').length > 1){
                $('.email-item').remove()
            }
            else{
                $('.email-item').find('input').val('')
            }
        })
        $('#add_email').click(function(){
            var item = $('.email-item').first().clone()
            item.find('input').val('')
            $('#email-list').append(item)
            item.find('input').focus()
            item.find('.remove-email').click(function(){
                if($('.email-item').length > 1){
                    item.remove()
                }
                else{
                    item.find('input').val('')
                }
            })
            item.find('input').on('input',function(){
                if($(this).val() !== ''){
                    item.addClass('is-filled')
                }else{
                    item.removeClass('is-filled')
                }
            })
        })
        $('#clinic-form').submit(function(e){
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
                url:'../classes/Master.php?f=save_clinic',
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
                        location.href= './?page=clinic/view_details&id='+resp.cid;
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