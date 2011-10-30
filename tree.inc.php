<?php
/**
 * Gibt ein DOMElement als Baum aus html-Listen aus.
 * Quelle: http://abeautifulsite.net/blog/2007/06/php-file-tree/
 * @param DOMElement $element
 * @return string 
 */
function tree($element) {
    $res = "";
    $nodeList = $element->childNodes;
    $attribList = $element->attributes;

    if (count($nodeList) + count($attribList) > 0) {
        $res .= "<ul>";
        foreach ($attribList as $attrib) {
            $res .= "<li> <div style=\"font-style: italic;\">" . htmlspecialchars($attrib->name . ': ' . $attrib->value) . "</div></li>";
        }
        foreach ($nodeList as $node) {
            if ($node instanceof DOMText) {
                if (!preg_match('/^[\s]*$/', $node->wholeText))
                    $res .= "<li> <div style=\"color: navy;\">" . htmlspecialchars($node->wholeText) . "</div>";
            } else {
                $res .= "<li> <div style=\"font-weight: bold;\">" . htmlspecialchars($node->nodeName) . "</div>";
                $res .= tree($node);
                $res .= "</li>";
            }
        }
        $res .= "</ul>";
    }
    return $res;
}
?>
