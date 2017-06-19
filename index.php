<?php

use Iporm\Connection;

require "vendor/autoload.php";

Connection::connect('', '', '', '');

//INSERT
$db = new \Iporm\Db();
$db->insertInto('users', ['name' => 'Sample', 'last_name' => 'Name', 'email' => 'asdada'])
    ->run();

print_r($db->getInsertedId());

$db = new \Iporm\Db();
$db->insertInto('user_bio', ['user_id' => 7, 'text' => 'sdadasd', 'lang' => 'en'])
    ->run();

//SELECT
$db = new \Iporm\Db();
$db->select()
    ->from('users')
    ->run();

print_r($db->getSelected());

//UPDATE
$db = new \Iporm\Db();
$db->update('users', ['name' => 'New'])
    ->where(['name' => 'Sample'])
    ->run();

print_r($db->getAffected());

//DELETE
$db = new \Iporm\Db();
$db->delete()
    ->from('users')
    ->where(['name' => 'New'])
    ->run();

print_r($db->getAffected());

$db = new \Iporm\Db();
$db->delete()
    ->from('users')
    ->whereOr(['name' => ['Sample', 'Another']])
    ->run();

$db = new \Iporm\Db();
$db->delete()
    ->from('users')
    ->whereIn(['name' => ['Sample', 'Another']])
    ->run();

$db = new \Iporm\Db();
$db->delete()
    ->from('users')
    ->whereNotIn(['name' => ['Sample', 'Another']])
    ->run();

$db = new \Iporm\Db();
$db->select('id, name')
    ->from('users u')
    ->innerJoin(['user_bio ub ON u.id = ub.user_id'])
    ->whereNotIn(['name' => ['Ugly Name']])
    ->run();

$db = new \Iporm\Db();
$db->select('id, name')
    ->from('users u')
    ->leftJoin(['user_bio ub ON u.id = ub.user_id'])
    ->whereNotIn(['name' => ['Ugly Name']])
    ->groupBy('id, name')
    ->run();  