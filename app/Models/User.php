<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Candidate;
use App\Models\Employer;


class User extends Authenticatable {
    use HasFactory, Notifiable, TwoFactorAuthenticatable, HasApiTokens;

    protected $fillable = ['name', 'email', 'password', 'role'];
    protected $hidden = ['password', 'remember_token'];

    protected function casts(): array {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function employer() {
        return $this->hasOne(Employer::class);
    }

    public function candidate() {
        return $this->hasOne(Candidate::class);
    }

    public function isEmployer(): bool {
        return $this->role === 'employer';
    }

    public function isCandidate(): bool {
        return $this->role === 'candidate';
    }
}
