<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mail extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    const TYPE_IN = 'IN';
    const TYPE_OUT = 'OUT';

    public function attributes()
    {
        return $this->belongsToMany(MailAttribute::class, MailAttributeTransaction::class);
    }

    public function versions()
    {
        return $this->hasMany(MailVersion::class);
    }
}
