import React, { Component } from 'react';
import { connect } from 'react-redux';
import { bindActionCreators } from 'redux';
import { clickSearch } from '../actions';

class MovieList extends Component {
  state = {
    inputValue: ''
  }

  inputChange = event => {
    this.setState({
      inputValue: event.target.value
    })
  }

  render() {
    const { clickSearch, movies } = this.props;
    const { inputValue } = this.state;

    return (
        <div class="container">
        <div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <input
          onChange={this.inputChange}
          type='text'
          value={inputValue}
          autoFocus
        />
        <button onClick={() => clickSearch(inputValue)}>
          Filtrar
        </button>
        <h1>{movies}</h1>
        </div>
      </div>
    );
  }
}

const mapStateToProps = store => ({
    movies: store.movies.movies
});

const mapDispatchToProps = dispatch =>
  bindActionCreators({ clickSearch }, dispatch);

export default connect(mapStateToProps,mapDispatchToProps)(MovieList);