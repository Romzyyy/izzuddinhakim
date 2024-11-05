<?php

namespace App\Helpers;

class HtmlTrimmer
{
    public static function trimHtml($html, $limit)
    {
        $doc = new \DOMDocument();
        libxml_use_internal_errors(true);
        $doc->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
        libxml_clear_errors();

        $body = $doc->getElementsByTagName('body')->item(0);
        $content = self::limitText($body, $limit);

        return $content;
    }

    private static function limitText($node, $limit, &$textLength = 0)
    {
        $result = '';
        if ($node->nodeType == XML_TEXT_NODE) {
            $remaining = $limit - $textLength;
            if ($remaining <= 0) {
                return '';
            }
            $text = substr($node->nodeValue, 0, $remaining);
            $textLength += strlen($text);
            return htmlentities($text);
        }

        if ($node->nodeType == XML_ELEMENT_NODE) {
            $result .= '<' . $node->nodeName;
            foreach ($node->attributes as $attr) {
                $result .= ' ' . $attr->nodeName . '="' . $attr->nodeValue . '"';
            }
            $result .= '>';
        }

        foreach ($node->childNodes as $childNode) {
            $result .= self::limitText($childNode, $limit, $textLength);
            if ($textLength >= $limit) {
                break;
            }
        }

        if ($node->nodeType == XML_ELEMENT_NODE) {
            $result .= '</' . $node->nodeName . '>';
        }

        return $result;
    }
}
