<?php

namespace App\Listeners;

use App\Events\LocaleRendered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\LocalizedStrings;

class TrackRenderedLocale
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  LocaleRendered  $event
     * @return void
     */
    public function handle(LocaleRendered $event)
    {
        LocalizedStrings::track($event->key);
       // exit('here');
        //LocalizedStrings::updateOrCreate(['string'=>'dada'],['count'=>\DB::raw('count + 1')]);
    }
}
