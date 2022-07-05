import React, {useState} from 'react';
import ReactDom from 'react-dom/client';
import Main from './component/Main';
import Navigation from './component/Navigation';
import Search from './component/Search';

const root = ReactDom.createRoot(document.getElementById('app'));
root.render(
    <div>
        <Navigation />
        <Search />
        <Main />
    </div>
);