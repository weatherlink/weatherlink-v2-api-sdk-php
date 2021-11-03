<?php

namespace weatherlink_v2_api_sdk\signature;

class SignatureCalculator {

    public function __construct() {
    }

    public function calculateStationsSignature($apiKey, $apiSecret, $apiRequestTimestamp, $stationIds = array()) {
        $parametersToHash = array(
            "api-key" => $apiKey,
            "t" => $apiRequestTimestamp
        );
        if (sizeof($stationIds) > 0) {
            $parametersToHash["station-ids"] = $implode(",", $stationIds);
        }
        return calculateSignature($apiSecret, $parametersToHash);
    }

    public function calculateNodesSignature($apiKey, $apiSecret, $apiRequestTimestamp, $nodeIds = array()) {
        $parametersToHash = array(
            "api-key" => $apiKey,
            "t" => $apiRequestTimestamp
        );
        if (sizeof($stationIds) > 0) {
            $parametersToHash["node-ids"] = $implode(",", $nodeIds);
        }
        return calculateSignature($apiSecret, $parametersToHash);
    }

    public function calculateSensorsSignature($apiKey, $apiSecret, $apiRequestTimestamp, $sensorIds = array()) {
        $parametersToHash = array(
            "api-key" => $apiKey,
            "t" => $apiRequestTimestamp
        );
        if (sizeof($stationIds) > 0) {
            $parametersToHash["sensor-ids"] = $implode(",", $sensorIds);
        }
        return calculateSignature($apiSecret, $parametersToHash);
    }

    public function calculateSensorActivitySignature($apiKey, $apiSecret, $apiRequestTimestamp, $sensorIds = array()) {
        $parametersToHash = array(
            "api-key" => $apiKey,
            "t" => $apiRequestTimestamp
        );
        if (sizeof($stationIds) > 0) {
            $parametersToHash["sensor-ids"] = $implode(",", $sensorIds);
        }
        return calculateSignature($apiSecret, $parametersToHash);
    }

    public function calculateSensorCatalogSignature($apiKey, $apiSecret, $apiRequestTimestamp) {
        $parametersToHash = array(
            "api-key" => $apiKey,
            "t" => $apiRequestTimestamp
        );
        return calculateSignature($apiSecret, $parametersToHash);
    }

    public function calculateCurrentSignature($apiKey, $apiSecret, $apiRequestTimestamp, $stationId) {
        $parametersToHash = array(
            "api-key" => $apiKey,
            "t" => $apiRequestTimestamp,
            "station-id" => $stationId
        );
        return calculateSignature($apiSecret, $parametersToHash);
    }

    public function calculateHistoricSignature($apiKey, $apiSecret, $apiRequestTimestamp, $stationId, $startTimestamp, $endTimestamp) {
        $parametersToHash = array(
            "api-key" => $apiKey,
            "t" => $apiRequestTimestamp,
            "station-id" => $stationId,
            "start-timestamp" => $startTimestamp,
            "end-timestamp" => $endTimestamp
        );
        return calculateSignature($apiSecret, $parametersToHash);
    }

    private function calculateSignature($apiSecret, $parametersToHash) {
        ksort($parametersToHash);
        $stringToHash = "";
        foreach ($parametersToHash as $parameterName => $parameterValue) {
            $stringToHash = $stringToHash . $parameterName . $parameterValue;
        }
        $apiSignature = hash_hmac("sha256", $stringToHash, $apiSecret);
        return $apiSignature;
    }
}