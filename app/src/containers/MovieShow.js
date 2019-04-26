import React, { Component } from 'react';
import { connect } from 'react-redux';
import { bindActionCreators } from 'redux';

class MovieShow extends Component {
  
  render() {
    const { movies } = this.props;


    return (
        <div className="container">
            <div className="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
                <h1 className="display-4">Nome</h1>
                <p className="lead">ASD</p>
            </div>
        </div>
    );
  }
}

function mapStateToProps(store) {
    return {
      movies: store.movies.movies
    }
  }

export default connect(mapStateToProps)(MovieShow);