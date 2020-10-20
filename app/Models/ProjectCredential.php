<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectCredential extends Model
{
    use HasFactory;

    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }

    public function credentialType()
    {
        return $this->belongsTo('App\Models\ProjectCredentialType');
    }
}
