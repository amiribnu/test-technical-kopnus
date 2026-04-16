<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\JobApplication;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vacancy extends Model
{
    use HasFactory;
    protected $table = 'vacancy';

    protected $fillable = [
        'employer_id', 'job_title', 'work_location',
        'job_type', 'job_description', 'job_requirement',
        'closing_date', 'status'
    ];

    public function employer() {
        return $this->belongsTo(Employer::class);
    }

    public function jobApplications() {
        return $this->hasMany(JobApplication::class);
    }

    public function scopePublished($query) {
        return $query->where('status', 'published');
    }
}
