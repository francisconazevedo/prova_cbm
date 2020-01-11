import React, { Component } from 'react';
import api from '../../services/api';
import { Link } from 'react-router-dom';
import './styles.css';

export default class Main extends Component {

    state = {
        addresses: [],
        cep: ''
    }

    handleInput = event => {
        this.setState({ cep: event.target.value });
    }

    componentDidMount() {
        this.loadAddressList();
    }

    loadAddressList = async () => {
        const response = await api.get("/addressesFromDB");
        this.setState({ addresses: response.data })
    }

    render() { 
        return (    
            <div className="container-fluid">   
                <div className="jumbotron">
                    
                        <p className="display-12 text-left">Digite um CEP:</p>
                        <div className="input-group mb-3 col-md-4 col-ms-12">
                            <input type="text" value={this.state.cep} onChange={this.handleInput} maxlength="8" className="form-control" placeholder="49000000"/>
                            <div className="input-group-append">
                                <Link to={`/add/${this.state.cep}`} className="btn btn-outline-secondary"  id="button-addon2">Buscar</Link>
                            </div>
                            <p>{this.state.cep} </p>
                        </div>
                    
                        <hr className="my-4" />
                        <h4>Lista de endereços </h4>
                        <table className="table table-sm">
                            <thead>
                            <tr>
                                <th scope="col">CEP</th>
                                <th scope="col">Logradouro</th>
                                <th scope="col">Complemento</th>
                                <th scope="col">Bairro</th>
                                <th scope="col">Localidade</th>
                                <th scope="col">UF</th>
                                <th scope="col">Ações</th>
                            </tr>
                            </thead>
                            <tbody>
            
                            {  /* Print all database addresses on screen */
                                this.state.addresses.map(address => (
                                    <tr>
                                        <td>{address.cep}</td>
                                        <td>{address.logradouro}</td>
                                        <td>{address.complemento}</td>
                                        <td>{address.bairro}</td>
                                        <td>{address.localidade}</td>
                                        <td>{address.uf}</td>
                                        <td width="250px">
                                        <Link to={`/view/${address.id}`} className="btn btn-outline-success btn-sm">Visualizar</Link>
                                        <Link to={`/edit/${address.id}`} className="btn btn-outline-primary btn-sm">Editar</Link>
                                        <Link to={`/delete/${address.id}`} className="btn btn-outline-danger btn-sm">Remover</Link>
                                            
                                    </td>
                            </tr>
                                ))
                            }
                            
                            </tbody>
                        </table>
                    </div>
                </div>
        )
    }
    
}


