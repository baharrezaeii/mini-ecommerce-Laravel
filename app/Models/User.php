<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Enums\UserStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\User as Authenticate;

/**
 * Class User
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $mobile
 * @property string $password
 * @property int $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Collection|Order[] $orders
 *
 * @package App\Models
 */
class User extends Authenticate
{
	protected $table = 'users';
	public static $snakeAttributes = false;

	protected $casts = [
		'status' => UserStatus::class
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'first_name',
		'last_name',
		'email',
		'mobile',
		'password',
		'status'
	];

	public function orders()
	{
		return $this->hasMany(Order::class);
	}
}
