import numpy as np

def get_position(x,cx,x_min):
    if cx > 0:
        xg = round((x - x_min)/cx + x_min)
    else:
        xg = -1
    return xg

# (x - x1)/cx + x1
# get position in the grid
def get_position_in_grid(x, y, cx, cy, x_min, y_min):
    xg = get_position(x,cx,x_min)
    yg = get_position(y,cy,y_min)
    return np.array([xg, yg])

