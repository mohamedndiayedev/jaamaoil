<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Voucher;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use File;
use ZipArchive;
use Cookie;

class downloadController extends Controller
{
    function individualVoucher(Request $req){
    $id=$req->id;
    $voucher=Voucher::where(['id'=>$req->id])->first();
    //QrCode::size(225)->generate($voucher->voucher_code, public_path().'/qrcode/qrcode.svg');
    $qrUrl='http://127.0.0.1:8000/check-voucher?code=' . $voucher->voucher_code;
    QrCode::size(225)->generate($qrUrl, public_path().'/qrcode/qrcode.svg');
    view()->share('voucher',$voucher);
    $pdf = PDF::loadView('view-voucher', $voucher);
    return $pdf->download($voucher->id.'.pdf');

    }

    function downloadVouchers(){
        $folder_path = public_path().'/pdfs/';
        $files = glob($folder_path.'/*'); 
        
        foreach($files as $file) {
            
            if(is_file($file)) {
                unlink($file); 
            }
        }
        
        $vouchers = $this->getVouchers();
        //add code to delete previous pdfs on the server
        $pdfs = $this->createPdfsForVouchers($vouchers);
        $zipFilePath = $this->createZipFileFromPdfs($pdfs);
        return response()->download($zipFilePath);

    }

    /**
     * Returns array of vouchers
     * @return array
     */
    protected function getVouchers()
    {
        if(Cookie::has('count')){
        $count=Cookie::get('count');
        return $vouchers = Voucher::orderBy('id', 'desc')->take($count)->get();
        
    }

      //  return  $vouchers = Voucher::orderBy('id', 'desc')->take(3)->get();
    }

    protected function createPdfsForVouchers($vouchers)
    {
        $pdfPaths = [];

        foreach($vouchers as $voucher){

           // QrCode::size(225)->generate($voucher->voucher_code, public_path().'/qrcode/qrcode.svg');
            $qrUrl='/scan-me?code=' . $voucher->voucher_code;
            QrCode::size(225)->generate($qrUrl, public_path().'/qrcode/qrcode.svg');        
            view()->share('voucher',$voucher);
            $pdf = PDF::loadView('view-voucher', $voucher);
            $path = public_path().'/pdfs/'.$voucher->id.'.pdf';          
            $resultOfPdfOutputToFile = file_put_contents( $path, $pdf->output());
            $pdfPaths[] = $path;

            //logger("Pdf is written to file with result: $resultOfPdfOutputToFile");
            $pdfPaths[] = $path;       
        }

        return $pdfPaths;
    }


    protected function createZipFileFromPdfs($pdfs)
    {

        $pathdir = public_path().'/pdfs/'; 
        $zipcreated = "vouchers.zip";


        // We want to delete  any existing file before we attempt to create a new one
        if(File::exists(public_path($zipcreated))){
            File::delete(public_path($zipcreated));
        }
        
        $zip = new ZipArchive;

        $resultOfCreatingZip = $zip->open($zipcreated, ZipArchive::CREATE);

        $pdfsInsideDirectory =array_diff(scandir($pathdir), ['.','..','.Thumbs']);
                    
        foreach($pdfsInsideDirectory as $pdfFile){

            $fullPdfPath= $pathdir . $pdfFile;        
            $zip->addFile($fullPdfPath, $pdfFile);
            logger("File $pdfFile added to zip");

        }

        $zip->close();
        
        $completedZipFilePath = realpath(public_path($zipcreated));
        return $completedZipFilePath;

    }

}
