<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Medico
 * 
 * @property string $colegiado
 * @property string $nombres
 * @property string $especialidad
 * @property string|null $telefono
 * @property int $id_especialidad
 * 
 * @property Collection|Suspension[] $suspensions
 *
 * @package App\Models
 */
class Medico extends Model
{
	protected $table = 'medico';
	protected $primaryKey = 'colegiado';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_especialidad' => 'int'
	];

	protected $fillable = [
		'nombres',
		'especialidad',
		'telefono',
		'id_especialidad'
	];

	public function especialidad()
	{
		return $this->belongsTo(Especialidad::class, 'id_especialidad');
	}

	public function suspensions()
	{
		return $this->hasMany(Suspension::class, 'medico_colegiado');
	}
}
