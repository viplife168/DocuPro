<?php

namespace App\Jobs;

use App\Http\Controllers\SppController;
use App\Http\Controllers\SysSettingController;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class getSPPiCount implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $sppsCount = SysSettingController::showSetting('SppiCount');
        $sppiCount = SppController::getCountSppiFiles();
        SysSettingController::updateSetting('SppiCount',$sppsCount,$sppiCount);

    }
}
