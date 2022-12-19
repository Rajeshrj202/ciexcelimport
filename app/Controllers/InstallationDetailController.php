<?php

namespace App\Controllers;
use App\Models\InstallationDetailModel;
use CodeIgniter\HTTP\RequestInterface;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
class InstallationDetailController extends BaseController
{
    

    public $InstallationDetailModel;

    public function __construct()
    {
        $this->InstallationDetailModel = new InstallationDetailModel();

        
    }


    public function index()
    {
        $download=$this->request->getVar('download');
        if($download):
            $this->zipDownload();
        endif;
        return view('dashboard');
    }
    

    public function view($id)
    {
        $data['installationdetails']=$this->InstallationDetailModel->where('unique_id',$id)->first();
        return view('detail',$data);
    }


    public function store()
    {

        $validationRule = [
            'file' => [
                'rules' => 'uploaded[file]'
                    . '|ext_in[file,xlsx]'
                    . '|max_size[file,2048]',
            ]
        ];

        if (! $this->validate($validationRule)) {

            $data = ['errors' => $this->validator->getErrors()];

            return view('dashboard', $data);
        }


       

        if($file = $this->request->getFile('file')):

            if ($file->isValid() && ! $file->hasMoved()):

                $newName = $file->getRandomName();
                $path = '../dataupload/';
                $file_name = $this->request->getFile('file');
                $file_name = $this->uploadFile($path, $file_name);
                $extension = pathinfo($file_name, PATHINFO_EXTENSION);
                
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

                $spreadsheet = $reader->load($file_name);
                $sheet_data = $spreadsheet->getActiveSheet()->toArray();
                $list = [];

                foreach($sheet_data as $key => $val):

                    $random=$this->randomNumber(12);
                    if($key != 0):

                        if(!empty($val[0]) && !empty($val[1]) && !empty($val[2]) && !empty($val[3]) && !empty($val[4]) && !empty($val[5])):

                            $installationdetails=array(

                                'date'=>date('Y-m-d',strtotime($val[0])),
                                'seal'=>$val[1],
                                'installed_at'=>$val[2],
                                'type'=>$val[3],
                                'use'=>$val[4],
                                'client'=>$val[5],
                                'unique_id'=>$random

                            );

                            $this->InstallationDetailModel->insert($installationdetails);

                        endif;

                     endif;

                endforeach;
                

            endif;

        endif;

        session()->setFlashdata('success','Excel Imported Successfully');
        return redirect()->route('dashboard');
    }


    public function uploadFile($path, $image) {

        if (!is_dir($path)) 
            mkdir($path, 0777, TRUE);

        if ($image->isValid() && ! $image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move('./'.$path, $newName);
            return $path.$image->getName();
        }

        return false;
    }


    public function randomNumber($length) {

        $result = '';

        for($i = 0; $i < $length; $i++) {
            $result .= mt_rand(0, 9);
        }

        return $result;
    }

    public function getInstallationList()
    {

         $draw = $this->request->getVar('draw');
         $start = $this->request->getVar("start");
         $rowperpage = $this->request->getVar("length"); // Rows display per page

         $columnIndex_arr = $this->request->getVar('order');
         $columnName_arr = $this->request->getVar('columns');
         $order_arr = $this->request->getVar('order');
         $search_arr = $this->request->getVar('search');

         $columnIndex = $columnIndex_arr[0]['column']; // Column index
         $columnName = $columnName_arr[$columnIndex]['data']; // Column name
         $columnSortOrder = $order_arr[0]['dir']; // asc or desc
         $searchValue = $search_arr['value']; // Search value

        $totalRecords = $this->InstallationDetailModel->countAll();

        $records = InstallationDetailModel::search($searchValue,$columnName,$columnSortOrder,$start,$rowperpage);
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecords,
            "aaData" => $records
        );

       return  json_encode($response);
         
         
    }


    public function zipDownload()
    {
        $zip = new \PhpZip\ZipFile();
        
        $path = '../dataupload';

        if (!is_dir($path)) 
            mkdir($path, 0777, TRUE);

        $filename = date('Ymdhis-')."dataupload.zip";
        try
        {
            $zip->addDir($path)
            ->saveAsFile($filename)->close();

            header("Content-Type: application/zip");
            header("Content-Disposition: attachment; filename=$filename");
            readfile($filename);
            unlink($filename);
        }
        catch(\PhpZip\Exception\ZipException $e){
            
        }
        
                
        
        
    }

    
}