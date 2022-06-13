<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Repositories\StudentRepo;
use App\Repositories\MonhocRepo;
use App\Repositories\lopRepo;
use App\Http\Controllers\Api\StudentApiController;
use Intervention\Image\ImageManagerStatic as Image;

class StudentController extends Controller
{
   
    protected $lophocRepo;
    protected $monhocRepo;
    protected $sizeImgRepo;
    protected $student;

    public function __construct(StudentApiController $student, MonhocRepo $monhocRepo, lopRepo $lophocRepo)
    {
        $this->student = $student;
        $this->monhocRepo = $monhocRepo;
        $this->lophocRepo = $lophocRepo;
        
    }
    public function index()
    {
        $result = $this->student->index();
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
        $image = $request->file('imgae')->getClientOriginalName();
        $id = $this->student->store($request);
        $image_resize = Image::make($request->file('imgae')->getRealPath());
        $resize = [
            '100x100' => $image_resize->resize(100, 100)->save(public_path('resize/100x100/'.$image))->basename,
            '350x450' => $image_resize->resize(300, 450)->save(public_path('resize/350x450/'.$image))->basename,
            '1080x768' => $image_resize->resize(1080, 768)->save(public_path('resize/1080x768/'.$image))->basename
        ];
        foreach($resize as $key => $value){
            $this->studentRepo->addImg($id,$value,$key);
        }
        $request->file('imgae')->move('storage/images',$image);
        return redirect()->route('admin.sinhvien');
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $result = $this->student->show($id);
        $listmonhoc = $this->monhocRepo->all();
        $listlop = $this->lophocRepo->all();
        return view('student.update',['result'=>$result['sinhvien'],'monhoc'=>$result['monhoc'],'lop'=>$result['lop'],'listmonhoc'=>$listmonhoc,'listlop'=>$listlop]);
    }

    public function hadnelUpdate(Request $request)
    {
        $id = $request->input('id');
        $this->student->update($request,$id);
        return redirect()->route('admin.sinhvien');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $this->student->destroy($id);
        return redirect()->route('admin.sinhvien');
    }

    public function detail(Request $request)
    {
        $id = $request->id;
        $data = $this->student->show($id);
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
