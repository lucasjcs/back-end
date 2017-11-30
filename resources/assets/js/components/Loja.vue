<template>
    <div>
        <section class="container-fluid" id="company">
            <header class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <img :src="imagem" width="100" class="logo" />
                        <div class="text">
                            <h1>{{ nome }}</h1>
                            <div class="row">
                                <p class="col-lg-6"><i class="fa fa-cutlery" aria-hidden="true"></i>{{ tipo }}</p>
                                <p class="col-lg-6"><i class="fa fa-clock-o" aria-hidden="true"></i>50 - 60 min</p>
                                <p class="col-lg-6 cell"><i class="fa fa-phone" aria-hidden="true"></i>{{ telefone }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        </section>

        <cardapio :produtos="produtos"></cardapio>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.getJson();
        },
        data(){
            return {
                nome:'',
                imagem:'',
                tipo:'',
                produtos:'',
                telefone: ''
            }
        },
        methods: {
            getJson: function () {
                axios.get('/api/lojas'+window.location.pathname).then(response => {
                    this.nome = response.data.nome;
                    this.imagem = response.data.imagem;
                    this.tipo = response.data.tipo;
                    this.produtos = response.data.listaDeItens;
                    this.telefone = response.data.telefone;

                    console.log(this.produtos);
                });
            },
        }
    }
</script>
