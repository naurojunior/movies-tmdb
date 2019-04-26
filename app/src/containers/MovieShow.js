import React, { Component } from 'react';
import { connect } from 'react-redux';
import { bindActionCreators } from 'redux';
import { axios } from 'axios';
import { findMovie } from '../actions';
import { Link } from 'react-router-dom'; 

class MovieShow extends Component {
  
  render() {
    const { movie } = this.props.movie;

    return (
        <div className="container">
            <div className="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
                <h1 className="display-4">{ movie.title }</h1>
                <img className="img-fluid" src={ `https://image.tmdb.org/t/p/w500/${movie.poster_path}` } />
                <div className="col-md-6 pt-md-3 mx-auto">
                    <ul className="list-group">
                    {movie.genres.map((genre) =>
                        <li className="list-group-item" key={genre.id}>{ genre.name }</li>
                    )}
                    </ul>
                </div>
                <p className="text-justify pt-md-3">{ movie.overview }</p>
                <img className="img-fluid" src={ `https://image.tmdb.org/t/p/w500/${movie.backdrop_path}` } />
            </div>
            <div className="col-md-6 mx-auto pb-md-5">
                <Link to='/' ><button className="btn btn-primary btn-lg btn-block">Back</button></Link>
            </div>
        </div>
    );
  }

  componentDidMount() {
    const { id } = this.props.match.params
    const { findMovie } = this.props;
    findMovie(id);
  }

  
}

function mapStateToProps(store) {
    return {
      movie: store.movie
    }
  }

const mapDispatchToProps = (dispatch) => bindActionCreators({ findMovie }, dispatch);


export default connect(mapStateToProps, mapDispatchToProps)(MovieShow);



