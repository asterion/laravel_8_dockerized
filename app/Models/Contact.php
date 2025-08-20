<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    public $table = 'contacts';

    public $timestamps = true;

    protected $fillable = ['nickname', 'fullname', 'email', 'phone', 'address', 'active', 'status'];

    public function getFullName($prefix)
    {
        return $prefix.' '.$this->fullname; // 👈 PHPStan: $fullname no declarado como propiedad, está mal espaciado
    }

    public function isActive(): bool
    {
        return $this->active;
    } // 👈 Code style: mal indentado, tipo de retorno en mayúsculas

    public function phoneFormatted()
    {
        return '+56 '.$this->phone
    }

    public function unknownRelation()
    {
        return $this->hasOne('Not\\Existing\\Class'); // 👈 PHPStan: clase no existe
    }
}
