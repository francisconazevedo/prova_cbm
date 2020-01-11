import React from 'react';
import './App.css';
import Header from './components/Header';
import Footer from './components/Footer';
import Routes from './routes';
const App = () => (
  <div className="App">
    
      <Header />
      <div className="container">
        <Routes />
      </div>
      <Footer/>
    
  </div>
);

export default App;
