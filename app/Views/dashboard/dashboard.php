<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<?= $this->include('layouts/sideNav') ?>
    
    <div class="container col-md-9 ">
        <h1>Dashboard</h1>
        <div class="container row ">
            <div class="col-md-2 card p-2 m-1">
                <div class="border-bottom">
                    All users
                </div>
                <div class="text-center">
                    5000
                </div>
            </div>          
            <div class="col-md-2 card p-2 m-1">
                <div class="border-bottom">
                    New users
                </div>
                <div class="text-center">
                    5
                </div>
            </div>          
            <div class="col-md-2 card p-2 m-1">
                <div class="border-bottom">
                    Active users
                </div>
                <div class="text-center">
                    100
                </div>
            </div>          
            <div class="col-md-2 card p-2 m-1">
                <div class="border-bottom">
                    Pending users
                </div>
                <div class="text-center">
                    50
                </div>
            </div>          
            <div class="col-md-2 card p-2 m-1">
                <div class="border-bottom">
                    Trashed
                </div>
                <div class="text-center">
                   5
                </div>
            </div>          
        </div>
    </div>
    


<?= $this->endSection() ?>