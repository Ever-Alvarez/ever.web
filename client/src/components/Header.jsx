import {useState} from 'react'
import {NavLink} from 'react-router-dom'

const data = [
    {
        title: 'Todos',
        link: 'http://www.google.com'
    }
];

const Header = ({title}) => {
    const [navs] = useState (data);

    return (
        <>
            <div>
                <h1 clasName="h1 text-white">{title}</h1>
            </div>

            <ul className="flex justify-center items-center gap-8 text-white">
                {navs.map((nav, index) => (
                    <li key={index} className="li">
                        <NavLink to={nav.link} className="navs">
                            {nav.title}
                        </NavLink>
                    </li>
                ))}
            </ul>
        </>
    )
}

export default Header