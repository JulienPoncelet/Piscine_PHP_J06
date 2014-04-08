<?PHP

class			Color
{
	public			$red;
	public			$green;
	public			$blue;
	public static	$verbose = false;

	public static function		doc()
	{
		$doc = fopen("./Color.doc.txt", "r");
		while ($line = fgets($doc))
			print($line);
		fclose($doc);
	}

	public function				__construct(array $av)
	{
		if (isset($av["red"]) && isset($av["green"]) && isset($av["blue"]))
		{
			$this->red = intval($av["red"]);
			$this->green = intval($av["green"]);
			$this->blue = intval($av["blue"]);
		}
		else if (isset($av["rgb"]))
		{
			$rgb = intval($av["rgb"]);
			$this->red = $rgb / 65281 % 256;
			$this->green = $rgb / 256 % 256;
			$this->blue = $rgb % 256;
		}
		if (self::$verbose)
			printf("Color( red: %3d, green: %3d, blue: %3d ) constructed.\n", $this->red, $this->green, $this->blue);
		return ;
	}

	public function				__destruct()
	{
		if (self::$verbose)
			printf("Color( red: %3d, green: %3d, blue: %3d ) destructed.\n", $this->red, $this->green, $this->blue);
		return ;
	}

	public function				add($to_add)
	{
		$new_red = $this->red + $to_add->red;
		$new_green = $this->green + $to_add->green;
		$new_blue = $this->blue + $to_add->blue;
		$new = new Color(array("red" => $new_red, "green" => $new_green, "blue" => $new_blue));
		return ($new);
	}

	public function				sub($to_sub)
	{
		$new_red = $this->red - $to_sub->red;
		$new_green = $this->green - $to_sub->green;
		$new_blue = $this->blue - $to_sub->blue;
		$new = new Color(array("red" => $new_red, "green" => $new_green, "blue" => $new_blue));
		return ($new);
	}

	public function				mult($fact)
	{
		$new_red = $this->red * $fact;
		$new_green = $this->green * $fact;
		$new_blue = $this->blue * $fact;
		$new = new Color(array("red" => $new_red, "green" => $new_green, "blue" => $new_blue));
		return ($new);
	}

	public function				__tostring()
	{
		return (vsprintf("Color( red: %3d, green: %3d, blue: %3d )", array($this->red, $this->green, $this->blue)));
	}
}

?>
