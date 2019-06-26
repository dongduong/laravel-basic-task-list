<?php $request = app('Illuminate\Http\Request'); ?>


<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo app('translator')->getFromJson('quickadmin.customers.title'); ?></h3>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer_create')): ?>
    <p>
        <a href="<?php echo e(route('admin.customers.create')); ?>" class="btn btn-success"><?php echo app('translator')->getFromJson('quickadmin.qa_add_new'); ?></a>
        
    </p>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer_delete')): ?>
    <p>
        <ul class="list-inline">
            <li><a href="<?php echo e(route('admin.customers.index')); ?>" style="<?php echo e(request('show_deleted') == 1 ? '' : 'font-weight: 700'); ?>"><?php echo app('translator')->getFromJson('quickadmin.qa_all'); ?></a></li> |
            <li><a href="<?php echo e(route('admin.customers.index')); ?>?show_deleted=1" style="<?php echo e(request('show_deleted') == 1 ? 'font-weight: 700' : ''); ?>"><?php echo app('translator')->getFromJson('quickadmin.qa_trash'); ?></a></li>
        </ul>
    </p>
    <?php endif; ?>


    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->getFromJson('quickadmin.qa_list'); ?>
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped <?php echo e(count($customers) > 0 ? 'datatable' : ''); ?> <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer_delete')): ?> <?php if( request('show_deleted') != 1 ): ?> dt-select <?php endif; ?> <?php endif; ?>">
                <thead>
                    <tr>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer_delete')): ?>
                            <?php if( request('show_deleted') != 1 ): ?><th style="text-align:center;"><input type="checkbox" id="select-all" /></th><?php endif; ?>
                        <?php endif; ?>

                        <th><?php echo app('translator')->getFromJson('quickadmin.customers.fields.first-name'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.customers.fields.last-name'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.customers.fields.address'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.customers.fields.phone'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.customers.fields.email'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.customers.fields.country'); ?></th>
                        <?php if( request('show_deleted') == 1 ): ?>
                        <th>&nbsp;</th>
                        <?php else: ?>
                        <th>&nbsp;</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                
                <tbody>
                    <?php if(count($customers) > 0): ?>
                        <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr data-entry-id="<?php echo e($customer->id); ?>">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer_delete')): ?>
                                    <?php if( request('show_deleted') != 1 ): ?><td></td><?php endif; ?>
                                <?php endif; ?>

                                <td field-key='first_name'><?php echo e($customer->first_name); ?></td>
                                <td field-key='last_name'><?php echo e($customer->last_name); ?></td>
                                <td field-key='address'><?php echo e($customer->address); ?></td>
                                <td field-key='phone'><?php echo e($customer->phone); ?></td>
                                <td field-key='email'><?php echo e($customer->email); ?></td>
                                <td field-key='country'><?php echo e(isset($customer->country->title) ? $customer->country->title : ''); ?></td>
                                <?php if( request('show_deleted') == 1 ): ?>
                                <td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer_delete')): ?>
                                                                        <?php echo Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.customers.restore', $customer->id])); ?>

                                    <?php echo Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')); ?>

                                    <?php echo Form::close(); ?>

                                <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer_delete')): ?>
                                                                        <?php echo Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.customers.perma_del', $customer->id])); ?>

                                    <?php echo Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')); ?>

                                    <?php echo Form::close(); ?>

                                <?php endif; ?>
                                </td>
                                <?php else: ?>
                                <td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer_view')): ?>
                                    <a href="<?php echo e(route('admin.customers.show',[$customer->id])); ?>" class="btn btn-xs btn-primary"><?php echo app('translator')->getFromJson('quickadmin.qa_view'); ?></a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer_edit')): ?>
                                    <a href="<?php echo e(route('admin.customers.edit',[$customer->id])); ?>" class="btn btn-xs btn-info"><?php echo app('translator')->getFromJson('quickadmin.qa_edit'); ?></a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer_delete')): ?>
<?php echo Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.customers.destroy', $customer->id])); ?>

                                    <?php echo Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')); ?>

                                    <?php echo Form::close(); ?>

                                    <?php endif; ?>
                                </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="11"><?php echo app('translator')->getFromJson('quickadmin.qa_no_entries_in_table'); ?></td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?> 
    <script>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer_delete')): ?>
            <?php if( request('show_deleted') != 1 ): ?> window.route_mass_crud_entries_destroy = '<?php echo e(route('admin.customers.mass_destroy')); ?>'; <?php endif; ?>
        <?php endif; ?>

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>