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
add('shared_dirs', ['node_modules', 'nova']);
add('writable_dirs', []);
set('allow_anonymous_stats', false);
set('keep_releases', 5);
set('ssh_multiplexing', true);

host('host343376.hostido.net.pl')
  ->user('host343376')
  ->set('http_user', 'host343376')
  ->set('writable_mode', 'chmod')
  ->port(64321)
  ->set('deploy_path', '~/domains/social.lukaszradziak.pl/app')
  ->set('bin/php', function () {
    return 'php8.0';
  })
  ->set('bin/composer', function () {
    return 'php8.0 /usr/local/bin/composer';
  });

task('build', function () {
    run('cd {{release_path}} && npm i && npm run prod');
});
after('artisan:optimize', 'build');

after('deploy:failed', 'deploy:unlock');
before('deploy:symlink', 'artisan:migrate');
