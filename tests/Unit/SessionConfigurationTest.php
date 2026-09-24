<?php

namespace Tests\Unit;

use Tests\TestCase;

class SessionConfigurationTest extends TestCase
{
    public function test_sessions_remain_valid_for_a_workday_by_default(): void
    {
        $this->assertSame(480, config('session.lifetime'));
    }
}
