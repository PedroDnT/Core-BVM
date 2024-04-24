import React, { useState, useEffect } from 'react';
import Navbar from './components/Navbar';
import Footer from './components/Footer';
import './styles/global.css';

function App() {
  const [healthCheck, setHealthCheck] = useState('checking');

  useEffect(() => {
    fetch(`${process.env.REACT_APP_API_URL}/api/health`)
      .then(response => response.json())
      .then(data => {
        if (data.status === 'ok') {
          setHealthCheck('success');
        } else {
          setHealthCheck('failure');
        }
      })
      .catch(() => {
        setHealthCheck('failure');
      });
  }, []);

  return (
    <div className="app">
      <Navbar />
      <main>
        {healthCheck === 'checking' && <p>Checking system health...</p>}
        {healthCheck === 'success' && <p>System is healthy. Ready to deploy!</p>}
        {healthCheck === 'failure' && <p>System health check failed. Cannot deploy.</p>}
      </main>
      <Footer />
    </div>
  );
}

export default App;