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
          <div className="row form-group pt-md-5 pb-md-4">
          <div className="text-center col-md-9">
            <input
              className="form-control"
              onChange={this.inputChange}
              type='text'
              value={inputValue}
              autoFocus
            />
            </div>
            <div className="col-md-3">
              <button className="btn btn-primary b" onClick={() => loadMovies(inputValue)}>
                Filter
              </button>
          </div>
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