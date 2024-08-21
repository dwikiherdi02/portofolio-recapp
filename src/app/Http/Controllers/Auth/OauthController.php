<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Facades\App\Repositories\UserRepository as UserRepo;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class OauthController extends Controller
{
    public function redirectHandler(string $provider, string $frompage): RedirectResponse
    {
        Session::flash('oauth_from', $frompage);

        switch ($provider) {
            case 'google':
                /**
                 * This is URL for check scopes of google API:
                 * https://developers.google.com/identity/protocols/oauth2/scopes
                 *
                 */
                $scopes = [
                    'email',
                    'openid',
                    'profile',
                    // 'https://www.googleapis.com/auth/drive.file'
                ];

                /**
                 * This is URL for get refresh token on google API:
                 * https://stackoverflow.com/questions/8942340/get-refresh-token-google-api
                 * https://github.com/googleapis/oauth2client/issues/453
                 *
                 */
                $with = [
                    'access_type' => 'offline',
                    'prompt' => 'consent',
                ];
                break;

            default:
                $scopes = [];
                $with = [];
                break;
        }

        return Socialite::driver($provider)
            ->setScopes($scopes)
            ->with($with)
            ->redirect();
    }

    public function callbackHanlder(string $provider): RedirectResponse
    {
        try {
            $oauthUser = Socialite::driver($provider)->user();

            if (!Session::has('oauth_from')) {
                return redirect()->route('login');
            }

            $userExist = UserRepo::find(
                where: [
                    'email' => $oauthUser->email,
                    'provider_id' => $oauthUser->id,
                    'provider_name' => 'google',
                ]
            );

            switch (Session::get('oauth_from')) {
                case 'signup':
                    if ($userExist) {
                        return redirect()->route('login')->with('error_message', 'You are already registered.');
                    }

                    if (!$this->signupHandler($oauthUser)) {
                        return redirect()
                            ->route('login')
                            ->with('error_message', 'We\'re sorry, but we were unable to complete your registration at this time. Please try again later or contact our support team for assistance.');
                    }
                    break;

                case 'signin':
                    if (!$userExist) {
                        return redirect()->route('login')->with('error_message', 'It seems like you haven\'t created an account yet. Please sign up to start enjoying our services.');
                    }

                    Auth::login($userExist);

                    break;

                default:
                    return redirect()->route('login');
            }

            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            return redirect()->route('login');
        }
    }

    protected function signupHandler(object $oauthUser): bool
    {
        $storingUser = [
            'name' => $oauthUser->name,
            'email' => $oauthUser->email,
            'avatar' => $oauthUser->avatar,
            'provider_id' => $oauthUser->id,
            'provider_name' => 'google',
            'provider_token' => [
                'token' => $oauthUser->token,
                'refreshToken' => $oauthUser->refreshToken,
                'expiresIn' => $oauthUser->expiresIn,
            ],
            'email_verified_at' => Carbon::now(),
        ];

        $user = UserRepo::storing($storingUser);

        if (!$user) {
            return false;
        }

        event(new Registered($user));

        Auth::login($user);

        return true;
    }
}
