<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'hall_id',
        'organizer_name',
        'organizer_ic',
        'organization',
        'email',
        'phone',
        'start_at',
        'end_at',
        'purpose',
        'attendees',
        'attachment',
        'status',
        'admin_notes'
    ];

    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }
}
