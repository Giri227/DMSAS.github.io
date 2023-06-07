<?php 
require_once('../../config.php');
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
<style>
    #uni_modal .modal-footer{
        display:none
    }
</style>
<div class="container-fluid">
    <dl>
        <dt>Category Name</dt>
        <dd class="ps-4"><?= isset($name) ? $name : "" ?></dd>
        <dt>Description</dt>
        <dd class="ps-4"><?= isset($description) ? $description : "" ?></dd>
        <dt>Status</dt>
        <dd class="ps-4">
            <?php 
            if(isset($status)):
                if($status == 1):
                    echo '<span class="badge bg-primary bg-gradient px-3 rounded-pill">Active</span>' ;
                else:
                    echo '<span class="badge bg-secondary bg-gradient px-3 rounded-pill">Inactive</span>' ;
                endif;
            endif;
            ?>    
        </dd>
    </dl>
</div>
<div class="mt-3 text-end">
    <button class="btn btn-light border bg-gradient btn-sm rounded-0" type="button" data-bs-dismiss="modal">Close</button>
</div>