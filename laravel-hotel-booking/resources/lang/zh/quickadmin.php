<?php

return [
		'user-management' => [		'title' => 'User management',		'fields' => [		],	],
		'roles' => [		'title' => 'Roles',		'fields' => [			'title' => 'Title',		],	],
		'users' => [		'title' => 'Users',		'fields' => [			'name' => 'Name',			'email' => 'Email',			'password' => 'Password',			'role' => 'Role',			'remember-token' => 'Remember token',		],	],
		'countries' => [		'title' => 'Countries',		'fields' => [			'shortcode' => 'Shortcode',			'title' => 'Title',			'name' => 'Name',		],	],
		'customers' => [		'title' => 'Customers',		'fields' => [			'first-name' => 'First name',			'last-name' => 'Last name',			'address' => 'Address',			'phone' => 'Phone',			'email' => 'Email',			'country' => 'Country',		],	],
		'rooms' => [		'title' => 'Rooms',		'fields' => [			'room-number' => 'Room number',			'floor' => 'Floor',			'description' => 'Description',		],	],
		'bookings' => [		'title' => 'Bookings',		'fields' => [			'customer' => 'Customer',			'room' => 'Room',			'time-from' => 'Time from',			'time-to' => 'Time to',			'additional-information' => 'Additional information',		],	],
		'find-room' => [		'title' => 'Find room',		'fields' => [		],	],
	'qa_create' => '新增',
	'qa_save' => '儲存',
	'qa_edit' => '編輯',
	'qa_restore' => '還原',
	'qa_permadel' => '永久刪除',
	'qa_all' => '所有',
	'qa_trash' => '垃圾箱',
	'qa_view' => '檢視',
	'qa_update' => '更新',
	'qa_list' => '列表',
	'qa_no_entries_in_table' => '沒有紀錄',
	'qa_logout' => '登出',
	'qa_add_new' => '新增',
	'qa_are_you_sure' => '確定?',
	'qa_back_to_list' => '返回',
	'qa_dashboard' => '管理區',
	'qa_delete' => '刪除',
	'qa_delete_selected' => '刪除選擇',
	'qa_category' => '類別',
	'qa_categories' => '類別',
	'qa_sample_category' => '示範類別',
	'qa_questions' => '問題',
	'qa_question' => '問題',
	'qa_answer' => '答案',
	'qa_sample_question' => '示範問題',
	'qa_sample_answer' => '示範答案',
	'qa_faq_management' => '常見問題管理',
	'qa_administrator_can_create_other_users' => '系統管理員(可以新增其他用戶)',
	'qa_simple_user' => '普通用戶',
	'qa_roles' => '角式',
	'qa_role' => '角式',
	'qa_user_management' => '會友管理',
	'qa_users' => '會友',
	'qa_user' => '會友',
	'qa_name' => '名稱',
	'qa_email' => '電子郵件',
	'qa_password' => '密碼',
	'qa_permissions' => '權限',
	'qa_user_actions' => '用戶操作',
	'qa_action' => '操作',
	'qa_time' => '時間',
	'qa_campaign' => '運動',
	'qa_campaigns' => '運動',
	'qa_description' => '簡介',
	'qa_edit_calendar_source' => '編輯日曆來源',
	'qa_client_management' => '客戶管理',
	'qa_client_management_settings' => '客戶管理設定',
	'qa_country' => '國家',
	'qa_client_status' => '客戶狀態',
	'qa_clients' => '客戶',
	'qa_client_statuses' => '客戶狀態',
	'qa_currencies' => '貨幣',
	'qa_main_currency' => '主要貨幣',
	'qa_documents' => '文件',
	'qa_file' => '檔案',
	'qa_income_source' => '收入來源',
	'qa_income_sources' => '收入來源',
	'qa_fee_percent' => '費用百分比',
	'qa_note_text' => '注意文本',
	'qa_client' => '客戶',
	'qa_start_date' => '開始日期',
	'qa_budget' => '預算',
	'qa_project_status' => '項目狀態',
	'qa_project_statuses' => '項目狀態',
	'qa_transactions' => '交易',
	'qa_transaction_types' => '交易類別',
	'qa_transaction_type' => '交易類別',
	'qa_transaction_date' => '交易日期',
	'qa_currency' => '貨幣',
	'qa_current_password' => '現時密碼',
	'qa_new_password' => '新密碼',
	'qa_password_confirm' => '新確認密碼',
	'qa_dashboard_text' => '您已經登入!',
	'qa_forgot_password' => '忘記密碼?',
	'qa_remember_me' => '記住我',
	'qa_login' => '登入',
	'qa_change_password' => '更改密碼',
	'qa_csv' => 'CSV',
	'qa_print' => '列印',
	'qa_excel' => 'Excel',
	'qa_copy' => '複制',
	'qa_pdf' => 'PDF',
	'qa_reset_password' => '重設密碼',
	'qa_reset_password_woops' => '<strong>噢!</strong> 錯誤輸入...',
	'qa_email_line1' => '您收到此電子郵件是因為我們收到了您的帳戶的密碼重設請求。',
	'qa_email_line2' => '如果您沒有要求重設密碼，則不需要採取進一步的操作。',
	'qa_email_greet' => '您好',
	'qa_confirm_password' => '確認密碼',
	'qa_if_you_are_having_trouble' => '如果您在遇到問題, 請點擊',
	'qa_please_select' => '請選擇',
	'qa_register' => '註冊',
	'qa_registration' => '註冊',
	'qa_not_approved_title' => '您未獲授權',
	'qa_not_approved_p' => '您的帳戶尚未獲批。 請耐心等待，稍後再試。',
	'qa_there_were_problems_with_input' => '輸入錯誤',
	'qa_whoops' => '噢!',
	'qa_csvImport' => 'CSV匯入',
	'qa_csv_file_to_import' => 'CSV檔案匯入',
	'qa_parse_csv' => '貼上CSV',
	'qa_import_data' => '匯入數據',
	'qa_imported_rows_to_table' => '已匯入:rows數據',
	'quickadmin_title' => 'hotel-booking',
];