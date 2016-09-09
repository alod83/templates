import os
import sys

path = "../geo/"
sys.path.append(os.path.abspath(path))
from geo import get_position_in_grid

# area boundaries
x1 = 1
x2 = 4
y1 = 0
y2 = 5

# cell size
cx = 0.3
cy = 0.2

# point to be checked
x = 2.0
y = 2.9

print get_position_in_grid(x, y, cx, cy, x1, y1)
