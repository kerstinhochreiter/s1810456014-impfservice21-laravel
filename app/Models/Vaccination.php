<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vaccination extends Model
{
    //use HasFactory;

    protected  $fillable = ['max_participants', 'date','time', 'location_id'];

    //ONE vaccination BELONGSTO ONE location
    public function location():BelongsTo{
        return $this->belongsTo(Location::class);
    }

    //ONE vaccination HASMANY users
    public function users():HasMany{
        return $this->hasMany(User::class);
    }


}
