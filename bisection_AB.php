<?php
/**
 * Performs the Bisection algorithm on value B to find a value of A in which a concrete test case would fail.
 * Loops through values of B at increments of 0.1 and determines values for A in which a test is not suitable.
 * Also outlines the specific equations which the test failed on.
 */
const PRECISION = 0.00001;
$b = -10;
$i = 0;
$j = 0;
$operators = ['-', '+', '*', '/'];

while ($b <= 10) {
	for ($i = 0; $i < 4; $i++) {
		for ($j = 0; $j < 4; $j++) {
			// Exclude the correct implementation
			if (!($i == 0 && $j == 2)) {
				// $diff = difference($a, $operators[$i], $operators[$j]);
				echo 'Equation: (A' . $operators[$i] . 'B)' . $operators[$j] . 2 . ": ";
				$bissect = bisection($operators[$i], $operators[$j], $b);
				echo "BISECTION: " . (is_null($bissect) ? "INFINITE LOOP ERROR" : "A=" . round($bissect, 2) . ", B=$b") . "\n";
			}
		}
	}
	$b += 0.1;
}

/**
 * Performs the bisection algorithm on the correct and incorrect implementation to find the value for A in
 * which the test case does not satisfy the testing objective.
 * A hard limit of 1,000 iterations is set to prevent infinite loops on equations where a value for A cannot be found.
 * This limit may need to be changed depending on the value of B passed into the function.
 * @return float The bisection of the two equations - i.e. the value of A.
 */
function bisection($op1, $op2, $b) {
    $l = -100;
    $u = 100;
    $mid = ($l + $u) / 2;

    $limit = 0;
    while (abs(difference($mid, $b, $op1, $op2)) > PRECISION & $limit < 1000) {
        // If the difference between the lower times the difference of the midpoint is positive, set lower to middle.
        if ((difference($l, $b, $op1, $op2) * difference($mid, $b, $op1, $op2)) > 0) {
            $l = $mid;
        } else {
            $u = $mid;
        }

        $mid = ($l + $u) / 2;
        $limit++;
    }

    if ($limit === 1000) {
        $mid = null;
    }
    return $mid;
}

/**
 * Returns the difference between the correct implementation and the incorrect implementation.
 */
function difference($a, $b, $op1, $op2) {
    return (($a - $b) * 2) - p2(p1($a, $b, $op1), $op2);
}

/**
 * Calcualtes the value A using the specified operator.
 * Based on second equation A = (A - B)
 */
function p1($a, $b, $op)
{
	$result = null;
	switch ($op) {
		case '+':
			$result = $a + $b;
			break;
		case '-':
			$result = $a - $b;
			break;
		case '*':
			$result = $a * $b;
			break;
		case '/':
			$result = $a / $b;
			break;
	}
	return $result;
}
/**
 * Calcualtes the output C using the specified operator.
 * Based on second equation C = (A * 2)
 */
function p2($a, $op)
{
	$result = null;
	switch ($op) {
		case '+':
			$result = $a + 2;
			break;
		case '-':
			$result = $a - 2;
			break;
		case '*':
			$result = $a * 2;
			break;
		case '/':
			$result = $a / 2;
			break;
	}
	return $result;
}