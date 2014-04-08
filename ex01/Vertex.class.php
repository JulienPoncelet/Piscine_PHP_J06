<?PHP

class				Vertex
{
	private			$_x;
	private			$_y;
	private			$_z;
	private			$_w = 1.0;
	private			$_color;
	public static	$verbose = false;

	public function					__construct(array $av)
	{
		if (isset($av["x"]) && isset($av["y"]) && isset($av["x"]))
		{
			$this->_x = $av["x"];
			$this->_y = $av["y"];
			$this->_z = $av["z"];
		}
		if (isset($av["w"]))
			$this->_w = $av["w"];
		if (isset($av["color"]))
			$this->_color = $av["color"];
		else
			$this->_color = new Color (array("red" => 255, "green" => 255, "blue" => 255));
		if (self::$verbose)
			printf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, %s ) constructed\n", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color);
	}

	public function					__tostring()
	{
		if (self::$verbose)
			return (vsprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, %s )", array($this->_x, $this->_y, $this->_z, $this->_w, $this->_color)));
		else
			return (vsprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f )", array($this->_x, $this->_y, $this->_z, $this->_w)));
	}

	public function					__destruct()
	{
		if (self::$verbose)
			printf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, %s ) destructed\n", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color);
	}


	public function					getX() {return $this->_x;}
	public function					getY() {return $this->_y;}
	public function					getZ() {return $this->_z;}
	public function					getW() {return $this->_w;}
	public function					getColor() {return $this->_color;}


	public function					setX($val) {$this->_x = $val;}
	public function					setY($val) {$this->_y = $val;}
	public function					setZ($val) {$this->_z = $val;}
	public function					setW($val) {$this->_w = $val;}
	public function					setColor($val) {$this->_color = $val;}



	public static function			doc()
	{
		$doc = fopen("./Vertex.doc.txt", "r");
		while ($line = fgets($doc))
			print($line);
		fclose($doc);
	}
}

?>
