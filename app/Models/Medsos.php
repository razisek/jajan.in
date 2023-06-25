<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medsos extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function socialLink()
    {
        return $this->belongsTo(SocialLink::class, 'social_link_id');
    }
}
