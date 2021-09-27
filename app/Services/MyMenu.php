<?php

namespace App\Services;

use App\Models\Admin\Category;
use Pratiksh\Adminetic\Traits\SidebarHelper;
use Pratiksh\Adminetic\Contracts\SidebarInterface;

class MyMenu implements SidebarInterface
{
    use SidebarHelper;

    public function myMenu(): array
    {
        return [
            [
                'type' => 'breaker',
                'name' => 'DEV TOOLS',
                'description' => 'Development Environment',
            ],
            [
                'type' => 'menu',
                'name' => 'Builder',
                'conditions' => [
                    [
                        'type' => 'or',
                        'condition' => env('APP_ENV') == 'local'
                    ],
                ],
                'children' => [
                    [
                        'type' => 'submenu',
                        'name' => 'Form Builder 1',
                        'link' => 'http://admin.pixelstrap.com/cuba/theme/form-builder-1.html',
                    ],
                    [
                        'type' => 'submenu',
                        'name' => 'Form Builder 2',
                        'link' => 'http://admin.pixelstrap.com/cuba/theme/form-builder-2.html',
                    ],
                    [
                        'type' => 'submenu',
                        'name' => 'Page Builder',
                        'link' => 'http://admin.pixelstrap.com/cuba/theme/pagebuild.html',
                    ],
                    [
                        'type' => 'submenu',
                        'name' => 'Buttom Builder',
                        'link' => 'http://admin.pixelstrap.com/cuba/theme/button-builder.html',
                    ],
                ]
            ],
            [
                'type' => 'menu',
                'name' => 'Documentation',
                'conditions' => [
                    [
                        'type' => 'or',
                        'condition' => env('APP_ENV') == 'local'
                    ],
                ],
                'children' => [
                    [
                        'type' => 'submenu',
                        'name' => 'Frontend Docs',
                        'link' => 'https://docs.pixelstrap.com/cuba/all_in_one/document/index.html',
                    ],
                    [
                        'type' => 'submenu',
                        'name' => 'Adminetic Docs',
                        'link' => 'https://pratikdai404.gitbook.io/adminetic/',
                    ],
                ]
            ],
            [
                'type' => 'link',
                'name' => 'Github',
                'icon' => 'fab fa-github',
                'link' => 'https://github.com/pratiksh404/admineticl',
            ],
             [
                'type' => 'breaker',
                'name' => 'ECOMMERCE TOOLS ',
                'description' => 'Development Environment',
            ],

            //Category Menu
            [
                'type' => 'menu',
                'name' => 'Category',
                'icon' => 'fa fa-window-restore',
                'is_active' => request()->routeIs('category*') ? 'active' : '',
                'conditions' => [
                    [
                        'type' => 'or',
                        'condition' => auth()->user()->can('view-any', App\Models\Admin\Category::class),
                    ],
                    [
                        'type' => 'or',
                        'condition' => auth()->user()->can('create', App\Models\Admin\Category::class),
                    ],
                ],
                'children' => $this->indexCreateChildren('category', App\Models\Admin\Category::class)
            ],

            //Brand Menu

            [
                'type' => 'menu',
                'name' => 'Brand',
                'icon' => 'fa fa-btc',
                'is_active' => request()->routeIs('brand*') ? 'active' : '',
                'conditions' => [
                    [
                        'type' => 'or',
                        'condition' => auth()->user()->can('view-any', App\Models\Admin\Brand::class),
                    ],
                    [
                        'type' => 'or',
                        'condition' => auth()->user()->can('create', App\Models\Admin\Brand::class),
                    ],
                ],
                'children' => $this->indexCreateChildren('brand', App\Models\Admin\Brand::class)
            ],

            //Tax Menu

             [
                'type' => 'menu',
                'name' => 'Tax',
                'icon' => 'fa fa-percent',
                'is_active' => request()->routeIs('tax*') ? 'active' : '',
                'conditions' => [
                    [
                        'type' => 'or',
                        'condition' => auth()->user()->can('view-any', App\Models\Admin\Tax::class),
                    ],
                    [
                        'type' => 'or',
                        'condition' => auth()->user()->can('create', App\Models\Admin\Tax::class),
                    ],
                ],
                'children' => $this->indexCreateChildren('tax', App\Models\Admin\Tax::class)
            ],

            //Unit Menu

            [
                'type' => 'menu',
                'name' => 'Unit',
                'icon' => 'fa fa-balance-scale',
                'is_active' => request()->routeIs('unit*') ? 'active' : '',
                'conditions' => [
                    [
                        'type' => 'or',
                        'condition' => auth()->user()->can('view-any', App\Models\Admin\Unit::class),
                    ],
                    [
                        'type' => 'or',
                        'condition' => auth()->user()->can('create', App\Models\Admin\Unit::class),
                    ],
                ],
                'children' => $this->indexCreateChildren('unit', App\Models\Admin\Unit::class)
            ],

            //Adminetic Github
            [
                'type' => 'link',
                'name' => 'Github',
                'icon' => 'fa fa-github',
                'link' => 'https://github.com/pratiksh404/admineticl',
            ],
        ];
    }
}
