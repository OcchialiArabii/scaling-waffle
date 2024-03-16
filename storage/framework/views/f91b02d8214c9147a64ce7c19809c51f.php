<?php $__env->startSection('content'); ?>
<p>EDIT LIST <?php echo e($id); ?></p>
<section>
  <h5>Modify list:</h5>
  <p>Name: <span><?php echo e($listDetails['name']); ?></span></p>
  <p>Description: <span><?php echo e($listDetails['description']); ?></span></p>
  <p>Private: 
    <label>Yes<input type="radio" name="private" <?php echo e(($listDetails['private'] == 1) ? 'checked' : ''); ?>></label>
    <label>No<input type="radio" name="private" <?php echo e(($listDetails['private'] == 0) ? 'checked' : ''); ?>></label>
  </p>
  <form action='<?php echo e(route('lists.listsOptions', ['action' => 'add-word'])); ?>' method='GET'>
    <button name='id' value='<?php echo e($id); ?>'>Add word</button>
  </form>
</section>
<main>
  <?php if(count($listContent) > 0): ?>
  <span>Count: <?php echo e(count($listContent)); ?> </span>
  <table border="1">
    <tr>
      <th><?php echo e($listDetails['lang1']); ?></th>
      <th><?php echo e($listDetails['lang2']); ?></th>
      <th>Options</th>
    </tr>
    <?php $__currentLoopData = $listContent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <td><?php echo e($row['lang1']); ?></td>
      <td><?php echo e($row['lang2']); ?></td>
      <td>
        <button class='optionBtn' title='Edit word' name='editWord' value='<?php echo e($row['id']); ?>'>
          <img src='<?php echo e(asset('img/btn_modify.png')); ?>' alt="Edit">
        </button>
        <button class='optionBtn' title='Delete word' name='deleteWord' value='<?php echo e($row['id']); ?>'>
          <img src='<?php echo e(asset('img/btn_delete.png')); ?>' alt="Delete">
        </button>
    </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </table>
  <?php else: ?>
  <p>No existing words in list.</p>
  <?php endif; ?>
</main>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\PC\Documents\Web\laravel-project\english-vocabulary\resources\views/lists/editList.blade.php ENDPATH**/ ?>