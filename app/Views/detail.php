<?= $this->extend('layouts/master'); ?>
<?= $this->section('content'); ?>

<div class="py-1">


  <div class="col-12">
    <div class="card-body">
  <h2 class="display-3 mb-3"><?=$installationdetails['client'];?> <span class="pixel-pro-badge subscription-badge bg-secondary fw-bolder">Client</span>
  </h2>
  <p class="text-dark my-4"><span class="fw-bolder">Installation Date : <?=date('d-m-Y',strtotime($installationdetails['date']));?></p>
  <p class="text-dark my-4"><span class="fw-bolder">Seal Name : </span><?=$installationdetails['seal'];?></p>
  <p class="text-dark my-4"><span class="fw-bolder">Installed at :</span><?=$installationdetails['installed_at'];?></p>
  <p class="text-dark my-4"><span class="fw-bolder">Type :</span><?=$installationdetails['type'];?></p>
  <p class="text-dark my-4"><span class="fw-bolder">Use :</span><?=$installationdetails['use'];?></p>
  <p class="text-dark my-4"><span class="fw-bolder">Client Name:</span><?=$installationdetails['client'];?></p>
  <a class="btn btn-sm btn-secondary" href="<?=route_to('dashboard');?>">Go Back</a>

</div>
	 
</div>
</div>

<?= $this->endSection('content'); ?>

