<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use Searchable;

    /**
     * 获取用户的名字
     *
     * @param  string  $value
     * @return string
     */
    public function getTypeIdAttribute($value)
    {
        $type = Type::where('id',$value)
            ->first();
        return $type;
    }
    public function getLostTypeAttribute($value)
    {
        if ($value==0)
        {
            return '失物招领';
        }
        elseif ($value==1)
        {
            return '寻物启事';
        }
    }
    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */

    public function toSearchableArray()
    {
        $array = $this->toArray();

// Customize array...

        return $array;
    }

}
