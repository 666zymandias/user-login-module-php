<?php

declare(strict_types=1);

namespace UserLoginService\Tests\Application;

use PHPUnit\Framework\TestCase;
use UserLoginService\Application\UserLoginService;
use UserLoginService\Domain\User;

final class UserLoginServiceTest extends TestCase
{
    /**
     * @test
     */
    public function manualLogin() {
        $userLoginService = new UserLoginService();
        $user1 = new User("felipe");
        $this->assertEquals("felipe", $userLoginService->manualLogin($user1));
    }

    /**
     * @test
     */
    public function isLoggedIn() {
        $userLoginService = new UserLoginService();

        $user1 = new User("juan");
        $this->assertEquals("juan", $userLoginService->manualLogin($user1));

        $this->expectException(\Exception::class);
        $this->assertEquals("juan", $userLoginService->manualLogin($user1));
    }

    /**
     * @test
     */
    public function getNumberOfSessions() {
        $userLoginService = new UserLoginService();
        $this->assertIsInt($userLoginService->getExternalSessions());
    }
}
