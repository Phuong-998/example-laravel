<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Repositories\StudentRepo;
use App\Repositories\MonhocRepo;
use App\Repositories\lopRepo;

class StudentController extends Controller
{
    protected $studentRepo;
    protected $lophocRepo;
    protected $monhocRepo;

    public function __construct(StudentRepo $studentRepo, MonhocRepo $monhocRepo, lopRepo $lophocRepo)
    {
        $this->studentRepo = $studentRepo;
        $this->monhocRepo = $monhocRepo;
        $this->lophocRepo = $lophocRepo;
    }
    public function index()
    {
        $result = $this->studentRepo->all();
        return view('student.index',['result'=>$result]);
    }

    public function add()
    {
        $monhoc = $this->monhocRepo->all();
        $lop = $this->lophocRepo->all();
        return view('student.add',['monhoc'=>$monhoc,'lop'=>$lop]);
    }

    public function hadnelAdd(Request $request)
    {
        $data = [
            'name'=>$request->input('name'),
            'age'=>$request->input('age'),
            'address'=>$request->input('address'),
            'phone'=>$request->input('phone'),
            'id_monhoc'=>$request->input('monhoc'),
            'id_lop'=>$request->input('lop')
        ];
        $this->studentRepo->add($data);

        return redirect()->route('admin.sinhvien');
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $result = $this->studentRepo->getId($id);
        $listmonhoc = $this->monhocRepo->all();
        $listlop = $this->lophocRepo->all();
        return view('student.update',['result'=>$result['sinhvien'],'monhoc'=>$result['monhoc'],'lop'=>$result['lop'],'listmonhoc'=>$listmonhoc,'listlop'=>$listlop]);
    }

    public function hadnelUpdate(Request $request)
    {
        $data = [
            'id' => $request->input('id'),
            'name' => $request->input('name'),
            'age' => $request->input('age'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'id_monhoc' => $request->input('monhoc'),
            'id_lop' => $request->input('lop')
        ];
        

        $this->studentRepo->update($data);

        return redirect()->route('admin.sinhvien');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $this->studentRepo->delete($id);
        return redirect()->route('admin.sinhvien');
    }
    //
}
