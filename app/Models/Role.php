<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name'])]
class Role extends Model
{
    protected $table = 'management_roles';

    public function leadershipMembers()
    {
        return $this->hasMany(LeadershipMember::class);
    }

    public function governingBodyMembers()
    {
        return $this->hasMany(GoverningBodyMember::class);
    }

    public function enrollmentCommitteeMembers()
    {
        return $this->hasMany(EnrollmentCommitteeMember::class);
    }

    public function departmentHeads()
    {
        return $this->hasMany(DepartmentHead::class);
    }
}
