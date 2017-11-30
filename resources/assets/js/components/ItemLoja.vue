<template>
        <article class="item-box col-sm-12 col-md-6">
            <a :href="id">
                <figure><img width="100" :src="imagem" class="logo"></figure>
                <div class="texts">
                    <h3>{{ nome }}</h3>
                    <p class="type"><i class="fa fa-cutlery" aria-hidden="true"></i>{{ tipo }}</p>
                    <p class="estime-time"><i class="fa fa-clock-o" aria-hidden="true"></i>40 - 50 min</p>
                </div>
            </a>
        </article>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        props: ['id', 'nome', 'tipo', 'imagem']
    }
</script>
