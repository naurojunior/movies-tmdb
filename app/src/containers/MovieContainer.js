import React, { Component } from 'react';
import { connect } from 'react-redux';
import { bindActionCreators } from 'redux';
import { clickSearch } from '../actions';
import MovieSearch from './MovieSearch';
import MovieList from './MovieList';

class MovieContainer extends Component {

  render() {
    return (
        <React.Fragment>
            <MovieSearch ></MovieSearch>
            <MovieList ></MovieList>
        </React.Fragment>
    );
  }
}

export default MovieContainer;