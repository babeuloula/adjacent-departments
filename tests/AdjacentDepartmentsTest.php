<?php

/**
 * @author BaBeuloula <babeuloula@gmail.com>
 * @copyright Copyright (c) BaBeuloula
 * @license MIT
 */

declare(strict_types=1);

namespace BaBeuloula\Test\AdjacentDepartments;

use BaBeuloula\AdjacentDepartments\AdjacentDepartments;
use BaBeuloula\AdjacentDepartments\Exception\AdjacentDepartmentsNotFoundException;
use PHPUnit\Framework\TestCase;

class AdjacentDepartmentsTest extends TestCase
{
    /** @var AdjacentDepartments */
    protected $adjacentDepartments;

    protected function setUp(): void
    {
        parent::setUp();

        $this->adjacentDepartments = new AdjacentDepartments();
    }

    /**
     * @dataProvider findAdjacentDepartmentDataProvider
     *
     * @param string[] $adjacentDepartments
     */
    public function testFindAdjacentDepartment(string $department, array $adjacentDepartments): void
    {
        static::assertSame(
            $adjacentDepartments,
            $this->adjacentDepartments->find($department)
        );
    }

    /** @dataProvider findNotFoundAdjacentDepartmentDataProvider */
    public function testFindNotFoundAdjacentDepartment(string $department): void
    {
        static::expectException(AdjacentDepartmentsNotFoundException::class);
        static::expectExceptionMessage(
            sprintf(
                "Unable to find department #%s",
                $department
            )
        );
        $this->adjacentDepartments->find($department);
    }

    /** @dataProvider isAdjacentDepartmentDataProvider */
    public function testIsAdjacentDepartment(string $department, string $adjacent, bool $result): void
    {
        static::assertSame(
            $result,
            $this->adjacentDepartments->isAdjacent($department, $adjacent)
        );
    }

    /** @dataProvider notFoundIsAdjacentDepartmentDataProvider */
    public function testNotFoundIsAdjacentDepartment(string $department, string $adjacent): void
    {
        static::expectException(AdjacentDepartmentsNotFoundException::class);
        static::expectExceptionMessage(
            sprintf(
                "Unable to find department #%s",
                $department
            )
        );
        $this->adjacentDepartments->isAdjacent($department, $adjacent);
    }

    /** @return array[] */
    public function findAdjacentDepartmentDataProvider(): array
    {
        return [
            [
                '03',
                ['42','71','58','18','23','63'],
            ],
            [
                '69',
                ['01','71','42','43','07','26','38'],
            ],
        ];
    }

    /** @return array[] */
    public function findNotFoundAdjacentDepartmentDataProvider(): array
    {
        return [
            ['00'],
            ['666'],
        ];
    }

    /** @return array[] */
    public function isAdjacentDepartmentDataProvider(): array
    {
        return [
            [
                '03', '69', false
            ],
            [
                '03', '63', true
            ],
        ];
    }

    /** @return array[] */
    public function notFoundIsAdjacentDepartmentDataProvider(): array
    {
        return [
            ['00', '99'],
            ['666', '333'],
        ];
    }
}
