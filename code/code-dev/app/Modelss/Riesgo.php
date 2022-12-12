<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Riesgo
 * 
 * @property int $id
 * @property string $nombre
 * @property string|null $descripcion
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
}
