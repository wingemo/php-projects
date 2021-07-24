<?php
$dom = new DomDocument;
$dom->preserveWhiteSpace = false;
$file = 'example2_2018.xml';
$loadstate = $dom->load($file);
$newspaper_x = new DOMXPath($dom);
$xpathString = "//newspaper";
$newspaper_attributes = $newspaper_x->query($xpathString);
foreach ($newspaper_attributes as $newspaper)
{
    $attr = $newspaper->attributes;
    foreach ($attr as $index => $attr)
    {
        echo "<td>" . $attr->value . "</td>";
    }
    $adom = new DomDocument;
    $otherxml = $dom->saveXML($newspaper);
    $adom->loadXML($otherxml);
    $article_y = new DOMXPath($adom);
    $xpathString = "//article";
    $article_attributes = $article_y->query($xpathString);
    foreach ($article_attributes as $node)
    {
        $attributes = $node->attributes;
        foreach ($attributes as $index => $attr)
        {
            echo "<i>" . $attr->value . "</i>";
        }
        $innerdom = new DomDocument;
        $otherxml = $adom->saveXML($node);
        $innerdom->loadXML($otherxml);
        $article_nodeValue = new DOMXPath($innerdom);
        $xpathString = "//article/heading";
        $article_heading = $article_nodeValue->query($xpathString);
        foreach ($article_heading as $heading)
        {
            echo $heading->nodeValue;
        }
        $xpathString = "//article/story";
        $article_story = $article_nodeValue->query($xpathString);
        foreach ($article_story as $story)
        {
            echo $story->nodeValue;
        }

    }

}
