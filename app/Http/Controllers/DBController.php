<?php

namespace App\Http\Controllers;

use App\Library\DbBackup;
use Illuminate\Http\Request;

class DBController extends Controller
{
    /*
    db backup
    */
    public function databaseBackup()
    {
        $this->removePreviousFiles();

        $dbBackup = new DbBackup();
        $dumpResult = $dbBackup->backup();

        if (!$dumpResult['success']) {
            return $dumpResult;
        }

        $dirPath = storage_path('db-backup');
        if (!file_exists($dirPath)) {
            mkdir($dirPath, 0755);
        }

        /** Create zip */
        $zipResult = $dbBackup->createZip($dumpResult['file'], $dumpResult['file_name']);
        if (!$zipResult['success']) {
            return $zipResult;
        }

        $finalData  = strstr($zipResult['file'], 'db-backup');
        $fileName   = storage_path($finalData);

        return response()->download($fileName);
    }

    private function removePreviousFiles()
    {
        $files = scandir(storage_path('/db-backup'), SCANDIR_SORT_NONE);
        $files = array_diff($files, array('.', '..'));

        foreach($files as $file){
            $filePath = storage_path('/db-backup/'.$file);
            if(file_exists($filePath)){
                unlink($filePath);
            }
        }
    }

    private function test () {
        return 5 + 6;
    }
}
