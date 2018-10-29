<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class FingerPrint extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fingerprint:fingerprint';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Load the finger print capturing application.';

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
        \Log::info('attempting to start finger print capture sdk...');
        $this->info('attempting to execute bat file to load the finger print capturing application.');
        // shell_exec("C:\\wamp64\\www\\rms\\fcda\\app\\Console\\Commands\\fingerprint.bat");
        // exec('echo Root1234 | runas /user:administrator notepad.exe',$output);
        exec('echo "Root1234" | runas /user:michael "notepad.exe"');
        $this->info('Done executing bat script.');
        \Log::info('Done loading finger print sdk. You can start capturing.');
    }
}
