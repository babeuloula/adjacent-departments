<?php

/**
 * @author BaBeuloula <babeuloula@gmail.com>
 * @copyright Copyright (c) BaBeuloula
 * @license MIT
 */

declare(strict_types=1);

namespace BaBeuloula\AdjacentDepartments\Exception;

class AdjacentDepartmentsNotFoundException extends \Exception
{
    public function __construct(string $department)
    {
        parent::__construct(
            sprintf(
                "Unable to find department #%s",
                $department
            ),
            404
        );
    }
}
