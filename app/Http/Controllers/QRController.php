<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRController extends Controller
{
    public function index($IDNP)
    {
        $student = Student::where('IDNP', $IDNP)->first();

        $pdf = PDF::loadView('qrcode', compact('student'));
        return $pdf->download('invoice.pdf');
    }
}
