<?php
namespace weatherlink_v2_api_sdk\signature;

use PHPUnit\Framework\TestCase;

class SignatureCalculatorTest extends TestCase {

    // **************************************************

    /**
     * @dataProvider calculateStationsSignatureWithoutStationIdsDataProvider
     */
    public function testCalculateStationsSignatureWithoutStationIds($apiKey, $apiSecret, $apiRequestTimestamp, $expectedApiSignature) {
        $signatureCalculator = new SignatureCalculator();
        $apiSignature = $signatureCalculator->calculateStationsSignature($apiKey, $apiSecret, $apiRequestTimestamp);
        $this->assertEquals($expectedApiSignature, $apiSignature);
    }

    public function calculateStationsSignatureWithoutStationIdsDataProvider() {
        return array(
            array("3l4raa5xl6xcgfkh5r5tdgnvbbb0d0zp", "ooxqc6n6cs4n74zyn6djgsz470bxsho1", 1633115254, "6fc5636eeccc766216d14887530b2a4adb7896d289dd710a59db40eacf76069d")
        );
    }

    // **************************************************

    /**
     * @dataProvider calculateStationsSignatureWithStationIdsDataProvider
     */
    public function testCalculateStationsSignatureWithStationIds($apiKey, $apiSecret, $apiRequestTimestamp, $stationIds, $expectedApiSignature) {
        $signatureCalculator = new SignatureCalculator();
        $apiSignature = $signatureCalculator->calculateStationsSignature($apiKey, $apiSecret, $apiRequestTimestamp, $stationIds);
        $this->assertEquals($expectedApiSignature, $apiSignature);
    }

    public function calculateStationsSignatureWithStationIdsDataProvider() {
        return array(
            array("3l4raa5xl6xcgfkh5r5tdgnvbbb0d0zp", "ooxqc6n6cs4n74zyn6djgsz470bxsho1", 1633115254, array(1234, 6789), "68b3f48d5660926e09b093a6ddb0d98f07dc06215daacbb4e9566339625c6f7d")
        );
    }

    // **************************************************

    public function testCalculateNodesSignature() {
    }

    public function testCalculateSensorsSignature() {
    }

    public function testCalculateSensorActivitySignature() {
    }

    public function testCalculateSensorCatalogSignature() {
    }

    public function testCalculateCurrentSignature() {
    }

    public function testCalculateHistoricSignature() {
    }
}
