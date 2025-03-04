<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Reviews;
use App\Models\NewsPost;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getpermissionGroups(){

        $permission_groups = DB::table('permissions')->select('group_name')->groupBy('group_name')->get();

        return $permission_groups;

    }

    public static function getpermissionByGroupName($group_name){

        $permission = DB::table('permissions')->select('name','id')->where('group_name',$group_name)->get();

        return $permission;

    }

    public static function roleHasPermissions($role,$permission){

        $hasPermission = true;

        foreach ($permission as $perm) {

            // hasPermissionTo()  laravel spattie

            if (!$role->hasPermissionTo($perm->name)) {

                $hasPermission = false;

                return $hasPermission;

            }

            return $hasPermission;

        }

    }

    public function newsPosts() {
        return $this->hasMany(NewsPost::class);
    }

    public function reviews() {
        return $this->hasMany(Reviews::class);
    }
}
