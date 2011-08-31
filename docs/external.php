<?php
/**
 *    Identify external dependancies for library classes
 *    for purposes of phpDocumentor inclusion
 *
 *    !!!WARNING! WARNING! WARNING!!!
 *            Do not include this file in the project code.
 *            It will cause the application to break. This file
 *            is for documentation only.
 *    !!!WARNING! WARNING! WARNING!!!
 *
 *    @author        Jason E. Sweat
 *    @since        2004-11-20
 *    @version    $Id: external.php,v 1.1 2005/11/15 10:37:09 pointbeing Exp $
 *    @package    PHPTuring
 *    @subpackage    external
 */
    
/**#@+
 * SimpleTest
 * @link http://simpletest.sf.net/
 */
class UnitTestCase {}
#class WebTestCase {}
/**#@-*/
    
/**#@+
 * WACT
 * Web Application Component Toolkit
 * @link http://wact.sf.net/
 */
#class WACT {}
#class FormView {}
#class ArrayDataSet extends WACT {}
#class DataSpace extends WACT {}
#class DatasetDecorator extends WACT {}
/**#@-*/
    
/**#@+
 * SPL
 * Standard PHP Library
 * @link http://www.php.net/~helly/php/ext/spl/
 */
#class Exception {}
/**#@-*/

?>