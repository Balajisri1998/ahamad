#!/usr/bin/env python
# coding: utf-8

# In[106]:


#Importing the libraries
import numpy as np
import pandas as pd
import matplotlib.pyplot as plt
import seaborn as sns
pd.set_option("display.max_columns",100)


# In[107]:


df=pd.read_csv("C:\\Users\\infiniti\\Desktop\\Encode\\kli\\kli_data.csv")
df.shape


# In[108]:


df.head()


# In[109]:


df.tail()


# In[110]:


train=df[0:102]
test=df[102:125]


# In[111]:


print(train.shape)
print(test.shape)


# In[112]:


train.tail()


# In[113]:


test.head()


# In[114]:


test.tail()


# In[115]:


train.drop(["Week_Number","Year"],axis=1,inplace=True)
test.drop(["Week_Number","Year"],axis=1,inplace=True)
train.set_index("weeks_year",inplace=True)
test.set_index("weeks_year",inplace=True)


# In[116]:


train.head()


# In[117]:


train.tail()


# In[118]:


test.head()


# In[119]:


test.tail()


# In[120]:


from statsmodels.tsa.stattools import adfuller
def test_stationarity(timeseries):
    plt.figure(figsize=(12,8))
    #Determing rolling statistics
    rolmean = timeseries.rolling(window=7).mean()
    rolstd = timeseries.rolling(window=7).std()

    #Plot rolling statistics:
    orig = plt.plot(timeseries, color='blue',label='Original')
    mean = plt.plot(rolmean, color='red', label='Rolling Mean')
    std = plt.plot(rolstd, color='black', label = 'Rolling Std')
    plt.legend(loc='best')
    plt.title('Rolling Mean & Standard Deviation')
    plt.show(block=False)


# In[121]:


test_stationarity(df["Amount"])


# In[122]:


#Decompose with additive modeling where it includes the random noises
from statsmodels.tsa.seasonal import seasonal_decompose
result = seasonal_decompose(df["Amount"], model='additive', freq=7)
result.plot()
plt.show()


# In[123]:


#Decompose with multiplicative modeling where it eliminates the random noises by squaring it
from statsmodels.tsa.seasonal import seasonal_decompose
result1= seasonal_decompose(df["Amount"], model='multiplicative', freq=7)
result1.plot()
plt.show()


# In[124]:


#To determine whether the autocorrelation is present using Durbin watson test
from statsmodels.regression.linear_model import OLS
from statsmodels.stats.stattools import durbin_watson
def dw(df):
    ols_res = OLS(df, np.ones(len(df))).fit()
    return durbin_watson(ols_res.resid)
print("dw of range=%f" % dw(np.arange(2000)))
print("dw of rand=%f" % dw(np.random.randn(2000)))
#Now we can see the range value is 0.000003 which is between the range 0-2
#since it is very close to zero it has strong positive autocorrelation


# In[125]:


#define function for ADF test
from statsmodels.tsa.stattools import adfuller
def adf_test(timeseries):
    #Perform Dickey-Fuller test:
    print ('Results of Dickey-Fuller Test:')
    dftest = adfuller(timeseries, autolag='AIC')
    dfoutput = pd.Series(dftest[0:4], index=['Test Statistic','p-value','#Lags Used','Number of Observations Used'])
    for key,value in dftest[4].items():
       dfoutput['Critical Value (%s)'%key] = value
    print (dfoutput)
#apply adf test on the series
adf_test(df["Amount"])
#Test statistics is lesser than the critical value so the series is stationary


# In[126]:


#define function for kpss test
from statsmodels.tsa.stattools import kpss
#define KPSS
def kpss_test(timeseries):
    print ('Results of KPSS Test:')
    kpsstest = kpss(timeseries, regression='c')
    kpss_output = pd.Series(kpsstest[0:3], index=['Test Statistic','p-value','Lags Used'])
    for key,value in kpsstest[3].items():
        kpss_output['Critical Value (%s)'%key]=value
    print(kpss_output)
