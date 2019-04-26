import { MOVIE_LIST_SEARCH_TYPE, LOAD_MOVIES } from '../actions/actionTypes';
const initialState = {
  movies: []
};

export const searchReducer = (state = initialState, action) => {
  switch (action.type) {
    case MOVIE_LIST_SEARCH_TYPE:
      return {
        ...state,
        movies: action.movies
      };
    case LOAD_MOVIES:
      console.log('oi')
      return {
        ...state,
        movies: action.movies
      };
    default:
      return state;
  }
};

