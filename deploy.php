<?php
namespace Deployer;

require 'recipe/laravel.php';

// Config

set('repository', 'git@github.com:bodik2836/weather.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host(env('DEPLOYER_HOST'))
    ->set('remote_user', env('DEPLOYER_USER'))
    ->set('deploy_path', env('DEPLOYER_PATH'));

// Hooks

after('deploy:failed', 'deploy:unlock');
