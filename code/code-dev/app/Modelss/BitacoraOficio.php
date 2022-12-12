<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BitacoraOficio
 * 
 * @property int $id_bitacora3
 * @property string $destinatario
 * @property string $saludo
 * @property string $lugar
 * @property string $correlativo
 * @property Carbon $fecha
 * @property string $despedida
 * @property string $estado
 * @property int $users_id_creador
 * @property int|null $users_id_revisor
 * @property Carbon|null $fecha_revision
 * @property int $clinica_servicio
 * @property int $id_oficio
 *
 * @package App\Models
 */
class BitacoraOficio extends Model
{
	protected $table = 'bitacora_oficio';
	protected $primaryKey = 'id_bitacora3';
	public $timestamps = false;

	protected $casts = [
		'users_id_creador' => 'int',
		'users_id_revisor' => 'int',
		'clinica_servicio' => 'int',
		'id_oficio' => 'int'
	];

	protected $dates = [
		'fecha',
		'fecha_revision'
	];

	protected $fillable = [
		'destinatario',
		'saludo',
		'lugar',
		'correlativo',
		'fecha',
		'despedida',
		'estado',
		'users_id_creador',
		'users_id_revisor',
		'fecha_revision',
		'clinica_servicio',
		'id_oficio'
	];
}
