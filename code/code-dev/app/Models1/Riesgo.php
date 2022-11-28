<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Riesgo
 * 
 * @property int $id
 * @property string $nombre
 * @property string|null $descripcion
 * 
 * @property Collection|Suspension[] $suspensions
 *
 * @package App\Models
 */
class Riesgo extends Model
{
	protected $table = 'riesgo';
	public $timestamps = false;

	protected $fillable = [
		'nombre',
		'descripcion'
	];

	public function suspensions()
	{
		return $this->hasMany(Suspension::class, 'id_riesgo');
	}
}
