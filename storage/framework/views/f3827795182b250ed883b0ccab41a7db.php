<?php $__env->startSection('content'); ?>
<p>ADD WORD <?php echo e($id); ?></p>
<form action="<?php echo e(route('lists.addWord', ['action' => 'add-word'])); ?>" method="POST">
  <?php echo csrf_field(); ?>
  <label><?php echo e($listDetails['lang1']); ?>: <input type="text" name="lang1" required autofocus></label>
  <label><?php echo e($listDetails['lang2']); ?>: <input type="text" name="lang2" required></label>
  <button type="submit" name='id' value='<?php echo e($id); ?>'>Add word</button>
</form>
<?php if(isset( $status )): ?>
<p><?php echo e($status); ?></p>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\PC\Documents\Web\laravel-project\english-vocabulary\resources\views/lists/addWord.blade.php ENDPATH**/ ?>