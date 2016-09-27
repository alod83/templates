import numpy as np
from math import floor
from math import copysign

def get_position(x,cx,type):
    if cx > 0:
        if type == "lng":
            xg = copysign(floor((abs(x)/cx)%180),x)
            if xg == -0:
                xg = 0 
        else:
            xg = floor(x/cx)
    else:
        xg = -1
    return xg

# x/cx + x1
# get position in the grid
def get_position_in_grid(x, y, cx, cy):
    xg = get_position(x,cx,"lng")
    yg = get_position(y,cy,"lat")
    return np.array([xg, yg])

