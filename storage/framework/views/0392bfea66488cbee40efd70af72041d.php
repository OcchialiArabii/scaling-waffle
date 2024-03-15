<?php $__env->startSection('content'); ?>

<form action="<?php echo e(route('addList')); ?>" method="POST">
  <?php echo csrf_field(); ?>
  <label for="name">Table name:</label>
  <input type="text" name="name" required>
  
  <label for="description">Description:</label>
  <textarea name="description" required></textarea>

  <button type="submit">Add table</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\OcchialiArabii\Desktop\Abibi\scaling-waffle\resources\views/addList.blade.php ENDPATH**/ ?>