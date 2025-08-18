@extends('layout.app')


@section('content')
    <div x-data="setup()" x-init="inicializar()">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">

                    <a href="{{ route('consultas.index') }}"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4 me-2.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.242 5.992h12m-12 6.003H20.24m-12 5.999h12M4.117 7.495v-3.75H2.99m1.125 3.75H2.99m1.125 0H5.24m-1.92 2.577a1.125 1.125 0 1 1 1.591 1.59l-1.83 1.83h2.16M2.99 15.745h1.125a1.125 1.125 0 0 1 0 2.25H3.74m0-.002h.375a1.125 1.125 0 0 1 0 2.25H2.99" />
                        </svg>
                        Consultas
                    </a>
                </li>

                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">Nova Consulta</span>
                    </div>
                </li>
            </ol>
        </nav>


        <form action="" method="POST" class="my-4">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div>
                    <label for="paciente" class="block mb-2 text-sm font-medium text-gray-900">Paciente</label>
                    <select id="paciente" x-model="paciente"
                        class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option selected>Selecione...</option>
                        <template x-for="paciente in arrayPacientesData" :key="paciente.id">
                            <option :value="paciente.id" x-text="paciente.nome"></option>
                        </template>

                    </select>
                </div>

                <div>
                    <label for="medico" class="block mb-2 text-sm font-medium text-gray-900">Médico</label>
                    <select id="medico" x-model="medico"
                        class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option selected>Selecione...</option>
                        <template x-for="medico in arrayMedicosData" :key="medico.id">
                            <option :value="medico.id" x-text="medico.nome"></option>
                        </template>
                    </select>
                </div>

                <div>
                    <label for="data_hora" class="block mb-2 text-sm font-medium text-gray-900">Data/Hora
                        Consulta</label>
                    <input type="datetime-local" id="data_hora" x-model="data_hora" readonly disabled
                        class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 focus:outline-blue-500 ">
                </div>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-1 gap-4 mb-6">
                <div>
                    <label for="motivo" class="block mb-2 text-sm font-medium text-gray-900">Motivo</label>
                    <input type="text" id="motivo" x-model="motivo"
                        class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 focus:outline-blue-500 ">
                </div>

                <div class="">
                    <label for="descricao" class="block mb-2 text-sm font-medium text-gray-900">Descrição</label>
                    <textarea id="descricao" rows="10" x-model="descricao"
                        class="block p-2.5 w-full text-sm text-gray-900  rounded-lg border border-gray-300 focus:outline-blue-500 focus:ring-blue-500 focus:border-blue-500 "
                        placeholder="Coloque a descrição do exame aqui..."></textarea>
                </div>

            </div>


            <div class="w-full border-b-2 border-b-blue-500 ">

            </div>
            <div class="mb-6">
                <span class="text-2xl">Exames</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div>
                    <label for="tipo_exame" class="block mb-2 text-sm font-medium text-gray-900">Tipo de Exame</label>
                    <select id="tipo_exame" x-model="tipo_exame"
                        class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option selected>Selecione...</option>
                        <template x-for="exame in arrayExamesData" :key="exame.id">
                            <option :value="exame.id" x-text="exame.nome"></option>
                        </template>

                    </select>
                </div>

                <div class="mt-[27px]">
                    <button type="button" @click="addExame(tipo_exame)"
                        class="py-2 px-2 bg-green-600 rounded-lg text-white hover:cursor-pointer hover:bg-green-800">Adicionar</button>
                </div>
            </div>

            <div>
                <ol>

                    <template x-for="(exame, index) in itensExamesAdicionados" :key="index">
                        <li class="flex justify-between items-center bg-gray-200 p-2 mb-3">

                        <div>
                            <span x-text="exame.nome"></span>
                        </div>

                        <div>
                            <button type="button" class="bg-red-600 text-white rounded-lg px-4 py-2 hover:bg-red-700" @click="removerExame(exame.id)">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>

                            </button>
                        </div>
                    </li>

                    </template>
                </ol>
            </div>



            <div class="w-full border-b-2 border-b-blue-500 ">

            </div>
            <div class="mb-6">
                <span class="text-2xl">Receita</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-3">
                {{-- //descricao, medicamento, quantidade, dosagem --}}
                <div>
                    <label for="medicamento" class="block mb-2 text-sm font-medium text-gray-900">Medicamento</label>
                    <select id="medicamento" x-model="medicamento"
                        class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option selected>Selecione...</option>
                        <template x-for="medicamento in arrayMedicamentosData" :key="medicamento.id">
                            <option :value="medicamento.id" x-text="medicamento.nome"></option>
                        </template>

                    </select>
                </div>


                <div>
                    <label for="dosagem" class="block mb-2 text-sm font-medium text-gray-900">Dosagem</label>
                    <input type="text" id="dosagem" x-model="dosagem"
                        class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 focus:outline-blue-500 ">
                </div>

                <div>
                    <label for="quantidade" class="block mb-2 text-sm font-medium text-gray-900">Quantidade</label>
                    <input type="text" id="quantidade" x-model="quantidade"
                        class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 focus:outline-blue-500 ">
                </div>

            </div>

            <div class="grid grid-cols-1 gap-4 mb-6">
                <div class="">
                    <label for="descricao_receita_medicamento"
                        class="block mb-2 text-sm font-medium text-gray-900">Descrição</label>
                    <textarea id="descricao_receita_medicamento" rows="5" x-model="descricao_receita_medicamento"
                        class="block p-2.5 w-full text-sm text-gray-900  rounded-lg border border-gray-300 focus:outline-blue-500 focus:ring-blue-500 focus:border-blue-500 "
                        placeholder="Exemplo: Tomar de 8 em 8 horas"></textarea>
                </div>
            </div>

            <div class="mb-6">
                <button type="button" @click="addMedicamento(medicamento)"
                    class="p-2 bg-green-600 rounded-lg text-white hover:cursor-pointer hover:bg-green-800">Adicionar
                    Medicamento</button>
            </div>


            <div>
                <ol>

                    <template x-for="(medicamento, index) in itensMedicamentosAdicionados" :key="index">
                        <li class="flex justify-between items-center bg-gray-200 p-2 mb-3">
                        <div>
                            <div>
                                <span x-text="medicamento.nome"></span> .......................................<span x-text="medicamento.quantidade"></span>
                            </div>
                            <div>
                                <span class="text-sm text-gray-500">Descrição: <span x-text="medicamento.descricao"></span></span>
                            </div>
                        </div>

                        <div>
                            <button type="button" class="bg-red-600 text-white rounded-lg px-4 py-2 hover:bg-red-700" @click="removerMedicamento(medicamento.id)">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>

                            </button>
                        </div>
                    </li>
                    </template>



                </ol>
            </div>


            <div class="flex justify-end">
                <button type="button"
                    class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-lg shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                    @click="salvarMedico()">
                    Cadastrar Consulta
                </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        function setup() {
            return {
                paciente: '',
                medico: '',
                arrayMedicosData: [],
                arrayPacientesData: [],
                arrayExamesData: [],
                arrayMedicamentosData: [],
                itensExamesAdicionados: [],
                itensMedicamentosAdicionados: [],
                data_hora: '',
                motivo: '',
                descricao: '',
                medicamento: '',
                dosagem: '',
                quantidade: '',
                descricao_receita_medicamento: '',
                tipo_exame: '',
                inicializar() {
                    this.data_hora = moment().format('YYYY-MM-DDTHH:mm');
                    this.listarMedicos();
                    this.listarPacientes();
                    this.listarExames();
                    this.listarMedicamentos();
                },
                async listarMedicos() {

                    const url = "{{ route('medicos.listarMedicosSelect') }}";

                    const response = await axios.get(url);

                    this.arrayMedicosData = response.data.medicos;



                },
                async listarPacientes() {
                    const url = "{{ route('pacientes.listarPacientesSelect') }}";

                    const response = await axios.get(url);

                    this.arrayPacientesData = response.data.pacientes;
                },
                async listarExames() {
                    const url = "{{ route('exames.listarExamesSelect') }}";

                    const response = await axios.get(url);

                    this.arrayExamesData = response.data.exames;
                },
                async listarMedicamentos(){
                    const url = "{{ route('medicamentos.listarMedicamentosSelect') }}";

                    const response = await axios.get(url);

                    this.arrayMedicamentosData = response.data.medicamentos;
                },
                async addExame(tipo_exame){

                    if(this.itensExamesAdicionados.some(exame => exame.id == tipo_exame)) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Erro',
                            text: 'Exame já adicionado!'
                        });
                        return;
                    }

                    this.arrayExamesData.forEach(exame => {
                        if (exame.id == tipo_exame) {
                            this.itensExamesAdicionados.push(exame);
                        }
                    });


                },
                async removerExame(id) {
                    this.itensExamesAdicionados = this.itensExamesAdicionados.filter(exame => exame.id !== id);
                },
                async addMedicamento(medicamento){
                    //descricao, medicamento, quantidade, dosagem
                    if(this.itensMedicamentosAdicionados.some(med => med.id == medicamento)) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Erro',
                            text: 'Medicamento já adicionado!'
                        });
                        return;
                    }

                    this.arrayMedicamentosData.forEach(med => {
                        if (med.id == medicamento) {
                            this.itensMedicamentosAdicionados.push({
                                id: med.id,
                                nome: med.nome,
                                dosagem: this.dosagem,
                                quantidade: this.quantidade,
                                descricao: this.descricao_receita_medicamento
                            });
                        }
                    });

                },
                async removerMedicamento(id) {
                    this.itensMedicamentosAdicionados = this.itensMedicamentosAdicionados.filter(med => med.id !== id);
                },




            }
        }
    </script>
@endpush
