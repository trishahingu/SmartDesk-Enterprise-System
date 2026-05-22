<?php

namespace App\Http\Controllers;

class BackupController extends Controller
{
    public function backup()
    {
        $database = env('DB_DATABASE');

        $username = env('DB_USERNAME');

        $password = env('DB_PASSWORD');

        $filename = 'backup_' . date('Y-m-d_H-i-s') . '.sql';

        $path = storage_path($filename);

        /*
        |--------------------------------------------------------------------------
        | XAMPP MySQLDump Path
        |--------------------------------------------------------------------------
        */

        $mysqldump = "C:\\xampp\\mysql\\bin\\mysqldump.exe";

        /*
        |--------------------------------------------------------------------------
        | Backup Command
        |--------------------------------------------------------------------------
        */

        $command =
            "\"{$mysqldump}\" --user={$username} {$database} > {$path}";

        system($command);

        return response()
            ->download($path)
            ->deleteFileAfterSend(true);
    }
}