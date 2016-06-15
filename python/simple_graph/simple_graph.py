# This script plots multiple graphs into a single plot.
# The i-th series is contained in the file data/datai.csv
# The structure of the file is (x,y): first column is x, second column is y

import matplotlib.pyplot as plt
import numpy as np

num_files = 2 # Set the number of files manually

plt.xlabel('x label')
plt.ylabel('y label')
plt.title('Graph Title')

# This function is used to determine the max and min for the y and x axis
def check(v1,v2,type):
    if type is "min":
        if(v1 == -1):
            return v2
        return v1 
    else:
        return v2
        

x_min = -1
y_min = -1
x_max = -1
y_max = -1

for i in range(1,num_files+1):
    # plot each series in the graph
    data = np.genfromtxt('data/data' + str(i) + '.csv', delimiter=',')
    x = data[:,0]
    y = data[:,1]
    x_min = check(x_min,x.min(), "min")
    y_min = check(y_min,y.min(), "min")
    x_max = check(x_max,x.max(), "max")
    y_max = check(y_max,y.max(), "max")
    plt.axis([x_min, x_max, y_min, y_max])
    plt.plot(x, y,'o',label="Series " + str(i))
    
plt.legend()
plt.show()
