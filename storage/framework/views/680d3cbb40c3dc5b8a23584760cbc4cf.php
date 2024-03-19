<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <link href="<?php echo e(asset('css/styles.css')); ?>" rel="stylesheet">
  <script src="<?php echo e(asset('js/jquery-3.7.1.min.js')); ?>" defer></script>
  <title>LosLang</title>
</head>

<body>
  <a href="/home">Home Page</a>
  <h6>UP -- UP -- UP -- UP -- UP</h6>
  <?php echo $__env->yieldContent('content'); ?>
  <h6>DOWN -- DOWN -- DOWN -- DOWN</h6>
</body>

</html><?php /**PATH C:\Users\PC\Documents\Web\laravel-project\english-vocabulary\resources\views/layout.blade.php ENDPATH**/ ?>