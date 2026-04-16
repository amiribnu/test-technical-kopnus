<?php

namespace App\Models;

use App\Models\Vacancy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobApplication extends Model
{
    use HasFactory;
    protected $fillable = ['job_id', 'candidate_id', 'status'];

    public function job() {
        return $this->belongsTo(Vacancy::class);
    }

    public function candidate() {
        return $this->belongsTo(Candidate::class);
    }
}
