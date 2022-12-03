<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Suspension
 * 
 * @property int $id_suspension
 * @property Carbon $fecha_inicio_suspension
 * @property Carbon $fecha_fin_suspension
 * @property Carbon $fecha_alta
 * @property Carbon $fecha_registro
 * @property Carbon|null $fecha_envio_prestacion
 * @property Carbon|null $fecha_recibido_prestacione
 * @property Carbon|null $fecha_revision
 * @property string|null $observacion
 * @property string $estado
 * @property int $no_afiliado
 * @property int $id_clinica_servicio
 * @property string $medico_colegiado
 * @property int $users_id_registrador
 * @property int|null $users_id_revisor
 * @property Carbon $fecha_inicio_caso
 * @property Carbon $fecha_accidente
 * @property int $id_riesgo
 * 
 * @property Afiliado $afiliado
 * @property ClinicaServicio $clinica_servicio
 * @property Medico $medico
 * @property Riesgo $riesgo
 * @property User|null $user
 * @property Collection|FormularioSuspencion[] $formulario_suspencions
 * @property Collection|OficioSuspencion[] $oficio_suspencions
 * @property Collection|RevSusp[] $rev_susps
 *
 * @package App\Models
 */
class Suspension extends Model
{
	protected $table = 'suspension';
	protected $primaryKey = 'id_suspension';
	public $timestamps = false;

	protected $casts = [
		'no_afiliado' => 'int',
		'id_clinica_servicio' => 'int',
		'users_id_registrador' => 'int',
		'users_id_revisor' => 'int',
		'id_riesgo' => 'int'
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
		'pago'
	];

	public function afiliado()
	{
		return $this->belongsTo(Afiliado::class, 'no_afiliado');
	}

	public function clinica_servicio()
	{
		return $this->belongsTo(ClinicaServicio::class, 'id_clinica_servicio');
	}

	public function medico()
	{
		return $this->belongsTo(Medico::class, 'medico_colegiado');
	}

	public function riesgo()
	{
		return $this->belongsTo(Riesgo::class, 'id_riesgo');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'users_id_revisor');
	}

	public function formulario_suspencions()
	{
		return $this->hasMany(FormularioSuspencion::class, 'id_suspension');
	}

	public function oficio_suspencions()
	{
		return $this->hasMany(OficioSuspencion::class, 'id_suspension');
	}

	public function rev_susps()
	{
		return $this->hasMany(RevSusp::class, 'id_suspension');
	}
}
