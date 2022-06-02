<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
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
    public function handle()
    {
        $path = base_path().'/public/data.csv';
        if(file_exists($path)){
            $file = new \SplFileObject($path);
            $file->setFlags(\SplFileObject::READ_CSV);
            foreach ($file as $fields) {
                list($name,$age,$address,$sdt,$id_monhoc,$id_lop) = $fields;
                sinhvien::create(['name'=>$name, 'age'=>$age, 'address'=>$address, 'phone'=>$sdt, 'id_monhoc'=>$id_monhoc, 'id_lop'=>$id_lop]);
            }
            print("Thanh Cong");
        }
    }
}
