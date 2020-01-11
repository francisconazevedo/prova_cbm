import React, { Component } from 'react';
import api from '../../services/api';
import { Link } from 'react-router-dom';

export default class Address extends Component {
    
    state = {
        
            logradouro: '',
            complemento: '',
            bairro: '', 
            localidade: '',
            uf: ''
        
    }

    alert = '';
    
    logradouroInput = event => {
        this.setState({ logradouro: event.target.value });
        alert = 'Editado!';
    }

    complementoInput = event => {
        this.setState({ complemento: event.target.value });
        alert = 'Editado!';
    }
    
    bairroInput = event => {
        this.setState({ bairro: event.target.value });
        alert = 'Editado!';
    }
    
    localidadeInput = event => {
        this.setState({ localidade: event.target.value });
        alert = 'Editado!';
    }
    
    ufInput = event => {
        this.setState({ uf: event.target.value });
        alert = 'Editado!';
    }

    async handleEdit(){
        
        const { id } = this.props.match.params;
        
        
        const response = await api.post(
            `/edit/${id}`,{
            data: this.state
            },
            { headers: { 'Content-Type': 'application/json' } }
          )
          console.log(response);
        
    }
   
    
    render() {
        return (
            <div className="jumbotron">
                <div className="row">
                    <div className="col-md-12 order-md-1">
                        <h4 className="mb-3">Editar informações do CEP </h4>
                        <div className="row">
                            <div className="mb-3 col-md-6">
                                <input type="text" value={this.state.logradouro} onChange={this.logradouroInput} className="form-control" id="logradouro" placeholder="Logradouro" />    
                            </div>

                            <div className=" d-flex justify-content-center  mb-3 col-md-6">
                                <input type="text" value={this.state.complemento} onChange={this.complementoInput} className="form-control" id="complemento" placeholder="Complemento"/>
                            </div>
                            <div className="d-flex justify-content-center mb-3 col-md-12">
                                <div className="mb-3 col-md-4">
                                    <input type="text" value={this.state.bairro} onChange={this.bairroInput} className="form-control" id="bairro" placeholder="Bairro"/>
                                </div>
                                
                                <div className="mb-3 col-md-4">
                                    <input type="text" value={this.state.localidade} onChange={this.localidadeInput} className="form-control" id="localidade" placeholder="Localidade"/>
                                </div>

                                <div className="mb-3 col-md-2">
                                    <input type="text" value={this.state.uf} onChange={this.ufInput} className="form-control" id="estado" placeholder="UF"/>
                                </div>
                            </div>
                        </div>
                        <div className="d-flex justify-content-center col-md-12">
                            <p>{alert}</p>
                        </div>
                            
                        <div className="d-flex justify-content-center mb-3 col-md-12">
                            
                            <div className="d-flex justify-content-center col-md-6">
                                <button Onclick={this.handleEdit()} className="btn btn-outline-primary btn-sm">Continuar e editar</button>
                            </div>
                            <div className="d-flex justify-content-center col-md-6">
                                <Link to="/" className="btn btn-outline-danger btn-sm">Cancelar</Link>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>
        )
    }
}