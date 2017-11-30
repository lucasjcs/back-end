<template>
    <section id="content" class="container listagem-de-conteudo">
        <div class="row">
           <item-loja v-for="loja in lojas" :nome="loja.nome | truncate(20) " :tipo="loja.tipo" :imagem="loja.imagem" :key="loja.id" :id="loja.id"></item-loja>
        </div>
    </section>
</template>

<script>
    export default {
        mounted() {
            this.getJson();
        },
        data() {
            return {
                lojas: []
            }
        },
        methods: {
            getJson: function () {
                axios.get('/api/lojas').then(response => {
                    this.lojas = response.data.lojas;
                });
            },
        }
    }
</script>
