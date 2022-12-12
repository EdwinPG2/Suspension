<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RespuestaRequerimiento
 * 
 * @property int $id_respuesta_requerimiento
 * @property int $no_afiliado
 * @property int $id_requerimiento
 * @property string|null $caso
 * @property string $desino_nombre
 * @property string $destino_area
 * @property string $destino_lugar
 * @property string $cuerpo
 * @property string $nombre_usuario
 * @property string $vobo
 * @property string $folios
 * @property int|null $users_id
 * @property int|null $id_cargo
 * @property string|null $archivo
 * 
 * @property Afiliado $afiliado
 * @property Cargo|null $cargo
 * @property Requerimiento $requerimiento
 * @property User|null $user
 *
 * @package App\Models
 */
class RespuestaRequerimiento extends Model
{
	protected $table = 'respuesta_requerimiento';
	protected $primaryKey = 'id_respuesta_requerimiento';
	public $timestamps = false;

	protected $casts = [
		'no_afiliado' => 'int',
		'id_requerimiento' => 'int',
		'users_id' => 'int',
		'id_cargo' => 'int'
	];

	protected $fillable = [
		'no_afiliado',
		'id_requerimiento',
		'caso',
		'desino_nombre',
		'destino_area',
		'destino_lugar',
		'cuerpo',
		'nombre_usuario',
		'vobo',
		'folios',
		'users_id',
		'id_cargo',
		'archivo'
	];

	public function afiliado()
	{
		return $this->belongsTo(Afiliado::class, 'no_afiliado');
	}

	public function cargo()
	{
		return $this->belongsTo(Cargo::class, 'id_cargo');
	}

	public function requerimiento()
	{
		return $this->belongsTo(Requerimiento::class, 'id_requerimiento');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'users_id');
	}
}
