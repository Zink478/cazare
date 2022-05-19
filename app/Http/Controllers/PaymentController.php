<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StorePostRequestPayment;
use App\Models\Payment;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $student = Student::whereNotNull('user_id')->join('applications', 'students.IDNP' , '=', 'applications.IDNP')
            ->where('user_id', auth()->user()->id)->first();
        return view('payments', ['student' => $student]);
    }

    public function send()
    {
        $id = auth()->user()->id;

        $student = Student::where('user_id', $id)->first();

        $template = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('app\public\payments\template.docx'));
        $template->setValue('name', $student->name);
        $template->setValue('surname', $student->surname);
        $template->setValue('IDNP', $student->IDNP);

        $fileName = $student->name.'_'.$student->surname;
        $template->saveAs($fileName . '.docx');

        /* Set the PDF Engine Renderer Path */
        $domPdfPath = base_path('vendor/dompdf/dompdf');
        \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
        \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');

        //Load word file
        $Content = \PhpOffice\PhpWord\IOFactory::load(public_path($student->user_id.'.docx'));

        //Save it into PDF
        $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content,'PDF');
        $PDFWriter->save(public_path('new-result'.$student->user_id.'.pdf'));

        return response()->download($fileName . '.docx');


    }
    public function get(StorePostRequestPayment $request)
    {
        $validated = $request->validated();
        $name = $request->file('image')->getClientOriginalName();
        $extension = $request->file('image')->getClientOriginalExtension();
        $student = Student::where('user_id', auth()->user()->id)->firstOrFail();
        $path = $request->file('image')->storeAs('public/payments',$student->name.'_'.$student->surname.'.'.$extension);
        $new = Payment::create([
            'IDNP' => $student->IDNP,
            'status' => 0,
            'path' => $path
        ]);

        return redirect()->back();

    }
}
