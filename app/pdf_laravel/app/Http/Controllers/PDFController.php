<?php
namespace App\Http\Controllers;

use Dompdf\Dompdf;

use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $domp=new Dompdf();
        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y'),
        ];
        $domp = loadView('myPDF',$data);
     
        return $domp->download('itsolutionstuff.pdf');
             

    }
}
