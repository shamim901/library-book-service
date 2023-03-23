<?php
namespace App\Library;

use Log;

class DbBackup
{
    private $dbConInfo = [];
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->dbConInfo = config('database.connections.mysql');
    }

    /**
     * Database backup with mysqldump
     */
    public function backup()
    {
        try {
            $mysqldumpPath  = config('app.mysqldump_path');
            $host           = $this->dbConInfo['host'];
            $user           = $this->dbConInfo['username'];
            $pass           = $this->dbConInfo['password'];
            $dbName         = $this->dbConInfo['database'];
            $fileName       = 'child-service-db-' . (new \DateTime())->format('d-m-Y') . '.sql';
            $exportPathSql  = storage_path('db-backup'. DIRECTORY_SEPARATOR  . $fileName);

            //Please do not change the following points
            //Export of the database and output of the status
            // windows command
            // $command= '"'. $mysqldumpPath .'"' . ' --opt -h' .$host .' -u' .$user .' -p' .$pass .' ' .$dbName .' > ' .$exportPathSql;
            // Linux Ubuntu Command
            $command= 'mysqldump --opt -h' .$host .' -u' .$user .' -p' .$pass .' ' .$dbName .' > ' .$exportPathSql;
            $output = [];
            $resultCode = null;
            Log::info("DB backup started: command: {$command}");

            exec($command, $output, $resultCode);

            Log::info("Backup output:");
            Log::info(implode(',', $output));
            Log::info('Backup result code:' . $resultCode . "\nBackup path: {$exportPathSql}\nBackup end");

        } catch (\Exception $ex) {
            return [
                'success' => false,
                'message' => "DB Backup failed. Error: {$ex->getMessage()}"
            ];
        }

        return [
            'success'   => true,
            'file'      => $exportPathSql,
            'file_name' => $fileName
        ];
    }

    /**
     * Creating zip of a sql file
     */
    public function createZip($filePath, $fileName)
    {
        try {
            $retFilePath = '';
            $ext = pathinfo($filePath, PATHINFO_EXTENSION);
            if ($ext === 'zip') {
                return $filePath;
            }

            $zipFilePath = str_ireplace('sql', 'zip', $filePath);
            $zip = new \ZipArchive();

            if ($zip->open($zipFilePath, \ZipArchive::CREATE) === TRUE) {
                $zip->addFile($filePath, $fileName);
                $zip->close();
                unlink($filePath);
                $retFilePath = $zipFilePath;
            } else {
                $retFilePath = $filePath;
            }

        } catch (\Exception $ex) {
            Log::info("Creating zip faild. Error: {$ex->getMessage()}");
            return [
                'success' => false,
                'message' => "Creating zip faild. Error: {$ex->getMessage()}"
            ];
        }

        return [
            'success' => true,
            'file' => $retFilePath
        ];
    }
}