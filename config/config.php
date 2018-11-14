<?php

Config::set('site_name', 'Your site name ');

// Set Langiages
Config::set('languages', array('en', 'fr') );

// Routes Route name => method_prefix
Config::set('routes', array(
        'default' => '',
        'admin' => 'admin_',    
 ));



// Set Default elements 
Config::set('default_route','default');
Config::set('default_language','en');
Config::set('default_controller','pages');
Config::set('default_action','index');
 