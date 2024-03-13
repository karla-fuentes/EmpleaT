<?php

namespace Modules\Configuraciones\Entities;

use Illuminate\Database\Eloquent\Model;

class Dropdown extends Model
{
    protected $fillable = [
        'value',
        'key',
        'description',
        'parent_id',
    ];

    public function hijos()
    {
        return $this->hasMany(\Modules\Configuraciones\Entities\Dropdown::class,'parent_id','id');
    }

    public function padre()
    {
        return $this->belongsTo(\Modules\Configuraciones\Entities\Dropdown::class,'parent_id','id');
    }

    public function scopeUbicacion($query)
    {
        return $query
            ->where('value', 'Ubicaciones')
            ->where('key', 1)
            ->whereNull('parent_id');
    }

    protected static function boot()
    {
        parent::boot();
        static::created(function ($model) {
            if($model->key == null){
                $model->key = $model->id;
                $model->save();
            }
        });
    }
}
