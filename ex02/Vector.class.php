<?PHP

class				Vector
{
	private			$_x;
	private			$_y;
	private			$_z;
	private			$_w;
	public static 	$verbose = false;



	public function				getX() {return $this->_x;}
	public function				getY() {return $this->_y;}
	public function				getZ() {return $this->_z;}
	public function				getW() {return $this->_w;}



	public function				doc()
	{
		$doc = fopen("./Vector.doc.txt", "r");
		while ($line = fgets($doc))
			print($line);
	}

	public function				magnitude()
	{
		return (sqrt(pow($this->_x, 2) + pow($this->_y, 2) + pow($this->_z, 2)));
	}

	private function			create_new($newX, $newY, $newZ)
	{
		$newVert = new Vertex(array("x" => $newX, "y" => $newY, "z" => $newZ));
		$normVect = new Vector(array("dest" => $newVert));
		return ($normVect);
	}

	public function				normalize()
	{
		$newX = $this->_x / $this->magnitude();
		$newY = $this->_y / $this->magnitude();
		$newZ = $this->_z / $this->magnitude();
		return (self::create_new($newX, $newY, $newZ));
	}

	public function				add($rhs)
	{
		$newX = $this->_x + $rhs->getX();
		$newY = $this->_y + $rhs->getY();
		$newZ = $this->_z + $rhs->getZ();
		return (self::create_new($newX, $newY, $newZ));
	}

	public function				sub($rhs)
	{
		$newX = $this->_x - $rhs->getX();
		$newY = $this->_y - $rhs->getY();
		$newZ = $this->_z - $rhs->getZ();
		return (self::create_new($newX, $newY, $newZ));
	}

	public function				opposite()
	{
		$newX = $this->_x * -1;
		$newY = $this->_y * -1;
		$newZ = $this->_z * -1;
		return (self::create_new($newX, $newY, $newZ));
	}

	public function				scalarProduct($k)
	{
		$newX = $this->_x * $k;
		$newY = $this->_y * $k;
		$newZ = $this->_z * $k;
		return (self::create_new($newX, $newY, $newZ));
	}

	public function				dotProduct($rhs)
	{
		$newX = $this->_x * $rhs->getX();
		$newY = $this->_y * $rhs->getY();
		$newZ = $this->_z * $rhs->getZ();
		return ($newX + $newY + $newZ);
	}

	public function				crossProduct($rhs)
	{
		$newX = $this->_y * $rhs->getZ() - $rhs->getY() * $this->_z;
		$newY = $this->_z * $rhs->getX() - $rhs->getZ() * $this->_x;
		$newZ = $this->_x * $rhs->getY() - $rhs->getX() * $this->_y;
		return (self::create_new($newX, $newY, $newZ));
	}

	public function				cos($rhs)
	{
		return ($this->dotProduct($rhs) / ($this->magnitude() * $rhs->magnitude()));
	}

	public function				__construct(array $av)
	{
		$dest = $av["dest"];
		if (!isset($av["orig"]))
			$orig = new Vertex(array("x" => 0, "y" => 0, "z" => 0));
		else
			$orig = $av["orig"];
		$this->_x = $dest->getX() - $orig->getX();
		$this->_y = $dest->getY() - $orig->getY();
		$this->_z = $dest->getZ() - $orig->getZ();
		$this->_w = 0;
		if (self::$verbose)
			printf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f ) constructed\n", $this->_x, $this->_y, $this->_z, $this->_w);
	}

	public function				__destruct()
	{
		if (self::$verbose)
			printf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f ) destructed\n", $this->_x, $this->_y, $this->_z, $this->_w);
	}

	public function				__tostring()
	{
		return (vsprintf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f )", array($this->_x, $this->_y, $this->_z, $this->_w)));
	}
}

?>
