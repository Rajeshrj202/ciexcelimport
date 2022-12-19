<?= $this->extend('layouts/master'); ?>
<?= $this->section('content'); ?>

<div class="py-1">


  <div class="col-12">
    <div class="card card-body border-0 shadow mb-4" id="preview-excel">

       <form action="<?=url_to('excel.store')?>" method="post" enctype="multipart/form-data" id="upload-excel" name="upload-excel">

     
      <div class="row">
        
      <h6 class="text-xs text-danger mb-2"> Note* :  Please use given sample excel header format </h6>
      <div class="col-md-6 mb-3">
        <label for="formFile" class="form-label">Please Upload Your Excel Sheet </label>

        <input class="form-control" type="file" id="fileexcel" name="file">
        
      </div>

      <div class="col-md-6 mt-4">
        <button class="btn btn-gray-800 mt-2 animate-up-2"  type="submit">Upload</button>
        <a class="btn btn-gray-800 mt-2 animate-up-2" href="https://github.com/Rajeshrj202/ciexcelimport/raw/main/CodeIgniterTask-Import-XLSX.xlsx"  type="button">Sample Excel Download</a>
        <a class="btn btn-gray-800 mt-2 animate-up-2" href="<?=route_to('dashboard').'?download=true';?>"  type="button">Zip Download</a>
      </div>
     
      </div>
      
    </form>
	</div>
	 <div class="card card-body" id="preview-excel">
      <table class="table user-table table-striped align-items-center" id="reportsdata">
        <thead>
          <tr>
            <th class="border-bottom">Sr No</th>
            <th class="border-bottom">Date of Installation</th>
            <th class="border-bottom">Seal name</th>
            <th class="border-bottom">Installed At</th>
            <th class="border-bottom">Type</th>
            <th class="border-bottom">Use</th>
            <th class="border-bottom">Client</th>
            <th class="border-bottom">Action</th>

          </tr>
        </thead>
        
      </table>
    </div>
  </div>
</div>

<?= $this->endSection('content'); ?>
<?= $this->section('scripts'); ?>
<script src="<?=base_url('js/datatablelist.js');?>"></script>
<?= $this->endSection('scripts'); ?>
