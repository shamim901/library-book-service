<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Command;
use App\Library\DbBackup;
use Log;

class DailyDbBackup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backup:db';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'It will backup the database of every service';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $time = (new \DateTime())->format('Y-m-d H:i:s');
        \Log::info("DB Backup cron run @{$time}");
        $this->removePreviousFiles();
        $this->backupDb();
    }

    private function removePreviousFiles()
    {
        $files = glob('storage/db-backup/*');

        foreach($files as $file){
            if(file_exists($file)){
                unlink($file);
            }
        }
    }

    private function backupDb()
    {
        $dbBackup = new DbBackup();
        $backupResult = $dbBackup->backup();

        /** Backup db */
        if (!$backupResult['success'])
        {
            return $backupResult;
        }

        /** Create zip */
        $zipResult = $dbBackup->createZip($backupResult['file'], $backupResult['file_name']);
        if (!$zipResult['success']) {
            return $zipResult;
        }

        /** Sending email with backup db as attachment */
        $finalData = strstr($zipResult['file'], 'db-backup');

        $data['attachment'] = storage_path($finalData);
        Log::info('file = '. $zipResult['file']);
        $recipient = config('mail.db_backup_recipient');
        $this->emailDb($data, $recipient);

        return [
            'success' => true
        ];
    }

    /**
     * Sending backup db to email
     */
    public function emailDb($data, $recipient)
    {
        try {
            Mail::send('db-backup-email', $data, function ($message) use ($data, $recipient) {
                $message->to($recipient, '')->subject('Database Schedule backup');
                $message->from('idsdp@syntechbd.com', "MOSW Database Backup");
                $message->attach($data['attachment']);
            });

            Log::info("DB backup email sent successfully. Recipient: {$recipient}");

        } catch (\Exception $ex) {

            Log::info("DB backup email failed. Error: {$ex->getMessage()}");

            return [
                'success' => false,
                'message' => "DB backup email failed. Error: {$ex->getMessage()}"
            ];
        }

        return [
            'success' => true
        ];
    }
}
