<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    protected $primaryKey = 'nis';

	protected $fillable = ['nis', 'student_name','gender','date_birth','class','address'];
}
