<?php
namespace Deployer;

require 'recipe/laravel.php';

// Config

set('repository', 'git@github.com:bodik2836/weather.git');
set('writable_mode', 'chown');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('host')
    ->set('remote_user', 'usr')
    ->set('http_user', 'usr')
    ->set('deploy_path', 'path');

set('keep_releases', 3);

// Hooks

after('deploy:failed', 'deploy:unlock');
