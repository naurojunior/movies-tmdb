import { createStore, applyMiddleware } from 'redux';
import thunkMiddleware from 'redux-thunk';
import reduxPromise from 'redux-promise';
import { Reducers } from '../reducers';

const createStoreWithMiddleware = applyMiddleware(thunkMiddleware, reduxPromise)(createStore);

export const Store = createStoreWithMiddleware(Reducers);