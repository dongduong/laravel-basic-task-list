<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo app('translator')->getFromJson('quickadmin.find-room.title'); ?></h3>
    <div class="panel panel-default">

        <?php echo Form::open(['method' => 'post', 'route' => ['admin.find_rooms.index']]); ?>

        <div class="row" style="margin-top: 5px;">
            <div class="col-xs-9">
                <div class="col-xs-6 form-group">
                    <?php echo Form::label('time_from', trans('quickadmin.bookings.fields.time-from').'*', ['class' => 'control-label']); ?>

                    <?php echo Form::text('time_from', old('time_from'), ['class' => 'form-control datetimepicker', 'placeholder' => '', 'required' => '']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('time_from')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('time_from')); ?>

                        </p>
                    <?php endif; ?>
                </div>
                <div class="col-xs-6 form-group">
                    <?php echo Form::label('time_to', trans('quickadmin.bookings.fields.time-to').'*', ['class' => 'control-label']); ?>

                    <?php echo Form::text('time_to', old('time_to'), ['class' => 'form-control datetimepicker', 'placeholder' => '', 'required' => '']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('time_to')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('time_to')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-xs-2">
                <div class="form-group" style="margin-top: 5px;">
                    <label class="control-label"></label>
                    <?php echo Form::submit('Search for rooms', ['class' => 'btn btn-danger btn-block']); ?>

                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
        <?php if(isset($rooms) && is_null($rooms)): ?>
            <div class="form-group" style="text-align: center">
                <label><?php echo app('translator')->getFromJson('quickadmin.find-room.no_rooms_found'); ?></label>
            </div>
        <?php endif; ?>
        <?php if(!is_null($rooms)): ?>
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th/></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.rooms.fields.room-number'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.rooms.fields.floor'); ?></th>
                    <th><?php echo app('translator')->getFromJson('quickadmin.rooms.fields.description'); ?></th>
                </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr data-entry-id="<?php echo e($room->id); ?>">
                            <td></td>
                            <td field-key='room_number'><?php echo e($room->room_number); ?></td>
                            <td field-key='floor'><?php echo e($room->floor); ?></td>
                            <td field-key='description'><?php echo $room->description; ?></td>
                            <td>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('booking_create')): ?>
                                    <button class="btn btn-danger">
                                        <a style="color: #ffffff;" href="<?php echo e(route('admin.bookings.create',
                                        ['room_id' => $room->id,'time_from' => $time_from, 'time_to' => $time_to])); ?>">
                                            <?php echo trans('quickadmin.find-room.book_room'); ?></a>
                                    </button>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
    ##parent-placeholder-b6e13ad53d8ec41b034c49f131c64e99cf25207a##
    <script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script>
        $('.datetimepicker').datetimepicker({
            format: "YYYY-MM-DD HH:mm"
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>