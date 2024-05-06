<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class Droptable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'drop-seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Drop Tables Migrate and Seeds';
    //    private static $Notdrop='';

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
     * @return int
     */
    public function handle()
    {
        if (app()->environment() === 'production') {
            exit("it is dangerous !!! Don t Do That again \n");
        }
        DB::select('SET foreign_key_checks = 0');
        $tables = DB::select('SHOW TABLES');
        if (! empty($tables)) {
            foreach (DB::select('SHOW TABLES') as $table) {
                \Schema::drop(get_object_vars($table)[key(get_object_vars($table))]);
                echo get_object_vars($table)[key(get_object_vars($table))];
                $this->line('<fg=green;bg=black> DROP ------------------------------ DONE</>');
            }

        } else {
            $this->error('NOTHING TO DROP...');
        }
        $this->info('Running migrations...');
        $this->call('migrate');
        $this->line('<fg=green;bg=black> Migrate------------------------ DONE</>');
        $this->info('Seeding the database...');
        $this->call('db:seed');
        $this->line('<fg=green;bg=black> Seed------------------------ DONE</>');
        DB::select('SET foreign_key_checks = 1');

    }
}
