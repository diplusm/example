<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use thiagoalessio\TesseractOCR\TesseractOCR;
use Illuminate\Support\Facades\Storage;

class OCRController extends Controller
{
    public function extractText(Request $request){
        $path = $request->file('image')->store('public');
        Storage::download($path);
        Storage::delete($path);
        die;
        try {
            // Проверка, что файл передан
            if (!$request->hasFile('image')) {
                return response()->json(['status' => 'error', 'message' => 'No image file uploaded'], 400);
            }
    
            // Получение загруженного файла
            $image = $request->file('image');
            if (!$image->isValid()) {
                return response()->json(['status' => 'error', 'message' => 'Invalid image file'], 400);
            }
    
            // Путь к изображению
            $imagePath = $image->getRealPath();
            
            // Использование Tesseract

            $ocr = new TesseractOCR($imagePath);
            $text = $ocr
                ->executable('C:\Program Files\Tesseract-OCR\tesseract.exe')
                ->lang('rus', 'eng')
                ->run();
    
            // Если текст пустой, считаем это ошибкой
            if (empty(trim($text))) {
                throw new \Exception('Empty result from OCR. Image path: ' . $imagePath);
            }
    
            // Успешный результат
            return response()->json([
                'status' => 'success',
                'recognized_text' => $text
            ]);
        } catch (\Exception $e) {
            // При любой ошибке возвращаем универсальное сообщение
            return response()->json([
                'status' => 'error',
                'error' => $e->GetMessage(),
                'message' => 'Oops, something went wrong. Please try again.',
            ], 500);
        }
        
    }
}