<?php

namespace App\model\score;

use Illuminate\Database\Eloquent\Model;

class Mathematics extends Model
{
    protected $table = 'mathematics';

    protected $primaryKey = 'id';

	protected $fillable = ['id', 'id_nis','id_nip','daily_exam_1','daily_task_1','daily_exam_2','midterm_tests','daily_task_2','daily_exam_3','daily_task_3','final_exam','mathematics_score'];
}
