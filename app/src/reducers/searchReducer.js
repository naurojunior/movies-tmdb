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
      return {
        ...state,
        movies: action.payload
      };
    default:
      return state;
  }
};

