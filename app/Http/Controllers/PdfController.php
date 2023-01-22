<?php

namespace App\Http\Controllers;

use \PDF;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function generatePDF()
    {
        $data = ['title' => 'Welcome to HDTuto.com'];
        $data1 = ['title1' => 'Welcome1 to HDTuto.com'];
        $pdf = PDF::loadView('myPDF', $data, $data1);
        return $pdf->download('hdtuto.pdf');
    }
}
