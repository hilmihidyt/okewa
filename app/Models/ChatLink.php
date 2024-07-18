<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use AshAllenDesign\ShortURL\Models\ShortURL;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChatLink extends Model
{
    use HasFactory, SoftDeletes, HasUlids;

    protected $fillable = [
        'phone',
        'message',
        'wa_link',
        'short_url',
    ];

    public function shortUrl()
    {
        return $this->hasOne(ShortURL::class, 'default_short_url', 'short_url');
    }
}
