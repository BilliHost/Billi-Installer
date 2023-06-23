<?php

namespace Billidev\Billiinstaller\Controllers;

use Illuminate\Routing\Controller;
use Billidev\Billiinstaller\Events\LaravelInstallerFinished;
use Billidev\Billiinstaller\Helpers\EnvironmentManager;
use Billidev\Billiinstaller\Helpers\FinalInstallManager;
use Billidev\Billiinstaller\Helpers\InstalledFileManager;

class FinalController extends Controller
{
    function __construct()
    {
        set_time_limit(300);
    }

    /**
     * Update installed file and display finished view.
     *
     * @param \Billidev\Billiinstaller\Helpers\InstalledFileManager $fileManager
     * @param \Billidev\Billiinstaller\Helpers\FinalInstallManager $finalInstall
     * @param \Billidev\Billiinstaller\Helpers\EnvironmentManager $environment
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function finish(InstalledFileManager $fileManager, FinalInstallManager $finalInstall, EnvironmentManager $environment)
    {
        $finalMessages = $finalInstall->runFinal();
        $finalStatusMessage = $fileManager->update();
        $finalEnvFile = $environment->getEnvContent();

        event(new LaravelInstallerFinished);

        return view('vendor.installer.finished', compact('finalMessages', 'finalStatusMessage', 'finalEnvFile'));
    }
}
