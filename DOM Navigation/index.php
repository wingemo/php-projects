<?php
$file = 'example2_2018.xml';
$dom = new DomDocument;
$dom->preserveWhiteSpace = false;
$dom->load($file);
$people = $dom->getElementsByTagName('newspaper');
$output = array();

foreach ($people as $person)
{
    $data = array();
    $attributes = $person->attributes;
    foreach ($attributes as $index => $attr)
    {
        array_push($data, $attr->value);
    }
    foreach ($person->childNodes as $article)
    {
        $attributes = $article->attributes;
        foreach ($article->childNodes as $text)
        {
            if ($text->tagName == "heading")
            {
                foreach ($text->childNodes as $heading)
                {
                    array_push($data, $text->nodeValue);
                }
            }
            elseif ($text->tagName == "story")
            {
                array_push($data, $text->nodeValue);
            }
        }
    }
     array_push($output, $data);
}

print(json_encode($output));

?>
