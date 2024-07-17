<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class device_managements extends Model
{
    use HasFactory;

    protected $keyType = 'uuid';
    public $incrementing = false;

    protected $fillable = [
        'device_id',
        'teganggan',
        'arus',
        'data_aktif',
        'daya_reaktif',
        'data_semu',
    ];

    public function device(): BelongsTo {
        return $this->belongsTo(Device::class, 'device_id');
    }
}
