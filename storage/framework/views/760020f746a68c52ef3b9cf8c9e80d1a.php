<?php $__env->startSection('content'); ?>
<form action="/add-list" method="GET">
  <button>Add list</button>
</form>
<?php if(isset($_GET['statusCreate'])): ?>
    <p><?php echo e($_GET['statusCreate']); ?></p>
<?php endif; ?>
<?php if(count($lists) > 0): ?>
<span>Count: <?php echo e(count($lists)); ?> </span>
<table border='1'>
  <tr>
    <th>Name</th>
    <th>Description</th>
    <th>Options</th>
  </tr>
  <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <tr id="list_<?php echo e($list['id']); ?>">
    <td><?php echo e($list['name']); ?></td>
    <td><?php echo e($list['description']); ?></td>
    <td>
      <form action='<?php echo e(route('lists.listsOptions', ['action' => 'draw-word'])); ?>' method='GET'>
        <button class='optionBtn' title='Draw word' name='id' value='<?php echo e($list['id']); ?>'>
          <img src='<?php echo e(asset('img/btn_draw.png')); ?>' alt="Draw">
        </button>
      </form>
      <form action='<?php echo e(route('lists.listsOptions', ['action' => 'add-word'])); ?>' method='GET'>
        <button class='optionBtn' title='Add word' name='id' value='<?php echo e($list['id']); ?>'>
          <img src='<?php echo e(asset('img/btn_add.png')); ?>' alt="Add">
        </button>
      </form>
      <form action='<?php echo e(route('lists.listsOptions', ['action' => 'edit-list'])); ?>' method='GET'>
        <button class='optionBtn' title='Edit word list' name='id' value='<?php echo e($list['id']); ?>'>
          <img src='<?php echo e(asset('img/btn_modify.png')); ?>' alt="Edit">
        </button>
      </form>
      <button class='optionBtn deleteBtn' title='Delete word list' name='deleteList' value='<?php echo e($list['id']); ?>'>
        <img src='<?php echo e(asset('img/btn_delete.png')); ?>' alt="Delete">
      </button>
    </td>
  </tr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
<?php else: ?>
<p>No existing lists.</p>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\PC\Documents\Web\laravel-project\english-vocabulary\resources\views/lists/showLists.blade.php ENDPATH**/ ?>