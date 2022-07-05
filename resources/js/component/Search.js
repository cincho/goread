import React from 'react';

function Search()
{
    return (
        <div className="search">
            <img src="/logo.svg" />
            <form>
                <input type="text" />
                <select>
                    <option>All items</option>
                </select>
                <button type="submit">Search</button>
            </form>
        </div>
    );
}

export default Search;
