<?php

namespace weatherlink_v2_api_sdk\signature;

/**
 * API Signature calculator utility
 */
class SignatureCalculator {

    /**
     * Default constructor
     */
    public function __construct() {
    }

    /**
     * Compute the API Signature for an API call to /stations given the specific parameters
     *
     * @param string $apiKey the API Key
     * @param string $apiSecret the API Secret
     * @param integer $apiRequestTimestamp the Unix timestamp for when the API request is being made
     * @param array $stationIds optional integer array of up to 100 station ID numbers
     * @return string the API Signature
     */
    public function calculateStationsSignature($apiKey, $apiSecret, $apiRequestTimestamp, $stationIds = array()) {
        $parametersToHash = array(
            "api-key" => $apiKey,
            "t" => $apiRequestTimestamp
        );
        if (sizeof($stationIds) > 0) {
            $parametersToHash["station-ids"] = implode(",", $stationIds);
        }
        return $this->calculateSignature($apiSecret, $parametersToHash);
    }

    /**
     * Compute the API Signature for an API call to /nodes given the specific parameters
     *
     * @param string $apiKey the API Key
     * @param string $apiSecret the API Secret
     * @param integer $apiRequestTimestamp the Unix timestamp for when the API request is being made
     * @param array $nodeIds optional integer array of up to 100 node ID numbers
     * @return string the API Signature
     */
    public function calculateNodesSignature($apiKey, $apiSecret, $apiRequestTimestamp, $nodeIds = array()) {
        $parametersToHash = array(
            "api-key" => $apiKey,
            "t" => $apiRequestTimestamp
        );
        if (sizeof($nodeIds) > 0) {
            $parametersToHash["node-ids"] = implode(",", $nodeIds);
        }
        return $this->calculateSignature($apiSecret, $parametersToHash);
    }

    /**
     * Compute the API Signature for an API call to /sensors given the specific parameters
     *
     * @param string $apiKey the API Key
     * @param string $apiSecret the API Secret
     * @param integer $apiRequestTimestamp the Unix timestamp for when the API request is being made
     * @param array $sensorIds optional integer array of up to 100 sensor ID numbers
     * @return string the API Signature
     */
    public function calculateSensorsSignature($apiKey, $apiSecret, $apiRequestTimestamp, $sensorIds = array()) {
        $parametersToHash = array(
            "api-key" => $apiKey,
            "t" => $apiRequestTimestamp
        );
        if (sizeof($sensorIds) > 0) {
            $parametersToHash["sensor-ids"] = implode(",", $sensorIds);
        }
        return $this->calculateSignature($apiSecret, $parametersToHash);
    }

    /**
     * Compute the API Signature for an API call to /sensor-activity given the specific parameters
     *
     * @param string $apiKey the API Key
     * @param string $apiSecret the API Secret
     * @param integer $apiRequestTimestamp the Unix timestamp for when the API request is being made
     * @param array $sensorIds optional integer array of up to 100 sensor ID numbers
     * @return string the API Signature
     */
    public function calculateSensorActivitySignature($apiKey, $apiSecret, $apiRequestTimestamp, $sensorIds = array()) {
        $parametersToHash = array(
            "api-key" => $apiKey,
            "t" => $apiRequestTimestamp
        );
        if (sizeof($sensorIds) > 0) {
            $parametersToHash["sensor-ids"] = implode(",", $sensorIds);
        }
        return $this->calculateSignature($apiSecret, $parametersToHash);
    }

    /**
     * Compute the API Signature for an API call to /sensor-catalog given the specific parameters
     *
     * @param string $apiKey the API Key
     * @param string $apiSecret the API Secret
     * @param integer $apiRequestTimestamp the Unix timestamp for when the API request is being made
     * @return string the API Signature
     */
    public function calculateSensorCatalogSignature($apiKey, $apiSecret, $apiRequestTimestamp) {
        $parametersToHash = array(
            "api-key" => $apiKey,
            "t" => $apiRequestTimestamp
        );
        return $this->calculateSignature($apiSecret, $parametersToHash);
    }

    /**
     * Compute the API Signature for an API call to /sensor-catalog given the specific parameters
     *
     * @param string $apiKey the API Key
     * @param string $apiSecret the API Secret
     * @param integer $apiRequestTimestamp the Unix timestamp for when the API request is being made
     * @param integer $stationId the station ID
     * @return string the API Signature
     */
    public function calculateCurrentSignature($apiKey, $apiSecret, $apiRequestTimestamp, $stationId) {
        $parametersToHash = array(
            "api-key" => $apiKey,
            "t" => $apiRequestTimestamp,
            "station-id" => $stationId
        );
        return $this->calculateSignature($apiSecret, $parametersToHash);
    }

    /**
     * Compute the API Signature for an API call to /sensor-catalog given the specific parameters
     *
     * @param string $apiKey the API Key
     * @param string $apiSecret the API Secret
     * @param integer $apiRequestTimestamp the Unix timestamp for when the API request is being made
     * @param integer $stationId the station ID
     * @param integer $startTimestamp the Unix timestamp marking the beginning of the time window for the data requested
     * @param integer $endTimestamp the Unix timestamp marking the end of the time window for the data requested
     * @return string the API Signature
     */
    public function calculateHistoricSignature($apiKey, $apiSecret, $apiRequestTimestamp, $stationId, $startTimestamp, $endTimestamp) {
        $parametersToHash = array(
            "api-key" => $apiKey,
            "t" => $apiRequestTimestamp,
            "station-id" => $stationId,
            "start-timestamp" => $startTimestamp,
            "end-timestamp" => $endTimestamp
        );
        return $this->calculateSignature($apiSecret, $parametersToHash);
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