<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\File;

use App\Models\Setting;
use Dotenv\Dotenv;
use App\Models\Website;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Routing\ResponseFactory;
class MaintenanceMode
{public function __construct(ResponseFactory $responseFactory) 
    {
        $this->responseFactory = $responseFactory;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {       
       
               $setting = Setting::all();
                // Get the Stripe keys from the database
                $public_key = $setting->where('key', 'public_key')->first()->value;
                $secret_key = $setting->where('key', 'Secrt_key')->first()->value;
         
                putenv("STRIPE_PUBLISHABLE_KEY=$public_key");
                putenv("STRIPE_SECRET_KEY=$secret_key");

                // Read the contents of the .env file
                $envFile = base_path('.env');
                $envContents = File::get($envFile);

                // Replace the corresponding lines
                $envContents = preg_replace('/^STRIPE_PUBLISHABLE_KEY=.*$/m', "STRIPE_PUBLISHABLE_KEY=$public_key", $envContents);
                $envContents = preg_replace('/^STRIPE_SECRET_KEY=.*$/m', "STRIPE_SECRET_KEY=$secret_key", $envContents);

                // Save the updated contents back to the .env file
                File::put($envFile, $envContents);
        
        return $next($request);
    }
}
