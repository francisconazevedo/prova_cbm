import React, { Component } from 'react';

import api from '../../services/api';

import { Link } from 'react-router-dom';

export default class Address extends Component {
    state = {
        result: {},
    }

    async componentDidMount(){
        const { cep } = this.props.match.params;

        const response = await api.get(`/add/${cep}`)
        
        this.setState({ result: response.data});

    }

    
    render() {
        return (
            <div className="jumbotron jumbotron-fluid">
                <div className="container">
                    <h5>{(this.state.result === "error") ? 'CEP buscado não existe ou já está cadastrado' : 'Endereço adicionado com sucesso!'} </h5> 
                    <Link to={`/`} className="btn btn-outline-primary">Voltar</Link>                    
                    
                </div>
            </div>
        )
    }
}