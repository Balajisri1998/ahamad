import bottle
import pandas as pd
import numpy as np
import lightgbm as lgbm
import pickle
import gc
import warnings
from bottle import Bottle, run, post,request,response
from sklearn.model_selection import train_test_split,GridSearchCV
from sklearn import metrics
warnings.filterwarnings('ignore')
import matplotlib.pyplot as plt
import seaborn as sns
pd.set_option("display.max_columns",1000)

app = Bottle()
import PreprocessData as dp

class EnableCors(object):
    name = 'enable_cors'
    api = 2

    def apply(self, fn, context):
        def _enable_cors(*args, **kwargs):
            # set CORS headers
            response.headers['Access-Control-Allow-Origin'] = '*'
            response.headers['Access-Control-Allow-Methods'] = 'GET, POST, PUT, OPTIONS'
            response.headers['Access-Control-Allow-Headers'] = 'Origin, Accept, Content-Type, X-Requested-With, X-CSRF-Token'

            if bottle.request.method != 'OPTIONS':
                # actual request; reply with the actual response
                return fn(*args, **kwargs)

        return _enable_cors

@app.route('/OOHFare', method=['POST'])
def OOHFare():
	df=pd.read_csv("/home/ec2-user/bala/kli_data.csv")



