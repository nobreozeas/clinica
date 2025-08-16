@extends('layout.app')


@section('content')
    <div x-data="setup()" x-init="inicializar()">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">

                    <a href="{{ route('medicos.index') }}"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4 me-2.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.242 5.992h12m-12 6.003H20.24m-12 5.999h12M4.117 7.495v-3.75H2.99m1.125 3.75H2.99m1.125 0H5.24m-1.92 2.577a1.125 1.125 0 1 1 1.591 1.59l-1.83 1.83h2.16M2.99 15.745h1.125a1.125 1.125 0 0 1 0 2.25H3.74m0-.002h.375a1.125 1.125 0 0 1 0 2.25H2.99" />
                        </svg>
                        Médicos
                    </a>
                </li>

                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">Novo Médico</span>
                    </div>
                </li>
            </ol>
        </nav>


        <form action="" method="POST" class="my-4">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div class="">
                    <label for="nome" class="block mb-2 text-sm font-medium text-gray-900">Nome</label>
                    <input type="text" id="nome" x-model="nome"
                        class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 focus:outline-blue-500 ">
                </div>

                <div class="">
                    <label for="cpf" class="block mb-2 text-sm font-medium text-gray-900">CPF</label>
                    <input type="text" id="cpf" x-model="cpf"
                        class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 focus:outline-blue-500 ">
                </div>

                <div class="">
                    <label for="crm" class="block mb-2 text-sm font-medium text-gray-900">CRM</label>
                    <input type="text" id="crm" x-model="crm"
                        class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 focus:outline-blue-500 ">
                </div>

                <div class="">
                    <label for="matricula" class="block mb-2 text-sm font-medium text-gray-900">Matrícula</label>
                    <input type="text" id="matricula" x-model="matricula"
                        class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 focus:outline-blue-500 ">
                </div>
                <div class="">
                    <label for="salario" class="block mb-2 text-sm font-medium text-gray-900">Salário</label>
                    <input type="text" id="salario" x-model="salario"
                        class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 focus:outline-blue-500 ">
                </div>

                <div class="">
                    <label for="data_nascimento" class="block mb-2 text-sm font-medium text-gray-900">Data de
                        Nascimento</label>
                    <input type="date" id="data_nascimento" x-model="data_nascimento"
                        class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 focus:outline-blue-500 ">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div class="">
                    <label for="rg" class="block mb-2 text-sm font-medium text-gray-900">RG</label>
                    <input type="text" id="rg" x-model="rg"
                        class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 focus:outline-blue-500 ">
                </div>

                <div class="">
                    <label for="data_emissao" class="block mb-2 text-sm font-medium text-gray-900">Data de Emissão</label>
                    <input type="date" id="data_emissao" x-model="data_emissao"
                        class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 focus:outline-blue-500 ">
                </div>

                <div class="">
                    <label for="orgao_emissor" class="block mb-2 text-sm font-medium text-gray-900">Órgão Emissor</label>
                    <input type="text" id="orgao_emissor" x-model="orgao_emissor"
                        class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 focus:outline-blue-500 ">
                </div>

                <div class="">
                    <label for="uf_emissor" class="block mb-2 text-sm font-medium text-gray-900">UF Emissor</label>
                    <input type="text" id="uf_emissor" x-model="uf_emissor"
                        class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 focus:outline-blue-500 ">
                </div>

                <div class="">
                    <label for="celular_1" class="block mb-2 text-sm font-medium text-gray-900">Celular 1</label>
                    <input type="text" id="celular_1" x-model="celular_1"
                        class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 focus:outline-blue-500 ">
                </div>
                <div class="">
                    <label for="celular_2" class="block mb-2 text-sm font-medium text-gray-900">Celular 2</label>
                    <input type="text" id="celular_2" x-model="celular_2"
                        class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 focus:outline-blue-500 ">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">

                <div>
                    <label for="orientacao_sexual" class="block mb-2 text-sm font-medium text-gray-900">Orientação
                        sexual</label>
                    <select id="orientacao_sexual" x-model="orientacao_sexual"
                        class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option selected>Selecione...</option>
                        <template x-for="(orientacao, index) in orientacaoSexualData" :key="index">
                            <option :value="orientacao.id" x-text="orientacao.nome"></option>
                        </template>
                    </select>
                </div>

                <div>
                    <label for="identidade_genero" class="block mb-2 text-sm font-medium text-gray-900">Identidade de
                        gênero</label>
                    <select id="identidade_genero" x-model="identidade_genero"
                        class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option selected>Selecione...</option>
                        <template x-for="(identidade, index) in identidadeGeneroData" :key="index">
                            <option :value="identidade.id" x-text="identidade.nome"></option>
                        </template>
                    </select>
                </div>

                <div>
                    <label for="raca" class="block mb-2 text-sm font-medium text-gray-900">Raça</label>
                    <select id="raca" x-model="raca"
                        class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option selected>Selecione...</option>
                        <template x-for="(raca, index) in racaData" :key="index">
                            <option :value="raca.id" x-text="raca.nome"></option>
                        </template>
                    </select>
                </div>

                <div>
                    <label for="etnia" class="block mb-2 text-sm font-medium text-gray-900">Etnia</label>
                    <select id="etnia" x-model="etnia"
                        class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option selected>Selecione...</option>
                        <template x-for="(etnia, index) in etniaData" :key="index">
                            <option :value="etnia.id" x-text="etnia.nome"></option>
                        </template>
                    </select>
                </div>

            </div>

            <div class="w-full border-b-2 border-b-blue-500 "></div>

            <div class="mt-3">
                <span class="text-xl font-medium">Dados de Usuário</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div class="">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">E-mail</label>
                    <input type="email" id="email" x-model="email"
                        class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 focus:outline-blue-500 ">
                </div>
                <div class="">
                    <label for="usuario" class="block mb-2 text-sm font-medium text-gray-900">Usuário</label>
                    <input type="text" id="usuario" x-model="usuario"
                        class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 focus:outline-blue-500 ">
                </div>

                <div class="">
                    <label for="senha" class="block mb-2 text-sm font-medium text-gray-900">Senha</label>
                    <input type="password" id="senha" x-model="senha"
                        class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 focus:outline-blue-500 ">
                </div>

            </div>

            <div class="w-full border-b-2 border-b-blue-500 "></div>

            <div class="mt-3">
                <span class="text-xl font-medium">Especialidades</span>
            </div>
               <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                 <div>
                    <label for="especialidade" class="block mb-2 text-sm font-medium text-gray-900">Especialidade</label>
                    <select id="especialidade" x-model="item_especialidade"
                        class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option selected value="">Selecione...</option>
                        <template x-for="(especialidade, index) in especialidadesData" :key="index">
                            <option :value="especialidade.id" x-text="especialidade.nome"></option>
                        </template>
                    </select>

                    <button type="button" @click="adicionarItem(item_especialidade)">Adicionar</button>
                </div>

            </div>

            <div class="area-especialidade border-amber-300 w-full">
                <template x-for="(especialidade, index) in arrayItemEspecialidade" :key="index">
                    <div class="flex items-center justify-between p-2 border-b border-gray-200">
                        <span x-text="especialidade.nome"></span>

                    </div>
                </template>
            </div>



            <div class="flex justify-end">
                <button type="button"
                    class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-lg shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                    @click="salvarMedico()">
                    Cadastrar Médico
                </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        function setup() {
            return {
                nome: '',
                item_especialidade: '',
                arrayItemEspecialidade: [],
                especialidadesData: [],
                crm: '',
                matricula: '',
                salario: '',
                data_nascimento: '',
                cpf: '',
                rg: '',
                data_emissao: '',
                orgao_emissor: '',
                uf_emissor: '',
                celular_1: '',
                celular_2: '',
                senha: '',
                usuario: '',
                email: '',
                etnia: '',
                raca: '',
                identidade_genero: '',
                orientacao_sexual: '',
                orientacaoSexualData: [],
                identidadeGeneroData: [],
                racaData: [],
                etniaData: [],
                camposObrigatorios: ['nome', 'data_nascimento', 'cpf', 'celular_1', 'senha', 'usuario', 'email', 'raca',
                    'identidade_genero', 'orientacao_sexual', 'crm', 'matricula', 'salario'
                ],
                async adicionarItem(item){

                    for(let e of this.arrayItemEspecialidade){
                        if(e.id == item){
                            Swal.fire({
                                icon: 'error',
                                title: 'Erro',
                                text: 'Especialidade já adicionada.',
                                confirmButtonColor: '#155CA9',
                            })
                            return;
                        }
                    }

                    for(let e of this.especialidadesData){
                        if(e.id == item){
                            this.arrayItemEspecialidade.push(e);
                        }
                    }

                },
                async salvarMedico() {

                    // // Verifica se todos os campos obrigatórios estão preenchidos
                    // for (const campo of this.camposObrigatorios) {
                    //     if (this[campo] === '') {
                    //         Swal.fire({
                    //             icon: 'error',
                    //             title: 'Erro',
                    //             text: `Por favor, preencha o campo ${campo}.`,
                    //             confirmButtonColor: '#155CA9',
                    //         })
                    //         return;
                    //     }
                    // }

                    try {

                        const url = "{{ route('medicos.store') }}";

                        const dados = {
                            nome: this.nome,
                            data_nascimento: this.data_nascimento,
                            cpf: this.cpf,
                            rg: this.rg,
                            data_emissao: this.data_emissao,
                            orgao_emissor: this.orgao_emissor,
                            uf_emissor: this.uf_emissor,
                            celular_1: this.celular_1,
                            celular_2: this.celular_2,
                            senha: this.senha,
                            usuario: this.usuario,
                            email: this.email,
                            etnia_id: this.etnia,
                            raca_id: this.raca,
                            identidade_genero_id: this.identidade_genero,
                            orientacao_sexual_id: this.orientacao_sexual,
                            crm: this.crm,
                            matricula: this.matricula,
                            salario: this.salario,
                            especialidades: this.arrayItemEspecialidade
                        };

                        const response = await axios.post(url, {
                            ...dados
                        })

                        let timerInterval;
                        Swal.fire({
                            title: 'Paciente criado com sucesso!',
                            html: "Voce será redirecionado em <b></b> milissegundos.",
                            icon: 'success',
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: () => {
                                Swal.showLoading();
                                const timer = Swal.getPopup().querySelector("b");
                                timerInterval = setInterval(() => {
                                    timer.textContent = `${Swal.getTimerLeft()}`;
                                }, 100);
                            },
                            willClose: () => {
                                clearInterval(timerInterval);
                            }
                        }).then((result) => {
                            /* Read more about handling dismissals below */
                            if (result.dismiss === Swal.DismissReason.timer) {
                                console.log("I was closed by the timer");
                            }
                            window.location.href = "{{ route('pacientes.index') }}";
                        });

                    } catch (error) {
                        const erros = error.response.data.errors;

                        for (const key in erros) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Erro',
                                text: erros[key][0],
                                confirmButtonColor: '#155CA9',
                            })
                        }

                        return;
                    }


                },
                async listaOrientacaoSexual() {

                    const url = "{{ route('orientacaoSexual.listar') }}";

                    const response = await axios.get(url);

                    this.orientacaoSexualData = response.data;

                },
                async listaIdentidadeGenero() {
                    const url = "{{ route('identidadeGenero.listar') }}";

                    const response = await axios.get(url);

                    this.identidadeGeneroData = response.data;

                },
                async listaRaca() {
                    const url = "{{ route('raca.listar') }}";

                    const response = await axios.get(url);

                    this.racaData = response.data;
                },
                async listaEtnia() {
                    const url = "{{ route('etnia.listar') }}";

                    const response = await axios.get(url);

                    this.etniaData = response.data;
                },
                inicializar() {
                    this.listaOrientacaoSexual();
                    this.listaIdentidadeGenero();
                    this.listaRaca();
                    this.listaEtnia();
                    this.geraSenhaAleatoria();
                    this.listaEspecialidades();
                },
                async listaEspecialidades() {
                    const url = "{{ route('especialidade.listar') }}";

                    const response = await axios.get(url);

                    this.especialidadesData = response.data.data;
                },
                async geraSenhaAleatoria() {

                    //gerar senha aleatoria com
                    const caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789#@._';
                    let senha = '';
                    for (let i = 0; i < 8; i++) {
                        senha += caracteres.charAt(Math.floor(Math.random() * caracteres.length));
                    }

                    this.senha = senha;
                }

            }
        }
    </script>
@endpush
