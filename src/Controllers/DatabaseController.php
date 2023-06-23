<?php

namespace Billidev\Billiinstaller\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Billidev\Billiinstaller\Helpers\DatabaseManager;
use Billidev\Billiinstaller\Events\AddingInstallerSuperAdmin;

class DatabaseController extends Controller
{
    /**
     * @var DatabaseManager
     */
    private $databaseManager;

    /**
     * @param DatabaseManager $databaseManager
     */
    public function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;
    }

    /**
     * Migrate and seed the database.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function database(Request $request)
    {
        $response = $this->databaseManager->migrateAndSeed();
        if($response['status'] == 'error') {
            return redirect()->route('LaravelInstaller::environmentWizard')
                ->with(['message' => $response]);
        } else {
            $this->databaseManager->passportInstall();

            return redirect()->route('LaravelInstaller::final')
                ->with(['message' => $response]);
        }
    }
}
