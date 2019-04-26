import axios from 'axios';

import { LOAD_MOVIES, FIND_MOVIE} from './actionTypes';


export const loadMovies = async (title = "") => {
	return async (dispatch) => {
      const movies = await axios.get("http://localhost/movies-tmdb/api/public/api/v1/movies?title=" + title)
      dispatch({type: LOAD_MOVIES, payload: movies.data});
	}
};

export const findMovie = async (id) => {
	return async (dispatch) => {
      const movie = await axios.get("http://localhost/movies-tmdb/api/public/api/v1/movies/show/" + id)
      dispatch({type: FIND_MOVIE, payload: movie.data});
	}
};