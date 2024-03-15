
<?php $__env->startSection('content'); ?>
<form>
  <button>Add list</button>
</form>
<?php if(count($lists) > 0): ?>
<h6>Count: <?php echo e(count($lists)); ?> </h6>
<table border='1'>
  <tr>
    <th>Name</th>
    <th>Description</th>
    <th>Options</th>
  </tr>
  <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <tr id='list_<?php echo e($list['id']); ?>'>
    <td><?php echo e($list['name']); ?></td>
    <td><?php echo e($list['description']); ?></td>
    <td><!--
      <form action='./index.php' method='GET'>
        <button class='optionBtn' title='Losuj słówko' name='drawWord' value='<?php echo e($list['id']); ?>'>
          <img src='./img/btn_draw.png' alt="Draw">
        </button>
        <button class='optionBtn' title='Dodaj słówko' name='addWord' value='<?php echo e($list['id']); ?>'>
          <img src='./img/btn_add.png' alt="Add">
        </button>
        <button class='optionBtn' title='Edytuj liste słówek' name='editList' value='<?php echo e($list['id']); ?>'>
          <img src='./img/btn_modify.png' alt="Edit">
        </button>
      </form>
      <button class='optionBtn deleteBtn' title='Usuń liste' name='deleteList' value='<?php echo e($list['id']); ?>'>
        <img src='./img/btn_delete.png' alt="Delete">
      </button>
    </td> -->
  </tr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
<?php else: ?>
<p>No existing list</p>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\PC\Documents\Web\laravel-project\english-vocabulary\resources\views/tables.blade.php ENDPATH**/ ?>