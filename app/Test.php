<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use VeseluyRodjer\CrudGenerator\HasTranslations;


class Test extends Model
{
    use HasTranslations;
    
    public $translatable = [];

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tests';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

//    protected $hidden = 

    
}
