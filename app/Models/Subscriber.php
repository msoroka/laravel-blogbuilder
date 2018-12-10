<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Subscriber extends Model
{
    use Notifiable;

    protected $fillable = [
        'email',
        'unsubscribe_code',
        'unsubscribed_at',
    ];

    protected $dates = [
        'unsubscribed_at',
    ];

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope('subscribed', function (Builder $builder) {
            $builder->whereNull('unsubscribed_at');
        });
    }

    public function scopeUnsubscribed($query)
    {
        $query->withoutGlobalScope('subscribed')->whereNotNull('unsubscribed_at');
    }
}
