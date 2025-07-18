import sys

if len(sys.argv) < 2:
    print("Usage: python3 binary_converter.py <decimal_number>")
    sys.exit()

decimal_number = int(sys.argv[1])
base = 2
quotient = decimal_number // base
remainder = decimal_number % base

binary_digits = []
binary_digits.insert(0, remainder)

while quotient > 0:
    decimal_number = quotient
    quotient = decimal_number // base
    remainder = decimal_number % base
    binary_digits.insert(0, remainder)

print("".join(map(str, binary_digits)))

