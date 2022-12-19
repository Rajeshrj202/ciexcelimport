<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" value="<?=csrf_hash();?>" content="<?=csrf_token();?>">

    <title>EXCEL IMPORT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="Hr-Admin">
    <meta name="author" content="Themesberg">
     <?= $this->include('layouts/styles'); ?>
     <script type="text/javascript">
         var BASEURL="<?=site_url();?>";
     </script>
  
 
</head>

<body>
    <?= $this->include('layouts/header'); ?> 
    <?= $this->include('layouts/sidebar'); ?>
    <main class="content">

        <?= $this->include('layouts/common'); ?> 
        <?= $this->include('layouts/alert'); ?>
        <?= $this->renderSection('content'); ?>

    </main>

</body>
 
 <?= $this->include('layouts/footer'); ?>
 <?= $this->include('layouts/scripts'); ?>
 
</footer>