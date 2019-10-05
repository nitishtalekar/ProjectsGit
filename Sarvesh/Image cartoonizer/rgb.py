import cv2
import numpy as np

img = cv2.imread("input\River.jpg")
cv2.imshow("image",img)
b,g,r = cv2.split(img)
x = b.shape[0]
y = b.shape[1]

maskavg = np.ones((5,5),np.float32)/25
masksuh = np.array([[-1,-1,-1],[-1,8.25,-1],[-1,-1,-1]], dtype = 'float32')
masklpf = np.ones((3,3),np.float32)/9

def mm(x,y,img,mask):
    op = np.ndarray(shape=(x,y), dtype='uint8')
    s = int(0)
    for i in range(x):
        for j in range(y):
            mx = -1
            my = -1
            s = 0
            for l in range(mask.shape[0]):
                my = -1
                for m in range(mask.shape[1]):
                    if i+mx >=0 and j+my >=0 and i+mx < x and j+my < y:
                        s = s + (img[i+mx][j+my] * mask[l][m])
                    my = my + 1
                mx = mx + 1
            op[i][j] = s
        print(i)

    return op

def grayscale(x,y,r,g,b):
    op = np.ndarray(shape=(x,y), dtype='uint8')
    for i in range(x):
        for j in range(y):
            op[i][j] = r[i][j] * 0.3 + g[i][j] * 0.59 + b[i][j] * 0.11

        print(i)
    return op

cv2.imwrite("op\img.jpg",img)
bop = mm(x,y,b,maskavg)
gop = mm(x,y,g,maskavg)
rop = mm(x,y,r,maskavg)
# gray = grayscale(x,y,rop,gop,bop)
# cv2.imshow("gray",gray)

gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
cv2.imwrite("op\gray.jpg",gray)

gray = mm(x,y,gray,masklpf)
cv2.imshow("grayblur",gray)
cv2.imwrite("op\grayblur.jpg",gray)

edge = mm(x,y,gray,masksuh)
cv2.imshow("edge",edge)
cv2.imwrite("op\edge.jpg",edge)

imgm = (np.log(edge+1)/(np.log(1+np.max(edge))))*255
imgm = np.array(imgm,dtype=np.uint8)
cv2.imshow("-ve",imgm)
cv2.imwrite("op\imgm.jpg",imgm)
print(edge,imagm)

# edge1 = mm(x,y,gray1,masksuh)
# cv2.imshow("edge",edge1)

merge = cv2.merge((bop,gop,rop))
cv2.imshow("merge",merge)
cv2.imwrite("op\merge.jpg",merge)

cartoon = cv2.bitwise_and(merge, merge, mask=imagem)
cv2.imshow("cartoon",cartoon)

cv2.waitKey(0)
