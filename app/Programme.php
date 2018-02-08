<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Programmer extends Model
{
    //同步更新数据至Algolia
    use Searchable;
}