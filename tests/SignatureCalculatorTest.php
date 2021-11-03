<?php

use PHPUnit\Framework\TestCase;

use weatherlink_v2_api_sdk\signature\SignatureCalculator;

final class SignatureCalculatorTest extends TestCase {
    public function calculateStationsSignature() {
        $sc = new SignatureCalculator();
        $expected = "6fc5636eeccc766216d14887530b2a4adb7896d289dd710a59db40eacf76069d";
        $actual = $sc->calculateStationsSignature("3l4raa5xl6xcgfkh5r5tdgnvbbb0d0zp", "ooxqc6n6cs4n74zyn6djgsz470bxsho1", 1633115254);
        $this->assertEquals($expected, $actual);
    }
}