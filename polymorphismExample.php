<?php
// Defining class
class poly_base_Article {

	public $title;
	public $author;
	public $date;
	public $category;
	
	public function  __construct($title, $author, $date, $category = 0) {
	    $this->title = $title;
	    $this->author = $author;
	    $this->date = $date;
	    $this->category = $category;
	}

	// write function still has to be defined in defining class
	// Uses Type-Hinted Writer interface to ensure the contract is fulfilled 
    public function write(poly_writer_Writer $writer) {
        return $writer->write($this); // Uses write method of whichever Writer implementation is used
    }
}

//       ^^^^^

// Contract between
interface poly_writer_Writer {
    public function write(poly_base_Article $obj);
}
//       vvvvv


// Implementation 1
class poly_writer_XMLWriter implements poly_writer_Writer {
    public function write(poly_base_Article $obj) {
        $ret = '<article>';
        $ret .= '<title>' . $obj->title . '</title>';
        $ret .= '<author>' . $obj->author . '</author>';
        $ret .= '<date>' . $obj->date . '</date>';
        $ret .= '<category>' . $obj->category . '</category>';
        $ret .= '</article>';
        return $ret;
    }
}
// Implementation 2
class poly_writer_JSONWriter implements poly_writer_Writer {
    public function write(poly_base_Article $obj) {
        $array = array('article' => $obj);
        return json_encode($array);
    }
}


// "Obtaining a Writer" example
// There are lots of ways to get the type of Writer to use
// class poly_base_Factory {
//     public static function getWriter() {
//         // grab request variable
//         $format = $_REQUEST['format'];
//         // construct our class name and check its existence
//         $class = 'poly_writer_' . $format . 'Writer';
//         if(class_exists($class)) {
//             // return a new Writer object
//             return new $class();
//         }
//         // otherwise we fail
//         throw new Exception('Unsupported format');
//     }
// }


// Everything-has-been-put-together client code
$article = new poly_base_Article('Polymorphism', 'Steve', time(), 0);
 
try {
    $writer = poly_base_Factory::getWriter();
}
catch (Exception $e) {
    $writer = new poly_writer_XMLWriter();
}
 
echo $article->write($writer);