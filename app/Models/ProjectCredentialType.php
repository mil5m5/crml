<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProjectCredentialType extends Model
{
    public $timestamps = false;
    use HasFactory;

    public static function getProjectCredentialTypesList()
    {
        return DB::table('project_credential_types')->pluck('name', 'id');
    }
}
