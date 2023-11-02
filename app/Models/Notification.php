<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Notification
 *
 * @mixin Builder
 */
class Notification extends Model
{
    use HasFactory;

    protected $fillable = ['text', 'integrator_type', 'status', 'sent_time'];
}
