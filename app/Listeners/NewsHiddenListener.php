<?php

namespace App\Listeners;

use App\Events\NewsHidden;
use Illuminate\Support\Facades\Log;

class NewsHiddenListener
{
    /**
     * @param  \App\Events\NewsHidden  $event
     * @return void
     */
    public function handle(NewsHidden $event)
    {
        Log::info('News ' . $event->news->id . ' hidden');
    }
}
