<?php

namespace UserLoginService\Application;
use UserLoginService\Domain\User;
use UserLoginService\Infrastructure\FacebookSessionManager;

class UserLoginService
{
    private array $loggedUsers = [];

    public function manualLogin(User $user): string
    {
        $username = $user->getUsername();
        if (in_array($username, $this->loggedUsers)) {
            throw new \Exception("Usuario ya logeado");
        }

        $this->loggedUsers[] = $username;
        return $username;
    }

    public function getLoggedUsers(User $user): array {
        return $this->loggedUsers;
    }

    public function getExternalSessions(): int {
        $facebookSessionManager = new FacebookSessionManager();
        return $facebookSessionManager->getSessions();
    }

}