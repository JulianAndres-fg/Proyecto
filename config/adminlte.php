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

    'title' => '',
    'title_prefix' => 'Domux |',
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
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Google Fonts
    |--------------------------------------------------------------------------
    |
    | Here you can allow or not the use of external google fonts. Disabling the
    | google fonts may be useful if your admin panel internet access is
    | restricted somehow.
    |
    | For detailed instructions you can look the google fonts section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'google_fonts' => [
        'allowed' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo' => '<b>Domux</b>',
    'logo_img' => 'public/vendor/adminlte/dist/img/logo.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'Domux Logo',

    /*
    |--------------------------------------------------------------------------
    | Authentication Logo
    |--------------------------------------------------------------------------
    |
    | Here you can setup an alternative logo to use on your login and register
    | screens. When disabled, the admin panel logo will be used instead.
    |
    | For detailed instructions you can look the auth logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'auth_logo' => [
        'enabled' => true,
        'img' => [
            'path' => 'vendor/adminlte/dist/img/logoDomux.png',
            'alt' => 'Auth Logo',
            'class' => '',
            'width' => 80,
            'height' => 80,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Preloader Animation
    |--------------------------------------------------------------------------
    |
    | Here you can change the preloader animation configuration.
    |
    | For detailed instructions you can look the preloader section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'preloader' => [
        'enabled' => true,
        'img' => [
            'path' => 'vendor/adminlte/dist/img/logoDomux.png',
            'alt' => 'AdminLTE Preloader Image',
            'effect' => 'animation__shake',
            'width' => 80,
            'height' => 80,
        ],
    ],

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
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

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

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => true,
    'layout_fixed_navbar' => true,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => null,

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

    'classes_auth_card' => '',
    'classes_auth_header' => 'bg-gradient-primary',
    'classes_auth_body' => '',
    'classes_auth_footer' => 'text-center',
    'classes_auth_icon' => 'fa-lg text-info',
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
    'classes_sidebar' => 'sidebar-dark-info elevation-2',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-primary navbar-dark',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

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
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
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
    'dashboard_url' => 'home',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,

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
        [
            'type'         => 'fullscreen-widget',
            'topnav_right' => true,
        ],

        // Sidebar items:
        // [
        //     'text' => 'blog',
        //     'url'  => 'admin/blog',
        //     'can'  => 'editar-rol',
        // ],
        [
            'text'        => 'Home',
            'url'         => '/home',
            'icon'        => 'fas fa-fw fa-chart-pie',
            // 'label'       => 4,
            'label_color' => 'success',
        ],
        ['header' => 'CONFIGURACION'],
        // [
        //     'text' => 'Perfil',
        //     'url'  => '#',
        //     'icon' => 'fas fa-fw fa-user',
        // ],

        [
            'text' => 'Roles',
            'can'  => 'ver-rol',
            'icon' => 'fas fa-fw fa-chess',

            'submenu' => [
                [
                    'text' => 'Lista roles',
                    'url'  => 'roles',
                    'can'  => 'ver-rol',
                    'icon' => 'fas fa-fw fa-list'
                ],

                [
                    'text' => 'Crear rol',
                    'url'  => 'roles/create',
                    'can'  => 'crear-rol',
                    'icon' => 'fas fa-fw fa-plus',
                    // 'label' => 'Nuevo',
                    'label_color' => 'success',
                ],

            ]
        ],

        [
            'text' => 'Usuarios',
            'icon' => 'fas fa-fw fa-users',
            'can' => 'ver-usuario',

            'submenu' => [
                [
                    'text' => 'Lista usuarios',
                    'url'  => 'usuarios',
                    'icon' => 'fas fa-fw fa-list'
                ],

                [
                    'text' => 'Crear usuario',
                    'url'  => 'usuarios/create',
                    'icon' => 'fas fa-fw fa-plus',
                    // 'label' => 'Nuevo',
                    'can' => 'crear-usuario',
                    'label_color' => 'success',
                ],

            ]
        ],

        ['header' => 'ACCIONES'],

        [
            'text' => 'Domos',
            'icon'    => 'fas fa-fw fa-dungeon',
            'can'  => 'ver-domo',
            'submenu' => [
                [
                    'text' => 'Lista domos',
                    'url'  => 'domos',
                    'icon' => 'fas fa-fw fa-list'
                ],


                [
                    'text' => 'Crear domo',
                    'url'  => 'domos/create',
                    'icon' => 'fas fa-fw fa-plus',
                    // 'label' => 'Nuevo',
                    'can'  => 'crear-domo',
                    'label_color' => 'success',
                ],

                

                // [

                    // 'text' => 'Domo caracteristica',
                    // 'icon'    => 'fas fa-fw fa-star',
                    // 'submenu' => [
                    //     // [
                    //     //     'text' => 'Lista domo caracteristicas',
                    //     //     'url'  => 'domocaracteristicas',
                    //     //     'icon' => 'fas fa-fw fa-list',
                    //     // ],

                    // ],
                // ],
            ],
        ],

        [
            

                'text' => 'Caracteristicas',
                'icon'    => 'fas fa-fw fa-binoculars',
                 'can'  => 'ver-caracteristica',
                'submenu' => [
                    [
                        'text' => 'Lista caracteristicas',
                        'url'  => 'caracteristicas',
                        'icon' => 'fas fa-fw fa-list',
                    ],
                    [
                        'text' => 'Crear caracteristica',
                        'url'  => 'caracteristicas/create',
                        'icon' => 'fas fa-fw fa-plus',
                         'can'  => 'crear-caracteristica',

                    ],
                ],
            
        ],

        // [
        //     'text' => 'Planes',
        //     'icon' => 'fas fa-fw fa-clipboard-list',
        //     'submenu' => [
        //         [
        //             'text' => 'Lista planes',
        //             'url'  => 'planes',
        //             'icon' => 'fas fa-fw fa-list'
        //         ],

        //         [
        //             'text' => 'Crear plan',
        //             'url'  => 'planes/create',
        //             'icon' => 'fas fa-fw fa-plus',
        //             'label' => 'Nuevo',
        //             'label_color' => 'success',
        //         ],

        //         [

        //             'text' => 'Plan oferta',
        //             'icon'    => 'fas fa-fw fa-star',
        //             'submenu' => [
        //                 [
        //                     'text' => 'Lista plan oferta',
        //                     'url'  => 'planoferta',
        //                     'icon' => 'fas fa-fw fa-list',
        //                 ],

        //             ],
        //         ],
        //     ],


        // ],


        [
            'text' => 'Servicios',
            'icon' => 'fas fa-fw fa-utensils',
            'can'  => 'ver-servicio',

            'submenu' => [
                [
                    'text' => 'Lista servicios',
                    'url'  => 'servicios',
                    'icon' => 'fas fa-fw fa-list'
                ],

                [
                    'text' => 'Crear servicios',
                    'url'  => 'servicios/create',
                    'icon' => 'fas fa-fw fa-plus',
                    'can'  => 'crear-servicio',

                    // 'label' => 'Nuevo',
                    'label_color' => 'success',
                ],
            ],
        ],
        [
            'text' => 'Reservas',
            'icon' => 'fas fa-fw fa-bookmark',
            'can'  => 'ver-reserva',
            'submenu' => [
                [
                    'text' => 'Lista reservas',
                    'url'  => 'reservas',
                    'icon' => 'fas fa-fw fa-list'
                ],

                [
                    'text' => 'Crear reserva',
                    'url'  => 'reservas/create',
                    'icon' => 'fas fa-fw fa-plus',
                    'can'  => 'crear-reserva',
                    // 'label' => 'Nuevo',
                    'label_color' => 'success',
                ],
            ],
        ],

        [
            'text' => 'Clientes',
            'icon' => 'fas fa-fw fa-users',
            'can'  => 'ver-cliente',
            'submenu' => [
                [
                    'text' => 'Lista clientes',
                    'url'  => 'clientes',
                    'icon' => 'fas fa-fw fa-list'
                ],

                [
                    'text' => 'Crear cliente',
                    'url'  => 'clientes/create',
                    'icon' => 'fas fa-fw fa-plus',
                    // 'label' => 'Nuevo',
                    'can'  => 'crear-cliente',
                    'label_color' => 'success',
                ],
                [
                    'edit_url' => 'clientes/edit/{id}',
                ],
            ],
        ],

        [
            'text' => 'Metodos de pago',
            'icon' => 'fas fa-fw fa-wallet',
            'can'  => 'ver-metododepago',
            'submenu' => [
                [
                    'text' => 'Lista metodos de pago',
                    'url'  => 'metodosdepago',
                    'icon' => 'fas fa-fw fa-list'
                ],

                [
                    'text' => 'Crear metodo de pago',
                    'url'  => 'metodosdepago/create',
                    'icon' => 'fas fa-fw fa-plus',
                    'label_color' => 'success',
                    'can'  => 'crear-metododepago',
                ],
            ],
        ],

        // [
            // 'text' => 'Ofertas',
            // 'icon' => 'fas fa-fw fa-tag',
            // 'submenu' => [
                // [
                //     'text' => 'Lista ofertas',
                //     'url'  => 'ofertas',
                //     'icon' => 'fas fa-fw fa-list'
                // ],

                // [
                //     'text' => 'Crear oferta',
                //     'url'  => 'ofertas/create',
                //     'icon' => 'fas fa-fw fa-plus',
                //     'label_color' => 'success',
                // ],
            // ],

        // ],
        [
            // 'text' => 'Recomendaciones',
            // 'icon' => 'fas fa-fw fa-comment',
            // 'submenu' => [
                // [
                //     'text' => 'Lista recomendaciones',
                //     'url'  => 'recomendaciones',
                //     'icon' => 'fas fa-fw fa-list'
                // ],

                // [
                //     'text' => 'Crear recomendacion',
                //     'url'  => 'recomendaciones/create',
                //     'icon' => 'fas fa-fw fa-plus',
                //     'label_color' => 'success',
                // ],
            // ],

        ],



        // [
        //     'text'       => 'warning',
        //     'icon_color' => 'yellow',
        //     'url'        => '#',
        // ],
        // [
        //     'text'       => 'information',
        //     'icon_color' => 'cyan',
        //     'url'        => '#',
        // ],
    ],



    [
        'text'       => 'warning',
        'icon_color' => 'yellow',
        'url'        => '#',
    ],
    [
        'text'       => 'information',
        'icon_color' => 'cyan',
        'url'        => '#',
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
                    'asset' => true,
                    'location' => 'vendor/datatables/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/datatables/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/datatables/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],

        'DatatablesPlugins' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/buttons/js/dataTables.buttons.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/buttons/js/buttons.bootstrap4.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/buttons/js/buttons.html5.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/buttons/js/buttons.print.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/jszip/jszip.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/pdfmake/pdfmake.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/pdfmake/vfs_fonts.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/buttons/css/buttons.bootstrap4.min.css',
                ],
            ],
        ],

        'TempusDominusBs4' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/moment/moment.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/select2/js/select2.full.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/select2/css/select2.min.css',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/select2-bootstrap4-theme/select2-bootstrap4.min.css',
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
                    'asset' => true,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
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
