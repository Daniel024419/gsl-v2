<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

#[Fillable(['name', 'image'])]
class Person extends Model
{
    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->image ? Storage::disk('r2')->temporaryUrl($this->image, now()->addMinutes(20)) : null,
        );
    }

    public function leadershipMemberships()
    {
        return $this->hasMany(LeadershipMember::class);
    }

    public function governingBodyMemberships()
    {
        return $this->hasMany(GoverningBodyMember::class);
    }

    public function institutionalMemoryMemberships()
    {
        return $this->hasMany(InstitutionalMemoryMember::class);
    }

    public function enrollmentCommitteeMemberships()
    {
        return $this->hasMany(EnrollmentCommitteeMember::class);
    }

    public function departmentHeadMemberships()
    {
        return $this->hasMany(DepartmentHead::class);
    }

    public function notableAlumniMemberships()
    {
        return $this->hasMany(NotableAlumnus::class);
    }

    public function overviewMessages()
    {
        return $this->hasMany(OverviewMessage::class);
    }

    public function directorates()
    {
        return $this->hasMany(Directorate::class);
    }
}
