<?php

use App\Framework\Support\TemplateReader;

include '../framework.php';

$framework = new App\Framework\Framework();
$parsedContent = $framework->parse(
    template('sample.pfxml'),
    (new TemplateReader)
);

pre($parsedContent);