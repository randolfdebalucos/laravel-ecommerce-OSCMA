<?php
/**
 * Model: Authorization
 * Purpose: Represents external authorizations (OAuth tokens, provider data)
 * associated with a user. Stores token, provider name, scopes and expiration.
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Authorization extends Model
{
    protected $table = 'authorizations';

    protected $fillable = [
        'user_id',
        'provider',
        'token',
        'scopes',
        'expires_at',
    ];

    protected $casts = [
        'scopes' => 'array',
        'expires_at' => 'datetime',
    ];

    public function user()
    {
        // Relation: authorization belongs to a user
        return $this->belongsTo(User::class);
    }
}
