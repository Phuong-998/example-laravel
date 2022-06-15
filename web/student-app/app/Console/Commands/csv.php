<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\StudentRepo;
use Illuminate\Support\Facades\DB;
use App\Models\sinhvien;

class csv extends Command
{
    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insert:csv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'inset data csv file';

    /**
     * Execute the console command.
     *
     * @return int
     */
    protected $studentRepo;
    public function handle()
    {
        $this->studentRepo = new StudentRepo();
        $path = base_path().'/public/test.csv';
        if(file_exists($path)){
            $data = '';
            $file = new \SplFileObject($path);
            $file->setFlags(\SplFileObject::READ_CSV);
            foreach($file as $value){
                $data = [
                    'name' => $value[0],
                    'age' => $value[1],
                    'address' => $value[2],
                    'phone' => $value[3],
                    'id_monhoc' => $value[4],
                    'id_lop' => $value[5]
                ];
                $insert[] = $data;
            }
            $this->studentRepo->add($insert);      
    }
}
}