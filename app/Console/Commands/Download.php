<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class Download extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'download {id} {m3u8}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $id = ($this->argument('id'));
        $m3u8 = ($this->argument('m3u8'));
        $readStream = Storage::disk('google')->readStream($id);
        file_put_contents('../public/'.$m3u8.'/file.mp4', stream_get_contents($readStream), FILE_APPEND);
    }
}
