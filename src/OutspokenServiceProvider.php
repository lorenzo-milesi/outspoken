<?php

namespace IloveCode\Outspoken;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use IloveCode\Outspoken\Commands\OutspokenCommand;

class OutspokenServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('outspoken')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_outspoken_table')
            ->hasCommand(OutspokenCommand::class);
    }
}
