import './assets/css/styles.css'
import Cookies from 'js-cookie';
import {useState} from 'react'

 function Login(){
    const [vc_user, setUser] = useState('');
    const [vc_pass, setPass] = useState('');
    const [msg, setMsg] = useState('');

    const handleLogin = async (e) => {
    e.preventDefault(); // previene que el form recargue la página


    try {
        const res = await fetch('http://localhost:5050/api/auth', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({ vc_user, vc_pass }),
        });

        const data = await res.json();
        if (res.ok) {
            Cookies.set('userId', data.user.id_user, { expires: 1 });
            Cookies.set('userName', data.user.vc_user);
            Cookies.set('userAccess', data.user.id_access);
            Cookies.set('userProfile', data.user.id_profile);
            window.location.href = "/menu";
            // setMsg(`Bienvenido, ${data.user.vc_user}`);
            // Puedes guardar en localStorage si quieres:
            // localStorage.setItem('user', JSON.stringify(data.user));
        } else {
            setMsg(data.messages.error || 'Error');
            setUser('');
            setPass('');
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
                                    <input id="user" type="text" className="form-control form-group" placeholder="Usuario" value={vc_user} onChange={(e) => setUser(e.target.value)}/>
                                </div>
                            </div>
                            <div className="form-group">
                                <div className="col-md-9">
                                    <label htmlFor="pass">Contraseña:</label>
                                    <input id="pass" type="password" className="form-control form-group" placeholder="Contraseña" value={vc_pass} onChange={(e) => setPass(e.target.value)}/>
                                </div>
                            </div>
                            {
                                msg && 
                                <div className="form-group">
                                    <div className="col-md-9">
                                        <div className="msgLogin">{msg}</div>
                                    </div>
                                </div>
                            }
                            <div className="form-group">
                                <div className="col-md-9">
                                    <br />
                                    <button type="submit" id="btn-sesion">Iniciar Sesión</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    
    )
}

export default Login