#apply kpss test on the series
kpss_test(df["Amount"])
#Test statistics is lesser than the critical value so the series is stationary


# In[127]:


#Plotting data
train.Amount.plot(figsize=(4,3), title= 'Amount', fontsize=14)
test.Amount.plot(figsize=(4,3), title= 'Amount', fontsize=14)
plt.show()


# In[128]:


#Now both the test confirms that the series is stationary apply Simple Exponential smoothing model to it
#From the graphical analysis we are sure that there is no trend or seasonality in our data So we go for
# Simple Exponential Smoothing-with alpha=0.3
from statsmodels.tsa.api import ExponentialSmoothing, SimpleExpSmoothing, Holt
y_hat_avg = test.copy()
fit2 = SimpleExpSmoothing(np.asarray(train['Amount'])).fit(smoothing_level=0.0001,optimized=False)
y_hat_avg['SES'] = fit2.forecast(len(test))
plt.figure(figsize=(8,6))
plt.plot(train['Amount'], label='Train')
plt.plot(test['Amount'], label='Test')
plt.plot(y_hat_avg['SES'], label='SES')
plt.legend(loc='best')
plt.show()


# In[129]:


y_hat_avg['SES']


# In[130]:


#Calculate mse & rmse for SES
from sklearn.metrics import mean_squared_error
from math import sqrt
meanSquaredError=mean_squared_error(test['Amount'], y_hat_avg.SES)
print("MSE:", meanSquaredError)
rootMeanSquaredError = sqrt(meanSquaredError)
print("RMSE:", rootMeanSquaredError)


# In[131]:


#Moving average
y_hat_avg = test.copy()
y_hat_avg['moving_avg_forecast'] = train['Amount'].rolling(3).mean().iloc[-1]
plt.figure(figsize=(8,6))
plt.plot(train['Amount'], label='Train')
plt.plot(test['Amount'], label='Test')
plt.plot(y_hat_avg['moving_avg_forecast'], label='Moving Average Forecast')
plt.legend(loc='best')
plt.show()


# In[132]:


y_hat_avg['moving_avg_forecast']


# In[133]:


#Calculate mse & rmse for MA
from sklearn.metrics import mean_squared_error
from math import sqrt
meanSquaredError=mean_squared_error(test['Amount'],y_hat_avg['moving_avg_forecast'])
print("MSE:", meanSquaredError)
rootMeanSquaredError = sqrt(meanSquaredError)
print("RMSE:", rootMeanSquaredError)


# In[134]:


from statsmodels.graphics.tsaplots import plot_acf
plot_acf(df.Amount,lags=14)
plt.show()


# In[135]:


from statsmodels.graphics.tsaplots import plot_pacf
plot_pacf(df.Amount,lags=14)
plt.show()


# In[136]:


import itertools
p = d = q = range(0, 3)
pdq = list(itertools.product(p, d, q))
seasonal_pdq = [(x[0], x[1], x[2],7 ) for x in list(itertools.product(p, d, q))]
print('Examples of parameter combinations for Seasonal ARIMA...')
print('SARIMAX: {} x {}'.format(pdq[1], seasonal_pdq[1]))
print('SARIMAX: {} x {}'.format(pdq[1], seasonal_pdq[2]))
print('SARIMAX: {} x {}'.format(pdq[2], seasonal_pdq[3]))
print('SARIMAX: {} x {}'.format(pdq[2], seasonal_pdq[4]))


# In[103]:


import statsmodels.api as sm
for param in pdq:
    for param_seasonal in seasonal_pdq:
        
            mod = sm.tsa.statespace.SARIMAX(train["Amount"],
                                            order=param,
                                            seasonal_order=param_seasonal,
                                            enforce_stationarity=False,
                                            enforce_invertibility=False)
            results = mod.fit()
            print('SARIMA{}x{}7 - AIC:{}'.format(param, param_seasonal, results.aic))


