<?php

namespace App\Services\Login;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

trait RememberMeExpiration
{
    /**
     * Set default minutes expiration in the 30 days
     *
     * @var int
     */
    protected int $minutesExpiration = 43200;

    /**
     * Customize the user logged remember me expiration
     *
     * @param Authenticatable $user
     */
    public function setRememberMeExpiration(Authenticatable $user): void
    {
        Cookie::queue($this->getRememberMeSessionName(), encrypt($this->setRememberMeValue($user)), $this->minutesExpiration);
    }

    /**
     * Generate remember me value
     *
     * @param $user
     * @return string
     */
    protected function setRememberMeValue($user): string
    {
        return $user->id . "|" . $user->remember_token . "|" . $user->password;
    }

    /**
     * Get remember me session name
     *
     * @return string
     */
    protected function getRememberMeSessionName(): string
    {
        return Auth::getRecallerName();
    }
}
