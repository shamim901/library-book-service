<?php

namespace App\Http\Controllers\ImporterExporter;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Log;

use App\Http\Requests\ImporterExporter\FileUploadRequest;

class FileUploadController extends Controller
{
    //

    public function fileUploadView()
    {
        return view('fileUpload');
    }

    public function fileUploader(FileUploadRequest $fileRequest)
    {
 

        $file = $fileRequest->file('imgUpload1')->store('public/book');

        if(!$file) {
            return response([
                'success' => true,
                'message' => 'Failed to Upload File!!!'
            ]);
        }

        Log::info($file);

        return response([
            'success' => true,
            'message' => 'File Store Successfully',
            'data'  => $file
        ]);

        // return view('fileUpload');
    }
}
