<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<?= $this->include('layouts/sideNav') ?>



<div class="col-md-9 p-3">

    <?php if(session('success')) :?>
        <div class="alert alert-success mt-2 w-50">
            <?= session('success');?>
        </div>  
     <?php endif ?>  
     
    <h1 class="w-50 ml-2 text-center"> <?= $pageTitle;?></h1>
    <div class="table-responsive card p-2">
        <table class="table table-sm table-striped ">
            <thead>
                <tr class="">
                    <td>Id</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Status</td>
                    <td>Action</td>
                </t>
            </thead>
            <tbody>
                <?php $counter=0;?>
                <?php foreach ($users as $item):?>                 
                <?php $counter++;?>
                <tr> 
                    <td><?= $counter;?></td>
                    <td><?= $item['name'];?></td>
                    <td><?= $item['email'];?></td>
                    <td><?= $item['status'];?></td>
                    <td>
                         <a href="<?= '/admin/edit-user/'. $item['id'];?>" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a> 
                         <a href="<?= '/admin/del-user/'. $item['id'];?>" class="btn btn-danger delete btn-sm" onclick="confirmDel(event)"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>                
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
<script>
    function confirmDel(e) {       
        if(!confirm("Do you want to delete this user?") ){
            e.preventDefault();
        }
    } 
</script>


<?= $this->endSection() ?>