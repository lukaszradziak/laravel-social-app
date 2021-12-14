<?php

/**
 * Remove laravel/nova from require, repositories and post-update-cmd
 */
$file = './composer.json';
$content = file_get_contents($file);
$content = preg_replace('/(\,\\n.*\"laravel\/nova\"\: \"\*\")/i', '', $content);
$content = preg_replace('/({\n.*\\"type\"\: \"path\"\,\n.*\"url\"\: \"\.\/nova\"\n.*\})/i', '', $content);
$content = preg_replace('/(\,\\n.*\"\@php artisan nova:publish\")/i', '', $content);
file_put_contents($file, $content);

/**
 * Remove NovaServiceProvider
 */
$file = './config/app.php';
$content = file_get_contents($file);
$content = str_replace('App\Providers\NovaServiceProvider::class,', '', $content);
file_put_contents($file, $content);
