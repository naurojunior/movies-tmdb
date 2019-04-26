import React, { Component } from 'react';
import { connect } from 'react-redux';
import { bindActionCreators } from 'redux';
import { clickSearch } from '../actions';

class MovieShow extends Component {
  
  render() {
    const { movies } = this.props;

    return (
        <div class="container">
            <div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
                <h1 class="display-4">Nome</h1>
                <p class="lead">{movies}</p>
            </div>
        </div>
    );
  }
}

const mapStateToProps = store => ({
    movies: store.movies.movies
});

export default connect(mapStateToProps)(MovieShow);