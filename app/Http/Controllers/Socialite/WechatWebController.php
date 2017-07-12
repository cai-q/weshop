<?php

namespace Weshop\Http\Controllers\Socialite;

use Illuminate\Http\Request;
use Weshop\Core\Wechat\SessionHandler;
use Weshop\Http\Controllers\Controller;
use Socialite;

class WechatWebController extends Controller
{
    public function authenticate()
    {
        return Socialite::with('weixinweb')->redirect();
    }

    public function callback()
    {
        $socialite = Socialite::driver('weixinweb')->user();

        /** @var \Weshop\User $authenticated */
        if ($authenticated = \Auth::user()) {
            $authenticated->updateWechatWebProfile($socialite);
            return redirect(SessionHandler::getNextRoute());
        } else {
            SessionHandler::setAuthenticatedUser($socialite);
            return redirect('/register');
        }
    }
}
