<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $id
 * @property string $ibm
 * @property string $name
 * @property string $apellido
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $change_password
 * 
 * @property Collection|ControlRequerimiento[] $control_requerimientos
 * @property Collection|Oficio[] $oficios
 * @property Collection|Requerimiento[] $requerimientos
 * @property Collection|RevisionOficio[] $revision_oficios
 * @property Collection|Suspension[] $suspensions
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'users';

	protected $dates = [
		'email_verified_at',
		'change_password'
	];

	protected $hidden = [
		'password',
		'remember_token',
		'change_password'
	];

	protected $fillable = [
		'ibm',
		'name',
		'apellido',
		'email',
		'email_verified_at',
		'password',
		'remember_token',
		'change_password'
	];

	public function control_requerimientos()
	{
		return $this->hasMany(ControlRequerimiento::class, 'users_id');
	}

	public function oficios()
	{
		return $this->hasMany(Oficio::class, 'users_id_revisor');
	}

	public function requerimientos()
	{
		return $this->hasMany(Requerimiento::class, 'users_id_responsable');
	}

	public function revision_oficios()
	{
		return $this->hasMany(RevisionOficio::class, 'users_id');
	}

	public function suspensions()
	{
		return $this->hasMany(Suspension::class, 'users_id_revisor');
	}
}
