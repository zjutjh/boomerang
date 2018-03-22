<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use Searchable;



    protected $primaryKey='id';

    protected $fillable = ['uid', 'title', 'description', 'lost_place', 'type', 'lost_type','contact_uno', 'phone', 'qq', 'images'];




    protected $casts = [
        'images' => 'array'
    ];


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

//    public function getImagesAttribute($val)
//    {
//        $temp = json_decode($val, true);
//
////        dd($temp);
//        foreach ($temp as $k => $v) {
//            $temp[$k] = asset($v);
//        }
//        return $temp;
//
//    }


       public function getTypeAttribute()
       {
           $type = Type::where('id', $this->attributes['lost_type'])->first();
           return $type;
       }


}
