<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vaccination extends Model
{
    use HasFactory;

    protected  $fillable = ['date','time','max_participants'];

    public function users():HasMany{
        return $this->hasMany(User::class);
    }
}
