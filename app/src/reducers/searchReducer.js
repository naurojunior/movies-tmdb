import { MOVIE_LIST_SEARCH_TYPE } from '../actions/actionTypes';
const initialState = {
  movies: 'Teste'
};

export const searchReducer = (state = initialState, action) => {
  switch (action.type) {
    case MOVIE_LIST_SEARCH_TYPE:
      return {
        ...state,
        movies: action.movies
      };
    default:
      return state;
  }
};