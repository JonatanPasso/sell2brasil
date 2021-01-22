<template>
    <div class="container" id="app">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">CADASTRO DE PESSOA</div>

                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputNome">Nome</label>
                                <input type="email" class="form-control" id="inputNome" placeholder="Nome" v-model="nome">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputSobrenome">Sobrenome</label>
                                <input type="text" class="form-control" id="inputSobrenome" placeholder="Sobrenome" v-model="sobrenome">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" id="inputEmail4" placeholder="Email" v-model="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEndereco">Endereço</label>
                            <input type="text" class="form-control" id="inputEndereco" placeholder="Rua Cel. de barros" v-model="endereco">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCidade">Cidade</label>
                                <input type="text" class="form-control" id="inputCidade" v-model="cidade">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEstado">Estado</label>
                                <select id="inputEstado" class="form-control" v-model="estado">
                                    <option selected>Selecione...</option>
                                    <option value="AC">Acre</option>
                                    <option value="AL">Alagoas</option>
                                    <option value="AP">Amapá</option>
                                    <option value="AM">Amazonas</option>
                                    <option value="BA">Bahia</option>
                                    <option value="CE">Ceará</option>
                                    <option value="DF">Distrito Federal</option>
                                    <option value="ES">Espírito Santo</option>
                                    <option value="GO">Goiás</option>
                                    <option value="MA">Maranhão</option>
                                    <option value="MT">Mato Grosso</option>
                                    <option value="MS">Mato Grosso do Sul</option>
                                    <option value="MG">Minas Gerais</option>
                                    <option value="PA">Pará</option>
                                    <option value="PB">Paraíba</option>
                                    <option value="PR">Paraná</option>
                                    <option value="PE">Pernambuco</option>
                                    <option value="PI">Piauí</option>
                                    <option value="RJ">Rio de Janeiro</option>
                                    <option value="RN">Rio Grande do Norte</option>
                                    <option value="RS">Rio Grande do Sul</option>
                                    <option value="RO">Rondônia</option>
                                    <option value="RR">Roraima</option>
                                    <option value="SC">Santa Catarina</option>
                                    <option value="SP">São Paulo</option>
                                    <option value="SE">Sergipe</option>
                                    <option value="TO">Tocantins</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputCEP">CEP</label>
                                <input type="text" class="form-control" id="inputCEP" v-model="cep" v-mask="'#####-###'">
                            </div>
                        </div>
                        <button class="btn btn-primary" v-bind:disabled="nome == ''" @click="incluirPessoa" v-if="id == ''">Cadastrar</button>
                        <button class="btn btn-secondary" v-bind:disabled="nome == ''" @click="alterarDadosPessoa" v-if="id != ''">Alterar</button>
                        <button class="btn btn-danger" @click="limpaCampos">Limpar</button>
                        <button class="btn btn-warning" @click="listarPessoas">Listar</button>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row justify-content-center" id="lista">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">LISTA DE PESSOAS</div>

                    <div class="card-body table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col" style="width: 10%">#</th>
                                <th scope="col" style="width: 35%">Nome</th>
                                <th scope="col" style="width: 35%">Sobrenome</th>
                                <th scope="col">Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="ps in arrayPessoas">
                                <td>{{ps.id}}</td>
                                <td>{{ps.nome}}</td>
                                <td>{{ps.sobrenome}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm" @click="alterarPessoa(ps.id)">Alterar</button>
                                    <button type="button" class="btn btn-secondary btn-sm" @click="excluirPessoa(ps.id)">Excluir</button>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {

    name: "TesteSellBrasil",

    mounted() {
        var self = this;

        // self.listarPessoas();

        setTimeout(function (){
            self.$scrollTo('#app', 500);
        })

    },

    methods: {
        listarPessoas: function (){

            var self = this;

            axios.get('/listar-pessoas').then(function(response){
                self.arrayPessoas = response.data;

                self.$scrollTo('#lista', 500);
            });
        },

        incluirPessoa: function (){

            var self = this;

            var data = {
                nome: self.nome,
                sobrenome: self.sobrenome,
                email: self.email,
                endereco: self.endereco ,
                cidade: self.cidade,
                estado: self.estado,
                cep: self.cep,
            }

            axios.post('/incluir-pessoa', data).then(function (response) {

                if(response.data.error != undefined)
                {
                    self.$swal('Atenção',response.data.error, 'warning');
                }else{
                    self.$swal('Gravado!','Dados gravados com sucesso!', 'success');

                    setTimeout(function (){
                        self.limpaCampos();
                        self.listarPessoas();

                        self.$scrollTo('#lista', 500);

                    },300);

                }
            });

        },

        alterarDadosPessoa: function (){

            var self = this;

            var data = {
                id: self.id,
                nome: self.nome,
                sobrenome: self.sobrenome,
                email: self.email,
                endereco: self.endereco ,
                cidade: self.cidade,
                estado: self.estado,
                cep: self.cep,
            }

            axios.post('/alterar-dados-pessoa', data).then(function (response) {

                self.$swal('Alterado!','Dados alterados com sucesso!', 'success');

                setTimeout(function (){
                    self.limpaCampos();
                    self.listarPessoas();

                    self.$scrollTo('#lista', 500);

                },300);
            });
        },

        limpaCampos: function (){

            var self = this;

            self.id = '';
            self.nome= '';
            self.sobrenome= '';
            self.email= '';
            self.endereco= '';
            self.cidade= '';
            self.estado= '';
            self.cep= ''
        },

        alterarPessoa: function ($id){

            var self = this;

            axios.get('/lista-pessoa-por-id', {params: {id: $id}}).then(function (response) {

                 self.id = response.data.id,
                 self.nome = response.data.nome,
                 self.sobrenome = response.data.sobrenome,
                 self.email = response.data.email,
                 self.endereco = response.data.endereco,
                 self.cidade = response.data.cidade,
                 self.estado = response.data.estado,
                 self.cep = response.data.cep

                 self.$scrollTo('#app', 500);

            });
        },

        excluirPessoa: function ($id){
            var self = this;

            self.$swal.fire({
                title: 'Deseja realmente deletar esse registro?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: `SIM`,
                denyButtonText: `NÃO`,
                icon: 'question'
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {

                    var param = {
                        id: $id
                    };

                    axios.post('/excluir-pessoa', param).then(function (){
                        self.$swal.fire('Deletado!', 'Registro deletado com sucesso!', 'success')

                        self.listarPessoas();

                        self.$scrollTo('#lista', 500);
                    });
                }
            })
        }
    },

    data: function (){
        return {
            id: '',
            nome: '',
            sobrenome: '',
            email: '',
            endereco: '',
            cidade: '',
            estado: '',
            cep: '',

            arrayPessoas: []
        }
    }
}
</script>
