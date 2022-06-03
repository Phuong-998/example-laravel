<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\lop;
use App\Repositories\lopRepo;
use Illuminate\Support\Facades\Redis;

class LopController extends Controller
{
    protected $lopRepo ;
    public function __construct(lopRepo $LopRepository)
    {
        $this->lopRepo = $LopRepository;
    }
    public function index()
    {
        $result = $this->lopRepo->all();
        return view('lop.index',['result'=>$result]);
    }

    public function add()
    {
        return view('lop.add');
    }

    public function hadnelAdd(Request $request)
    {
        $name = $request->input('name');
        $this->lopRepo->add($name);
        return redirect()->route('admin.lop');
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $info = $this->lopRepo->getId($id);
        return view('lop.update',['result'=>$info]);
    }

    public function hadnelUpdate(Request $request)
    {
        $id = $request->id;
        $name = $request->input('name');
        $this->lopRepo->update($id,$name);
        return redirect()->route('admin.lop');
        
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        $this->lopRepo->delete($id);
        return redirect()->route('admin.lop');
    }
    //
}
