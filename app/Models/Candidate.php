<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\JobApplication;

class Candidate extends Model {

    use HasFactory;
    protected $fillable = [
        'user_id', 'candidate_name', 'candidate_email',
        'phone_number', 'date_of_birth', 'candidate_gender',
        'candidate_address', 'candidate_cv', 'portofolio_link'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function jobApplications() {
        return $this->hasMany(JobApplication::class);
    }
}