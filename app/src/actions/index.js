import axios from 'axios';

import { MOVIE_LIST_SEARCH_TYPE, LOAD_MOVIES } from './actionTypes';

export const clickSearch = value => ({
  type: MOVIE_LIST_SEARCH_TYPE,
  movies: []
});

export const loadMovies = async () => {
	return (dispatch) => {
      dispatch({type: LOAD_MOVIES, payload: 'asd'});
	}
};