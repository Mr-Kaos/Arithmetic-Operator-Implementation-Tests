<?php
/**
 * @author - Kristian Ambrose
 * Tests two inputs A and B and determines if they are suitable for use in a concrete test case.
 * This is primarily designed to be run through php-cli, but could easily be converted into a webpage.
 * 
 */
$A = 5;
$B = 6.2;
$correct = ($A - $B) * 2;
const MODE = 0;

echo "Expected Output: $correct <br>\n";
echo calculate($A, $B, $correct) ? "Test case A=$A, B=$B is SUITABLE!\n" : "| CASE A = $A, B = $B IS NOT SUITABLE! <br>\n";

function calculate($A, $B, $correct) {
	$suitable = true;
	$operators = ['-', '+', '*', '/'];
	$i = 0;
	$j = 0;

	for ($i = 0; $i < 4; $i++) {
		for ($j = 0; $j < 4; $j++) {
			// Exclude the correct implementation
			if (!($i == 0 && $j == 2)) {
				$A1 = p1($A, $B, $operators[$i]);
				$C = p2($A1, $operators[$j]);

				echo 'A=(' . $A . $operators[$i] . $B . ')=' . $A1 . ', C=(' . $A1 . $operators[$j] . '2) = ' . $C . ' ';
				echo "\n";
				if ($C === $correct) {
					$suitable = false;
					break;
				}
			}
		}
		if (!$suitable) {
			break;
		}
	}

	return $suitable;
}

function p1($a, $b, string $op)
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
