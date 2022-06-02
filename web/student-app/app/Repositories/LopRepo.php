<?php 
namespace App\Repositories;
use App\Models\lop;

class lopRepo 
{
    public function all()
    {
        return lop::all();
    }

    public function getId($id)
    {
        return lop::where('id', $id)->get()->first();
    }

    public function add($name)
    {
        $insert = new lop();
        $insert->nameClass = $name;
        $insert->save();
    }

    public function update($id,$name)
    {
        $lop = lop::find($id);
        $lop->nameClass = $name;
        $lop->save();
    }

    public function delete($id)
    {
        return lop::where('id',$id)->delete();
    }
}