import './assets/css/styles.css'
import {useState} from 'react'

 function Login(){
    const [vc_user, setUser] = useState('');
    const [password, setPass] = useState('');
    const [msg, setMsg] = useState('');

    const handleLogin = async (e) => {
    e.preventDefault(); // previene que el form recargue la página


    try {
        const res = await fetch('http://localhost:5050/api/auth', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({ vc_user, password }),
        });

        const data = await res.json();
        if (res.ok) {
            setMsg(`Bienvenido, ${data.user.vc_user}`);
            // Puedes guardar en localStorage si quieres:
            // localStorage.setItem('user', JSON.stringify(data.user));
        } else {
            setMsg(data.message || 'Error al iniciar sesión');
        }
    } catch (error) {
        setMsg('Error de conexión');
    }
}

    return (
    
            <div className="bodyLogin">
                <div className="centerLogin">
                    {/* CENTER */}
                <div className="form">
                    <form className="form-horizontal" onSubmit={handleLogin}>
                        <div className="form-group">
                            <div className="col-md-9">
                                <label htmlFor="user">Usuario:</label>
                                <input type="text" className="form-control" placeholder="Usuario" value={vc_user} onChange={(e) => setUser(e.target.value)}/>
                            </div>
                        </div>
                        <div className="form-group">
                            <div className="col-md-9">
                                <label htmlFor="pass">Contraseña:</label>
                                <input type="password" className="form-control" placeholder="Contraseña" value={password} onChange={(e) => setPass(e.target.value)}/>
                            </div>
                        </div>
                        <div className="form-group">
                            <button type="submit" >Iniciar Sesión</button>
                        </div>
                    </form>
                </div>
                {msg && <p>{msg}</p>}
                </div>
            </div>
    
    )
}

export default Login