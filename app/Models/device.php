<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class device extends Model
{
    use HasFactory;

    public function device_management(): HasMany {
        return $this->hasMany(device_managements::class, 'device_id');
    }
}
