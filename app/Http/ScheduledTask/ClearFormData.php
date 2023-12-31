<?php

namespace App\Http\ScheduledTask;

use App\Models\Form;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ClearFormData {
    public function execute() {
        Form::where('created_at', '<', Carbon::now()->subDay())->delete();
    }

}