<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Utils\MovieSync;

class SyncMovies extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:movies';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync movies of the API';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        MovieSync::sync();
    }

}
