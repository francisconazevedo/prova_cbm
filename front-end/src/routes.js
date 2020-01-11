import React from 'react';

import { BrowserRouter, Switch, Route } from 'react-router-dom';

import Main from './pages/main';
import Address from './pages/address';
import EditAddress from './pages/editAddress'
import DeleteAddress from './pages/deleteAddress'
import SearchAddress from './pages/searchAddress'

const Routes = () => (
    <BrowserRouter>
        <Switch>
            <Route exact path="/" component={Main} />
            <Route path="/view/:id" component={Address} />
            <Route path="/edit/:id" component={EditAddress} />
            <Route path="/delete/:id" component={DeleteAddress} />
            <Route path="/add/:cep" component={SearchAddress} />
        </Switch>
    </BrowserRouter>
);
 
export default Routes;