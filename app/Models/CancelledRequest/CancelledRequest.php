<?php

namespace App\Models\CancelledRequest;

use App\Models\User;
use App\Models\ParkingRequest\ParkingRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CancelledRequest extends Model
{
    use HasFactory;
    protected $fillable = ['parking_request_id','cancelled_by','cancel_comment'];

    public function whoCancelledRequest()
    {
        return $this->belongsTo(User::class,'cancelled_by','id',);
    }
    public function parkingRequest()
    {
        return $this->belongsTo(ParkingRequest::class,'parking_request_id','id');
    }
}
