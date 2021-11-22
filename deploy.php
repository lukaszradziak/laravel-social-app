<?php

namespace Deployer;

require 'recipe/laravel.php';
require_once realpath(__DIR__ . '/vendor/autoload.php');

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

set('application', 'social');
set('repository', 'git@github.com:lukaszradziak/laravel-social-app.git');
set('git_tty', true);
add('shared_files', []);
add('shared_dirs', ['node_modules']);
add('writable_dirs', []);
set('allow_anonymous_stats', false);
set('keep_releases', 5);
set('ssh_multiplexing', true);

host($_SERVER['SECRET_HOST'])
    ->user($_SERVER['SECRET_USER'])
    ->port($_SERVER['SECRET_PORT'])
    ->set('deploy_path', '~/{{application}}');

task('build', function () {
    run('export PATH=~/.nvm/versions/node/v17.1.0/bin:$PATH && cd {{release_path}} && npm i && npm run prod');
});
after('artisan:optimize', 'build');

after('deploy:failed', 'deploy:unlock');
before('deploy:symlink', 'artisan:migrate');