# In[ ]:


ARIMA(2, 1, 2)x(0, 2, 2, 7)7 - AIC:2079.8385961558274


# In[137]:


train.tail()


# In[138]:


test.tail()


# In[139]:


import statsmodels.api as sm
y_hat_avg = test.copy()
fit1 = sm.tsa.statespace.SARIMAX(train.Amount, order=(2, 0, 2),seasonal_order=(2,2,2,7)).fit()
y_hat_avg['SARIMA'] = fit1.predict(start=105, end=129, dynamic=True)
plt.figure(figsize=(8,4))
plt.plot( train['Amount'], label='Train')
plt.plot(test['Amount'], label='Test')
plt.plot(y_hat_avg['SARIMA'], label='SARIMA')
plt.legend(loc='best')
plt.show()


# In[140]:


y_hat_avg['SARIMA']


# In[141]:


#Calculate mse & rmse for sarimax
from sklearn.metrics import mean_squared_error
from math import sqrt
meanSquaredError=mean_squared_error(test['Amount'],y_hat_avg['SARIMA'])
print("MSE:", meanSquaredError)
rootMeanSquaredError = sqrt(meanSquaredError)
print("RMSE:", rootMeanSquaredError)


# In[142]:


test["predicted"]=y_hat_avg["SARIMA"]
test.head()


# In[143]:


test["predicted"]=test["predicted"].astype("int32")
test


# In[144]:


plt.plot(test['Amount'], label='actual')
plt.plot(test['predicted'], label='predicted')
plt.legend(loc='best')
plt.show()


# In[ ]:


import statsmodels.api as sm
for param in pdq:
    for param_seasonal in seasonal_pdq:
        
            mod = sm.tsa.statespace.SARIMAX(df["Amount"],
                                            order=param,
                                            seasonal_order=param_seasonal,
                                            enforce_stationarity=False,
                                            enforce_invertibility=False)
            results = mod.fit()
            print('SARIMA{}x{}7 - AIC:{}'.format(param, param_seasonal, results.aic))


# In[ ]:


SARIMA(0, 0, 2)x(0, 2, 2, 7)7 - AIC:2756.7590501587865
SARIMA(0, 1, 2)x(2, 2, 2, 7)7 - AIC:2750.7295981905936


# In[ ]:


df.tail()


# In[ ]:


fit2 = sm.tsa.statespace.SARIMAX(df.Amount, order=(0, 1, 2),seasonal_order=(2, 2, 2, 7)).fit()
Next_10weeks = fit2.predict(start=130, end=139, dynamic=True)
plt.figure(figsize=(8,4))
plt.plot( df['Amount'], label='df')
plt.plot(Next_10weeks, label='SARIMA')
plt.legend(loc='best')
plt.show()


# In[49]:


#p,d,q  p = periods taken for autoregressive model
#d -> Integrated order, difference
# q periods in moving average model
from statsmodels.tsa.arima_model import ARIMA
model_arima = ARIMA(train,order=(3, 2, 0))
model_arima_fit = model_arima.fit()
print(model_arima_fit.aic)


# In[50]:


predictions= model_arima_fit.forecast(steps=10)[0]
predictions


# In[51]:


plt.plot(test)
plt.plot(predictions,color='red')


# In[53]:


import itertools
p=d=q=range(0,4)
pdq = list(itertools.product(p,d,q))
pdq


# In[54]:


import warnings
warnings.filterwarnings('ignore')
for param in pdq:
    try:
        model_arima = ARIMA(train,order=param)
        model_arima_fit = model_arima.fit()
        print(param,model_arima_fit.aic)
    except:
        continue


# In[ ]:





# In[ ]:





# In[ ]:





# In[ ]:





# In[ ]:





# In[ ]:





# In[ ]:




