<?php
$file = 'example2_2018.xml';
$dom = new DomDocument;
$dom->preserveWhiteSpace = false;
$dom->load($file);
$people = $dom->getElementsByTagName('newspaper');

foreach ($people as $person)
{
    $attributes = $person->attributes;
    foreach ($attributes as $index => $attr)
    {
        echo $attr->value;
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
                    echo $text->nodeValue;
                }
            }
            elseif ($text->tagName == "story")
            {
                echo $text->nodeValue;
            }
        }
    }
    echo "</div>";
}
?>
