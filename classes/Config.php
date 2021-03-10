<?php

class Config {
    const FORMAT_JSON = 'json';
    const FORMAT_XML = 'xml';
    const FORMAT_CSV = 'csv';
    const FORMAT_HTML = 'html';
    
    const TARGET_SCREEN = 'screen';
    const TARGET_FILE = 'file';
    
    const ALLOWED_SOURCE_FORMATS = [
        Config::FORMAT_JSON,
        Config::FORMAT_XML,
        Config::FORMAT_CSV
    ];
    
    const ALLOWED_OUTPUT_FORMATS = [
        Config::FORMAT_XML,
        Config::FORMAT_CSV,
        Config::FORMAT_HTML
    ];
    
    const ALLOWED_TARGETS = [
        Config::TARGET_SCREEN,
        Config::TARGET_FILE
    ];
    
    
    public static function get() {
        return [
            'url' => 'https://www.serveris.lv/cms/test.json',
            'source_format' => 'json',
            'output_target' => 'screen',
            'output_format' => 'xml'
        ];
    }
}
