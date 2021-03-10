<?php

class ReaderWriter {
    /**
     * @var Person[]
     */
    public $persons = [];
    
    public function read() {
        $this->persons = [];
        $config = Config::get();
        
        $url = $config['url'];
        $sourceFormat = $config['source_format'];
        if (!in_array($sourceFormat, Config::ALLOWED_SOURCE_FORMATS)) {
            throw new Exception('Unsupported source format');
        }
        
        switch ($sourceFormat) {
            case Config::FORMAT_JSON:
                $content = file_get_contents($url);
                $obj = json_decode($content);

                foreach ($obj as $stdClassPerson) {
                    $person = new Person();
                    $person->populateFromStdClass($stdClassPerson);
                    $this->persons[] = $person;
                }
                break;
            default:
                throw new Exception($sourceFormat . ' source format not implemented');
        }
    }
    
    public function write() {
        $config = Config::get();
        $outputFormat = $config['output_format'];
        $outputTarget = $config['output_target'];
        
        if (!in_array($outputFormat, Config::ALLOWED_OUTPUT_FORMATS)) {
            throw new Exception('Unsupported output format');
        }
        
        if (!in_array($outputTarget, Config::ALLOWED_TARGETS)) {
            throw new Exception('Unsupported target');
        }
        
        switch ($outputTarget) {
            case Config::TARGET_SCREEN:
                //Do nothing
                break;
            default:
                //Add appropriate headers
                throw new Exception($outputTarget . ' target is not implemented');
        }
        
        switch ($outputFormat) {
            case Config::FORMAT_XML:
                header('Content-Type: text/xml');
                echo '<root>';
                foreach ($this->persons as $person) {
                    echo $person->toXml();
                }
                echo '</root>';
                break;
            default:
                throw new Exception($outputFormat . ' output format is not implemented');
        }
        
    }
}
