<?php

namespace App\Jobs;

use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendWelcomeEmail implements ShouldQueue
{
    use Queueable, Dispatchable, InteractsWithQueue, SerializesModels;

    public $recipientEmail;
    public $cityName;
    /**
     * Create a new job instance.
     */
    public function __construct($recipientEmail, $cityName)
    {
        $this->recipientEmail = $recipientEmail;
        $this->cityName = $cityName;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->recipientEmail)->send(new WelcomeEmail($this->cityName));

        Log::info("✅ Email sent to {$this->recipientEmail} for {$this->cityName}");
    }
}
