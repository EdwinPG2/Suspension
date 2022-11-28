<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Oficio
 * 
 * @property int $id_oficio
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
 * 
 * @property User|null $user
 * @property Collection|OficioSuspencion[] $oficio_suspencions
 * @property Collection|Requerimiento[] $requerimientos
 * @property Collection|RevisionOficio[] $revision_oficios
 *
 * @package App\Models
 */
class Oficio extends Model
{
	protected $table = 'oficio';
	protected $primaryKey = 'id_oficio';
	public $timestamps = false;

	protected $casts = [
		'users_id_creador' => 'int',
		'users_id_revisor' => 'int',
		'clinica_servicio' => 'int'
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
		'clinica_servicio'
	];

	public function clinica_servicio()
	{
		return $this->belongsTo(ClinicaServicio::class, 'clinica_servicio');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'users_id_revisor');
	}

	public function oficio_suspencions()
	{
		return $this->hasMany(OficioSuspencion::class, 'id_oficio');
	}

	public function requerimientos()
	{
		return $this->hasMany(Requerimiento::class, 'id_oficio');
	}

	public function revision_oficios()
	{
		return $this->hasMany(RevisionOficio::class, 'id_oficio');
	}
}
