<?php 
namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\models\sinhvien;

class StudentRepo
{
    public function all()
    {
        return DB::table('sinhvien')
        ->join('lop', 'sinhvien.id_lop', '=', 'lop.id')
        ->join('monhoc', 'sinhvien.id_monhoc', '=', 'monhoc.id')
        ->select('sinhvien.*', 'lop.nameClass', 'monhoc.nameSub')
        ->get();
    }

    public function add($data = [])
    {
    //     return sinhvien::create([
    //         'name' => $data['name'],
    //         'age' => $data['age'],
    //         'address' => $data['address'],
    //         'phone' => $data['phone'],
    //         'id_monhoc' => $data['monhoc'],
    //         'id_lop' => $data['lop']
    //     ]);
        return DB::table('sinhvien')->insert($data);
    }

    public function getId($id)
    {
        $sinhvien = DB::table('sinhvien')->where('id',$id)->get()->first();
        $monhoc = DB::table('monhoc')->where('id',$sinhvien->id_monhoc)->get()->first();
        $lop = DB::table('lop')->where('id',$sinhvien->id_lop)->get()->first();
        return $info = [
            'sinhvien'=>$sinhvien,
             'monhoc'=>$monhoc,
             'lop'=>$lop
        ];
        
    }

    public function update($data = [])
    {
       return DB::table('sinhvien')->where('id',$data['id'])->update($data);
    }

    public function delete($id)
    {
        return DB::table('sinhvien')->where('id',$id)->delete();
    }
}
