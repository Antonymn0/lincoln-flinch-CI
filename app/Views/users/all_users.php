<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<?= $this->include('layouts/sideNav') ?>



<div class="col-md-9">

    <?php if(session('success')) :?>
        <div class="alert alert-success mt-2 w-50">
            <?= session('success');?>
        </div>  
     <?php endif ?>  
     
    <h1> <?= $pageTitle;?></h1>
    <div>
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
                    <td> <a href="<?= 'edit-user/'. $item['id'];?>" class="btn btn-primary btn-sm">Edit</a> 
                         <a href="<?= 'del-user/'. $item['id'];?>" class="btn btn-danger delete btn-sm" onclick="confirmDel(event)">Del</a>
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