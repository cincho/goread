import React from 'react';
import source from '../data';

function Items()
{
    const [data, setData] = React.useState([]);

    function refresh(event)
    {
        event.preventDefault();
        setData(source);
    }

    const items = data.map(function(item) {
        return  (
            <Item
                key={item.id}
                {...item}
                //title={item.title}
                //summary={item.summary}
            />
        );
    });

    return (
        <div className="items">
            <h1>All items</h1>
            <span>
                Show
                <a href="">Expanded</a>
                <a href="">List</a>
            </span>
            <p>Show: {items.length} items <button onClick={refresh}>Refresh</button></p>
            {items}
            <img src="/GoogleReader.jpg" />
        </div>
    );
}

function Item(props)
{
    return (
        <div className="item">
            <h2>{props.title}</h2>
            <p>{props.summary}</p>
            <ul>
                <li>Add star</li>
                <li>Like</li>
                <li>Share</li>
            </ul>
        </div>
    );
}

export default Items;
