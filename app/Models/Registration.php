<?php
// Model: Registration — stores registered users for the lightweight auth flow
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $table = 'registrations';

    protected $fillable = [
        'name',
        'username',
        'email',
        'address',
        'phone',
        'password',
        'status',
        'is_admin',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'is_admin' => 'boolean',
    ];

    // Relation: link to a User model (kept for compatibility)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
