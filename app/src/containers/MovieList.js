import React, { Component } from 'react';
import { connect } from 'react-redux';
import { bindActionCreators } from 'redux';
import { loadMovies } from '../actions';
import { Link} from 'react-router-dom';

class MovieList extends Component {

  render() {
    const { movies } = this.props;


    return (
      <div className="container">
        <div className="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
          <div className="row">
            {movies.map((movie) =>
              <div className="col-md-3 pt-md-5" key={movie.id}>
                <Link to={`/show/${movie.id}`} ><h6>{movie.title}</h6>
                  <img className="img-fluid" src={ `https://image.tmdb.org/t/p/w500/${movie.poster_path}` } />
                </Link>
              </div>
            )}
          </div>
        </div>
      </div>
    );
  }

  componentDidMount() {
    const { loadMovies } = this.props;
    loadMovies();
  }
}

function mapStateToProps(store) {
  return {
    movies: store.movies.movies
  }
}


const mapDispatchToProps = (dispatch) => bindActionCreators({ loadMovies }, dispatch);

export default connect(mapStateToProps, mapDispatchToProps)(MovieList);