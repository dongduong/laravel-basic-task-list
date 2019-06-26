<?php $request = app('Illuminate\Http\Request'); ?>
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

             

            <li class="<?php echo e($request->segment(1) == 'home' ? 'active' : ''); ?>">
                <a href="<?php echo e(url('/')); ?>">
                    <i class="fa fa-wrench"></i>
                    <span class="title"><?php echo app('translator')->getFromJson('quickadmin.qa_dashboard'); ?></span>
                </a>
            </li>

            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_management_access')): ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title"><?php echo app('translator')->getFromJson('quickadmin.user-management.title'); ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_access')): ?>
                <li class="<?php echo e($request->segment(2) == 'roles' ? 'active active-sub' : ''); ?>">
                        <a href="<?php echo e(route('admin.roles.index')); ?>">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                <?php echo app('translator')->getFromJson('quickadmin.roles.title'); ?>
                            </span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_access')): ?>
                <li class="<?php echo e($request->segment(2) == 'users' ? 'active active-sub' : ''); ?>">
                        <a href="<?php echo e(route('admin.users.index')); ?>">
                            <i class="fa fa-user"></i>
                            <span class="title">
                                <?php echo app('translator')->getFromJson('quickadmin.users.title'); ?>
                            </span>
                        </a>
                    </li>
                <?php endif; ?>
                </ul>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('country_access')): ?>
            <li class="<?php echo e($request->segment(2) == 'countries' ? 'active' : ''); ?>">
                <a href="<?php echo e(route('admin.countries.index')); ?>">
                    <i class="fa fa-gears"></i>
                    <span class="title"><?php echo app('translator')->getFromJson('quickadmin.countries.title'); ?></span>
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category_create')): ?>
                <li class="<?php echo e($request->segment(2) == 'users' ? 'active active-sub' : ''); ?>">
                        <a href="<?php echo e(route('admin.categories.index')); ?>">
                            <i class="fa fa-user"></i>
                            <span class="title">
                                <?php echo app('translator')->getFromJson('quickadmin.categories.title'); ?>
                            </span>
                        </a>
                    </li>
                <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer_access')): ?>
            <li class="<?php echo e($request->segment(2) == 'customers' ? 'active' : ''); ?>">
                <a href="<?php echo e(route('admin.customers.index')); ?>">
                    <i class="fa fa-low-vision"></i>
                    <span class="title"><?php echo app('translator')->getFromJson('quickadmin.customers.title'); ?></span>
                </a>
            </li>
            <?php endif; ?>
            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('room_access')): ?>
            <li class="<?php echo e($request->segment(2) == 'rooms' ? 'active' : ''); ?>">
                <a href="<?php echo e(route('admin.rooms.index')); ?>">
                    <i class="fa fa-gears"></i>
                    <span class="title"><?php echo app('translator')->getFromJson('quickadmin.rooms.title'); ?></span>
                </a>
            </li>
            <?php endif; ?>
            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('booking_access')): ?>
            <li class="<?php echo e($request->segment(2) == 'bookings' ? 'active' : ''); ?>">
                <a href="<?php echo e(route('admin.bookings.index')); ?>">
                    <i class="fa fa-bell"></i>
                    <span class="title"><?php echo app('translator')->getFromJson('quickadmin.bookings.title'); ?></span>
                </a>
            </li>
            <?php endif; ?>
            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('find_room_access')): ?>
            <li class="<?php echo e($request->segment(2) == 'find_rooms' ? 'active' : ''); ?>">
                <a href="<?php echo e(route('admin.find_rooms.index')); ?>">
                    <i class="fa fa-arrows"></i>
                    <span class="title"><?php echo app('translator')->getFromJson('quickadmin.find-room.title'); ?></span>
                </a>
            </li>
            <?php endif; ?>
            

            

            



            <li class="<?php echo e($request->segment(1) == 'change_password' ? 'active' : ''); ?>">
                <a href="<?php echo e(route('auth.change_password')); ?>">
                    <i class="fa fa-key"></i>
                    <span class="title"><?php echo app('translator')->getFromJson('quickadmin.qa_change_password'); ?></span>
                </a>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title"><?php echo app('translator')->getFromJson('quickadmin.qa_logout'); ?></span>
                </a>
            </li>
        </ul>
    </section>
</aside>

