<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use Searchable;
    protected $primaryKey='item_id';

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
