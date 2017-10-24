<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Event;

class UpdateEventTimeState extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:timestate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the time state of all non-past events';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $nonPastEvents = DB::table('events')->where('time_state','!=', 0)->get();
        foreach ($nonPastEvents as $event) {
            updateTimeState($event);
        }
    }
}
