import React, {useState} from 'react'
import Header from './Header'
import data from '../../data'

const Home = () => {
    const [meals] = useState(data)

    return (
        <div>
            <Header title="Cr Menu" />
        </div>
    );
}

export default Home