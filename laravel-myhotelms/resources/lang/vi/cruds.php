<?php

return [
    'userManagement'    => [
        'title'          => 'Quản Lý User',
        'title_singular' => 'Quản Lý User',
    ],
    'permission'        => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'title'             => 'Title',
            'title_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'role'              => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'title'              => 'Title',
            'title_helper'       => '',
            'permissions'        => 'Permissions',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'user'              => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'name'                     => 'Tên',
            'name_helper'              => '',
            'email'                    => 'Email',
            'email_helper'             => '',
            'email_verified_at'        => 'Email Xác Nhận Lúc',
            'email_verified_at_helper' => '',
            'password'                 => 'Mật Khẩu',
            'password_helper'          => '',
            'roles'                    => 'Vai Trò',
            'roles_helper'             => '',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => '',
            'created_at'               => 'Created at',
            'created_at_helper'        => '',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
        ],
    ],
    'roomType'          => [
        'title'          => 'Loại Phòng',
        'title_singular' => 'Room Type',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'name_helper'       => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'roomsManagement'   => [
        'title'          => 'Quản Lý Phòng',
        'title_singular' => 'Room management',
    ],
    'roomStatus'        => [
        'title'          => 'Trạng Thái',
        'title_singular' => 'Room Status',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'name_helper'       => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'room'              => [
        'title'          => 'DS Phòng',
        'title_singular' => 'Room',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'room_number'        => 'Room Number',
            'room_number_helper' => '',
            'floor'              => 'Floor',
            'floor_helper'       => '',
            'slug'               => 'Slug',
            'slug_helper'        => '',
            'room_type'          => 'Room Type',
            'room_type_helper'   => '',
            'room_status'        => 'Room Status',
            'room_status_helper' => '',
            'description'        => 'Description',
            'description_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'roomHistory'        => [
        'title'          => 'History',
        'fields'         => [
            'reservation'            => 'Reservation',
            'reservation_helper'     => '',
            'status'                 => 'Status',
            'status_helper'          => '',
            'when'                   => 'When',
            'when_helper'            => '',
            'note'                   => 'Note',
            'note_helper'            => '',
        ],
    ],
    'findRoom'   => [
        'title'          => 'Tìm Phòng',
        'title_singular' => 'Find Room',
        'book_room'      => 'Book Room',
        'no_rooms_found' => 'Room is full',
        'fields'         => [
            'time_from'     => 'Time From',
            'time_to'       => 'Time To',
            'search'        => 'Search',
            'room-number'   => 'Room Number',
            'floor'         => 'Floor',
            'type'          => 'Type',
            'description'   => 'Description'
        ],
    ],
    'bookingManagement'   => [
        'title'          => 'Quản Lý Đặt Phòng',
        'title_singular' => 'Booking management',
    ],
    'guest'             => [
        'title'          => 'Khách',
        'title_singular' => 'Guest',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'first_name'        => 'First Name',
            'first_name_helper' => '',
            'last_name'         => 'Last Name',
            'last_name_helper'  => '',
            'address'           => 'Address',
            'address_helper'    => '',
            'email'             => 'Email',
            'email_helper'      => '',
            'phone'             => 'Phone',
            'phone_helper'      => '',
            'city'              => 'City',
            'city_helper'       => '',
            'country'           => 'Country',
            'country_helper'    => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'reservation'       => [
        'title'          => 'Đặt Phòng',
        'title_singular' => 'Reservation',
        'history'        => 'History',
        'fields'         => [
            'id'                            => 'ID',
            'id_helper'                     => '',
            'code'                          => 'Code',
            'code_helper'                   => '',
            'status'                        => 'Status',
            'status_helper'                 => '',
            'guest'                         => 'Guest',
            'guest_helper'                  => '',
            'room'                          => 'Room',
            'room_helper'                   => '',
            'check_in_date'                 => 'Check In Date',
            'check_in_date_helper'          => '',
            'check_out_date'                => 'Check Out Date',
            'check_out_date_helper'         => '',
            'adults'                        => 'Adults',
            'adults_helper'                 => '',
            'children'                      => 'Children',
            'children_helper'               => '',
            'additional_information'        => 'Additional Information',
            'additional_information_helper' => '',
            'created_at'                    => 'Created at',
            'created_at_helper'             => '',
            'updated_at'                    => 'Updated at',
            'updated_at_helper'             => '',
            'deleted_at'                    => 'Deleted at',
            'deleted_at_helper'             => '',
            'editing_user'                  => 'Staff',
            'editing_user_helper'           => '',
        ],
    ],
    'reservationStatus'        => [
        'title'          => 'Trạng Thái',
        'title_singular' => 'Reservation Status',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'name_helper'       => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'reservationHistory'        => [
        'title'          => 'History',
        'fields'         => [
            'action'            => 'Action',
            'action_helper'     => '',
            'when'              => 'When',
            'when_helper'       => '',
            'who'               => 'Who',
            'who_helper'        => '',
            'note'              => 'Note',
            'note_helper'       => '',
        ],
    ],
    'taskManagement'    => [
        'title'          => 'Task management',
        'title_singular' => 'Task management',
    ],
    'taskStatus'        => [
        'title'          => 'Statuses',
        'title_singular' => 'Status',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'name_helper'       => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => '',
        ],
    ],
    'taskTag'           => [
        'title'          => 'Tags',
        'title_singular' => 'Tag',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'name_helper'       => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => '',
        ],
    ],
    'task'              => [
        'title'          => 'Tasks',
        'title_singular' => 'Task',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'name'               => 'Name',
            'name_helper'        => '',
            'description'        => 'Description',
            'description_helper' => '',
            'status'             => 'Status',
            'status_helper'      => '',
            'tag'                => 'Tags',
            'tag_helper'         => '',
            'attachment'         => 'Attachment',
            'attachment_helper'  => '',
            'due_date'           => 'Due date',
            'due_date_helper'    => '',
            'assigned_to'        => 'Assigned to',
            'assigned_to_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated At',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted At',
            'deleted_at_helper'  => '',
        ],
    ],
    'tasksCalendar'     => [
        'title'          => 'Calendar',
        'title_singular' => 'Calendar',
    ],
    'contactManagement' => [
        'title'          => 'Contact management',
        'title_singular' => 'Contact management',
    ],
    'contactCompany'    => [
        'title'          => 'Companies',
        'title_singular' => 'Company',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => '',
            'company_name'           => 'Company name',
            'company_name_helper'    => '',
            'company_address'        => 'Address',
            'company_address_helper' => '',
            'company_website'        => 'Website',
            'company_website_helper' => '',
            'company_email'          => 'Email',
            'company_email_helper'   => '',
            'created_at'             => 'Created at',
            'created_at_helper'      => '',
            'updated_at'             => 'Updated At',
            'updated_at_helper'      => '',
            'deleted_at'             => 'Deleted At',
            'deleted_at_helper'      => '',
        ],
    ],
    'contactContact'    => [
        'title'          => 'Contacts',
        'title_singular' => 'Contact',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => '',
            'company'                   => 'Company',
            'company_helper'            => '',
            'contact_first_name'        => 'First name',
            'contact_first_name_helper' => '',
            'contact_last_name'         => 'Last name',
            'contact_last_name_helper'  => '',
            'contact_phone_1'           => 'Phone 1',
            'contact_phone_1_helper'    => '',
            'contact_phone_2'           => 'Phone 2',
            'contact_phone_2_helper'    => '',
            'contact_email'             => 'Email',
            'contact_email_helper'      => '',
            'contact_skype'             => 'Skype',
            'contact_skype_helper'      => '',
            'contact_address'           => 'Address',
            'contact_address_helper'    => '',
            'created_at'                => 'Created at',
            'created_at_helper'         => '',
            'updated_at'                => 'Updated At',
            'updated_at_helper'         => '',
            'deleted_at'                => 'Deleted At',
            'deleted_at_helper'         => '',
        ],
    ],
];
