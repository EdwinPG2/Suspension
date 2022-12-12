<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cargo
 * 
 * @property int $id_cargo
 * @property string|null $nombre
 * 
 * @property Collection|Afiliado[] $afiliados
 *
 * @package App\Models
 */
class Cargo extends Model
{
	protected $table = 'cargo';
	protected $primaryKey = 'id_cargo';
	public $timestamps = false;

	protected $fillable = [
		'nombre'
	];

	public function afiliados()
	{
		return $this->hasMany(Afiliado::class, 'id_cargo');
	}
}
