import React, { Component } from 'react';
import { connect } from 'react-redux';
import { bindActionCreators } from 'redux';
import { loadMovies } from '../actions';

class MovieSearch extends Component {

  state = {
    inputValue: ''
  }

  inputChange = event => {
    this.setState({
      inputValue: event.target.value
    });
  }

  render() {
    const { inputValue } = this.state;
    const { loadMovies } = this.props;
    
    return (
        <div className="container">
          <div className="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <input
              onChange={this.inputChange}
              type='text'
              value={inputValue}
              autoFocus
            />
            <button className="btn btn-primary" onClick={() => loadMovies(inputValue)}>
              Filtrar
            </button>
          </div>
      </div>
    );
  }

}

const mapStateToProps = store => ({
    movies: store.movies.movies
});

const mapDispatchToProps = dispatch =>
  bindActionCreators({ loadMovies }, dispatch);

export default connect(mapStateToProps,mapDispatchToProps)(MovieSearch);