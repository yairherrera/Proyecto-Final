<?php

namespace App\Models;


use Jenssegers\Mongodb\Eloquent\Model;

class Product extends Model
{
    protected $fillable=[
        'Nombre', 'Precio','Categoría','Descripción','Imagen'
    ]

}
