import React, { Component } from 'react';
import api from '../../services/api';
import { Link } from 'react-router-dom';

export default class Address extends Component {
    state = {
        address: {},
    }


    async componentDidMount(){
        const { id } = this.props.match.params;
        const response = await api.get(`/view/${id}`)
        
        this.setState({ address: response.data});
    }

    render() {
        const { address } = this.state;
        return (
            <div className="jumbotron jumbotron-fluid">
                <div className="container">
                    <h5>CEP: {address.cep}</h5>
                    <p><b>Logradouro:</b> {address.logradouro}</p>
                    <p><b>Complemento:</b> {address.complemento}</p>
                    <p><b>Bairro:</b> {address.bairro}</p>
                    <p><b>Localidade:</b> {address.localidade}</p>
                    <p><b>UF:</b> {address.uf}</p>
                    <p><b>Unidade:</b> {address.unidade}</p>
                    <p><b>IBGE:</b> {address.ibge}</p>
                    <p><b>GIA:</b> {address.gia}</p>
                    <p><b>Cadastrado em:</b> {address.created}</p>
                    <p><b>Modificado em:</b> {address.modified}</p>
                    <Link to={`/`} className="btn btn-outline-primary">Voltar</Link>                    

                </div>
            </div>
        )
    }
}