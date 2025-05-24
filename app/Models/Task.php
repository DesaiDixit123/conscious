<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
class Task extends Model
{
  use HasFactory;

    protected $fillable = ['user_id', 'service_id', 'task','task_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

 public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

     protected static function boot()
    {
        parent::boot();

        static::creating(function ($task) {
            $today = Carbon::now()->format('Ymd'); // Example: 20250523

            // Get latest task_id for today
            $latestTask = DB::table('tasks')
                ->where('task_id', 'like', $today . '%')
                ->orderBy('task_id', 'desc')
                ->first();

            if ($latestTask && isset($latestTask->task_id)) {
                $lastNumber = (int)substr($latestTask->task_id, -3);
                $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
            } else {
                $newNumber = '001';
            }

            $task->task_id = $today . $newNumber;
        });
    }

}
