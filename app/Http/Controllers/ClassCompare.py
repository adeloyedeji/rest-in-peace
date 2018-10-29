from skimage.measure import compare_ssim as ssim
import matplotlib.pyplot as plt
import mysql.connector as mysql
import numpy as np
import subprocess
import sys
import cv2
import os

class ClassCompare(object):
    dbConn = None

    def __init__(self, sysArgs):
        subprocess.call('cls', shell=True)
        result = self.compare_images(sysArgs[1])
        if len(result) > 0:
            for i in result:
                print(i, end=",")
                # print("This class takes an image path and searches our existing database for a match.")
                # print("If a match is found, it gets the file name for the match and stores it in a list.")
                # print("After searching our entire directory, the list is then sent back to our PHP application.")
                # print("Our laravel app would then simply search our db using those image names and display the list of possible matches")
        else:
            print("401", end=",")
            # no match found.

    def list_files(self):
        images = list()
        for dirname, dirnames, filenames in os.walk('C:/wamp64/www/fcda/storage/app/public/beneficiaries/avatars'):
            for filename in filenames:
                i = os.path.join(dirname, filename)
                i = i.replace("\\", "/")
                # print("{0}".format(i))
                # images.append(os.path.join(dirname, filename))
                images.append(i)
        return images

    def cleanse_image(self, img):
        # img_file = cv2.imread(img.replace("\\", "/"))
        # print("Cleansing image: {0}".format(img))
        img_file = cv2.imread(img)
        img_file = cv2.cvtColor(img_file, cv2.COLOR_BGR2GRAY)
        return img_file

    def compare_images(self, img):
        similar_images = list()
        files = self.list_files()
        img = "C:/wamp64/www/fcda/storage/app/" + img
        image2 = self.cleanse_image(img)
        for i in files:
            image1 = self.cleanse_image(i)
            s = ssim(image1, image2)
            if s == 1:
                # print("image file: {0} is a direct match with image {1}".format(i, img))
                user_id = self.db_connection("localhost", "root", "", "fcda_master", i)
                similar_images.append(user_id)
            elif s >= 0.5:
                # print("image file: {0} has similarities with image {1}".format(i, img))
                user_id = self.db_connection("localhost", "root", "", "fcda_master", i)
                similar_images.append(user_id)
            else:
                # print("image file: {0} bears no similarity to image {1}".format(i, img))
                pass
        return similar_images

    @classmethod
    def db_connection(self, host, username, password, dbname, image):
        # image = "public/" + image
        # image = image[43:]
        image = image[31:]
        # print("Searching db for photo: {0}".format(image))
        image = image.replace("\\", "/")
        # print("Searching db for photo: {0}".format(image))
        self.dbConn = mysql.connect(
            host = host,
            user = username,
            passwd = password,
            database = dbname
        )
        mycursor = self.dbConn.cursor()
        query = "SELECT id FROM beneficiaries WHERE household_head_photo = %s"
        img = (image, )
        mycursor.execute(query, img)
        myresult = mycursor.fetchone()
        return myresult[0]


if __name__ == "__main__":
    d = ClassCompare(sys.argv)