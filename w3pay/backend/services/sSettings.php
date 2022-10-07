<?php

class sSettings
{

    protected static $instance;

    public static function instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    // TODO Settings start

    //Enter your details
    public $SecretSignKey = 'Any phrase to create and verify a signature'; // Any phrase to create and verify a signature
    public $addressRecipient = '0x.....................'; // Address of the recipient(seller) eth
    public $LoadW3paySettingsDefaultGitHub = true; // Get the latest w3pay_settings_default.json file from github
    public $SmartChainTestnet = true; // True - Enable BNB Smart Chain (BEP20) - Testnet. Enable only for testing

    // Register and get signature verification API for each block explorer and fill them. Function ScanApiTokens().
    public function ScanApiTokens()
    {
        $ScanApiTokens = [
            97 => ['ScanApiUrl' => 'api-testnet.bscscan.com', 'ScanApiToken' => 'API_TOKEN'], // https://bscscan.com/apis Free API, BNB Smart Chain (BEP20) - Testnet
            56 => ['ScanApiUrl' => 'api.bscscan.com', 'ScanApiToken' => 'API_TOKEN'], // https://bscscan.com/apis Free API, BNB Smart Chain (BEP20)
            137 => ['ScanApiUrl' => 'api.polygonscan.com', 'ScanApiToken' => 'API_TOKEN'], // Polygon
            43114 => ['ScanApiUrl' => 'api.snowtrace.io', 'ScanApiToken' => 'API_TOKEN'], // Avalanche C-Chain
            250 => ['ScanApiUrl' => 'api.ftmscan.com', 'ScanApiToken' => 'API_TOKEN'], // Fantom Opera
        ];
        return $ScanApiTokens;
    }

    //Enter tokens to receive in chains. PaymentPersonalSettings() function.
    public function PaymentPersonalSettings()
    {
        $chainsData = [
            97 => ['receiveToken' => ['nameCoin' => 'USDT', 'addressCoin' => '0x7ef95a0FEE0Dd31b22626fA2e10Ee6A223F8a684']], // BNB Smart Chain (BEP20) - Testnet
            56 => ['receiveToken' => ['nameCoin' => 'USDT', 'addressCoin' => '0x55d398326f99059fF775485246999027B3197955']], // BNB Smart Chain (BEP20)
            137 => ['receiveToken' => ['nameCoin' => 'USDT', 'addressCoin' => '0xc2132D05D31c914a87C6611C10748AEb04B58e8F']], // Polygon
            43114 => ['receiveToken' => ['nameCoin' => 'USDT', 'addressCoin' => '0x9702230A8Ea53601f5cD2dc00fDBc13d4dF4A8c7']], // Avalanche C-Chain
            250 => ['receiveToken' => ['nameCoin' => 'USDT', 'addressCoin' => '0x049d68029688eAbF473097a2fC38ef61633A3C7A']], // Fantom Opera
        ];
        return $chainsData;
    }

    // Set 'w3pay_settings' to the path to the /w3pay/frontend/settings/w3pay_settings.json.
    public function getSettingsFiles()
    {
        $SettingsFiles = [
            'w3pay_settings' => $_SERVER['DOCUMENT_ROOT'] . '/w3pay/frontend/settings/w3pay_settings.json',
            'w3pay_settings_default' => __DIR__ . '/w3pay_settings_default.json',
        ];
        return $SettingsFiles;
    }

    // TODO Settings the end
}