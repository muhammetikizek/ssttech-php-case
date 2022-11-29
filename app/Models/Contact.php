<?php

namespace App\Models;

use App\Models\Location;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasUuids, HasFactory;

    protected $connection = 'pgsql';

    protected $table = 'contacts';

    protected $primaryKey = 'uuid';

    protected $keyType = 'string';

    protected $fillable = [
        'name',
        'last_name',
        'company',
        'photo'
    ];

    public function information()
    {
        return $this->hasOne(ContactInformation::class, 'contact_uuid', 'uuid');
    }

    protected  static  function  boot()
    {
        parent::boot();

        static::creating(function  ($model)  {
            $model->uuid = (string) Str::uuid();
        });
    }
}
