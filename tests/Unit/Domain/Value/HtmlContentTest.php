<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\Value;

use App\Domain\Value\HtmlContent;
use App\Tests\Unit\UnitTestCase;

final class HtmlContentTest extends UnitTestCase
{
    /**
     * @test
     */
    public function value(): void
    {
        $expected = self::faker()->randomHtml();

        self::assertSame($expected, (new HtmlContent($expected))->value);
    }
}