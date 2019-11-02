<?php $__env->startSection('content'); ?>
<div class="container-fluid app-body">
	<h3>Recent post sent to buffer
    </h3>

    <div class="search-container">
        <ul style="float:left;  display:inline;">
            <li  style="float:left;  display:inline;">
            <form action="history" method='get'>
              <input type="search" placeholder="Search.." name="search">
              <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </li>
        <li  style="float:left;  display:inline;">
            <form action="history" method='get'>
                    &nbsp;
                    &nbsp;
                    <input type="date"  name="date">
                    <button type="submit"><i class="fa fa-search"></i></button>
                  </form>
                  &nbsp;
                  &nbsp;

                </li>
                <li  style="float:left;  display:inline;">
            <form action="history" method='get'>
                    &nbsp;
                    &nbsp;
                      <select name="filter" style="width:300px; height:30px;">
                          <option> all groups</option>
                          <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($group->id); ?>"><?php echo e($group->name); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                      <button type="submit"><i class="fa fa-search"></i> (filter)</button>
                    </form>
                </li>
                </ul>
          </div>
	<div class="row">
		<div class="col-md-12">
			<table class="table "> 
				<thead> 
					<tr><th>Group Name</th> <th>Group Type</th> <th>Account Name</th> <th>Post Text</th> <th>Time</th> </tr> 
				</thead> 
				<tbody>
                    <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                    <td><?php echo e($data->name); ?></td>
                    <td><?php echo e($data->type); ?></td>
                    <td><img style="height:60px; border-radius:30px;" src="<?php echo e($data->avatar); ?>"></td>
                    
                    <td><?php echo e($data->post_text); ?></td>
                    <td><?php echo e($data->time); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
				<tbody>
            </table>
            <?php echo e($datas->links()); ?>

		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>