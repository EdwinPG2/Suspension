<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BitacoraSuspension
 * 
 * @property int $id_bitacora2
 * @property Carbon $fecha_inicio_suspension
 * @property Carbon $fecha_fin_suspension
 * @property Carbon $fecha_alta
 * @property Carbon $fecha_registro
 * @property Carbon $fecha_envio_prestacion
 * @property Carbon $fecha_recibido_prestacione
 * @property Carbon $fecha_revision
 * @property string $observacion
 * @property string $estado
 * @property int $no_afiliado
 * @property int $id_clinica_servicio
 * @property string $medico_colegiado
 * @property int $users_id_registrador
 * @property string|null $users_id_revisor
 * @property Carbon $fecha_inicio_caso
 * @property Carbon $fecha_accidente
 * @property int $id_riesgo
 * @property int $id_suspension
 *
 * @package App\Models
 */
class BitacoraSuspension extends Model
{
	protected $table = 'bitacora_suspension';
	protected $primaryKey = 'id_bitacora2';
	public $timestamps = false;

	protected $casts = [
		'no_afiliado' => 'int',
		'id_clinica_servicio' => 'int',
		'users_id_registrador' => 'int',
		'id_riesgo' => 'int',
		'id_suspension' => 'int'
	];

	protected $dates = [
		'fecha_inicio_suspension',
		'fecha_fin_suspension',
		'fecha_alta',
		'fecha_registro',
		'fecha_envio_prestacion',
		'fecha_recibido_prestacione',
		'fecha_revision',
		'fecha_inicio_caso',
		'fecha_accidente'
	];

	protected $fillable = [
		'fecha_inicio_suspension',
		'fecha_fin_suspension',
		'fecha_alta',
		'fecha_registro',
		'fecha_envio_prestacion',
		'fecha_recibido_prestacione',
		'fecha_revision',
		'observacion',
		'estado',
		'no_afiliado',
		'id_clinica_servicio',
		'medico_colegiado',
		'users_id_registrador',
		'users_id_revisor',
		'fecha_inicio_caso',
		'fecha_accidente',
		'id_riesgo',
		'id_suspension'
	];
}
