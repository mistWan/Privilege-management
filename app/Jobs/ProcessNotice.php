<?php

namespace App\Jobs;

use App\Models\Notice;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

/**
 * Class ProcessNotice
 * @package App\Jobs
 */
class ProcessNotice implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var Notice
     */
    protected $notice;

    /**
     * ProcessNotice constructor.
     * @param Notice $notice
     */
    public function __construct(Notice $notice)
    {
        $this->notice = $notice;
    }

    /**
     *
     */
    public function handle()
    {
        $users = \App\Models\User::all();
        foreach ($users as $user) {
            $user->addNotice($this->notice);
        }
    }
}
