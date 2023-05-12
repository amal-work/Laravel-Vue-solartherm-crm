<?php

namespace App\Providers;
use Form;
use Illuminate\Support\ServiceProvider;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Register the form components
        Form::component('bsText', 'components.form.text', ['name', 'label', 'value']);
        Form::component('bsNumber', 'components.form.number', ['name', 'label', 'value']);
        Form::component('bsPassword', 'components.form.password', ['name', 'label']);
        Form::component('bsSelect', 'components.form.select', ['name', 'label', 'options', 'value']);
        Form::component('bsTextArea', 'components.form.textarea', ['name', 'label', 'value']);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
