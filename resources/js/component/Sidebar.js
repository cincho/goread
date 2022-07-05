import React from 'react';

function Sidebar()
{
    const [showSubscriptionForm, setShowSubscriptionForm] = React.useState(false);
    const [subscriptionUrl, setSubscriptionUrl] = React.useState('');
    const [subscriptions, setSubscriptions] = React.useState([]);

    React.useEffect(fetchSubscriptions, []);

    function fetchSubscriptions()
    {
        fetch('/api/subscriptions')
            .then(response => response.json())
            .then(data => setSubscriptions(data));
    }

    function toggleSubscriptionForm(event)
    {
        event.preventDefault();
        setShowSubscriptionForm(previousState => !previousState);
    }

    function handleSubscriptionUrlChange(event)
    {
        event.preventDefault();
        setSubscriptionUrl(event.target.value);
    }

    function handleSubmit(event)
    {
        event.preventDefault();

        fetch('/api/subscriptions', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    link: subscriptionUrl
                })
            })
            .then(response => response.json())
            .then(data => fetchSubscriptions())
            .catch((error) => {
                console.error('Error:', error);
            });
    }

    return (
        <div className="sidebar">
            <a href="" onClick={toggleSubscriptionForm}>Add a subscription</a>
            <form
                className={showSubscriptionForm === true ? '' : 'hidden'}
                onSubmit={handleSubmit}
            >
                <input
                    type="text"
                    placeholder="URL"
                    name="subscriptionUrl"
                    onChange={handleSubscriptionUrlChange}
                    value={subscriptionUrl}
                />
                <button type="submit">Add</button>
            </form>
            <ul>
                <li><a>Home</a></li>
                <li><a>All items</a></li>
            </ul>

            <Subscriptions subscriptions={subscriptions} />
        </div>
    );
}

function Subscriptions(props)
{
    const subscriptions = props.subscriptions.map(subscription => {
        return (
            <li key={subscription.id}>{subscription.title}</li>
        )
    });

    return (
        <div>
            <h3>Subscriptions</h3>
            <ul>
                {subscriptions}
            </ul>
        </div>
    )
}

export default Sidebar;
