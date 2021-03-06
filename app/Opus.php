<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use VeseluyRodjer\CrudGenerator\HasTranslations;


class Opus extends Model
{
    use HasTranslations;
    
    public $translatable = [];

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'opuses';

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

    /**
     * Get the user that owns the opus.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    /**
     * Get the title that owns the opus.
     */
    public function title()
    {
        return $this->belongsTo('App\Title');
    }
}
