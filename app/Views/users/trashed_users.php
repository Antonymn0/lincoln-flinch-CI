

<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<?= $this->include('layouts/sideNav') ?>



<div class=" container col-md-9 pt-3 p-2 ">

    <?php if(session('success')) :?>
        <div class="alert alert-success mt-2 w-50">
            <?= session('success');?>
        </div>  
     <?php endif ?>   
     
    <h1 class="col-md-6 text-center ml-5"> Trashed users</h1>
    <div class="table-responsive  card m-2 ">
        <table class="table table-sm table-striped table-hover ">
            <thead>
                <tr class="">
                    <td>Id</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Deleted on</td>
                    <td>Action</td>
                </t>
            </thead>
            <tbody>
                <?php $counter=0;?>
                <?php foreach ($users as $item):?>                 
                <?php $counter++;?>
                <tr> 
                    <td><?php echo $counter;?></td>
                    <td><?php echo $item['name'];?></td>
                    <td><?php echo $item['email'];?></td>
                    <td><?php echo date("Y-m-d H:m:s", strtotime($item['deleted_at']));?></td>
                    <td> <a href="<?php echo 'restore-user/'. $item['id'];?>" class="btn btn-primary btn-sm" onclick="confirmRestore(event)"><i class="bi bi-arrow-counterclockwise"></i></a> 
                         <a href="<?php echo 'parmanently-del-user/'. $item['id'];?>" class="btn btn-danger btn-sm" onclick="confirmDel(event)"><i class="bi bi-trash2-fill"></i></a>
                    </td>
                </tr>
                
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>

<script>
    function confirmRestore(e) {       
        if(!confirm("Do you want to restore this user?") ){
            e.preventDefault();
        }
    } 
    function confirmDel(e) {       
        if(!confirm("Do you want to PARMANENTLY  delete this user? \n NB: This action can NOT be undone.") ){
            e.preventDefault();
        }
    } 
</script>
<?= $this->endSection() ?>