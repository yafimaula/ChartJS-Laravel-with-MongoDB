<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;


class ChartJS extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'LoginInfo';

}
