<?php

namespace App\Http\Controllers;

use App\Events\PodcastProcessed;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use PDO;

class CarController extends BaseController
{
    // use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function TestHeandler()
    {
//        return ['mysql' => [
//        'driver' => 'mysql',
//        'url' => env('DATABASE_URL'),
//        'host' => env('DB_HOST', '127.0.0.1'),
//        'port' => env('DB_PORT', '3306'),
//        'database' => env('DB_DATABASE', 'forge'),
//        'username' => env('DB_USERNAME', 'forge'),
//        'password' => env('DB_PASSWORD', ''),
//        'unix_socket' => env('DB_SOCKET', ''),
//        'charset' => 'utf8mb4',
//        'collation' => 'utf8mb4_unicode_ci',
//        'prefix' => '',
//        'prefix_indexes' => true,
//        'strict' => true,
//        'engine' => null,
//        'options' => extension_loaded('pdo_mysql') ? array_filter([
//            PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
//        ]) : [],
//    ]];
//        phpinfo();
        return DB::table('test')->get();
    }
}
