<?php 
set_time_limit(10); // Set maximum execution time to 10 seconds.
error_reporting(E_ALL ^E_NOTICE); // Notice errors break the Excel file format.

define('TEXT_FORMAT',     0);
define('NUM_FORMAT',      1);
define('MONEY_FORMAT',    2);
define('DATE_FORMAT',     3);
define('TIME_FORMAT',     4);
define('DATETIME_FORMAT', 5);

vendor('excel_writer/ExcelWriter');
vendor('ole/OleRoot');
vendor('ole/OleFile');

class excelHelper extends ExcelWriter {

  var $workbook;
  var $worksheets = array();
  var $formats    = array();
  
  var $font   = 'Arial';
  var $size   = 10;
  var $align  = 'left';
  var $valign = 'vcenter';
  var $bold   = 0;
  var $italic = 0;

  /**
   * Creates the necessary objects and a temporary Excel file. Sets the
   * directory for temporary file creation and sets the version to
   * Excel 97 (support UTF-8).
   *
   * @param string  $filename  Name of the downloadable file
   */
  function excelHelper($filename = 'data.xls') {
    $this->workbook =& new ExcelWriter();
    $this->workbook->setTempDir(TMP."cache");

    $this->workbook->setVersion(8); // Set workbook to Excel 97 (for UTF-8 support)
  }

  /**
   * Returns an array with parameters that can be used to create an XF
   * formatting array. Default values are overridden when specified in
   * the parameter array.
   *
   * @param  array  $params  Array with parameters to define formatting.
   *                         Keys refer to the style properties.
     * @return string          Formatting array.
   */
  function _getFormatArray($params = NULL) {
    $temp = array('font'   => $this->font,
                  'size'   => $this->size,
                  'bold'   => $this->bold,
                  'italic' => $this->italic,
                  'align'  => $this->align,
                  'valign' => $this->valign);
    if(isset($params)) {
      foreach($params as $key => $value) {
        $temp[$key] = $value;
      }
    }
    return $temp;
  }

  /**
   * Returns the Julian date of the Windows Excel epoch (1 Jan 1900).
   *
      * @return integer  Julian date
   */
  function _GetExcelEpoch() {
    return GregorianToJD(1,1,1900); // Windows Excel epoch
  }

  /**
   * Initializes the default formats that can be used. After changing
   * the default properties this method has to be called to initialize 
   * the formatting arrays.
   */
  function initFormats() {
    // initialize default formats:
    $text = $this->_getFormatArray();
    $text['textwrap'] = 1;
    $text['numformat'] = '@';
    $this->formats[TEXT_FORMAT] =& $this->workbook->addformat($text);

    $num = $this->_getFormatArray();
    $num['align'] = 'right';
    $this->formats[NUM_FORMAT] =& $this->workbook->addformat($num);

    $num['numformat'] = '[$EUR-413] #,##0.00;[$EUR-413] #,##0.00-';
    $this->formats[MONEY_FORMAT] =& $this->workbook->addformat($num);

    $num['numformat'] = 'dd-mm-yyyy';
    $this->formats[DATE_FORMAT] =& $this->workbook->addformat($num);

    $num['numformat'] = 'hh:mm:ss';
    $this->formats[TIME_FORMAT] =& $this->workbook->addformat($num);

    $num['numformat'] = 'dd-mm-yyyy hh:mm:ss';
    $this->formats[DATETIME_FORMAT] =& $this->workbook->addformat($num);
  }

  /**
   * Creates a worksheet in the Excel file, sets its encoding to UTF-8
   * and returns a reference to the worksheet.
   *
   * @param  string  $name  Name of the worksheet.
     * @return object         Worksheet object.
   */
  function &AddWorksheet($name = NULL) {
    $this->worksheets[] =& $this->workbook->addWorksheet($name);
    $this->worksheets[count($this->worksheets) - 1]->setInputEncoding('UTF-8');
    return $this->worksheets[count($this->worksheets) - 1];
  }

  /**
   * Adds a formatting array to the Excel workbook and returns the index
   * of the array.
   *
   * @param  array  $params  Array with parameters to define formatting.
   *                         Keys refer to the style properties.
     * @return integer         Index of the formatting array.
   */
  function AddFormat($params) {
    $this->formats[] =& $this->workbook->addformat($this->_getFormatArray($params));
    return (count($this->formats) - 1);
  }

  /**
   * Adds a color to the color palette of the workbook.
   *
   * @param  integer $index  Index on the color palette. Existing colors
   *                         will automatically be overridden.
   * @param  mixed   $color  Can be an array of Red, Green and Blue values
   *                         or a hexadecimal representation of the color.
   * @return integer         The palette index for the custom color.
   */
  function setColor($index, $color) {
    if(!is_array($color)) {
      $temp = str_split($color, 2);
      $color[] = hexdec($temp[0]);
      $color[] = hexdec($temp[1]);
      $color[] = hexdec($temp[2]);
    }
    return $this->workbook->setCustomColor($index, $color[0], $color[1], $color[2]);
  }

  /**
   * Converts a MySQL Datetime field value to Excel datetime values.
   *
   * @param string  $datetime  MySQL datetime (dd-mm-yyyy hh:mm:ss)
   * @param float              Excel datetime value.
   */
  function MysqlDatetimeToExcel($datetime) {
    $tmp = explode(" ", $datetime);
    $date = explode("-", $tmp[0]);
    if(isset($tmp[1])) $time = explode(":", $tmp[1]);
    $date1 = GregorianToJD($date[1],$date[2],$date[0]);
    $epoch = $this->_GetExcelEpoch();
    $frac = (($time[0] * 60 * 60) + ($time[1] * 60) + $time[2])/(24*60*60);
    
    return ($date1 - $epoch + 2 + $frac);
  }

  /**
   * Converts a UNIX timestamp value to Excel datetime values.
   *
   * @param int  $timestamp  UNIX timestamp
   * @param float            Excel datetime value.
   */
  function TimestampToExcel($timestamp) {
    return $this->MysqlDatetimeToExcel(date("d-m-Y H:i:s", $timestamp));
  }

  /**
   * Writes a $token (string, number, array, link, formula etc.) to the 
   * specified row and column on the specified worksheet.
   *
   * @param  object   $worksheet  Reference to the worksheet
   * @param  integer  $row        Row number (starting at zero; A1 is 0,0)
   * @param  integer  $col        Column number (starting at zero)
   * @param  mixed    $token      Data to write to the worksheet
   * @param  integer  $format     Index of the formatting array to use
   * @return boolean              False when an error occurs, otherwise True.
   */
  function write(&$worksheet, $row, $col, $token, $format = 0) {
    return $worksheet->write($row, $col, $token, $this->formats[$format]);
  }
  
  /**
   * Sends the temporary Excel file as a string to the render engine
   * and clears all objects.
   */
  function OutputFile() {
    $this->workbook->Close();
    echo file_get_contents($this->workbook->filename, "rb");
  }

}
?> 