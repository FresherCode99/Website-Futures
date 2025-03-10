<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'admin_id','description','image'];

    // Một team có nhiều user thông qua bảng team_user
    public function users()
    {
        return $this->belongsToMany(User::class, 'team_user')->withPivot('created_at');;
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'team_tag');
    }

    // Một team chỉ có một admin (user)
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
