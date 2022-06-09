<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Repositories\StudentRepo;
use App\Repositories\MonhocRepo;
use App\Repositories\lopRepo;
use Intervention\Image\ImageManagerStatic as Image;

class StudentController extends Controller
{
    protected $studentRepo;
    protected $lophocRepo;
    protected $monhocRepo;
    protected $sizeImgRepo;

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
        $image = $request->file('image');
        $data = [
            'name' => $request->input('name'),
            'age' => $request->input('age'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'id_monhoc' => $request->input('monhoc'),
            'id_lop' => $request->input('lop'),
            'imgae' => $image->getClientOriginalName()
        ];
        $id = $this->studentRepo->add($data);
        $image_resize = Image::make($image->getRealPath());
        $resize = [
            '100x100' => $image_resize->resize(100, 100)->save(public_path('resize/100x100/'.$data['imgae']))->basename,
            '350x450' => $image_resize->resize(300, 450)->save(public_path('resize/350x450/'.$data['imgae']))->basename,
            '1080x768' => $image_resize->resize(1080, 768)->save(public_path('resize/1080x768/'.$data['imgae']))->basename
        ];
        foreach($resize as $key => $value){
            $this->studentRepo->addImg($id,$value,$key);
        }
        $image->move('storage/images',$data['imgae']);
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

    public function detail(Request $request)
    {
        $id = $request->id;
        $data = $this->studentRepo->getId($id);
        return view('student.detail', ['sinhvien' => $data['sinhvien'], 
                                        'img' => $data['imgSize'], 
                                        'lop' => $data['lop'],
                                         'monhoc' => $data['monhoc']
                                    ]);
    }

    public function getImgSize(Request $request)
    {
        $id = $request->id;
        $img = $this->studentRepo->getImgSize($id);
        return $img;
    }
    //
}
