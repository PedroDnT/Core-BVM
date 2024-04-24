import React from 'react';
import { Link } from 'react-router-dom';

const Navbar = () => {
  return (
    <nav id="navbar" className="navbar">
      <div className="container">
        <Link to="/" className="navbar-brand">WebApp</Link>
        <div className="navbar-nav">
          <Link to="/health" className="nav-item nav-link">Health Check</Link>
          <a href={`${process.env.REACT_APP_VERCEL_ENV}/api/deploy`} className="nav-item nav-link">Deploy</a>
        </div>
      </div>
    </nav>
  );
};

export default Navbar;