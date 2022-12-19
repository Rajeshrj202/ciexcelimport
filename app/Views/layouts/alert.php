<?php if(isset($errors) && count($errors)>0):?>
<?php foreach ($errors as $error): ?>
    <div class="alert alert-danger alert-dismissible fade show">
    <?= esc($error); ?>
    </div>
<?php endforeach; ?>
<?php endif; ?>


<?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show">
    <?php echo session()->getFlashdata('success'); ?>
    </div>
<?php endif; ?>
