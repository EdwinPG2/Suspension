<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Dependencium
 * 
 * @property int $id_dependencia
 * @property string|null $nombre
 * 
 * @property Collection|Afiliado[] $afiliados
 *
 * @package App\Models
 */
class Dependencium extends Model
{
	protected $table = 'dependencia';
	protected $primaryKey = 'id_dependencia';
	public $timestamps = false;

	protected $fillable = [
		'nombre'
	];

	public function afiliados()
	{
		return $this->hasMany(Afiliado::class, 'id_dependencia');
	}
}
