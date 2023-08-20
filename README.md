# Arithmetic Operator Implemntation Test Case Identifier

This is a simple program which aims to prove that the program `C = (A-B)*2` is implemented correctly. The specified "errors" in implementation of this program are the use of arithmetic operators, where they could be potentially be either `+`, `-`, `/` or `*` instead of the two in the program above.

From these potential incorrect implemtnations, the two scripts in this repository find and test values for inputs A and B which can prove that the program has been implemented correctly and that any other operators have not been used instead.

`bisection_AB.php` loops through a range of values for input B and identifies values for A in which the test case would fail.

`ValueTester.php` tests two inputs A and B and determines if they are a suitable concrete test case.
