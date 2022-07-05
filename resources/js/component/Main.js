import React from 'react';
import Sidebar from './Sidebar';
import Items from './Items';

function Main()
{
    return (
        <div className="main">
            <Sidebar />
            <Items />
        </div>
    );
}

export default Main;
