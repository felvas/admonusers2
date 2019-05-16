<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcessModel extends Model
{
    protected $fillable = [
        'process_name','process_id', 'description', 'departamento','municipio','fecha_inicio','feche_fin','url_docs','status','confirmed',
    ];
}
