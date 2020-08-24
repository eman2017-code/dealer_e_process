/**
 * FOR THE FOLLOWING CLASSES
 * - Identify any/all invalid code, and a way to fix

 * - Identify any/all logic flaws

 * - Any other changes and why
 */

<?php
class Shape
{
    public $name;
    
	protected $sides = array();

	private $side_count;

	public abstract function area();

	public function __construct(array $sides)
	{
		$this->side_count = count($sides);
	}

	public function perimeter()
	{
		$perimeter = 0;
		foreach ($sides as $side) {
			$perimeter += $side;
		}
		return $perimeter;
	}
}

class Rectangle extends Shape
{
    // no need to include this, there is already a public function in Shape (so there is no need to redefine this)
	public function __construct(array $sides)
	{
        parent::__construct($sides);
        
        $this->name = 'Rectangle';

        //even if the opposite sides are the same, that does not mean that all 4 sides are the same
        //rectangle's perimeters are not all equal, only 1 set of 2 are
		// if (($this->side_count == 4) && ($sides[0] == $sides[2]) && ($sides[1] == $sides[3])) {

        // 	$this->sides = $sides;

        //INSTEAD I WOULD GO ABOUT IT LIKE THIS...

       // first check if this is rectangle (just to be as thourough as possible)
       if(($this->side_count == 4)) {

        // since we know that this is rectangle
        // check to see is the opposite sides are the same
        if ($sides[0] == $sides[2] && $sides[1] == $sides[3]) {

            // if thhey are the same 
            // check to make that not all the sides are the same
            if($sides[0] != $sides[3] && $sides[1] != $sides[2]) {

             // then we are able to verify
                $this->sides = $sides;
            }
        }
    }
     else {
        throw new InvalidArgumentException('Invalid side data for a rectangle');
     }
	}

	public function area()
	{
		return $this->sides[0] * $this->sides[1];
    }
}



// class Square extends Rectangle
class Square extends Shape
{
	public function __construct(array $sides)
	{
		$this->name = 'Square';

		parent::__construct($sides);

        //must check that all 4 sides have the same value

		// if ($sides[0] == $sides[1]) {
        // 	$this->sides = $sides;
        
        // this will pass only if all the values are the same
        // 1 + 1 == 1 + 1
        if ($sides[0] + $sides[1] == $sides[2] + $sides[3]) {

            $this->$sides = $sides;

		} else {

			throw new InvalidArgumentException('Invalid side data for a square');

		}

    }
    
	public function __toString()
	{
		return 'A '.$this->name.' with side length of '.$this->sides[0];
	}

}



class Triangle extends Shape
{
	public function __construct(array $sides)
	{
		$this->name = 'Triangle';

		parent::__construct($sides);

		if ($this->side_count == 3) {

			$this->sides = $sides;

		} else {
			throw new InvalidArgumentException('Invalid side data for a triangle');
		}
	}
}
?>

