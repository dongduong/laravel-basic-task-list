<?php $request = app('Illuminate\Http\Request'); ?>


<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo app('translator')->getFromJson('quickadmin.rooms.title'); ?></h3>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('room_create')): ?>
    <p>
        <a href="<?php echo e(route('admin.rooms.create')); ?>" class="btn btn-success"><?php echo app('translator')->getFromJson('quickadmin.qa_add_new'); ?></a>
        
    </p>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('room_delete')): ?>
    <p>
        <ul class="list-inline">
            <li><a href="<?php echo e(route('admin.rooms.index')); ?>" style="<?php echo e(request('show_deleted') == 1 ? '' : 'font-weight: 700'); ?>"><?php echo app('translator')->getFromJson('quickadmin.qa_all'); ?></a></li> |
            <li><a href="<?php echo e(route('admin.rooms.index')); ?>?show_deleted=1" style="<?php echo e(request('show_deleted') == 1 ? 'font-weight: 700' : ''); ?>"><?php echo app('translator')->getFromJson('quickadmin.qa_trash'); ?></a></li>
        </ul>
    </p>
    <?php endif; ?>


    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->getFromJson('quickadmin.qa_list'); ?>
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped <?php echo e(count($rooms) > 0 ? 'datatable' : ''); ?> <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('room_delete')): ?> <?php if( request('show_deleted') != 1 ): ?> dt-select <?php endif; ?> <?php endif; ?>">
                <thead>
                    <tr>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('room_delete')): ?>
                            <?php if( request('show_deleted') != 1 ): ?><th style="text-align:center;"><input type="checkbox" id="select-all" /></th><?php endif; ?>
                        <?php endif; ?>

                        <th><?php echo app('translator')->getFromJson('quickadmin.rooms.fields.room-number'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.rooms.fields.floor'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.rooms.fields.description'); ?></th>
                        <?php if( request('show_deleted') == 1 ): ?>
                        <th>&nbsp;</th>
                        <?php else: ?>
                        <th>&nbsp;</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                
                <tbody>
                    <?php if(count($rooms) > 0): ?>
                        <?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr data-entry-id="<?php echo e($room->id); ?>">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('room_delete')): ?>
                                    <?php if( request('show_deleted') != 1 ): ?><td></td><?php endif; ?>
                                <?php endif; ?>

                                <td field-key='room_number'><?php echo e($room->room_number); ?></td>
                                <td field-key='floor'><?php echo e($room->floor); ?></td>
                                <td field-key='description'><?php echo $room->description; ?></td>
                                <?php if( request('show_deleted') == 1 ): ?>
                                <td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('room_delete')): ?>
                                                                        <?php echo Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.rooms.restore', $room->id])); ?>

                                    <?php echo Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')); ?>

                                    <?php echo Form::close(); ?>

                                <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('room_delete')): ?>
                                                                        <?php echo Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.rooms.perma_del', $room->id])); ?>

                                    <?php echo Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')); ?>

                                    <?php echo Form::close(); ?>

                                <?php endif; ?>
                                </td>
                                <?php else: ?>
                                <td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('room_view')): ?>
                                    <a href="<?php echo e(route('admin.rooms.show',[$room->id])); ?>" class="btn btn-xs btn-primary"><?php echo app('translator')->getFromJson('quickadmin.qa_view'); ?></a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('room_edit')): ?>
                                    <a href="<?php echo e(route('admin.rooms.edit',[$room->id])); ?>" class="btn btn-xs btn-info"><?php echo app('translator')->getFromJson('quickadmin.qa_edit'); ?></a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('room_delete')): ?>
<?php echo Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.rooms.destroy', $room->id])); ?>

                                    <?php echo Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')); ?>

                                    <?php echo Form::close(); ?>

                                    <?php endif; ?>
                                </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8"><?php echo app('translator')->getFromJson('quickadmin.qa_no_entries_in_table'); ?></td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?> 
    <script>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('room_delete')): ?>
            <?php if( request('show_deleted') != 1 ): ?> window.route_mass_crud_entries_destroy = '<?php echo e(route('admin.rooms.mass_destroy')); ?>'; <?php endif; ?>
        <?php endif; ?>

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>