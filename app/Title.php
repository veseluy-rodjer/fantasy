<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use VeseluyRodjer\CrudGenerator\HasTranslations;

class Title extends Model
{
    use HasTranslations;
    
    public $translatable = [];

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'titles';

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
     * Get the user that owns the title.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the opuses for the title.
     */
    public function opuses()
    {
        return $this->hasMany('App\Opus');
    }
}
