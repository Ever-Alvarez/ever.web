import { Navigate } from 'react-router-dom';
import Cookies from 'js-cookie';

function ProtectedRoute({ children }) {
  const userId = Cookies.get('userId');

  if (!userId) {
    return <Navigate to="/" replace />;
  }

  return children;
}

export default ProtectedRoute;