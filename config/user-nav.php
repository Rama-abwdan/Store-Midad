<?php

return [
    [
        'title' => 'Dashboard',
        'icon' => 'nav-icon fas fa-tachometer-alt',
        'route' => 'user.dashboard'
    ],[
        'title' => 'Store',
        'icon' => 'nav-icon fas fa-store',
        'route' => 'user.store.edit',
        'middleware' => ['user.has.store'],//i wirte
    ],[
        'title' => 'Products',
        'icon' => 'nav-icon fas fa-box',
        'route' => 'user.products.index',
        
    ],[
        'title' => 'Team',
        'icon' => 'nav-icon fas fa-users',
        'route' => 'user.teams.index'
    ]
    
];