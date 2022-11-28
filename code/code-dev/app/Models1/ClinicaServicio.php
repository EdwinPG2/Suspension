<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ClinicaServicio
 * 
 * @property int $id_clinica_servicio
 * @property string $nombre
 * @property string $descripcion
 * @property int $id_especialidad
 * @property int $id_area
 * 
 * @property Area $area
 * @property Especialidad $especialidad
 * @property Collection|Oficio[] $oficios
 * @property Collection|Suspension[] $suspensions
 *
 * @package App\Models
 */
class ClinicaServicio extends Model
{
	protected $table = 'clinica_servicio';
	protected $primaryKey = 'id_clinica_servicio';
	public $timestamps = false;

	protected $casts = [
		'id_especialidad' => 'int',
		'id_area' => 'int'
	];

	protected $fillable = [
		'nombre',
		'descripcion',
		'id_especialidad',
		'id_area'
	];

	public function area()
	{
		return $this->belongsTo(Area::class, 'id_area');
	}

	public function especialidad()
	{
		return $this->belongsTo(Especialidad::class, 'id_especialidad');
	}

	public function oficios()
	{
		return $this->hasMany(Oficio::class, 'clinica_servicio');
	}

	public function suspensions()
	{
		return $this->hasMany(Suspension::class, 'id_clinica_servicio');
	}
}
