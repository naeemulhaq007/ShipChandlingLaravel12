<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => 'ZOFATECH',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => true,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */
    //'vendor/adminlte/dist/img/zofalogo.png'
    'logo' => null,
    'logo_img' => null,
    'logo_img_class' => '',
    // brand-image img-circle elevation-3
    'logo_img_xl' => true,
    'logo_img_xl_class' => true,
    // 'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'ZOFATECH',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => true,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => true,
    'usermenu_profile_url' => true,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => false,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => true,
    'layout_fixed_navbar' => false,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => false,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-light-primary elevation-4',
    'classes_sidebar_nav' => '',

    'classes_topnav' => 'navbar-white navbar-light',
    // 'classes_topnav' => 'navbar-dark navbar-dark',

    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container-fluid',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => true,
    'sidebar_collapse_auto_size' => true,
    'sidebar_collapse_remember' => true,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => '/',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => true,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'menu' => [
        // Navbar items:
//        [
//            'type'         => 'navbar-search',
//            'text'         => 'search',
//            'topnav_right' => true,
//        ],
        [
            'type' => 'fullscreen-widget',
            'topnav_right' => true,
        ],

        // Sidebar items:
//        [
//            'type' => 'sidebar-menu-search',
//            'text' => 'search',
//        ],
        [
            'text' => 'Home',
            'url' => '/',
            'icon' => 'fas fa-fw fa-home',
        ],
        [
            'text' => 'Setups',
            'icon' => 'fas fa-fw fa-share',
            'label' => 13,
            'label_color' => 'success',
            'submenu' => [
                [
                    'text' => 'Company Setup',
                    'url' => 'company-setup',
                    // 'icon' => 'far fa-fw fa-file',
                    //'label'       => 4,
                    //'label_color' => 'success',
                ],
                [
                    'text' => 'Branch Setup',
                    'url' => 'branch-setup',
                    // 'icon' => 'far fa-fw fa-file',
                    //'label'       => 4,
                    //'label_color' => 'success',
                ],
                [
                    'text' => 'Customer Setup',
                    'url' => 'customer-setup',
                    // 'icon' => 'far fa-fw fa-file',
                    //'label'       => 4,
                    //'label_color' => 'success',
                ],
                [
                    'text' => 'Vessel Setup',
                    'url' => 'vessel-setup',
                    // 'icon' => 'far fa-fw fa-file',
                    //'label'       => 4,
                    //'label_color' => 'success',
                ],
                [
                    'text' => 'Agent Setup',
                    'url' => 'agent-setup',
                    // 'icon' => 'far fa-fw fa-file',
                    //'label'       => 4,
                    //'label_color' => 'success',
                ],
                [
                    'text' => 'Warehouse Setup',
                    'url' => 'warehouse-setup',
                    // 'icon' => 'far fa-fw fa-file',
                    //'label'       => 4,
                    //'label_color' => 'success',
                ],
                [
                    'text' => 'Department Setup',
                    'url' => 'department-setup',
                    // 'icon' => 'far fa-fw fa-file',
                    //'label'       => 4,
                    //'label_color' => 'success',
                ],
                [
                    'text' => 'Vendor Setup',
                    'url' => 'vendor-setup',
                    // 'icon' => 'far fa-fw fa-file',
                    //'label'       => 4,
                    //'label_color' => 'success',
                ],
                [
                    'text' => 'Origin Setup',
                    'url' => 'origin-setup',
                    // 'icon' => 'far fa-fw fa-file',
                    //'label'       => 4,
                    //'label_color' => 'success',
                ],
                [
                    'text' => 'Terms Setup',
                    'url' => 'terms-setup',
                    // 'icon' => 'far fa-fw fa-file',
                    //'label'       => 4,
                    //'label_color' => 'success',
                ],
                [
                    'text' => 'ShipingPort Setup',
                    'url' => 'shipingport-setup',
                    // 'icon' => 'far fa-fw fa-file',
                    //'label'       => 4,
                    //'label_color' => 'success',
                ],
                [
                    'text' => 'Vendor Item Setup',
                    'url' => 'Vendor-Item-Setup',
                    // 'icon' => 'far fa-fw fa-file',
                    //'label'       => 4,
                    //'label_color' => 'success',
                ],
                [
                    'text' => 'Item Registration Setup',
                    'url' => 'Item-Register-Setup',
                    // 'icon' => 'far fa-fw fa-file',
                    //'label'       => 4,
                    //'label_color' => 'success',
                ],
                [
                    'text' => 'Vendor Contract Provision',
                    'url' => 'Vendor-Contract-Provision',
                    // 'icon' => 'far fa-fw fa-file',
                    //'label'       => 4,
                    //'label_color' => 'success',
                ],
                [
                    'text' => 'Fix Account Setup',
                    'url' => 'Fix-Account-Setup',
                    // 'icon' => 'far fa-fw fa-file',
                    //'label'       => 4,
                    //'label_color' => 'success',
                ],
                [
                    'text' => 'UOM Setup',
                    'url' => 'UOM-Setup',
                    // 'icon' => 'far fa-fw fa-file',
                    //'label'       => 4,
                    //'label_color' => 'success',
                ],
                [
                    'text' => 'Category Setup',
                    'url' => 'Category-Setup',
                    // 'icon' => 'far fa-fw fa-file',
                    //'label'       => 4,
                    //'label_color' => 'success',
                ],
                [
                    'text' => 'Currency Setup',
                    'url' => 'Currency-Setup',
                    // 'icon' => 'far fa-fw fa-file',
                    //'label'       => 4,
                    //'label_color' => 'success',
                ],
            ]
        ],
        [
            'text' => 'Activity',
            'icon' => 'fas fa-fw fa-desktop',
            'label' => 8,
            'label_color' => 'success',
            'submenu' => [
                [
                    'text' => 'Event',
                    'url' => 'events-setup',
                    // 'icon' => 'far fa-fw fa-file',
                    //'label'       => 4,
                    //'label_color' => 'success',
                ],
                [
                    'text' => 'Quotation Log',
                    'url' => 'event-log',
                    // 'icon' => 'far fa-fw fa-file',
                    //'label'       => 4,
                    //'label_color' => 'success',
                ],
                [
                    'text' => 'VSN Log',
                    'url' => 'Vsn-Log',
                    // 'icon' => 'far fa-fw fa-file',
                    //'label'       => 4,
                    //'label_color' => 'success',
                ],
                [
                    'text' => 'Quote log',
                    'url' => 'Quote-log',
                    // 'icon' => 'far fa-fw fa-file',
                    //'label'       => 4,
                    //'label_color' => 'success',
                ],
                [
                    'text' => 'Quotation Entry',
                    'url' => 'quotation',
                    // 'icon' => 'far fa-fw fa-file',
                    //'label'       => 4,
                    //'label_color' => 'success',
                ],
                [
                    'text' => 'Order Entry',
                    'url' => 'OrderEntry',
                    // 'icon' => 'far fa-fw fa-file',
                    //'label'       => 4,
                    //'label_color' => 'success',
                ],
                [
                    'text' => 'Charge List',
                    'url' => 'ChargeList-VSN',
                    // 'icon' => 'far fa-fw fa-file',
                    //'label'       => 4,
                    //'label_color' => 'success',
                ],
                [
                    'text' => 'Purchase Order',
                    'url' => 'purchase-order',
                    // 'icon' => 'far fa-fw fa-file',
                    //'label'       => 4,
                    //'label_color' => 'success',
                ],
                [
                    'text' => 'Delivery Order',
                    'url' => 'Delivery-Order',
                    // 'icon' => 'far fa-fw fa-file',
                    //'label'       => 4,
                    //'label_color' => 'success',
                ],
                [
                    'text' => 'Final Invoice',
                    'url' => 'Final-Invoice',
                    // 'icon' => 'far fa-fw fa-file',
                    //'label'       => 4,
                    //'label_color' => 'success',
                ],
            ],
        ],
        [
            'text' => 'Accounts',
            'icon' => 'fas fa-users',
            'label' => 11,
            'label_color' => 'success',
            'submenu' => [
                [
                    'text' => 'Chart of Accounts',
                    'url' => 'ChartOfAccount',
                    // 'icon' => 'fas fa-user fa-fw',

                ],
                [
                    'text' => 'Employee Registration',
                    'url' => 'EmployeeRegistration',
                    // 'icon' => 'fas fa-user fa-fw',

                ],
                [
                    'text' => 'Vendor Payment Voucher',
                    'url' => 'VendorVoucher',
                    // 'icon' => 'fas fa-user fa-fw',

                ],
                [
                    'text' => 'Receipt Voucher',
                    'url' => 'ReceiptVoucher',
                    // 'icon' => 'fas fa-user fa-fw',

                ],
                [
                    'text' => 'Expense Voucher',
                    'url' => 'ExpensePaymentVoucher',
                    // 'icon' => 'fas fa-user fa-fw',

                ],
                [
                    'text' => 'Bill Invoice',
                    'url' => 'BillInvoice',
                    // 'icon' => 'fas fa-user fa-fw',

                ],
                [
                    'text' => 'Income Bill Invoice',
                    'url' => 'IncomeBillInvoice',
                    // 'icon' => 'fas fa-user fa-fw',

                ],
                [
                    'text' => 'Opening Balance',
                    'url' => 'Openingbalance',
                    // 'icon' => 'fas fa-user fa-fw',

                ],

                [
                    'text' => 'journal voucher',
                    'url' => 'journal-voucher',
                    // 'icon' => 'fas fa-user fa-fw',

                ],
                [
                    'text' => 'Account Ledger',
                    'url' => 'Account-Ledger',
                    // 'icon' => 'fas fa-user fa-fw',

                ],
                [
                    'text' => 'Pay Roll',
                    'url' => 'Pay-Roll',
                    // 'icon' => 'fas fa-user fa-fw',

                ],
                [
                    'text' => 'Accounts Reports',
                    'label' => 10,
                    'label_color' => 'success',
                    'icon' => 'fa fa-pie-chart',
                    'submenu' => [
                        [
                            'text' => 'Aging',
                            'url' => 'Accounts-Aging-Report',
                            // 'icon' => 'fas fa-user fa-fw',

                        ],

                        [
                            'text' => 'Vendor Outstanding Invoice Wise',
                            'url' => 'Vendor-Outstanding-Report-Invoice-Wise',
                            // 'icon' => 'fas fa-user fa-fw',

                        ],

                        [
                            'text' => 'Aging Payable',
                            'url' => 'Aging-Payable-Report',
                            // 'icon' => 'fas fa-user fa-fw',

                        ],


                        [
                            'text' => 'Credit Note',
                            'url' => 'CreditNote-Report',
                            // 'icon' => 'fas fa-user fa-fw',

                        ],

                        [
                            'text' => 'Debit Note',
                            'url' => 'DebitNote-Report',
                            // 'icon' => 'fas fa-user fa-fw',

                        ],

                        [
                            'text' => 'Expense',
                            'url' => 'Expense-Report',
                            // 'icon' => 'fas fa-user fa-fw',

                        ],

                        [
                            'text' => 'Outstanding Invoice Alert',
                            'url' => 'Outstanding-Invoice-Alert-Report',
                            // 'icon' => 'fas fa-user fa-fw',

                        ],


                        [
                            'text' => 'Petty Cash Voucher',
                            'url' => 'Petty-Cash-Voucher',
                            // 'icon' => 'fas fa-user fa-fw',

                        ],


                        [
                            'text' => 'Receipt Voucher',
                            'url' => 'Receipt-Voucher-Report',
                            // 'icon' => 'fas fa-user fa-fw',

                        ],

                        [
                            'text' => 'Vendor Bill Outstanding',
                            'url' => 'Vendor-Bill-Outstanding-Report',
                            // 'icon' => 'fas fa-user fa-fw',

                        ],

                        [
                            'text' => 'Vendor Outstanding',
                            'url' => 'Vendor-Outstanding-Report',
                            // 'icon' => 'fas fa-user fa-fw',

                        ],

                        [
                            'text' => 'Vendor Payment Voucher',
                            'url' => 'Vendor-Payment-Voucher-Report',
                            // 'icon' => 'fas fa-user fa-fw',

                        ],


                        [
                            'text' => 'Customer Aging Invoicewise',
                            'url' => 'Customer-Aging-Report-Invoicewise',
                            // 'icon' => 'fas fa-user fa-fw',

                        ],
                    ],

                ],
            ],
        ],
        [
            'text' => 'Inventory',
            'icon' => 'fas fa-boxes',
            'label' => 9,
            'label_color' => 'success',
            'submenu' => [
                [
                    'text' => 'Stock Item Registration',
                    'url' => 'Stock-Product-List',
                    // 'icon' => 'fas fa-box',

                ],
                [
                    'text' => 'Opening Stock',
                    'url' => 'Opening-Stock',
                    // 'icon' => 'fas fa-box',

                ],
                [
                    'text' => 'Stock Purchase Order',
                    'url' => 'Stock-Purchase-Order',
                    // 'icon' => 'fas fa-box',

                ],
                [
                    'text' => 'Pull Stock',
                    'url' => 'Pull-Stock',
                    // 'icon' => 'fas fa-box',

                ],
                [
                    'text' => 'Stock PO Purchased',
                    'url' => 'Stock-PO-Purchased',
                    // 'icon' => 'fas fa-box',

                ],
                [
                    'text' => 'Sale Return',
                    'url' => 'Sale-Return',
                    // 'icon' => 'fas fa-box',

                ],
                [
                    'text' => 'Stock Transfer',
                    'url' => 'Stock-Transfer',
                    // 'icon' => 'fas fa-box',

                ],
                [
                    'text' => 'Current Stock Position',
                    'url' => 'Current-Stock-Position',
                    // 'icon' => 'fas fa-box',

                ],
                [
                    'text' => 'Stock Ledger',
                    'url' => 'Stock-Ledger',
                    // 'icon' => 'fas fa-box',

                ],
            ],
        ],
        [
            'text' => 'Reports',
            'icon' => 'fa fa-bar-chart',
            'label' => 14,
            'label_color' => 'success',
            'submenu' => [
                [
                    'text' => 'Order Report',
                    'url' => 'Order-Report',
                    // 'icon' => 'fa fa-pie-chart',

                ],
                [
                    'text' => 'Trial Balance',
                    'url' => 'TrialBalance',
                    // 'icon' => 'fa fa-pie-chart',

                ],
                [
                    'text' => 'Po Received Report',
                    'url' => 'Po-Received-Report',
                    // 'icon' => 'fa fa-pie-chart',

                ],
                [
                    'text' => 'PO Not Received',
                    'url' => 'PO-Not-Received',
                    // 'icon' => 'fa fa-pie-chart',

                ],
                [
                    'text' => 'Return Item Report',
                    'url' => 'ReturnItemReport',
                    // 'icon' => 'fa fa-pie-chart',

                ],
                [
                    'text' => 'Net Profit Report',
                    'url' => 'Net-Profit-Report',
                    // 'icon' => 'fa fa-pie-chart',

                ],
                [
                    'text' => 'Invoice Report',
                    'url' => 'Invoice-Report',
                    // 'icon' => 'fa fa-pie-chart',

                ],
                [
                    'text' => 'DM Missing Report',
                    'url' => 'DMMissing-Report',
                    // 'icon' => 'fa fa-pie-chart',

                ],
                [
                    'text' => 'Daily Quotation Report',
                    'url' => 'Daily-Quotation-Report',
                    // 'icon' => 'fa fa-pie-chart',

                ],
                [
                    'text' => 'AVI Rebate Report',
                    'url' => 'AVI-Rebate-Report',
                    // 'icon' => 'fa fa-pie-chart',

                ],
                [
                    'text' => 'Max Purchase Item Report',
                    'url' => 'Max-Purchase-Item-Report',
                    // 'icon' => 'fa fa-pie-chart',

                ],
                [
                    'text' => 'Purchase Return Report',
                    'url' => 'Purchase-Return-Report',
                    // 'icon' => 'fa fa-pie-chart',

                ],
                [
                    'text' => 'RFQ-Cust-Summary-Report',
                    'url' => 'RFQ-C-Summary',
                    // 'icon' => 'fa fa-pie-chart',

                ],
                [
                    'text' => 'RFQ-Vess-Summary-Report',
                    'url' => 'RFQVesselSummary',
                    // 'icon' => 'fa fa-pie-chart',

                ],
                [
                    'text' => 'Month Wise NetProfit Report',
                    'url' => 'Month-Wise-NetProfit-Report',

                ],
                [
                    'text' => 'Month Wise QuoteReport',
                    'url' => 'Month-Wise-QuoteReport',

                ],
                [
                    'text' => 'Month Quote Success CustomerWise Report',
                    'url' => 'Month-Quote-Success-CustomerWise-Report',

                ],
                [
                    'text' => 'Yearly Quotation Report',
                    'url' => 'Yearly-Quotation-Report',

                ],
                [
                    'text' => 'Yearly Sale Report',
                    'url' => 'Yearly-SaleReport',

                ],

            ],
        ],
        [
            'text' => 'Security',
            // 'url'  => 'webSettings',
            'icon' => 'fa-solid fa-gear ',
            'label' => 14,
            'label_color' => 'success',
            'submenu' => [

                [
                    'text' => 'User Rights',
                    'url' => 'User-Rights',
                    // 'icon' => 'fa-solid fa-gear fa-spin-pulse',

                ],
                [
                    'text' => 'User Add/Delete',
                    'url' => 'User-Add-Delete',
                    // 'icon' => 'fa-solid fa-gear fa-spin-pulse',

                ],
            ],
            // 'label'       => 14,
            // 'label_color' => 'success',
            // 'submenu' => [

            // ],

        ],
        [
            'text' => 'Support',
            'url' => 'https://wa.link/d2jy7g',
            'icon' => 'fab fa-whatsapp',
            'target' => '_blank',
        ],
        [
            'text' => 'User Chat',
            'url' => 'ChatApp',
            'icon' => 'fab fa-whatsapp',
            // 'target' => '_blank',
        ],
        //        ['header' => 'account_settings'],
//        [
//            'text' => 'profile',
//            'url'  => 'admin/settings',
//            'icon' => 'fas fa-fw fa-user',
//        ],
//        [
//            'text' => 'change_password',
//            'url'  => 'admin/settings',
//            'icon' => 'fas fa-fw fa-lock',
//        ],
//        [
//            'text'    => 'multilevel',
//            'icon'    => 'fas fa-fw fa-share',
//            'submenu' => [
//                [
//                    'text' => 'level_one',
//                    'url'  => '#',
//                ],
//                [
//                    'text'    => 'level_one',
//                    'url'     => '#',
//                    'submenu' => [
//                        [
//                            'text' => 'level_two',
//                            'url'  => '#',
//                        ],
//                        [
//                            'text'    => 'level_two',
//                            'url'     => '#',
//                            'submenu' => [
//                                [
//                                    'text' => 'level_three',
//                                    'url'  => '#',
//                                ],
//                                [
//                                    'text' => 'level_three',
//                                    'url'  => '#',
//                                ],
//                            ],
//                        ],
//                    ],
//                ],
//                [
//                    'text' => 'level_one',
//                    'url'  => '#',
//                ],
//            ],
//        ],
//        ['header' => 'labels'],
//        [
//            'text'       => 'important',
//            'icon_color' => 'red',
//            'url'        => '#',
//        ],
//        [
//            'text'       => 'warning',
//            'icon_color' => 'yellow',
//            'url'        => '#',
//        ],
//        [
//            'text'       => 'information',
//            'icon_color' => 'cyan',
//            'url'        => '#',
//        ],
    ],
    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => 'https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => 'https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => 'https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => 'https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => 'https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => 'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css',
                ],


            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'excelplug' =>[
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => 'https://unpkg.com/xlsx/dist/xlsx.full.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => 'https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => 'https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.css',
                ],
            ],
        ],
        'quotaplug' =>[
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => 'https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => 'https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => 'https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => 'https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => 'https://cdn.datatables.net/buttons/2.3.2/js/buttons.colVis.min.js',
                ],
            ],
        ],
        'jas' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => 'https://code.jquery.com/ui/1.12.1/jquery-ui.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => 'https://cdn.jsdelivr.net/npm/sweetalert2@11',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | IFrame
    |--------------------------------------------------------------------------
    |
    | Here we change the IFrame mode configuration. Note these changes will
    | only apply to the view that extends and enable the IFrame mode.
    |
    | For detailed instructions you can look the iframe mode section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/IFrame-Mode-Configuration
    |
    */

    'iframe' => [
        'default_tab' => [
            'url' => null,
            'title' => null,
        ],
        'buttons' => [
            'close' => true,
            'close_all' => true,
            'close_all_other' => true,
            'scroll_left' => true,
            'scroll_right' => true,
            'fullscreen' => true,
        ],
        'options' => [
            'loading_screen' => 1000,
            'auto_show_new_tab' => true,
            'use_navbar_items' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'livewire' => false,
];
