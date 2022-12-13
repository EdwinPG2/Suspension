<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Requerimiento
 * 
 * @property int $id_requerimiento
 * @property string $no_requerimiento
 * @property Carbon $fecha_requerimiento
 * @property Carbon $fecha_envio
 * @property string $estado
 * @property string|null $observaciones
 * @property Carbon|null $fecha_recepcion_regmed
 * @property int|null $id_oficio
 * @property int $no_afiliado
 * @property int $users_id_remitente
 * @property int|null $users_id_responsable
 * @property string|null $archivo
 * @property string|null $caso
 * @property string|null $desino_nombre
 * @property string|null $destino_area
 * @property string|null $destino_lugar
 * @property string|null $cuerpo
 * @property string|null $nombre_usuario
 * @property string|null $vobo
 * @property string|null $folios
 * @property int|null $users_id_respuesta
 * @property int|null $id_cargo
 * @property string|null $archivo_respuesta
 * @property string|null $correlativo
 * @property Carbon|null $fecha_respuesta
 * 
 * @property Afiliado $afiliado
 * @property Cargo|null $cargo
 * @property User|null $user
 *
 * @package App\Models
 */
class Requerimiento extends Model
{
	protected $table = 'requerimiento';
	protected $primaryKey = 'id_requerimiento';
	public $timestamps = false;

	protected $casts = [
		'id_oficio' => 'int',
		'no_afiliado' => 'int',
		'users_id_remitente' => 'int',
		'users_id_responsable' => 'int',
		'users_id_respuesta' => 'int',
		'id_cargo' => 'int'
	];

	protected $dates = [
		'fecha_requerimiento',
		'fecha_envio',
		'fecha_recepcion_regmed',
		'fecha_respuesta'
	];

	protected $fillable = [
		'no_requerimiento',
		'fecha_requerimiento',
		'fecha_envio',
		'estado',
		'observaciones',
		'fecha_recepcion_regmed',
		'id_oficio',
		'no_afiliado',
		'users_id_remitente',
		'users_id_responsable',
		'archivo',
		'caso',
		'desino_nombre',
		'destino_area',
		'destino_lugar',
		'cuerpo',
		'nombre_usuario',
		'vobo',
		'folios',
		'users_id_respuesta',
		'id_cargo',
		'archivo_respuesta',
		'correlativo',
		'fecha_respuesta'
	];

	public function afiliado()
	{
		return $this->belongsTo(Afiliado::class, 'no_afiliado');
	}

	public function cargo()
	{
		return $this->belongsTo(Cargo::class, 'id_cargo');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'users_id_respuesta');
	}
}
