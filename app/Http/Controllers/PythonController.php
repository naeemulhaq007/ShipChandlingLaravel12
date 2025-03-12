<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TesseractOCR\TesseractOCR;
use Symfony\Component\Process\Process;
use thiagoalessio\TesseractOCR\TesseractOCR as tesser;

class PythonController extends Controller
{
    public function extractText()
    {
        $imagePath = public_path('assets/images/card.jpg'); // Replace with the actual image path

        $tesseract = new tesser($imagePath);
        $text = $tesseract->run();

        return response()->json(['text' => $text]);
    }
}
