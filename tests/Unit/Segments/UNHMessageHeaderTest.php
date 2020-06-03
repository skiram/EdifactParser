<?php

declare(strict_types=1);

namespace EdifactParser\Tests\Unit\Segments;

use EdifactParser\Exception\MissingSubSegmentKey;
use EdifactParser\Segments\UNHMessageHeader;
use PHPUnit\Framework\TestCase;

final class UNHMessageHeaderTest extends TestCase
{
    /** @test */
    public function segmentValues(): void
    {
        $rawValues = ['UNH', '1', ['IFTMIN', 'S', '93A', 'UN', 'PN001']];
        $segment = new UNHMessageHeader($rawValues);

        self::assertEquals(UNHMessageHeader::class, $segment->tag());
        self::assertEquals('1', $segment->subId());
        self::assertEquals($rawValues, $segment->rawValues());
    }

    /** @test */
    public function missingSubSegmentKey(): void
    {
        $segment = new UNHMessageHeader(['UNH']);
        $this->expectException(MissingSubSegmentKey::class);
        $segment->subId();
    }
}
