import {
  BrowserRouter as Router,
  Routes,
  Route,
  Navigate
} from 'react-router-dom';
// import { useState } from 'react'
// import reactLogo from './assets/react.svg'
// import viteLogo from '/vite.svg'
// import './App.css'
import Login from './Login';
// import Header from './components/Header';
import Menu from './components/Home';
import ProtectedRoute from './components/ProtectedRoute'
// import { Router } from 'react-router-dom';

function App() {
  // const [count, setCount] = useState(0)

  return (
    <Router>
      <Routes>
        <Route path="/" element={<Login />} />
        <Route path="/login" element={<Login />} />
        {/* Ruta catch-all que protege todas las demás rutas */}
        <Route
          path="/*"
          element={
            <ProtectedRoute>
              <Menu />
            </ProtectedRoute>
          }
        />
      </Routes>
    </Router>
  )
}

export default App
