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

    /**
     * @dataProvider calculateNodesSignatureWithoutNodeIdsDataProvider
     */
    public function testCalculateNodesSignatureWithoutNodeIds($apiKey, $apiSecret, $apiRequestTimestamp, $expectedApiSignature) {
        $signatureCalculator = new SignatureCalculator();
        $apiSignature = $signatureCalculator->calculateNodesSignature($apiKey, $apiSecret, $apiRequestTimestamp);
        $this->assertEquals($expectedApiSignature, $apiSignature);
    }

    public function calculateNodesSignatureWithoutNodeIdsDataProvider() {
        return array(
            array("3l4raa5xl6xcgfkh5r5tdgnvbbb0d0zp", "ooxqc6n6cs4n74zyn6djgsz470bxsho1", 1633115254, "6fc5636eeccc766216d14887530b2a4adb7896d289dd710a59db40eacf76069d")
        );
    }

    // **************************************************

    /**
     * @dataProvider calculateNodesSignatureWithNodeIdsDataProvider
     */
    public function testCalculateNodesSignatureWithNodeIds($apiKey, $apiSecret, $apiRequestTimestamp, $nodeIds, $expectedApiSignature) {
        $signatureCalculator = new SignatureCalculator();
        $apiSignature = $signatureCalculator->calculateNodesSignature($apiKey, $apiSecret, $apiRequestTimestamp, $nodeIds);
        $this->assertEquals($expectedApiSignature, $apiSignature);
    }

    public function calculateNodesSignatureWithNodeIdsDataProvider() {
        return array(
            array("3l4raa5xl6xcgfkh5r5tdgnvbbb0d0zp", "ooxqc6n6cs4n74zyn6djgsz470bxsho1", 1633115254, array(1234, 6789), "62517e3e306a3f39734fbdb141918edc2f32afc32295035f755984c1cf8cdabf")
        );
    }

    // **************************************************

    /**
     * @dataProvider calculateSensorsSignatureWithoutSensorIdsDataProvider
     */
    public function testCalculateSensorsSignatureWithoutSensorIds($apiKey, $apiSecret, $apiRequestTimestamp, $expectedApiSignature) {
        $signatureCalculator = new SignatureCalculator();
        $apiSignature = $signatureCalculator->calculateSensorsSignature($apiKey, $apiSecret, $apiRequestTimestamp);
        $this->assertEquals($expectedApiSignature, $apiSignature);
    }

    public function calculateSensorsSignatureWithoutSensorIdsDataProvider() {
        return array(
            array("3l4raa5xl6xcgfkh5r5tdgnvbbb0d0zp", "ooxqc6n6cs4n74zyn6djgsz470bxsho1", 1633115254, "6fc5636eeccc766216d14887530b2a4adb7896d289dd710a59db40eacf76069d")
        );
    }

    // **************************************************

    /**
     * @dataProvider calculateSensorsSignatureWithSensorIdsDataProvider
     */
    public function testCalculateSensorsSignatureWithSensorIds($apiKey, $apiSecret, $apiRequestTimestamp, $sensorIds, $expectedApiSignature) {
        $signatureCalculator = new SignatureCalculator();
        $apiSignature = $signatureCalculator->calculateSensorsSignature($apiKey, $apiSecret, $apiRequestTimestamp, $sensorIds);
        $this->assertEquals($expectedApiSignature, $apiSignature);
    }

    public function calculateSensorsSignatureWithSensorIdsDataProvider() {
        return array(
            array("3l4raa5xl6xcgfkh5r5tdgnvbbb0d0zp", "ooxqc6n6cs4n74zyn6djgsz470bxsho1", 1633115254, array(1234, 6789), "4f66b360a2308e6022b9ed2ce603a4c048cf42a18b43461a42ac80e7b666d10d")
        );
    }

    // **************************************************

    /**
     * @dataProvider calculateSensorActivitySignatureWithoutSensorIdsDataProvider
     */
    public function testCalculateSensorActivitySignatureWithoutSensorIds($apiKey, $apiSecret, $apiRequestTimestamp, $expectedApiSignature) {
        $signatureCalculator = new SignatureCalculator();
        $apiSignature = $signatureCalculator->calculateSensorActivitySignature($apiKey, $apiSecret, $apiRequestTimestamp);
        $this->assertEquals($expectedApiSignature, $apiSignature);
    }

    public function calculateSensorActivitySignatureWithoutSensorIdsDataProvider() {
        return array(
            array("3l4raa5xl6xcgfkh5r5tdgnvbbb0d0zp", "ooxqc6n6cs4n74zyn6djgsz470bxsho1", 1633115254, "6fc5636eeccc766216d14887530b2a4adb7896d289dd710a59db40eacf76069d")
        );
    }

    // **************************************************

    /**
     * @dataProvider calculateSensorActivitySignatureWithSensorIdsDataProvider
     */
    public function testCalculateSensorActivitySignatureWithSensorIds($apiKey, $apiSecret, $apiRequestTimestamp, $sensorIds, $expectedApiSignature) {
        $signatureCalculator = new SignatureCalculator();
        $apiSignature = $signatureCalculator->calculateSensorActivitySignature($apiKey, $apiSecret, $apiRequestTimestamp, $sensorIds);
        $this->assertEquals($expectedApiSignature, $apiSignature);
    }

    public function calculateSensorActivitySignatureWithSensorIdsDataProvider() {
        return array(
            array("3l4raa5xl6xcgfkh5r5tdgnvbbb0d0zp", "ooxqc6n6cs4n74zyn6djgsz470bxsho1", 1633115254, array(1234, 6789), "4f66b360a2308e6022b9ed2ce603a4c048cf42a18b43461a42ac80e7b666d10d")
        );
    }

    // **************************************************

    /**
     * @dataProvider calculateSensorCatalogSignatureDataProvider
     */
    public function testCalculateSensorCatalogSignature($apiKey, $apiSecret, $apiRequestTimestamp, $expectedApiSignature) {
        $signatureCalculator = new SignatureCalculator();
        $apiSignature = $signatureCalculator->calculateSensorCatalogSignature($apiKey, $apiSecret, $apiRequestTimestamp);
        $this->assertEquals($expectedApiSignature, $apiSignature);
    }

    public function calculateSensorCatalogSignatureDataProvider() {
        return array(
            array("3l4raa5xl6xcgfkh5r5tdgnvbbb0d0zp", "ooxqc6n6cs4n74zyn6djgsz470bxsho1", 1633115254, "6fc5636eeccc766216d14887530b2a4adb7896d289dd710a59db40eacf76069d")
        );
    }

    // **************************************************

    /**
     * @dataProvider calculateCurrentSignatureDataProvider
     */
    public function testCalculateCurrentSignature($apiKey, $apiSecret, $apiRequestTimestamp, $stationId, $expectedApiSignature) {
        $signatureCalculator = new SignatureCalculator();
        $apiSignature = $signatureCalculator->calculateCurrentSignature($apiKey, $apiSecret, $apiRequestTimestamp, $stationId);
        $this->assertEquals($expectedApiSignature, $apiSignature);
    }

    public function calculateCurrentSignatureDataProvider() {
        return array(
            array("3l4raa5xl6xcgfkh5r5tdgnvbbb0d0zp", "ooxqc6n6cs4n74zyn6djgsz470bxsho1", 1633115254, 1234, "9a9d74b35761646ebf59856d18cf91c620ea263c67a910a39672d32edadda8c5")
        );
    }

    // **************************************************

    /**
     * @dataProvider calculateHistoricSignatureDataProvider
     */
    public function testHistoricCurrentSignature($apiKey, $apiSecret, $apiRequestTimestamp, $stationId, $startTimestamp, $endTimestamp, $expectedApiSignature) {
        $signatureCalculator = new SignatureCalculator();
        $apiSignature = $signatureCalculator->calculateHistoricSignature($apiKey, $apiSecret, $apiRequestTimestamp, $stationId, $startTimestamp, $endTimestamp);
        $this->assertEquals($expectedApiSignature, $apiSignature);
    }

    public function calculateHistoricSignatureDataProvider() {
        return array(
            array("3l4raa5xl6xcgfkh5r5tdgnvbbb0d0zp", "ooxqc6n6cs4n74zyn6djgsz470bxsho1", 1633115254, 1234, 1633071600, 1633158000, "ddfd79473fa8aa7ff918147c4016faa86c18c3a54a9c2bbb632e92bcb09335b1")
        );
    }

    // **************************************************
}
