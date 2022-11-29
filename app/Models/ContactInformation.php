<?php

namespace App\Models;

use App\Models\Contact;
use App\Models\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactInformation extends Model
{
    
    protected $connection = 'pgsql';

    protected $table = 'contact_informations';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'contact_uuid',
        'phone_number',
        'email_address',
        'location',
        'content'
    ];

    protected $casts = [
        'contact_uuid' => 'string'
    ];

    protected $hidden = [
        'contact_uuid',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class, 'id', 'location');
    }

    public function contact()
    {
        return $this->hasMany(Contact::class, 'uuid', 'contact_uuid');
    }
}
