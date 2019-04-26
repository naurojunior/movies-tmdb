import { LOAD_MOVIES, FIND_MOVIE } from '../actions/actionTypes';
const initialState = {
  movies: [],
  movie: {}
};

export const searchReducer = (state = initialState, action) => {
  switch (action.type) {
    case LOAD_MOVIES:
      return {
        ...state,
        movies: action.payload
      };
      case FIND_MOVIE:
      return {
         ...state,
        movie: action.payload
      }
    default:
      return state;
  }
};

