<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema; // For schema manipulation (e.g., string length adjustments)
use App\Models\User;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Example: Bind a custom interface to a concrete class
        // $this->app->bind(SomeInterface::class, SomeConcreteClass::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Fixes "String length exceeds maximum allowed for index" issue in MySQL
        Schema::defaultStringLength(191); // This is useful for MySQL 5.x where default string length is limited to 191

        // Example: Customizing the verification email message
        VerifyEmail::toMailUsing(function ($notifiable) {
            return (new MailMessage)
                ->subject('Welcome to JAXBAN Auto Care Services!')
                ->line('Thank you for registering with us.')
                ->action('Verify Email', url('/verify-email'))
                ->line('If you did not create an account, no further action is required.');
        });
        
        // Other boot logic can go here
    }
}
