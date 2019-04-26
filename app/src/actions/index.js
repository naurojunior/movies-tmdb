import axios from 'axios';

import { LOAD_MOVIES } from './actionTypes';


export const loadMovies = async (title = "") => {
	return async (dispatch) => {
      const movies = await axios.get("http://localhost/movies-tmdb/api/public/api/v1/movies?title=" + title)
      dispatch({type: LOAD_MOVIES, payload: movies.data});
	}
};