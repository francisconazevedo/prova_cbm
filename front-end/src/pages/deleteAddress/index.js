import React, { Component } from 'react';

import api from '../../services/api';

import { Link } from 'react-router-dom';

export default class Address extends Component {
    state = {
        result: {},
    }

    async componentDidMount(){
        const { id } = this.props.match.params;
        
        const response = await api.post(`/delete/${id}`)
        
        this.setState({ address: response.data});
    }
    render() {
        return (
            <div className="jumbotron jumbotron-fluid">
                <div className="container">
                    <h5>Endereço removido com sucesso!</h5>
                    
                    <Link to={`/`} className="btn btn-outline-primary">Voltar</Link>                    

                </div>
            </div>
        )
    }
}