@extends('layout.app')


@section('content')
    <div x-data="setup()" x-init="fetchData()">

        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-2xl text-[#155CA9] ">Pacientes</h2>
            </div>
            <div>
                <a href="{{ route('pacientes.create') }}"
                    class="hover:cursor-pointer p-2 bg-blue-600 hover:bg-blue-800 text-white rounded-lg">Adicionar paciente</a>
            </div>
        </div>

        <div class="border p-4 border-gray-300 rounded-lg mb-8">
            <div class="mb-4">
                <span>Filtros</span>
            </div>

            <div class="flex gap-2">
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 18 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2" />
                        </svg>
                    </div>
                    <input type="text" id="simple-search" x-model="filtro"
                        class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 focus:outline-blue-500"
                        placeholder="Busque pelo nome do exame" required />
                </div>
                <button type="button" @click="filtrar()"
                    class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300   ">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    <span class="sr-only">Buscar</span>
                </button>
                <button type="button" @click="limparFiltro()"
                    class="p-2.5 ms-2 text-sm font-medium text-white bg-gray-400 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300   ">

                    <span>Limpar</span>
                </button>
            </div>


        </div>


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Nome
                        </th>
                        <th scope="col" class="">
                            Ações
                        </th>

                    </tr>
                </thead>
                <tbody>
                    <tr x-show="pacienteDataSize == 0">
                        <td class="text-center" colspan="3">Nenhum Registro Encontrado</td>
                    </tr>

                    <template x-for="(paciente, index) in pacientesData.data" :key="index">
                        <tr class="bg-white border-b hover:bg-gray-50 ">
                            <td x-text="paciente.id" class="text-center py-4"></td>
                            <td x-text="paciente.nome" class="text-center"></td>
                            <td class="">
                                <div class="flex gap-2">

                                    <a :href="`{{ url('pacientes/editar') }}/${paciente.id}`">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6 text-green-600">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>

                                    </a>

                                    <a type="button" @click="excluirPaciente(paciente.id)">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6 text-red-600">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>

                                    </a>
                                </div>
                            </td>
                        </tr>

                    </template>


                </tbody>
            </table>
            <div>


                <nav aria-label="Page navigation example" class="flex items-center justify-center my-4">
                    <ul class="inline-flex -space-x-px text-sm">
                        <li>
                            <a href="#"
                                :class="{ 'cursor-not-allowed opacity-50 pointer-events-none': currentPage == 1 }"
                                @click="fetchData(pacientesData.current_page - 1)"
                                class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 ">Anterior</a>
                        </li>

                        <template x-for="(page, index) in pacientesData.links" :key="index">
                            <li>
                                <a href="#"
                                    x-bind:class="{
                                        'bg-blue-700 text-white': page
                                            .active,
                                        'bg-white text-gray-500 hover:bg-gray-100 hover:text-gray-700': !page
                                            .active
                                    }"
                                    @click="fetchData(page.label)"
                                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700"
                                    x-text="page.label"></a>
                            </li>
                        </template>

                        <li>
                            <a href="#"
                                :class="{ 'cursor-not-allowed opacity-50 pointer-events-none': currentPage == totalPages }"
                                @click="fetchData(pacientesData.current_page + 1)"
                                class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 ">Próximo</a>
                        </li>
                    </ul>
                </nav>


            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function setup() {
            return {
                pacienteDataSize: 0,
                currentPage: 1,
                totalPages: 0,
                pacientesData: [],
                filtro: '',
                fetchData(page) {
                    // const loading = Swal.fire({
                    //     title: 'Carregando...',
                    //     allowOutsideClick: false,
                    //     didOpen: () => {
                    //         Swal.showLoading()
                    //     }
                    // });

                    page = page || 1;
                    this.currentPage = page;

                    try {
                        const url = "{{ route('pacientes.listarPacientes') }}";
                        const response = axios.get(url, {
                            params: {
                                page: this.currentPage,
                                filtro: this.filtro
                            }
                        })

                        response.then(response => {
                            this.pacientesData = response.data;
                            this.totalPages = response.data.last_page;

                            this.pacientesData.links.shift(); // Remove o link "Primeira" se existir
                            this.pacientesData.links.pop(); // Remove o link "Última" se existir

                            this.pacienteDataSize = this.pacientesData.data.length;

                            // loading.close();
                        })


                    } catch (error) {
                        console.log(error);
                    }




                },
                filtrar(){
                    this.fetchData();
                },
                limparFiltro(){
                    this.filtro = '';
                    this.fetchData();
                },
                excluirPaciente(id){
                    if(id == null || id == undefined){
                        Swal.fire({
                            icon: 'error',
                            title: 'Erro',
                            text: 'ID do paciente não encontrado.',
                            confirmButtonColor: '#155CA9',
                        })
                        return;
                    }

                    const url = `{{ url('pacientes/excluir') }}/${id}`;

                    Swal.fire({
                        title:`Você tem certeza que deseja excluir o paciente com ID ${id}?`,
                        text: "Essa ação não pode ser desfeita!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#155CA9',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sim, excluir!',
                        cancelButtonText: 'Cancelar'
                    }).then((result) =>{
                        if(result.isConfirmed){
                            axios.get(url)
                            .then(response => {
                                Swal.fire({
                                    title: 'Paciente excluído com sucesso!',
                                    icon: 'success',
                                    confirmButtonColor: '#155CA9',
                                })

                                this.fetchData(); // Atualiza a lista de pacientes
                            })
                        }
                    })

                }

            }
        }
    </script>
@endpush
