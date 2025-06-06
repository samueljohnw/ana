<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use App\Models\Purchase;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'email_verified',
        'login_token',
        'login_token_expires_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'login_token_expires_at' => 'datetime',
        ];
    }

    protected $dates = [
        'login_token_expires_at'
    ];

    public function course()
    {
        return $this->belongsToMany(Course::class, 'purchase');
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    public function purchasedCourses()
    {
        return $this->hasManyThrough(Course::class, Purchase::class, 'user_id', 'id', 'id', 'course_id');    
    }

    public function hasCourse($courseId)
    {   
        return Purchase::where([
            ['user_id', '=', $this->id],
            ['course_id', '=', $courseId],
        ])->exists();
    }
}
