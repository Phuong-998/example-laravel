<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Repositories\MonhocRepo;

class MonhocController extends Controller
{
    protected $monhocRepo;
    public function __construct(MonhocRepo $monhocRepo)
    {
        $this->monhocRepo = $monhocRepo;
    }
    public function index()
    {
        $result = $this->monhocRepo->all();
        dd($result);
        return view('monhoc.index',['result'=>$result]);
    }

    public function add()
    {
        return view('monhoc.add');
    }

    public function hadnelAdd(Request $request)
    {
        $name = $request->input('name');
        $this->monhocRepo->add($name);
        return redirect()->route('admin.monhoc');
    } 
    
    public function update(Request $request)
    {
        $id = $request->id;
        $info = $this->monhocRepo->getId($id);
        return view('monhoc.update',['result'=>$info]);
    }

    public function hadnelUpdate(Request $request)
    {
        $id = $request->id;
        $name = $request->input('name');
        $this->monhocRepo->update($id,$name);
        return redirect()->route('admin.monhoc');
        
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $this->monhocRepo->delete($id);
        return redirect()->route('admin.monhoc');
    }
    //
}
