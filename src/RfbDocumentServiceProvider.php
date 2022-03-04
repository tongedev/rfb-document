<?php

namespace Tongedev\RfbDocument;

use Illuminate\Support\ServiceProvider;

class RfbDocumentServiceProvider extends ServiceProvider
{
    public function boot()
    {
    }

    public function register()
    {
        $this->app->bind('cpf', function () {
            return new CPFDocument();
        });

        $this->app->bind('cnpj', function () {
            return new CNPJDocument();
        });
    }
}
