<?php


namespace Weshop\Core\Wechat\Traits;


use Weshop\Core\Wechat\WechatWebProfile;

trait WechatWebUser
{
    public function updateWechatWebProfile($socialite)
    {
        WechatWebProfile::updateOrCreate(['user_id' => $this->id], $socialite->user);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function wechatWebProfile()
    {
        return $this->hasOne(WechatWebProfile::class);
    }
}