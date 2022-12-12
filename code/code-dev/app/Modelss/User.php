<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
	use HasFactory, Notifiable, HasRoles;
	
	// protected $table = 'users';

	// protected $casts = [
	// 	'id_tipo_usuario' => 'int'
	// ];

	protected $dates = [
		'email_verified_at'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'no_afiliado',
		'ibm',
		'name',
		'apellido',
		'email',
		'email_verified_at',
		'password',
		'remember_token',
	];

	// public function tipo_usuario()
	// {
	// 	return $this->belongsTo(TipoUsuario::class, 'id_tipo_usuario');
	// }

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
