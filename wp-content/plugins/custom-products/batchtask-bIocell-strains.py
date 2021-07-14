# -*- coding: UTF-8 -*-
#pip install PyMySQL xlwt xlrd
import sys
import getopt
import xlwt
import xlrd
import json
import codecs
from collections import defaultdict
from collections import OrderedDict
import pymysql
import re
import os
import shutil
from slugify import slugify



def insertdb(dic, jsontxt, db, dics):
    cursor = db.cursor()
    des = ''
    if 'Description' in dic:
        des = dic["Description"]
    des = db.escape_string(des)

    productname=''
    if 'Product Name' in dic:
        productname=dic["Product Name"]
    productname=db.escape_string(productname)

    catname=''
    if 'Cat.No' in dic:
        catname=str(dic["Cat.No"])
        catname=catname.replace('.0','')
    catname=db.escape_string(catname)
    cas=''
    if 'CAS Number' in dic:
        cas=str(dic["CAS Number"])
    cas=db.escape_string(cas)

    size=''
    if 'Size/Quantity' in dic:
        size=str(dic["Size/Quantity"])
    size=db.escape_string(size)



    cid=0
    if 'cid' in dic:
        cid=int(dic['cid'])
    cid1=0
    if 'cid1' in dic:
        cid1=int(dic['cid1'])
    cid2=0
    if 'cid2' in dic:
        cid2=int(dic['cid2'])



    sql = "INSERT INTO wp_products(cid,cid1,cid2,cat,productname,cas,size,description,detail) \
        VALUES ('%d','%d','%d','%s','%s','%s','%s','%s', '%s')" % \
        (cid,cid1,cid2,catname,productname,cas,size,des,db.escape_string(jsontxt))

    try:
        cursor.execute(sql)
        id = int(db.insert_id())
        sql = "INSERT INTO wp_products_json(productid,jsontxt) \
        VALUES ('%d', '%s' )" % \
        (id, db.escape_string(jsontxt))
        cursor.execute(sql)
        sql = "INSERT INTO wp_products_search(productid,searchtxt) \
        VALUES ('%d', '%s' )" % \
        (id, db.escape_string(re.sub(r'["|{|}|,|:]',r'',jsontxt)))
        cursor.execute(sql)
        db.commit()
    except:
        db.rollback()
        print("Unexpected error:", sys.exc_info()[1], sql)
        exit()

def updatedb(dic, jsontxt, db, dics):
    cursor = db.cursor()
    des = ''
    if 'Description' in dic:
        des = dic["Description"]
    des = db.escape_string(des)

    productname=''
    if 'Product Name' in dic:
        productname=dic["Product Name"]
    productname=db.escape_string(productname)

    catname=''
    if 'Cat.No' in dic:
        catname=str(dic["Cat.No"])
        catname=catname.replace('.0','')
    catname=db.escape_string(catname)
    cas=''
    if 'CAS Number' in dic:
        cas=str(dic["CAS Number"])
    cas=db.escape_string(cas)

    size=''
    if 'Size/Quantity' in dic:
        size=str(dic["Size/Quantity"])
    size=db.escape_string(size)

    cid=0
    if 'cid' in dic:
        cid=int(dic['cid'])
    cid1=0
    if 'cid1' in dic:
        cid1=int(dic['cid1'])
    cid2=0
    if 'cid2' in dic:
        cid2=int(dic['cid2'])




    sql = "select id from wp_products where cat='%s'" % (catname)
    cursor.execute(sql)
    data = cursor.fetchone()
    id = data[0]
    #print(id)

    sql = "update wp_products set cid=%d,cid1=%d,cid2=%d,cat='%s', \
        productname='%s',size='%s',cas='%s',description='%s',detail='%s' where id=%d" % \
        (cid,cid1,cid2,catname,productname,size,cas,des,db.escape_string(jsontxt),id)
    try:
        cursor.execute(sql)
        #db.commit()
        sql = "update wp_products_json set jsontxt='%s' where productid=%d" % \
            (db.escape_string(jsontxt), id)
        cursor.execute(sql)
        sql = "update wp_products_search set searchtxt='%s' where productid=%d" % \
            (re.sub(r'["|{|}|,|:|\'|\r|\n|\t]', r'', jsontxt), id)
        cursor.execute(sql)
        db.commit()
    except:
        db.rollback()
        print("Unexpected error:", sys.exc_info()[1], sql)

def dotask(infile, outfile):
    book = xlwt.Workbook(encoding='utf-8', style_compression=0)
    sheet = book.add_sheet('data', cell_overwrite_ok=True)

    wb = xlrd.open_workbook(infile)
    #convert_list = []
    sh = wb.sheet_by_index(0)  #0,1,2,3
    print(sh.nrows)
    #sys.exit()

    title = sh.row_values(0)


    db = pymysql.connect(host="localhost",user="root",port=3306,passwd="root",db="cdb")
    #db = pymysql.connect(host="cddbmysql.c8qakfd9b1ln.us-west-1.rds.amazonaws.com",user="nbv2",port=3306,passwd="rQD3V8WlTvXM4Mra",db="nb-v2")
    db.set_charset('utf8')

    sql = 'SELECT cat FROM `wp_products`'
    cursor = db.cursor()
    cursor.execute(sql)
    products = cursor.fetchall()


    dics = {}
    for i in range(len(products)):
        dics[products[i][0].lower()] = ''

    for rownum in range(0, sh.nrows):
        rowvalue = sh.row_values(rownum)
        #single = defaultdict()
        single = OrderedDict()

    for rownum in range(0, sh.nrows):
        rowvalue = sh.row_values(rownum)
        #single = defaultdict()
        single = OrderedDict()

        for colnum in range(0, len(rowvalue)):

            sheet.write(rownum, colnum, rowvalue[colnum])
            if rowvalue[colnum] != '':
                single[title[colnum]] = rowvalue[colnum]
        if rownum == 0:
            sheet.write(rownum, 0, r'json')
        else:
            j = json.dumps(single, skipkeys=False, ensure_ascii=False)
            # print(dics)
            # sys.exit()
            sheet.write(rownum, 0, j)
            cat1=str(single["Cat.No"]).lower()
            cat1=cat1.replace('.0','')
            if cat1.lower() in dics:
                print('update:'+str(single["Cat.No"]))
                updatedb(single, j, db, dics)
            else:
                print('insert:'+str(single["Cat.No"]))
                dics[str(single["Cat.No"])] = ''
                insertdb(single, j, db, dics)

        # convert_list.append(single)

    # j = json.dumps(convert_list)

    # print(j)
    db.close()
    book.save(outfile)

def sanitize_title(title):
    """ Generate filename of the song to be downloaded. """
    title = title.replace('/', '-')

    # slugify removes any special characters
    title = slugify(title)
    return title 


def main(argv):
    inputfile = r'D:\2\6-7591.xlsx'
    outputfile = r'D:\2\2.xls'
    try:
        opts, args = getopt.getopt(argv, "hi:o:", ["ifile=", "ofile="])
    except getopt.GetoptError:
        print('batchtask.py -i <inputfile> -o <outputfile>')
        sys.exit()
    for opt, arg in opts:
        if opt == '-h':
            print('batchtask.py -i <inputfile> -o <outputfile>')
            sys.exit()
        elif opt in ("-i", "--ifile"):
            inputfile = arg
        elif opt in ("-o", "--ofile"):
            outputfile = arg
    print('input file: ', inputfile)
    print('output file: ', outputfile)
    dotask(inputfile, outputfile)


if __name__ == "__main__":
    main(sys.argv[1:])
