import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';
import App from './App';
import * as serviceWorker from './serviceWorker';
import { Provider } from 'react-redux';
import { Store } from './store';
import { Route, Link, BrowserRouter as Router } from 'react-router-dom'


import MovieList from './containers/MovieList';
import MovieShow from './containers/MovieShow'; 

ReactDOM.render(
    <Provider store={Store}>
      <Router>
        <main role="main" class="container">
          <Route exact path="/" component={MovieList} />
          <Route path="/show/:id" component={MovieShow} />
        </main>
      </Router>
    </Provider>
  , document.getElementById('root'));

// If you want your app to work offline and load faster, you can change
// unregister() to register() below. Note this comes with some pitfalls.
// Learn more about service workers: https://bit.ly/CRA-PWA
serviceWorker.unregister();
