<?php

namespace Interfaces;

use stdClass;

interface IPopulateableFromStdClass {
    public function populateFromStdClass(stdClass $stdClass);
}