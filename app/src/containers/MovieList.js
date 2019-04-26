import React, { Component } from 'react';
import { connect } from 'react-redux';
import { bindActionCreators } from 'redux';
import { clickSearch, loadMovies } from '../actions';

class MovieList extends Component {

  render() {
    const { movies } = this.props;

    return (
        <div className="container">
        <div className="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1>{movies}</h1>
        </div>
      </div>
    );
  }

  componentDidMount(){
    const {loadMovies} = this.props;

    loadMovies();
  }
}

const mapStateToProps = store => ({
    movies: store.movies.movies
});


const mapDispatchToProps = (dispatch) => bindActionCreators({loadMovies}, dispatch);

export default connect(mapStateToProps,mapDispatchToProps)(MovieList);