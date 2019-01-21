<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\PdfModel;

class ExamController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [];

        return view('user.pdf',$data);
    }

    public function uploadPDF(Request $request)
    {
        $file = $request->file('pdf');

        $ext = $file->extension();
        if($ext != 'pdf'){
            die("上传文件格式不正确，请上传PDF格式文件");
        }

        $file_name = $file->getClientOriginalName();
        $rs = $file->storeAs(date('Ymd'),$file_name);

        var_dump($rs);die;
        if($rs){
           echo '上传成功';
        }

    }

}
