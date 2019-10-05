import cv2
import numpy as np

img = cv2.imread("input\Statue.jpg")
cv2.imshow("image",img)

# masklpf = np.array([[1/9,1/9,1/9],[1/9,1/9,1/9],[1/9,1/9,1/9]], dtype = int)

def bw(img,t):
    for i in range(img.shape[0]):
        for j in range(img.shape[1]):
            if img[i][j] >= t :
                img[i][j] = 255
            else:
                img[i][j] = 0
    return img

def neg(img):
    for i in range(img.shape[0]):
        for j in range(img.shape[1]):
            if img[i][j] == 255:
                img[i][j] = 0
            else:
                img[i][j] = 255

    return img

maskavg = np.ones((5,5),np.float32)/25
# pxrint(masklpf,type(masklpf),maskavg.dtype)

smooth = cv2.(img,-1,maskavg)
# cv2.imshow("smooth",smooth)

smooth1 = cv2.filter2D(smooth,-1,maskavg)
cv2.imshow("smooth1",smooth1)


gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
cv2.imshow("gray",gray)

masklpf = np.ones((3,3),np.float32)/9
gray = cv2.filter2D(gray,-1,masklpf)
cv2.imshow("grayblur",gray)

masksuv = np.array([[-1,-1,-1],[0,0,0],[1,1,1]], dtype = 'float32')
edge1 = cv2.filter2D(gray,-1,masksuv)
# cv2.imshow("edge1",edge1)

masksuh = np.array([[-1,0,1],[-2,0,2],[-1,0,1]], dtype = 'float32')
edge3 = cv2.filter2D(gray,-1,masksuv)
# cv2.imshow("edge3",edge3)

masksuh = np.array([[-1/9,-1/9,-1/9],[-1/9,8.1/9,-1/9],[-1/9,-1/9,-1/9]], dtype = 'float32')
edge2 = cv2.filter2D(gray,-1,masksuh)
cv2.imshow("edge2",edge2)

# cv2.imshow("edge4",edge1+edge3)

sedge = cv2.filter2D(edge2,-1,maskavg)
# cv2.imshow("edgesmooth",sedge)

sedge = cv2.filter2D(sedge,-1,maskavg)
# cv2.imshow("edgesmooth1",sedge)

sedge = cv2.filter2D(sedge,-1,maskavg)
# cv2.imshow("edgesmooth2",sedge)



# thresh = 5
# im_bw = cv2.threshold(edge2, thresh, 255, cv2.THRESH_BINARY)[1]
# cv2.imshow("bw",im_bw)

im_bw1 = bw(edge2,5)
cv2.imshow("bw",im_bw1)


# print(im_bw)
# print(im_bw1)


sbw = cv2.filter2D(im_bw1,-1,masklpf)
cv2.imshow("sbw",sbw)

# thresh = 40
# im_bw = cv2.threshold(sbw, thresh, 255, cv2.THRESH_BINARY)[1]
# cv2.imshow("sbwbw",im_bw)

im_bw1 = bw(sbw,40)
cv2.imshow("sbwbw",im_bw1)

# print(im_bw)

# imgm = cv2.bitwise_not(im_bw1)

imgm = neg(im_bw1)

# print(imgm)
# imgm = np.array(imgm,dtype=np.uint8)
cv2.imshow("-ve",imgm)

# edge2 = cv2.filter2D(edge1,-1,masksuh)
# cv2.imshow("edge3",edge2)
#
# edge2 = cv2.filter2D(edge2,-1,masksuh)
# cv2.imshow("edge4",edge2)

# cv2.imshow("edge3",edge1+edge2)

cartoon = cv2.bitwise_and(smooth1, smooth1, mask=imgm)
cv2.imshow("cartoon",cartoon)

cv2.waitKey(0)
