<?php
namespace app\Repositories;
use Illuminate\Support\Facades\DB;
use App\Models\monhoc;

class MonhocRepo 
{
    public function all()
    {
        return DB::table('monhoc')->get();
    }

    public function add($name)
    {
        return monhoc::create([
            'nameSub' => $name
        ]);
        // return DB::table('monhoc')->insert([
        //     'nameSub' => $name
        // ]);
    }

    public function getId($id)
    {
        return DB::table('monhoc')->where('id',$id)->get()->first();
    }

    public function update($id,$name)
    {
        return DB::table('monhoc')->where('id', $id)->update(['nameSub' => $name]);
    }

    public function delete($id)
    {
        return DB::table('monhoc')->where('id',$id)->delete();
    }
}