<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Test;
use App\User;

/**
 * Class Comment
 */
class Comment extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * Связь с моделью Test
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    /**
     * Связь с моделью User
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
