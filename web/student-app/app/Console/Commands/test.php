<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:Nhap-ten {name} {--function=default}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'test command';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');
        $function = $this->option('function');
        if($function == 'h'){
            echo 'Xin chào '.$name;
        }
        elseif($function == 'a'){
            echo 'Cam on'.$name;
        }else{
            $age = $this->ask('Bao gio ban co nguoi iu');
            echo 'Xin chào'.$name.'vao ngày'.$age;
        }
    }
}
