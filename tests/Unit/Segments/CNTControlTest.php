<?php

declare(strict_types=1);

namespace EdifactParser\Tests\Unit\Segments;

use EdifactParser\Exception\MissingSubSegmentKey;
use EdifactParser\Segments\CNTControl;
use PHPUnit\Framework\TestCase;

final class CNTControlTest extends TestCase
{
    /** @test */
    public function segmentValues(): void
    {
        $rawValues = ['CNT', ['7', '0.1', 'KGM']];
        $segment = new CNTControl($rawValues);

        self::assertEquals(CNTControl::class, $segment->tag());
        self::assertEquals('7', $segment->subId());
        self::assertEquals($rawValues, $segment->rawValues());
    }

    /** @test */
    public function missingSubSegmentKey(): void
    {
        $segment = new CNTControl(['CNT']);
        $this->expectException(MissingSubSegmentKey::class);
        $segment->subId();
    }
}
