<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Rol
 * 
 * @property int $id_rol
 * @property string $nombre
 * @property string $descripcion
 * 
 * @property Collection|RolUsuario[] $rol_usuarios
 *
 * @package App\Models
 */
class Rol extends Model
{
	protected $table = 'rol';
	protected $primaryKey = 'id_rol';
	public $timestamps = false;

	protected $fillable = [
		'nombre',
		'descripcion'
	];

	public function rol_usuarios()
	{
		return $this->hasMany(RolUsuario::class, 'id_rol');
	}
}
