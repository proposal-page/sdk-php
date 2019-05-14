<?php

declare(strict_types=1);

namespace ProposalPage\Sdk\Exception;

use Exception;

final class ValidationException extends Exception
{
    private $errors = [];

    public function __construct(array $errors)
    {
        parent::__construct('The given data failed to pass validation.');

        $this->errors = $errors;
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
