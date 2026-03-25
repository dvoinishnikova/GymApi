<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'subscription_until',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'subscription_until' => 'datetime',
        ];
    }

    public function workouts()
    {
        return $this->hasMany(Workout::class);
    }

    public function hasActiveSubscription(): bool
    {
        return $this->subscription_until && $this->subscription_until->isFuture();
    }

    protected $appends = ['is_subscribed', 'subscription_days_left'];

    public function getIsSubscribedAttribute(): bool
    {
        return $this->hasActiveSubscription();
    }

    public function getSubscriptionDaysLeftAttribute(): int
    {
        if (!$this->subscription_until) return 0;

        return now()->diffInDays($this->subscription_until, false);
    }
}