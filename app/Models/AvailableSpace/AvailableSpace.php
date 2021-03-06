<?php

namespace App\Models\AvailableSpace;

use App\Models\Space\SpaceType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailableSpace extends Model
{
    use HasFactory;
    protected $table = 'available_spaces';

    protected $fillable=['space_type_id','space_name','user_id','latitude','longitude','status','comments'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function spaceType()
    {
        return $this->belongsTo(SpaceType::class);
    }

}
