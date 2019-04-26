import { searchReducer } from './searchReducer';
import { combineReducers } from 'redux';
export const Reducers = combineReducers({
  movies: searchReducer,
  movie: searchReducer
});