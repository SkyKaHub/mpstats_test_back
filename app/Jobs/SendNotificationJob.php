<?php

namespace App\Jobs;

use App\Helpers\SmsNotify;
use App\Helpers\TelegramNotify;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Notification;
use Illuminate\Support\Facades\Date;

class SendNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $notification;
    protected $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Notification $notification, $data)
    {
        $this->notification = $notification;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $messenger = ($this->data['integrator_type'] == 'sms') ? new SmsNotify() : new TelegramNotify();
        $result = $messenger->send($this->data);
        if ($result) {
            $this->notification->update(['status' => 'sent', 'sent_time' => Date::now()]);
        } else {
            $this->notification->update(['status' => 'error', 'sent_time' => Date::now()]);
        }
    }
}
