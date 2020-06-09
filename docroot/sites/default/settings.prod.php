<?php

$databases['default']['default'] = array (
  'database' => 'database',
  'username' => 'username',
  'password' => 'password',
  'prefix' => '',
  'host' => 'localhost',
  'port' => '3306',
  'namespace' => 'Drupal\\Core\\Database\\Driver\\mysql',
  'driver' => 'mysql',
);
$config['advagg.settings']['enabled'] = FALSE;
$settings['update_free_access'] = TRUE;

// Config split
$config['config_split.config_split.prod']['status'] = TRUE;
$config['config_split.config_split.dev']['status'] = FALSE;
$config['config_split.config_split.stage']['status'] = FALSE;
$config['config_split.config_split.local']['status'] = FALSE;

$settings['memcache']['servers'] = ['memcached:11211' => 'default'];
$settings['memcache']['bins'] = ['default' => 'default'];
$settings['memcache']['key_prefix'] = '';

$cache_backend = 'cache.backend.memcache';
// Database.
//$cache_backend = 'cache.backend.database';
// No caches at all.
//$cache_backend = 'cache.backend.null';

// Agg
$config['system.performance']['css']['preprocess'] = FALSE;
$config['system.performance']['js']['preprocess'] = FALSE;
