import React, { Component } from 'react';
import { connect } from 'react-redux';
import { bindActionCreators } from 'redux';
import { axios } from 'axios';
import { findMovie } from '../actions';

class MovieShow extends Component {
  
  render() {
    const { movie } = this.props.movie;

    return (
        <div className="container">
            <div className="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
                <h1 className="display-4">{ movie.title }</h1>
                <p className="lead">ASD</p>
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



