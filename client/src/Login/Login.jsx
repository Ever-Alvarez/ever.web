import '../assets/css/styles.css'

function Login(){
    return (
    
            <div className="bodyLogin">
                <div className="centerLogin">
                    {/* CENTER */}
                <div className="form">
                    <form className="form-horizontal" action="" method="post">
                        <div className="form-group">
                            <div className="col-md-9">
                                <label htmlFor="user">Usuario:</label>
                                <input type="text" className="form-control" />
                            </div>
                        </div>
                        <div className="form-group">
                            <div className="col-md-9">
                                <label htmlFor="pass">Contraseña:</label>
                                <input type="password" className="form-control" />
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
    
    )
}

export default Login