<?php

declare(strict_types=1);

namespace ProposalPage\Sdk\Exception;

use Exception;

final class FailedActionException extends Exception
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
