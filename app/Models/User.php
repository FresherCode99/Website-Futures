<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'fistname',
        'lastname',
        'fullname',
        'email',
        'password',
        'role',
        'avatar',
        'topic',
        'address',
        'status',
        'country',
        'language',
        'phone',
        'skype',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($role)
    {
        return $this->roles()->where('name', $role)->exists();
    }

    // Thêm một phương thức để kiểm tra role của người dùng
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isManager()
    {
        return $this->role === 'manager';
    }
    public function isUser()
    {
        return $this->role === 'user';
    }
    // Một user có thể tham gia nhiều team
    public function teams()
    {
        return $this->belongsToMany(Team::class, 'team_user')->withPivot('created_at');;
    }

    // Một user có thể quản lý nhiều team (admin của các team)
    public function managedTeams()
    {
        return $this->hasMany(Team::class, 'admin_id');
    }
    // Quan hệ bạn bè đã chấp nhận
    public function friends()
    {
        return $this->belongsToMany(User::class, 'friends', 'user_id', 'friend_id')
            ->wherePivot('status', 'accepted');
        // Sử dụng wherePivot để chỉ rõ bảng liên kết
    }

    // Quan hệ bạn bè chờ chấp nhận
    public function pendingFriends()
    {
        return $this->belongsToMany(User::class, 'friends', 'user_id', 'friend_id')
            ->wherePivot('status', 'pending');
    }

    // Kiểm tra nếu người dùng đã kết bạn với người khác
    public function isFriendWith($userId)
    {
        // Kiểm tra mối quan hệ bạn bè và trạng thái là 'accepted'
        return $this->friends()->where('users.id', $userId)->exists();
    }

    public function hasPendingFriendRequest($userId)
    {
        // Kiểm tra yêu cầu kết bạn đã gửi và trạng thái là 'pending'
        return $this->pendingFriends()->where('users.id', $userId)->exists();
    }
    public function sentMessages()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    public function receivedMessages()
    {
        return $this->hasMany(Message::class, 'receiver_id');
    }
    public function allMessages()
    {
        // Kết hợp cả tin nhắn đã gửi và đã nhận
        // Trả về query builder của tin nhắn đã gửi và nhận
        return Message::where('sender_id', $this->id)
            ->orWhere('receiver_id', $this->id);
    }
}
