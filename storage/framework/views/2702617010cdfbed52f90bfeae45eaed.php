<?php $__env->startSection('content'); ?>

<form action="<?php echo e(route('lists.createList')); ?>" method="POST">
  <?php echo csrf_field(); ?>
  <div>
    <label for="name">Table name: </label>
    <input type="text" name="name" required>
    
    <label for="description">Description: </label>
    <input type="text" name="description" required>
  <div>
  </div>
    <label>Languages: </label>
    <select name="lang1">
      <option value="English" selected>English</option>
      <option value="Polish">Polish</option>
    </select>    
    <span> & </span>
    <select name="lang2">
      <option value="English">English</option>
      <option value="Polish" selected>Polish</option>
    </select>
  </div>
  <div>
    <span>Private:</span>
    <label>Yes<input type="radio" name="private" value="1" checked></label>
    <label>No<input type="radio" name="private" value="0"></label>
  </div>

  <button type="submit">Add table</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\PC\Documents\Web\laravel-project\english-vocabulary\resources\views/lists/addList.blade.php ENDPATH**/ ?>