<?php

namespace IloveCode\Outspoken;

use IloveCode\Outspoken\Commands\OutspokenCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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
