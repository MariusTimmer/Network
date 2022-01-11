<?php

/**
 * This abstract class just provides the magic __toString method which means
 * that all children of this class will implement it and can e printed as a
 * simple string which makes the handling of it very easy when printing out
 * the HTML-Code.
 * @date 2017-03-24
 * @since 0.1
 * @author Marius Timmer
 */
abstract class Element {

    /**
     * The default toString method will be used to create the HTML-Code of the element.
     * @return String HTML-Code
     */
    abstract public function __toString();

}