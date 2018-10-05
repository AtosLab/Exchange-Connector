# @Date    : 2018-10-04
# @Author  : Yamate
# @Email   : yamate.konoha@rio.company

from Utils import *

import psycopg2

from time import gmtime, strftime

def get_symbols(long_polling=None):
    
    params = {}
    if long_polling:
        params['long-polling'] = long_polling
    path = '/v1/common/symbols'
    return api_key_get(params, path)

def get_kline(symbol, period, size=150):
    
    params = {'symbol': symbol,
              'period': period,
              'size': size}

    url = MARKET_URL + '/market/history/kline'
    return http_get_request(url, params)

hostname = 'localhost'
username = 'test'
password = 'test'
database = 'postgres'

def Execute_Query(con, query):
    cur = con.cursor();
    cur.execute( query );
    con.commit();

if __name__ == '__main__':

    symbols = get_symbols();

    cur_date_time = strftime("%Y-%m-%d %H:%M:%S", gmtime())

    pg_con = psycopg2.connect( host=hostname, user=username, password=password, dbname=database )
    
    for symbol in symbols['data'] :

        result = get_kline(symbol['symbol'], "1min");

        if 'data' not in result:
            continue

        for item in result['data'] :

            format_string = "INSERT INTO exchange_rates(date, base_currency, quote_currency, symbol, open_price, max_min, exchange_type) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s')";
            data = (cur_date_time, symbol['base-currency'], symbol['quote-currency'], symbol['symbol'], item['open'], item['high']-item['low'], "huobi");
            query = format_string % data;
        
            Execute_Query( pg_con, query )
    
    pg_con.close()
