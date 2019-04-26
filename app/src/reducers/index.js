import { movieReducer } from './movieReducer';
import { combineReducers } from 'redux';
export const Reducers = combineReducers({
  movies: movieReducer,
  movie: movieReducer
});