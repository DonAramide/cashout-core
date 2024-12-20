<?php

namespace App\Enums;

class AgentLevel
{
    const AGENT = "AGENT";
    const SUPER_AGENT = "SUPER AGENT";

    static $types = [
        self::AGENT,
        self::SUPER_AGENT,
    ];
}
