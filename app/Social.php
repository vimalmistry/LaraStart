<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $table = 'social_logins';

    /**
     * Has Belongs to Only One User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        //return $this->belongsTo('App\Models\User');
        return $this->belongsTo('App\User');
    }
}
