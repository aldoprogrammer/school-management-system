<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSubjectModel extends Model
{
    use HasFactory;

    protected $table = 'class_subject';
    // protected $guarded = [];

    static public function getRecord()
    {
        return self::get();
    }
}
