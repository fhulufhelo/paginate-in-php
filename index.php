<?php

use App\Pagination\Builder;
use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;

require_once 'vendor/autoload.php';

$config = new Configuration();

$connectionParams = array(
    'dbname' => 'paginate',
    'user' => 'root',
    'password' => '',
    'host' => 'localhost',
    'driver' => 'pdo_mysql',
);
$conn = DriverManager::getConnection($connectionParams, $config);

$queryBuilder = $conn->createQueryBuilder();

$queryBuilder->select('*')->from('users');


$builder = new Builder($queryBuilder);

$users = $builder->paginate($_GET['page'] ?? 1, 7);

dump($users->render());