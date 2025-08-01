@extends('layout.app')


@section('content')
    <div x-data="setup()">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">






                    <a href="{{ route('exames.index') }}"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4 me-2.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.242 5.992h12m-12 6.003H20.24m-12 5.999h12M4.117 7.495v-3.75H2.99m1.125 3.75H2.99m1.125 0H5.24m-1.92 2.577a1.125 1.125 0 1 1 1.591 1.59l-1.83 1.83h2.16M2.99 15.745h1.125a1.125 1.125 0 0 1 0 2.25H3.74m0-.002h.375a1.125 1.125 0 0 1 0 2.25H2.99" />
                        </svg>
                        Exames
                    </a>
                </li>

                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">Novo Exame</span>
                    </div>
                </li>
            </ol>
        </nav>


        <form action="{{ route('exames.store') }}" method="POST" class="my-4">
            @csrf

            <div class="mb-6">
                <label for="nome" class="block mb-2 text-sm font-medium text-gray-900">Nome</label>
                <input type="text" id="nome" x-model="nome"
                    class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 focus:outline-blue-500 ">
            </div>

            <div class="mb-6">
                <label for="descricao" class="block mb-2 text-sm font-medium text-gray-900">Descrição</label>
                <textarea id="descricao" rows="4" x-model="descricao"
                    class="block p-2.5 w-full text-sm text-gray-900  rounded-lg border border-gray-300 focus:outline-blue-500 focus:ring-blue-500 focus:border-blue-500 "
                    placeholder="Coloque a descrição do exame aqui..."></textarea>
            </div>

            <div class="flex justify-end">
                <button type="button"
                    class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-lg shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                    @click="salvarExame()">
                    Criar Exame
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
                descricao: '',
                async salvarExame() {

                    if (this.nome == '' || this.descricao == '') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Erro',
                            text: 'Por favor, preencha todos os campos.',
                            confirmButtonColor: '#155CA9',
                        })
                        return;

                    }

                    try {

                        const url = "{{ route('exames.store') }}";

                        const response = await axios.post(url, {
                            nome: this.nome,
                            descricao: this.descricao
                        })

                        let timerInterval;
                        Swal.fire({
                            title: 'Exame criado com sucesso!',
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
                            window.location.href = "{{ route('exames.index') }}";
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

            }
        }
    </script>
@endpush
