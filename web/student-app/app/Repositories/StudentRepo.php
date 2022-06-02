<?php 
namespace App\Repositories;

use Illuminate\Support\Facades\DB;

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
        return DB::table('sinhvien')->insert([
            'name' => $data['name'],
            'age' => $data['age'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'id_monhoc' =>$data['monhoc'],
            'id_lop' =>$data['lop']
        ]);
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

    public function update($id,$name,$age,$address,$phone,$monhoc,$lop)
    {
       return DB::table('sinhvien')->where('id', $id)->update([
            'name' => $name,
            'age' => $age,
            'address' => $address,
            'phone' => $phone,
            'id_monhoc' =>$monhoc,
            'id_lop' =>$lop
        ]);
    }

    public function delete($id)
    {
        return DB::table('sinhvien')->where('id',$id)->delete();
    }
}
