<?php

namespace App\Models\ParkingRequest;

use App\Models\AvailableSpace\AvailableSpace;
use App\Models\PayMethod\Paymethod;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParkingRequest extends Model
{
    use HasFactory;
    protected $fillable = ['requestor_id','available_space_id','requestor_latitude','requestor_longitude','start_date','start_time','end_date','end_time','payment_method_id'];

    public function requestor(){
        return $this->belongsTo(User::class);
    }
    public function availableSpace()
    {
        return $this->belongsTo(AvailableSpace::class);
    }
    public function paymentMethod()
    {
        return $this->belongsTo(Paymethod::class);
    }
}
